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
use \Entity\User;

class UserManager extends Manager
{
    /**
	 * @access public
	 * @param int $userId
	 * @return User
	 */
    public function getInfosForResetPassword($userId)
    {
        $request = $this->db->prepare(
            'SELECT id, reset_code, code_expiration_date FROM user WHERE id = :id'
        );
        $request->bindValue(':id', (int) $userId, \PDO::PARAM_INT);
        $request->execute();

        $data = $request->fetch(\PDO::FETCH_ASSOC);

        $user = new User([
            'id' => $data['id'],
            'resetCode' => $data['reset_code'],
            'codeExpirationDate' => new \DateTime($data['code_expiration_date']),
        ]);

        $request->closeCursor();

        return $user;
    }   
    
    /**
	 * @access public
	 * @param User $user
	 * @return User
	 */
    public function getInfosByEmail(User $user)
    {
        $request = $this->db->prepare('SELECT id, role FROM user WHERE email = :email');
        $request->bindValue(':email', $user->getEmail(), \PDO::PARAM_STR);
        $request->execute();

        $data = $request->fetch(\PDO::FETCH_ASSOC);

        $user->hydrate($data);

        $request->closeCursor();

        return $user;
    }

    /**
	 * @access public
	 * @param User $user
	 * @return User
	 */
    public function getPseudoByEmail(User $user)
    {
        $request = $this->db->prepare('SELECT id, pseudo FROM user WHERE email = :email');
        $request->bindValue(':email', $user->getEmail(), \PDO::PARAM_STR);
        $request->execute();

        $data = $request->fetch(\PDO::FETCH_ASSOC);

        $user->hydrate($data);

        $request->closeCursor();

        return $user;
    }

    /**
	 * @access public
	 * @param string $email
	 * @return string
	 */
    public function getPasswordOf($email)
    {
        $request = $this->db->prepare('SELECT password FROM user WHERE email = :email');
        $request->bindValue(':email', $email, \PDO::PARAM_STR);
        $request->execute();

        $pass = $request->fetchColumn();

        return $pass;
    }

    /**
	 * @access public
	 * @param string $pseudo
	 * @return int
	 */
    public function getId($pseudo)
    {
        $request = $this->db->prepare('SELECT id FROM user WHERE pseudo = :pseudo');
        $request->bindValue(':pseudo', $pseudo, \PDO::PARAM_STR);
        $request->execute();

        $userId = $request->fetchColumn();

        return $userId;
    }

    /**
	 * @access public
	 * @param int $userId
	 * @param string $role
	 * @return void
	 */
    public function updateRole($userId, $role)
    {
        $request = $this->db->prepare('UPDATE user SET role = :role WHERE id = :userId');
        $request->bindValue(':role', $role, \PDO::PARAM_STR );
        $request->bindValue(':userId', (int) $userId, \PDO::PARAM_INT);
        $request->execute();

        $request->closeCursor();
    }

    /**
	 * @access public
	 * @param string $pseudo
	 * @return bool
	 */
    public function countWherePseudo($pseudo)
    {
        $request = $this->db->prepare('SELECT COUNT(*) FROM user WHERE pseudo = :pseudo');
        $request->bindValue(':pseudo', $pseudo, \PDO::PARAM_STR);
        $request->execute();

        $exists = $request->fetchColumn();

        $request->closeCursor();

        return $exists;
    }

    /**
	 * @access public
	 * @param string $email
	 * @return bool
	 */
    public function countWhereEmail($email)
    {
        $request = $this->db->prepare('SELECT COUNT(*) FROM user WHERE email = :email');
        $request->bindValue(':email', $email, \PDO::PARAM_STR);
        $request->execute();

        $exists = $request->fetchColumn();

        $request->closeCursor();

        return $exists;
    }

    /**
	 * @access public
	 * @param int $id
	 * @return bool
	 */
    public function countWhereId($id)
    {
        $request = $this->db->prepare('SELECT COUNT(*) FROM user WHERE id = :id');
        $request->bindValue(':id', (int) $id, \PDO::PARAM_INT);
        $request->execute();

        $exists = $request->fetchColumn();

        $request->closeCursor();

        return $exists;
    }

    /**
	 * @access public
	 * @param User $user
	 * @return int
	 */
    public function save(User $user)
    {
        $request = $this->db->prepare('INSERT INTO user SET pseudo = :pseudo,
            email = :email, password = :password, register_date = NOW(), role = "Membre"'
        );
        $request->bindValue(':pseudo', $user->getPseudo(), \PDO::PARAM_STR);
        $request->bindValue(':email', $user->getEmail(), \PDO::PARAM_STR);
        $request->bindValue(':password', $user->getPassword(), \PDO::PARAM_STR);

        $request->execute();

        $userId = $this->db->lastInsertId();

        $request->closeCursor();

        return $userId;
    }

    /**
	 * @access public
	 * @return array
	 */
    public function getListPseudo()
    {
        $request = $this->db->query('SELECT pseudo FROM user');

        $listPseudo = [];

        while ($raw = $request->fetch()) {

            $listPseudo[] = $raw['pseudo'];
        }

        $request->closeCursor();

        return $listPseudo;
    }
  
    /**
	 * @access public
	 * @return int
	 */
    public function count()
	{
		return $this->db->query('SELECT COUNT(*) FROM user')->fetchColumn();
    }
    
    /**
	 * @access public
	 * @param int $start
	 * @param int $number
	 * @return array
	 */
    public function getList($start = -1, $number = -1)
  	{
	    $sql = 'SELECT id, pseudo, email, register_date, role FROM user ORDER BY pseudo';
	 
	    if ($start != -1 || $number != -1) {

	      $sql .= ' LIMIT '.(int) $start.', '.(int) $number;
	    }

	    $request = $this->db->query($sql);
        
        $listUsers = [];

	    while ($data = $request->fetch(\PDO::FETCH_ASSOC)) {

  			$listUsers[] = new User([
                  'id' => $data['id'],
                  'pseudo' => $data['pseudo'],
                  'email' => $data['email'],
                  'registerDate' => new \DateTime($data['register_date']),
                  'role' => $data['role']
            ]);
		}

		$request->closeCursor();

		return $listUsers;
    }
    
    /**
	 * @access public
	 * @param User $user
	 * @return void
	 */
    public function saveResetCode(User $user)
    {
        $request = $this->db->prepare(
            'UPDATE user SET reset_code = :resetCode, code_expiration_date = :codeExpirationDate WHERE id = :id'
        );
        $request->bindValue(':resetCode', $user->getResetCode(), \PDO::PARAM_STR);
        $request->bindValue(':codeExpirationDate', $user->getCodeExpirationDate()->format('Y-m-d H:i:s'));
        $request->bindValue(':id', (int) $user->getId(), \PDO::PARAM_INT);
        $request->execute();

        $request->closeCursor();
    }

    /**
	 * @access public
	 * @param User $user
	 * @return void
	 */
    public function updatePassword(User $user)
    {
        $request = $this->db->prepare(
            'UPDATE user SET password = :password, reset_code = null, code_expiration_date = null WHERE id = :id'
        );
        $request->bindValue(':password', $user->getPassword(), \PDO::PARAM_STR);
        $request->bindValue(':id', (int) $user->getId(), \PDO::PARAM_INT);
        $request->execute();

        $request->closeCursor();
    }
}