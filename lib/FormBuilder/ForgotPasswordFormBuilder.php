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
use \Components\CaptchaField;
use \Components\StructureValidator;
use \Components\NoSqlValidator;
use \Components\MaxLengthValidator;
use \Components\MinLengthValidator;
use \Components\UserExistsValidator;
use \Components\CaptchaValidator;

class ForgotPasswordFormBuilder extends FormBuilder
{
    /**
	 * {@inheritDoc}
	 * @return void
	 */
    public function build()
	{
        $emailMinCharacter = $this->config->get('user_email_min_character');
        $emailMaxCharacter = $this->config->get('user_email_max_character');
        $captchaPublicKey = $this->config->get('public_captcha_key');
   
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
                new UserExistsValidator('L\'email saisis n\'existe pas', 'email'),
                new StructureValidator(
                    'Votre adresse email doit être valide',
                    '#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#'
                )
            ]
        ]));

        $this->form->add(new CaptchaField([
            'name' => 'captcha',
            'publicKey' => $captchaPublicKey,
            'class' => 'form-group col-lg-10',
            'validators' => [
                new CaptchaValidator('Le captcha doit être valide !')
            ]
        ]));
	}
}