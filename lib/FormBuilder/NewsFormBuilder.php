<?php
namespace FormBuilder;

use \Components\FormBuilder;
use \Components\MaxLengthValidator;
use \Components\NotNullValidator;
use \Components\TextField;
use \Components\StringField;
use \Components\UserManager;
use \Components\FileSizeValidator;
use \Components\FileExtensionValidator;
use \Components\OptionsExistsValidator;

class NewsFormBuilder extends FormBuilder
{
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
                new OptionsExistsValidator('Cet auteur n\'existe pas !', $options)
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
                new MaxLengthValidator('Longueur maximum : '.$titleMaxCharacter.' caractères', $titletMaxCharacter),
                new NotNullValidator('Le titre ne peut pas être vide !')
                ]
            ]));

        $this->form->add(new TextField([
            'name' => 'chapo',
            'label' => 'Chapo',
            'class' => 'form-group col-md-12',
            'maxLength' => $chapoMaxCharacter, 
            'required' => true,
            'validators' => [
                new MaxLengthValidator('Longueur maximum : '.$chapoMaxCharacter.' caractères', $chapoMaxCharacter),
                new NotNullValidator('Le chapo ne peut pas être vide !')
                ]
            ]));
                    
        $this->form->add(new TextField([
            'name' => 'content',
            'label' => 'Contenu',
            'class' => 'form-group col-md-12',
            'maxLength' => $contentMaxCharacter, 
            'required' => true,
            'validators' => [
                new MaxLengthValidator('Longueur maximum : '.$contentMaxCharacter.' caractères', $contentMaxCharacter),
                new NotNullValidator('Le contenu ne peut pas être vide !')
                ]
            ]));
        
        $this->form->add(new StringField([
            'name' => 'picture',
            'label' => 'Image',
            'type' => 'file',
            'class' => 'form-group col-md-12',
            'required' => false,
            'validators' => [
                new FileSendValidator('Erreur d\'envoi, réessayez'),
                new FileSizeValidator('Taille maximum : '.$maxImgSize / 1000000 .' mo', $maxImgSize),
                new FileExtensionValidator('Extensions autorisées : jpeg, jpg, png', $allowedExtensions),
                new FileAuthenticity('Fichier invalide !', 'tmp')
                ]
            ]));
	}
}