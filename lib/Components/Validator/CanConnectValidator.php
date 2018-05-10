<?php

/*
 * This file is part of the Tc-blog project.
 *
 * (c) Thibault Cavailles <tcblog@tc-dev.ovh>
 *
 * First blog in PHP
 */

namespace Validator;

use \Components\Validator;
use \Model\UserManager;

class CanConnectValidator extends Validator
{
    /**
	 * 
	 * @var string
	 * @access private
	 */
    private $email;

    /**
	 * {@inheritDoc}
     * @param string $email
	 */
    public function __construct($errorMessage, $email)
    {
        parent::__construct($errorMessage);
        $this->email = $email;
    }

    /**
     * Verify is good password with email.
     * 
	 * {@inheritDoc}
	 * @return bool
	 */
    public function isValid($value)
    {
        $manager = new UserManager;
        $pass = $manager->getPasswordOf($this->email);

        if (password_verify($value, $pass)) {

            return true;

        } else {
            
            return false;
        }
    }
}