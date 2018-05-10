<?php

/*
 * This file is part of the Tc-blog project.
 *
 * (c) Thibault Cavailles <tcblog@tc-dev.ovh>
 *
 * First blog in PHP
 */

namespace Components;

class Mailer
{
    /**
	 * Use Swift Mailer of Symfony
	 * @var Swift_Mailer
	 * @access private
	 */
    private $swiftMailer;

    /**
	 * 
	 * @var string
	 * @access private
	 */
    private $message;

    /**
	 * 
	 * @var Config
	 * @access private
	 */
    private $config;
    
    /**
     * Create Smtp Transport
     * 
	 * @access public
	 */
    public function __construct()
    {
        $this->config = new Config(__DIR__.'/../../App/Config/config.xml');

        $userName = $this->config->get('username_smtp');
        $password = $this->config->get('password_smtp');
        $domainSmtp = $this->config->get('domain_smtp');
        $portSmtp = $this->config->get('port_smtp');

        $transport = (new \Swift_SmtpTransport($domainSmtp, $portSmtp, 'ssl'))
            ->setUsername($userName)
            ->setPassword($password)
        ;

        $this->swiftMailer = new \Swift_Mailer($transport);
    }

    /**
     * Create the mail
     * 
	 * @access public
     * @param string $receiver
     * @param string $userEmail
     * @param string $message
	 * @return void
	 */
    public function createMessage($receiver, $senderEmail, $receiverEmail, $subject, $message)
    {    
        $this->message = (new \Swift_Message($subject))
            ->setFrom([$senderEmail => $senderEmail])
            ->setTo([$receiverEmail => $receiver])
            ->setBody(nl2br($message), 'text/html')
        ;
    }

    /**
     * Send message and return success/fail
     * 
	 * @access public
	 * @return int
	 */
    public function send()
    {
        $result = $this->swiftMailer->send($this->message);
        
        return $result;
    }

    /**
     * 
	 * @access public
	 * @return Config
	 */
    public function getConfig()
    {
        return $this->config;
    }
}