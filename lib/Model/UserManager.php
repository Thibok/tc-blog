<?php
namespace Model;

use \Components\Manager;

class UserManager extends Manager
{
    public function countWherePseudo($pseudo)
    {
        $request = $this->db->prepare('SELECT COUNT(*) FROM user WHERE pseudo = :pseudo');
        $request->bindValue(':pseudo', $pseudo);
        $request->execute();

        $exists = $request->fetchColumn();

        $request->closeCursor();

        return $exists;
    }
}