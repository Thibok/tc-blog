<?php
namespace Components;

class FileAuthenticityValidator extends Validator
{
    private $path;

    public function __construct($errorMessage, $path)
    {
        parent::__construct($errorMessage);
        $this->setPath($path);
    }

    public function isValid($value)
    {
        if (empty($value))
        {
            return true;
        }

        else
        {
            
        }
    }

    public function setPath($path)
    {
        if(file_exists($path))
        {
            $this->path = $path;
        }

        else
        {
            throw new RuntimeException('Le dossier spécifiée n\'existe pas !');
        }
    }
}