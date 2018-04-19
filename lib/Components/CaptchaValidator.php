<?php
namespace Components;

class CaptchaValidator extends Validator
{
    public function __construct()
    {
        $config = new Config(__DIR__.'/../../App/Config/config.xml');
        $this->privateKey = $config->get('private_captcha_key');
    }

    public function isValid($value)
    {
        $recaptcha = new \ReCaptcha\ReCaptcha($this->privateKey);
        $resp = $recaptcha->verify($value);

        if ($resp->isSuccess()) 
        {
            return true;
        } 

        else 
        {
            return false;
        }
    }
}