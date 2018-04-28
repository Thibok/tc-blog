<?php

/*
 * This file is part of the Tc-blog project.
 *
 * (c) Thibault Cavailles <tcblog@tc-dev.ovh>
 *
 * First blog in PHP
 */

namespace Entity;

use \Components\Entity;

class Contact extends Entity
{
    /**
	 * 
	 * @var string
	 * @access private
	 */
    private $name;

    /**
	 * 
	 * @var string
	 * @access private
	 */
    private $firstName;

    /**
	 * 
	 * @var string
	 * @access private
	 */
    private $email;

    /**
	 * 
	 * @var string
	 * @access private
	 */
    private $message;

    /**
	 * 
	 * @var string
	 * @access private
	 */
    private $captcha;

    /**
	 * @access public
	 * @param string $name
	 * @return void
	 */
    public function setName($name)
    {
        if (is_string($name) && !empty($name)) {

            $this->name = htmlspecialchars($name);
        }
    }

    /**
	 * @access public
	 * @param string $captcha
	 * @return void
	 */
    public function setCaptcha($captcha)
    {
        if (!empty($captcha)) {

            $this->captcha = $captcha;
        }
    }

    /**
	 * @access public
	 * @param string $firstName
	 * @return void
	 */
    public function setFirstName($firstName)
    {
        if (is_string($firstName) && !empty($firstName)) {

            $this->firstName = htmlspecialchars($firstName);
        }
    }

    /**
	 * @access public
	 * @param string $email
	 * @return void
	 */
    public function setEmail($email)
    {
        if (is_string($email) && !empty($email)) {

            $this->email = htmlspecialchars($email);
        }
    }

    /**
	 * @access public
	 * @param string $message
	 * @return void
	 */
    public function setMessage($message)
    {
        if (is_string($message) && !empty($message)) {
            
            $this->message = htmlspecialchars($message);
        }
    }

    /**
	 * @access public
	 * @return string
	 */
    public function getName()
    {
        return $this->name;
    }

    /**
	 * @access public
	 * @return string
	 */
    public function getCaptcha()
    {
        return $this->captcha;
    }

    /**
	 * @access public
	 * @return string
	 */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
	 * @access public
	 * @return string
	 */
    public function getEmail()
    {
        return $this->email;
    }

    /**
	 * @access public
	 * @return string
	 */
    public function getMessage()
    {
        return $this->message;
    }
}