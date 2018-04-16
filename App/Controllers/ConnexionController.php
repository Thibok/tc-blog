<?php
namespace Controllers;

use \Components\Controller;
use \Components\Request;
use \Entity\User;
use \Model\UserManager;
use \FormBuilder\SignupFormBuilder;

class ConnexionController extends Controller
{   
    public function executeSignup(Request $request)
    {

        if ($request->method() == 'POST')
        {
            $user = new User(['pseudo' => $request->postData('pseudo'), 'email' => $request->postData('email'), 'password' => $request->postData('password')]);
        }
        
        else
        {
            $user = new User;
        }

        if ($user->isAuthenticated())
        {
            $this->response->redirect('.');
        }

        $formBuilder = new SignupFormBuilder($user);

        $formBuilder->build();

        $form = $formBuilder->getForm();

        if ($request->method() == 'POST' && $form->isValid())
        {
            $user->setPassword(password_hash($user->getPassword(), PASSWORD_DEFAULT));
            
            $manager = new UserManager;
            $userId = $manager->save($user);
            
            $user->setId($userId);
            $user->setRole('Membre');

            $user->setAuthenticated(true);
            $_SESSION['user'] = $user;

            $user->setFlash('Vous êtes maintenant connecté !');
            
            $this->response->redirect('.');
        }

        $this->response->render('signup.twig', ['title' => 'Inscription', 'form' => $form->generate()]);
    }
}