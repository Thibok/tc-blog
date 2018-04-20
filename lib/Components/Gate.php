<?php
namespace Components;

class Gate
{
    private $maxAttempt;
    private $manager;

    public function __construct($maxAttempt)
    {
        $this->setMaxAttempt($maxAttempt);
        $this->manager = new ConnexionManager;
    }

    public function addToJail($ip)
    {
        $this->manager->add($ip);
    }

    public function control($ip)
    {
        $numberOfAttempt = $this->manager->countAttempt($ip);

        if ($numberOfAttempt < $this->$maxAttempt)
        {
            return true;
        }

        else
        {
            return false;
        }
    }

    public function setMaxAttempt($maxAttempt)
    {
        $maxAttempt = (int) $maxAttempt;

        if ($maxAttempt > 0)
        {
            $this->maxAttempt = $maxAttempt;
        }

        else
        {
            throw new \RuntimeException('Le nombre max de tentative doit être supêrieur à 0 !');
            
        }
    }
}