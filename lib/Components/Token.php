<?php
namespace Components;

class Token
{
    public function create()
    {
        $_SESSION['token'] = bin2hex(random_bytes(32));
    }

    public function isValid($token)
    {
        if ($_SESSION['token'] == $token)
        {
            return true;
        }

        else
        {
            return false;
        }
    }

    public function getValue()
    {
        return $_SESSION['token'];
    }
}