<?php
namespace Components;

class FileExtensionValidator extends Validator
{
    private $allowedExtensions;

    public function __construct($errorMessage, $allowedExtensions)
    {
        parent::__construct($errorMessage);
        $this->setAllowedExtensions($allowedExtensions);
    }

    public function isValid($value)
    {
        if ($value['size'] == 0 && empty($value['tmp_name']))
        {
            return true;
        }
        
        $uploadExtension = pathinfo($value['name'], PATHINFO_EXTENSION);

        if (in_array($uploadExtension, $this->allowedExtensions))
        {
            return true;
        }

        else
        {
            return false;
        }
    }

    public function setAllowedExtensions(array $allowedExtensions)
    {
        if (!empty($allowedExtensions))
        {
            $this->allowedExtensions = $allowedExtensions;
        }

        else
        {
            throw new RuntimeException('Le tableau des extensions autorisées ne peut pas être vide !');
        }
    }
}