<?php
namespace FormBuilder;

use \Components\FormBuilder;
use \Components\MaxLengthValidator;
use \Components\NotNullValidator;
use \Components\TextField;

class CommentFormBuilder extends FormBuilder
{
	public function build()
	{
        $commentMaxCharacter = $this->config->get('comment_content_max_character');

        $this->form->add(new TextField([
            'name' => 'content',
            'class' => 'form-group',
            'maxLength' => $commentMaxCharacter, 
            'required' => true,
            'validators' => [
                new MaxLengthValidator('Longueur maximum : '.$commentMaxCharacter.' caractères', $commentMaxCharacter),
                new NotNullValidator('Le commentaire ne peut pas être vide !')
                ]
            ]));
	}
}