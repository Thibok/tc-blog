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
use \Validator\NoSqlValidator;

class CommentFormBuilder extends FormBuilder
{
    /**
	 * {@inheritDoc}
	 * @return void
	 */
    public function build()
	{
        $commentMaxCharacter = $this->config->get('comment_content_max_character');

        $this->form->add(new TextField([
            'name' => 'content',
            'class' => 'form-group',
            'maxLength' => $commentMaxCharacter, 
            'required' => true,
            'validators' => [
                new MaxLengthValidator(
                    'Longueur maximum : '.$commentMaxCharacter.' caractères',
                    $commentMaxCharacter
                ),
                new NotNullValidator('Le commentaire ne peut pas être vide !'),
                new NoSqlValidator('Certains mots saisit ne sont pas autorisés !')
            ]
        ]));
	}
}