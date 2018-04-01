<?php
namespace Entity;

use \Components\Entity;

class Contact extends Entity
{
    private $name;
    private $firstName;
    private $email;
    private $message;

    public function isValid()
    {
        return !empty($this->name) || empty($this->firstName) || empty($this->email) || empty($this->message);
    }

    public function setName($name)
    {
        if (is_string($name) && !empty($name))
        {
            $this->name = htmlspecialchars($name);
        }
    }

    public function setFirstName($firstName)
    {
        if (is_string($firstName) && !empty($firstName))
        {
            $this->firstName = htmlspecialchars($firstName);
        }
    }

    public function setEmail($email)
    {
        if (is_string($email) && !empty($email))
        {
            $this->email = htmlspecialchars($email);
        }
    }
    public function setMessage($message)
    {
        if (is_string($message) && !empty($message))
        {
            $this->message = htmlspecialchars($message);
        }
    }

    public function getName()
    {
        return $this->name;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getMessage()
    {
        return $this->message;
    }
}