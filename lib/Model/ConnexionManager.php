<?php

/*
 * This file is part of the Tc-blog project.
 *
 * (c) Thibault Cavailles <tcblog@tc-dev.ovh>
 *
 * First blog in PHP
 */

namespace Model;

use \Components\Manager;

class ConnexionManager extends Manager
{
    /**
	 * @access public
	 * @param string $ip
	 * @return int
	 */
    public function countAttempt($ip)
    {
        $request = $this->db->prepare('SELECT * FROM connexion WHERE ip = :ip');
        $request->bindValue(':ip', $ip, \PDO::PARAM_STR);
        $request->execute();
        
        $numberOfAttempt = $request->rowCount();

        $request->closeCursor();

        return $numberOfAttempt;
    }

    /**
	 * @access public
	 * @param string $ip
	 * @return void
	 */
	public function add($ip)
    {
        $request = $this->db->prepare('INSERT INTO connexion SET ip = :ip');
        $request->bindValue(':ip', $ip, \PDO::PARAM_STR);
        $request->execute();

        $request->closeCursor();
    }
}