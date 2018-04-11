<?php
namespace Components;

class FileSizeValidator extends Validator
{
    private $maxSize;

    public function __construct($errorMessage, $maxSize)
    {
        parent::__construct($errorMessage);
        $this->setMaxSize($maxSize);
    }

    public function isValid($value)
    {
        if (empty($value))
        {
            return true;
        }

        else
        {
            if ($value['size'] <= $this->maxSize)
            {
                return true;
            }

            else
            {
                return false;
            }
        }
    }

    public function setMaxSize($maxSize)
    {
        $maxSize = (int) $maxSize;

        if ($maxSize > 0 && $maxSize <= 8000000)
        {
            $this->maxSize = $maxSize;
        }

        else
        {
            throw new RuntimeException('La taille maximal d\'un fichier doit être supérieur à 0 et inférieur à 8 000 000 d\'octets !');
            
        }
    }
}