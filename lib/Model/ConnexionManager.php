<?php
namespace Model;

use \Components\Manager;

class ConnexionManager extends Manager
{
    public function countAttempt($ip)
    {
        $request = $this->db->prepare('SELECT * FROM connexion WHERE ip = :ip');
        $request->bindValue(':ip', $ip, \PDO::PARAM_STR);
        $request->execute();
        
        $numberOfAttempt = $request->rowCount();

        $request->closeCursor();

        return $numberOfAttempt;
    }

    public function add($ip)
    {
        $request = $this->db->prepare('INSERT INTO connexion SET ip = :ip');
        $request->bindValue(':ip', $ip, \PDO::PARAM_STR);
        $request->execute();

        $request->closeCursor();
    }
}