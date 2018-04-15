<?php
namespace FormBuilder;

use \Components\FormBuilder;
use \Components\OptionsExistsValidator;
use \Components\NotNullValidator;
use \Components\SelectField;
use \Model\UserManager;

class ManageUsersFormBuilder extends FormBuilder
{
	public function build()
	{
        $userManager = new UserManager;
        $options = $userManager->getRoles();

        $this->form->add(new SelectField([
            'name' => 'role',
            'class' => 'd-inline-block',
            'required' => true,
            'options' => $options,
            'validators' => [
                new NotNullValidator('Une option doit être sélectionné !'),
                new OptionsExistsValidator('Cette option n\'existe pas !', $options)
                ]
            ]));
	}
}