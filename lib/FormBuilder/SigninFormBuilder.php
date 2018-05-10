<?php

/*
 * This file is part of the Tc-blog project.
 *
 * (c) Thibault Cavailles <tcblog@tc-dev.ovh>
 *
 * First blog in PHP
 */

namespace FormBuilder;

use \Components\FormBuilder;
use \Validator\MaxLengthValidator;
use \Validator\MinLengthValidator;
use \Validator\UserExistsValidator;
use \Components\StringField;
use \Validator\StructureValidator;
use \Validator\CanConnectValidator;
use \Validator\NoSqlValidator;

class SigninFormBuilder extends FormBuilder
{
    /**
	 * {@inheritDoc}
	 * @return void
	 */
    public function build()
	{
        $emailMinCharacter = $this->config->get('user_email_min_character');
        $emailMaxCharacter = $this->config->get('user_email_max_character');
        $passwordMinCharacter = $this->config->get('user_password_min_character');
        $passwordMaxCharacter = $this->config->get('user_password_max_character');
        
        $this->form->add(new StringField([
            'name' => 'email',
            'label' => 'Email',
            'type' => 'email',
            'class' => 'form-group col-lg-10',
            'maxLength' => $emailMaxCharacter,
            'placeHolder' => 'Email', 
            'required' => true,
            'validators' => [
                new MinLengthValidator(
                    'Longueur minimum : '.$emailMinCharacter.' caractères minimum',
                    $emailMinCharacter
                ),
                new MaxLengthValidator(
                    'Longueur maximum : '.$emailMaxCharacter.' caractères',
                    $emailMaxCharacter
                ),
                new StructureValidator(
                    'Votre adresse email doit être valide',
                    '#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#'
                ),
                new NoSqlValidator('Certains mots saisit ne sont pas autorisés !'),
                new UserExistsValidator('L\'email saisis n\'existe pas', 'email'),
            ]
        ]));
        
        $this->form->add(new StringField([
            'name' => 'password',
            'label' => 'Mot de passe',
            'type' => 'password',
            'class' => 'form-group col-lg-10',
            'maxLength' => $passwordMaxCharacter,
            'placeHolder' => 'Mot de passe', 
            'required' => true,
            'validators' => [
                new MinLengthValidator(
                    'Longueur minimum : '.$passwordMinCharacter.' caractères',
                    $passwordMinCharacter
                ),
                new MaxLengthValidator(
                    'Longueur maximum : '.$passwordMaxCharacter.' caractères',
                    $passwordMaxCharacter
                ),
                new StructureValidator('Au moins 1 lettre et 1 chiffre', '#[a-zA-Z]+[0-9]+#'),
                new NoSqlValidator('Certains mots saisit ne sont pas autorisés !'),
                new CanConnectValidator(
                    'Mot de passe incorrect !',
                    $this->form->getEntity()->getEmail()
                )
            ]
        ]));
	}
}