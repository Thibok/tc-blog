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
use \Validator\PseudoValidator;
use \Validator\UserNoExistsValidator;
use \Components\StringField;
use \Validator\StructureValidator;
use \Validator\NoSqlValidator;

class SignupFormBuilder extends FormBuilder
{
    /**
	 * {@inheritDoc}
	 * @return void
	 */
    public function build()
	{
        $pseudoMinCharacter = $this->config->get('user_pseudo_min_character');
        $pseudoMaxCharacter = $this->config->get('user_pseudo_max_character');
        $emailMinCharacter = $this->config->get('user_email_min_character');
        $emailMaxCharacter = $this->config->get('user_email_max_character');
        $passwordMinCharacter = $this->config->get('user_password_min_character');
        $passwordMaxCharacter = $this->config->get('user_password_max_character');

        $this->form->add(new StringField([
            'name' => 'pseudo',
            'label' => 'Pseudo',
            'type' => 'text',
            'class' => 'form-group col-lg-10',
            'maxLength' => $pseudoMaxCharacter,
            'placeHolder' => 'Pseudo', 
            'required' => true,
            'validators' => [
                new MinLengthValidator(
                    'Longueur minimum : '.$pseudoMinCharacter.' caractères',
                    $pseudoMinCharacter
                ),
                new MaxLengthValidator(
                    'Longueur maximum : '.$pseudoMaxCharacter.' caractères',
                    $pseudoMaxCharacter
                ),
                new StructureValidator('a-z, A-Z, -, 0-9', '#[a-zA-z0-9-]#'),
                new NoSqlValidator('Certains mots saisit ne sont pas autorisés !'),
                new UserNoExistsValidator('Ce pseudo est déjà pris', 'pseudo')
            ]
        ]));
        
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
                new NoSqlValidator('Certains mots saisit ne sont pas autorisés !'),
                new UserNoExistsValidator('Cette email est déjà pris', 'email'),
                new StructureValidator(
                    'Votre adresse email doit être valide',
                    '#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#'
                )
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
                new NoSqlValidator('Certains mots saisit ne sont pas autorisés !')
            ]
        ]));
	}
}