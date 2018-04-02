<?php
namespace Components;

use \Model\UserManager;

class PseudoExistsValidator extends Validator
{
    public function isValid($value)
    {
        $userManager = new UserManager;
        $value = htmlspecialchars($value);

        $exists = $userManager->countWherePseudo($value);

        if ($exists == true)
        {
            return false;
        }

        else
        {
            return true;
        }
    }
}