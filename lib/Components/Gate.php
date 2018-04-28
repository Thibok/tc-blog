<?php

/*
 * This file is part of the Tc-blog project.
 *
 * (c) Thibault Cavailles <tcblog@tc-dev.ovh>
 *
 * First blog in PHP
 */

namespace Components;

use \Model\ConnexionManager;

class Gate
{
    /**
	 * Max connect attempt
     * 
	 * @var int
	 * @access private
	 */
    private $maxAttempt;

    /**
	 * 
	 * @var Manager
	 * @access private
	 */
    private $manager;

    /**
	 * @access public
	 * @param int $maxAttempt
	 */
    public function __construct($maxAttempt)
    {
        $this->setMaxAttempt($maxAttempt);
        $this->manager = new ConnexionManager;
    }

    /**
     * Add ip in fails auth list
     * 
	 * @access public
	 * @param string $ip
     * @return void
	 */
    public function addToJail($ip)
    {
        $this->manager->add($ip);
    }

    /**
     * Verify if ip can connect
	 * @access public
	 * @param string $ip
     * @return bool
	 */
    public function control($ip)
    {
        $numberOfAttempt = $this->manager->countAttempt($ip);

        if ($numberOfAttempt < $this->maxAttempt) {

            return true;

        } else {
            
            return false;
        }
    }

    /**
	 * @access public
	 * @param int $maxAttempt
     * @return void
     * @throws RuntimeException If $maxAttempt < 1
	 */
    public function setMaxAttempt($maxAttempt)
    {
        $maxAttempt = (int) $maxAttempt;

        if ($maxAttempt > 0) {

            $this->maxAttempt = $maxAttempt;

        } else {

            throw new \RuntimeException(
                'Le nombre max de tentative doit être supêrieur à 0 !'
            );
            
        }
    }
}