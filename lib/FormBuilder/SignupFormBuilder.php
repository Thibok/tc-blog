<?php
namespace FormBuilder;

use \Components\FormBuilder;
use \Components\MaxLengthValidator;
use \Components\MinLengthValidator;
use \Components\PseudoValidator;

class SignupFormBuilder extends FormBuilder
{
	public function build()
	{
        $pseudoMinCharacter = $this->config->get('user_pseudo_min_character');
        $pseudoMaxCharacter = $this->config->get('user_pseudo_max_character');

        $this->form->add(new StringField([
            'name' => 'pseudo',
            'label' => 'Pseudo',
            'type' => 'text',
            'class' => 'form-group col-lg-10',
            'maxLength' => $pseudoMaxCharacter,
            'placeHolder' => 'Pseudo', 
            'required' => true,
            'validators' => [
                new MinLengthValidator('Le pseudo doit avoir une longueur minimum de '.$pseudoMinCharacter.' caractères', $pseudoMinCharacter),
                new MaxLengthValidator('Le pseudo doit avoir une longueur maximum de '.$pseudoMaxCharacter.' caractères', $pseudoMaxCharacter),
                new PseudoValidator('a-z, A-Z, -, 0-9'),
                new PseudoExistsValidator('Ce pseudo est déjà pris')
                ]
            ]));
	}
}