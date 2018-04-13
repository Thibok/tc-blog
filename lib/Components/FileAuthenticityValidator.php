<?php
namespace Components;

class FileAuthenticityValidator extends Validator
{
    private $allowedMimeType;

    public function __construct($errorMessage, $path)
    {
        parent::__construct($errorMessage);
        $this->setPath($path);
    }

    public function isValid($value)
    {
        
    }

    
}