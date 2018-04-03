<?php
namespace Components;

use \Model\UserManager;

class UserExistsValidator extends Validator
{
    private $fieldName;

    public function __construct($errorMessage, $fieldName)
    {
        parent::__construct($errorMessage);
        $this->setFieldName($fieldName);
    }
    public function isValid($value)
    {
        $userManager = new UserManager;
        $value = htmlspecialchars($value);
        $method = 'countWhere'.ucfirst($this->fieldName);

        if (is_callable([$userManager, $method]))
        {
            $exists = $userManager->$method($value);

            if ($exists == true)
            {
                return false;
            }

            else
            {
                return true;
            }
        }

        else
        {
            throw new \RuntimeException('La méthode pour vérifier l\'existence en bdd n\'existe pas !');
            
        }
    }

    public function setFieldName($fieldName)
    {
        if (is_string($fieldName) && !empty($fieldName))
        {
            $this->fieldName = $fieldName;
        }
    }
}