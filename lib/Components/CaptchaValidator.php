<?php
namespace Components;

class CaptchaValidator extends Validator
{
    private $privateKey;
    
    public function __construct($errorMessage)
    {
        parent::__construct($errorMessage);
        $config = new Config(__DIR__.'/../../App/Config/config.xml');
        $this->privateKey = $config->get('private_captcha_key');
    }

    public function isValid($value)
    {
        $recaptcha = new \ReCaptcha\ReCaptcha($this->privateKey);
        $resp = $recaptcha->verify($value);

        if ($resp->isSuccess()) 
        {
            $_SESSION['captcha'] = true;
            return true;
        } 

        else 
        {
            return false;
        }
    }
}