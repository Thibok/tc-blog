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
use \Components\TextField;
use \Components\StringField;
use \Components\CaptchaField;
use \Validator\StructureValidator;
use \Validator\MaxLengthValidator;
use \Validator\NotNullValidator;
use \Validator\CaptchaValidator;

class ContactFormBuilder extends FormBuilder
{
    /**
	 * {@inheritDoc}
	 * @return void
	 */
    public function build()
	{
        $nameMaxCharacter = $this->config->get('contact_name_max_character');
        $firstNameMaxCharacter = $this->config->get('contact_firstName_max_character');
        $emailMaxCharacter = $this->config->get('contact_email_max_character');
        $messageMaxCharacter = $this->config->get('contact_message_max_character');
        $captchaPublicKey = $this->config->get('public_captcha_key');

        $this->form->add(new StringField([
            'name' => 'name',
            'label' => 'Nom',
            'type' => 'text',
            'placeHolder' => 'Nom',
            'class' => 'form-group',
            'maxLength' => $nameMaxCharacter, 
            'required' => true,
            'validators' => [
                new NotNullValidator('Le nom ne peut pas être vide !'),
                new MaxLengthValidator(
                    'Longueur maximum : '.$nameMaxCharacter.' caractères',
                    $nameMaxCharacter
                )
            ]
        ]));

        $this->form->add(new StringField([
            'name' => 'firstName',
            'label' => 'Prénom',
            'type' => 'text',
            'placeHolder' => 'Prénom',
            'class' => 'form-group',
            'maxLength' => $firstNameMaxCharacter, 
            'required' => true,
            'validators' => [
                new NotNullValidator('Le prénom ne peut pas être vide !'),
                new MaxLengthValidator(
                    'Longueur maximum : '.$firstNameMaxCharacter.' caractères',
                    $firstNameMaxCharacter
                ),
            ]
        ]));

        $this->form->add(new StringField([
            'name' => 'email',
            'label' => 'Email',
            'type' => 'email',
            'placeHolder' => 'Email',
            'class' => 'form-group',
            'maxLength' => $emailMaxCharacter, 
            'required' => true,
            'validators' => [
                new NotNullValidator('L\'email ne peut pas être vide !'),
                new MaxLengthValidator(
                    'Longueur maximum : '.$emailMaxCharacter.' caractères',
                    $emailMaxCharacter
                ),
                new StructureValidator(
                    'Votre adresse email doit être valide',
                    '#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#'
                )
            ]
        ]));

        $this->form->add(new TextField([
            'name' => 'message',
            'label' => 'Message',
            'rows' => '4',
            'class' => 'form-group',
            'maxLength' => $messageMaxCharacter, 
            'required' => true,
            'validators' => [
                new NotNullValidator('Le message ne peut pas être vide !'),
                new MaxLengthValidator(
                    'Longueur maximum : '.$messageMaxCharacter.' caractères',
                    $messageMaxCharacter
                )
            ]
        ]));
        
        $this->form->add(new CaptchaField([
            'name' => 'captcha',
            'publicKey' => $captchaPublicKey,
            'class' => 'form-group',
            'validators' => [
                new CaptchaValidator('Le captcha doit être valide !')
            ]
        ]));
	}
}