<?php
namespace Components;

use \Model\UserManager;

class CanConnectValidator extends Validator
{
    private $email;

    public function __construct($errorMessage, $email)
    {
        parent::__construct($errorMessage);
        $this->email = $email;
    }

    public function isValid($value)
    {
        $manager = new UserManager;

        if (is_string($this->email) && !empty($this->email))
        {
            $pass = $manager->getPasswordOf($this->email);

            if (password_verify($value, $pass))
            {
                return true;
            }

            else
            {
                return false;
            }
        }

        else
        {
            return false;
        }
    }
}