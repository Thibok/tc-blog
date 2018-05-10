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
use \Validator\NotNullValidator;
use \Components\TextField;
use \Components\StringField;
use \Components\SelectField;
use \Model\UserManager;
use \Validator\FileSendValidator;
use \Validator\FileSizeValidator;
use \Validator\FileExtensionValidator;
use \Validator\OptionsExistsValidator;
use \Components\UploadField;
use \Validator\NoSqlValidator;

class NewsFormBuilder extends FormBuilder
{
    /**
	 * {@inheritDoc}
	 * @return void
	 */
    public function build()
	{
        $titleMaxCharacter = $this->config->get('news_title_max_character');
        $chapoMaxCharacter = $this->config->get('news_chapo_max_character');
        $contentMaxCharacter = $this->config->get('news_content_max_character');
        $allowedExtensions = $this->config->get('allowed_img_extensions');
        $maxImgSize = $this->config->get('max_img_size');
        $allowedExtensions = explode(',', $allowedExtensions);

        $userManager = new UserManager;
        $options = $userManager->getListPseudo();

        $this->form->add(new SelectField([
            'name' => 'user',
            'label' => 'Auteur',
            'type' => 'text',
            'placeHolder' => 'Auteur',
            'class' => 'form-group col-md-12',
            'required' => true,
            'options' => $options,
            'validators' => [
                new NotNullValidator('Un auteur doit être sélectionné !'),
                new NoSqlValidator('Certains mots saisit ne sont pas autorisés !'),
                new OptionsExistsValidator('Cet auteur n\'existe pas !', $options),
            ]
        ]));

        $this->form->add(new StringField([
            'name' => 'title',
            'label' => 'Titre',
            'type' => 'text',
            'placeHolder' => 'Titre',
            'class' => 'form-group col-md-12',
            'maxLength' => $titleMaxCharacter, 
            'required' => true,
            'validators' => [
                new MaxLengthValidator(
                    'Longueur maximum : '.$titleMaxCharacter.' caractères',
                    $titleMaxCharacter
                ),
                new NotNullValidator('Le titre ne peut pas être vide !'),
                new NoSqlValidator('Certains mots saisit ne sont pas autorisés !')
            ]
        ]));

        $this->form->add(new TextField([
            'name' => 'chapo',
            'label' => 'Chapo',
            'class' => 'form-group col-md-12',
            'maxLength' => $chapoMaxCharacter, 
            'required' => true,
            'validators' => [
                new MaxLengthValidator(
                    'Longueur maximum : '.$chapoMaxCharacter.' caractères',
                    $chapoMaxCharacter
                ),
                new NotNullValidator('Le chapo ne peut pas être vide !'),
                new NoSqlValidator('Certains mots saisit ne sont pas autorisés !')
            ]
        ]));
                    
        $this->form->add(new TextField([
            'name' => 'content',
            'label' => 'Contenu',
            'class' => 'form-group col-md-12',
            'maxLength' => $contentMaxCharacter, 
            'required' => true,
            'validators' => [
                new MaxLengthValidator(
                    'Longueur maximum : '.$contentMaxCharacter.' caractères',
                    $contentMaxCharacter
                ),
                new NotNullValidator('Le contenu ne peut pas être vide !'),
                new NoSqlValidator(
                    'Certains mots saisit ne sont pas autorisés !'
                )
            ]
        ]));
        
        $this->form->add(new UploadField([
            'name' => 'picture',
            'label' => 'Image',
            'class' => 'form-group col-md-6',
            'required' => false,
            'validators' => [
                new FileSendValidator('Erreur d\'envoi, Réessayez'),
                new FileExtensionValidator(
                    'Extensions autorisées : jpg, jpeg, png',
                    $allowedExtensions
                ),
                new FileSizeValidator(
                    'Taille maximum : '.$maxImgSize / $maxImgSize.'mo', $maxImgSize
                ),
            ]
        ]));
	}
}