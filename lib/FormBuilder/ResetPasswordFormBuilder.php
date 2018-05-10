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
use \Components\StringField;
use \Validator\StructureValidator;
use \Validator\NoSqlValidator;
use \Validator\MaxLengthValidator;
use \Validator\MinLengthValidator;

class ResetPasswordFormBuilder extends FormBuilder
{
    /**
	 * {@inheritDoc}
	 * @return void
	 */
    public function build()
	{
        $passwordMinCharacter = $this->config->get('user_password_min_character');
        $passwordMaxCharacter = $this->config->get('user_password_max_character');
   
        $this->form->add(new StringField([
            'name' => 'password',
            'label' => 'Nouveau mot de passe',
            'type' => 'password',
            'class' => 'form-group col-lg-10',
            'maxLength' => $passwordMaxCharacter,
            'placeHolder' => 'Nouveau Mot de passe', 
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