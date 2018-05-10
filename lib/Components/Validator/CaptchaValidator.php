<?php

/*
 * This file is part of the Tc-blog project.
 *
 * (c) Thibault Cavailles <tcblog@tc-dev.ovh>
 *
 * First blog in PHP
 */

namespace Validator;

use \Components\Config;
use \Components\Validator;

class CaptchaValidator extends Validator
{
    /**
     * 
     * @var string
     * @access private
     */
    private $privateKey;
    
    /**
	 * {@inheritDoc}
	 */
    public function __construct($errorMessage)
    {
        parent::__construct($errorMessage);
        $config = new Config(__DIR__.'/../../../App/Config/config.xml');
        $this->privateKey = $config->get('private_captcha_key');
    }

    /**
     * Verify captcha with google api
     * 
	 * {@inheritDoc}
	 * @return bool
	 */
    public function isValid($value)
    {
        $recaptcha = new \ReCaptcha\ReCaptcha($this->privateKey);
        $resp = $recaptcha->verify($value);

        if ($resp->isSuccess()) {

            $_SESSION['captcha'] = true;
            return true;

        } else {
            
            return false;
        }
    }
}