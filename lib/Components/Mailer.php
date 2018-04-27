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

        $userName = $this->config->get('username_smtp');
        $password = $this->config->get('password_smtp');
        $domainSmtp = $this->config->get('domain_smtp');
        $portSmtp = $this->config->get('port_smtp');
        $contactEmail = $this->config->get('contact_email');

        $transport = (new \Swift_SmtpTransport($domainSmtp, $portSmtp, 'ssl'))
            ->setUsername($userName)
            ->setPassword($password)
        ;

        $this->swiftMailer = new \Swift_Mailer($transport);
    }

    public function createMessage($fullName, $userEmail, $message)
    {
        $contactEmail = $this->config->get('contact_email');
        
        $this->message = (new \Swift_Message('Tc-blog Contact'))
            ->setFrom([$userEmail => $userEmail])

            ->setTo([$contactEmail => 'Tc-blog'])
            ->setBody(
                nl2br('<em>Envoyé par :</em><strong> '.$fullName.'</strong><p>'.$message.'</p>'),
                'text/html'
            );
    }

    public function send()
    {
        $result = $this->swiftMailer->send($this->message);
        
        return $result;
    }
}