<?php
namespace Components;

class Mailer
{
    private $swiftMailer;
    private $message;
    private $config;
    
    public function __construct()
    {
        $this->config = new Config(__DIR__.'/../../App/Config/config.xml');

        $userName = $this->config->get('contact_email');
        $password = $this->config->get('password_smtp');
        $domainSmtp = $this->config->get('domain_smtp');
        $portSmtp = $this->config->get('port_smtp');

        $transport = (new \Swift_SmtpTransport($domainSmtp, 465, 'ssl'))
            ->setUsername($userName)
            ->setPassword($password)
        ;

        $this->swiftMailer = new \Swift_Mailer($transport);
    }

    public function createMessage($fullName, $userEmail, $message)
    {
        $receveirEmail = $this->config->get('contact_email');
        
        $this->message = (new \Swift_Message('Contact'))
            ->setFrom([$userEmail => $userEmail])
            ->setTo([ $receveirEmail => 'tc-blog'])
            ->setBody($message);
        ;
    }

    public function send()
    {
        $result = $this->swiftMailer->send($this->message);
        
        return $result;
    }
}