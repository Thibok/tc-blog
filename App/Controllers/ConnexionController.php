<?php

/*
 * This file is part of the Tc-blog project.
 *
 * (c) Thibault Cavailles <tcblog@tc-dev.ovh>
 *
 * First blog in PHP
 */

namespace Controllers;

use \Components\Controller;
use \Components\Request;
use \Components\Gate;
use \Entity\User;
use \Model\UserManager;
use \FormBuilder\SignupFormBuilder;
use \FormBuilder\SigninFormBuilder;

class ConnexionController extends Controller
{   
    /**
	 * @access public
	 * @param Request $request
	 * @return void
	 */
    public function executeDisconect(Request $request)
    {
       
        $this->response->endSession();
        $this->response->redirect('.');
        
    }

    /**
	 * @access public
	 * @param Request $request
	 * @return void
	 */
    public function executeSignin(Request $request)
    {
        if ($request->method() == 'POST') {

            sleep(1);

            $user = new User([
                'pseudo' => $request->postData('pseudo'),
                'email' => $request->postData('email'),
                'password' => $request->postData('password')
            ]);

        } else {
            
            $user = new User;

        } 

        if ($user->isAuthenticated()) {

            $this->response->redirect('.');
        }

        $formBuilder = new SigninFormBuilder($user);

        $formBuilder->build();

        $form = $formBuilder->getForm();

        if ($request->method() == 'POST') {

            $maxAttempt = $this->config->get('number_max_attempt');
            $gate = new Gate($maxAttempt);

            if ($gate->control($request->ip())) {

                if ($form->isValid()) {

                    $manager = new UserManager;
                    $user = $manager->getInfosByEmail($user);
                    $user->setAuthenticated(true);
                    $user->setFlash('Vous êtes maintenant connecté !');
                    
                    // Create unique random token
                    $user->getToken()->create();

                    // Create random ticket
                    $user->getTicket()->generate();

                    $_SESSION['user'] = $user;

                    $this->response->redirect('.');

                } else {
                   
                    $gate->addToJail($request->ip());
                }

            } else {

                $user->setFlash('Vous avez atteint le maximum de tentatives autorisées, réessayez ultérieurement');
            }
        }

        $this->response->render(
            'signin.twig',
            ['title' => 'Connexion','form' => $form->generate(), 'user' => $user]
        );
    }

    /**
	 * @access public
	 * @param Request $request
	 * @return void
	 */
    public function executeSignup(Request $request)
    {

        if ($request->method() == 'POST') {

            $user = new User([
                'pseudo' => $request->postData('pseudo'),
                'email' => $request->postData('email'),
                'password' => $request->postData('password')
            ]);

        } else {

            $user = new User;
        }

        if ($user->isAuthenticated()) {

            $this->response->redirect('.');
        }

        $formBuilder = new SignupFormBuilder($user);

        $formBuilder->build();

        $form = $formBuilder->getForm();

        if ($request->method() == 'POST' && $form->isValid()) {

            $user->setPassword(password_hash($user->getPassword(), PASSWORD_BCRYPT));
            
            $manager = new UserManager;
            $userId = $manager->save($user);
            
            $user->setId($userId);
            $user->setRole('Membre');
            $user->setAuthenticated(true);

            // Create unique random token
            $user->getToken()->create();

            // Create random ticket
            $user->getTicket()->generate();

            $_SESSION['user'] = $user;

            $user->setFlash('Vous êtes maintenant connecté !');
            
            $this->response->redirect('.');
        }

        $this->response->render(
            'signup.twig',
            ['title' => 'Inscription', 'form' => $form->generate()]
        );
    }
}