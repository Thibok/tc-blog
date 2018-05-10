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
use \FormBuilder\ForgotPasswordFormBuilder;
use \FormBuilder\ResetPasswordFormBuilder;
use \Components\Mailer;

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

    /**
	 * @access public
	 * @param Request $request
	 * @return void
	 */
    public function executeForgotPassword(Request $request)
    {
        if ($request->method() == 'POST') {

            $user = new User([
                'email' => $request->postData('email'),
                'captcha' => $request->postData('g-recaptcha-response')
            ]);
        
        } else {

            $user = new User;
        }

        if ($user->isAuthenticated()) {

            $this->response->redirect('.');
        }

        $formBuilder = new ForgotPasswordFormBuilder($user);
        $formBuilder->build();

        $form = $formBuilder->getForm();

        if ($request->method() == 'POST' && $form->isValid()) {

            $manager = new UserManager;
            $user = $manager->getPseudoByEmail($user);

            $mailer = new Mailer;

            $senderEmail = $mailer->getConfig()->get('contact_email');

            $user->setEmail(str_replace(array("\n", "\r", PHP_EOL), '', $user->getEmail()));
            
            $resetCode = bin2hex(random_bytes(40));
            $link = 'http://tc-blog.fr/reinitialiser_mot_de_passe?u_'.$user->getId().'k_'.$resetCode;

			$mailer->createMessage(
				$user->getPseudo(),
				$senderEmail,
                $user->getEmail(),
				'Tc-blog - Réinitialisation du mot de passe',
				'<strong>Bonjour '.$user->getPseudo().',</strong><p>Voici le lien pour réinitialiser votre mot de passe : '.$link.'</p>'
			);

			$result = $mailer->send();

			if ($result) {

                $timeZone = new \DateTimeZone('Europe/Paris');
                $expirationDate = new \DateTime('now', $timeZone);
                $expirationDate->add(new \DateInterval('PT10M'));

                $user->setCodeExpirationDate($expirationDate);
                $user->setResetCode($resetCode);
                
                $manager->saveResetCode($user);
                
                $user->setFlash(
                    'Un code pour réinitialiser votre mot de passe vous a été envoyé par mail, le code est valable 10 minutes !'
                );

                $this->response->redirect('.');
                
            } else {
				
				$user->setFlash('Une erreur c\'est produite, réessayez !');
			}
        }

        $this->response->render(
            'forgot_pass.twig',
            ['title' => 'Mot de passe oublié', 'form' => $form->generate(), 'user' => $user]
        );
    }

    /**
	 * @access public
	 * @param Request $request
	 * @return void
	 */
    public function executeResetPassword(Request $request)
    {
        $manager = new UserManager;

        $user = $manager->getInfosForResetPassword($request->getData('id'));
        
        if ($user->isAuthenticated()) {

            $this->response->redirect('.');
        }

        $timeZone = new \DateTimeZone('Europe/Paris');
        $dateTime = new \DateTime('now', $timeZone);
        $actualDate = $dateTime->format('Y-m-d H:i:s');
        $expirationDate = $user->getCodeExpirationDate()->format('Y-m-d H:i:s');

        if ($request->getData('resetCode') == $user->getResetCode() && $actualDate <= $expirationDate) {

            if ($request->method() == 'POST') {

                $user->hydrate(['password' => $request->postData('password')]);
            }
            
            $formBuilder = new ResetPasswordFormBuilder($user);
            $formBuilder->build();

            $form = $formBuilder->getForm();

            if ($request->method() == 'POST' && $form->isValid()) {

                $user->setPassword(password_hash($user->getPassword(), PASSWORD_BCRYPT));
                $manager->updatePassword($user);

                $user->setFlash('Le mot de passe a bien été modifié !');
                $this->response->redirect('.');
            }

            $this->response->render(
                'reset_pass.twig',
                ['title' => 'Réinitialisation du mot de passe', 'form' => $form->generate()]
            );

        } else {

            $this->response->render('404.twig', ['title' => '404 Not Found', 'user' => $user]);
        }


    }
}