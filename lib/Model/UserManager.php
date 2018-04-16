<?php
namespace Model;

use \Components\Manager;
use \Entity\User;

class UserManager extends Manager
{
    public function getInfosByEmail(User $user)
    {
        $request = $this->db->prepare('SELECT id, role FROM user WHERE email = :email');
        $request->bindValue(':email', $user->getEmail());
        $request->execute();

        $data = $request->fetch(\PDO::FETCH_ASSOC);

        $user->hydrate($data);

        $request->closeCursor();

        return $user;
    }

    public function getPasswordOf($email)
    {
        $request = $this->db->prepare('SELECT password FROM user WHERE email = :email');
        $request->bindValue(':email', $email);
        $request->execute();

        $pass = $request->fetchColumn();

        return $pass;
    }

    public function countWherePseudo($pseudo)
    {
        $request = $this->db->prepare('SELECT COUNT(*) FROM user WHERE pseudo = :pseudo');
        $request->bindValue(':pseudo', $pseudo);
        $request->execute();

        $exists = $request->fetchColumn();

        $request->closeCursor();

        return $exists;
    }

    public function countWhereEmail($email)
    {
        $request = $this->db->prepare('SELECT COUNT(*) FROM user WHERE email = :email');
        $request->bindValue(':email', $email);
        $request->execute();

        $exists = $request->fetchColumn();

        $request->closeCursor();

        return $exists;
    }

    public function save(User $user)
    {
        $request = $this->db->prepare('INSERT INTO user SET pseudo = :pseudo, email = :email, password = :password, register_date = NOW(), role = "Membre"');
        $request->bindValue(':pseudo', $user->getPseudo());
        $request->bindValue(':email', $user->getEmail());
        $request->bindValue(':password', $user->getPassword());

        $request->execute();

        $userId = $this->db->lastInsertId();

        $request->closeCursor();

        return $userId;
    }
}