<?php
namespace Components;

use \Model\ConnexionManager;

class Gate
{
    /**
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
	 * @access public
	 * @param string $ip
     * @return void
	 */
    public function addToJail($ip)
    {
        $this->manager->add($ip);
    }

    /**
	 * @access public
	 * @param string $ip
     * @return bool
	 */
    public function control($ip)
    {
        $numberOfAttempt = $this->manager->countAttempt($ip);

        if ($numberOfAttempt < $this->maxAttempt)
        {
            return true;
        }

        else
        {
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