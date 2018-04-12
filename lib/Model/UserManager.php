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

    public function getId($pseudo)
    {
        $request = $this->db->prepare('SELECT id FROM user WHERE pseudo = :pseudo');
        $request->bindValue(':pseudo', $pseudo);
        $request->execute();

        $userId = $request->fetchColumn();

        return $userId;
    }

    public function updateRole($userId, $role)
    {
        $request = $this->db->prepare('UPDATE user SET role = :role WHERE id = :userId');
        $request->bindValue(':role', $role);
        $request->bindValue(':userId', $userId, \PDO::PARAM_INT);
        $request->execute();

        $request->closeCursor();
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

    public function countWhereId($id)
    {
        $request = $this->db->prepare('SELECT COUNT(*) FROM user WHERE id = :id');
        $request->bindValue(':id', $id, \PDO::PARAM_INT);
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

    public function getRoles()
    {
        $request = $this->db->query('SHOW COLUMNS FROM user LIKE "role"');
        $data = $request->fetch(\PDO::FETCH_ASSOC);

        $type = substr($data['Type'], 6, -2);

        $listRoles = explode("','", $type);

        return $listRoles;
    }

    public function getListPseudo()
    {
        $request = $this->db->query('SELECT pseudo FROM user');

        $listPseudo = [];

        while ($raw = $request->fetch()) 
        {
            $listPseudo[] = $raw['pseudo'];
        }

        $request->closeCursor();

        return $listPseudo;
    }

    public function count()
	{
		return $this->db->query('SELECT COUNT(*) FROM user')->fetchColumn();
    }
    
    public function getList($start = -1, $number = -1)
  	{
	    $sql = 'SELECT id, pseudo, email, register_date, role FROM user ORDER BY pseudo';
	 
	    if ($start != -1 || $number != -1)
	    {
	      $sql .= ' LIMIT '.(int) $start.', '.(int) $number;
	    }

	    $request = $this->db->query($sql);
        
        $listUsers = [];

	    while ($data = $request->fetch(\PDO::FETCH_ASSOC))
		{
  			$listUsers[] = new User(['id' => $data['id'], 'pseudo' => $data['pseudo'], 'email' => $data['email'], 'registerDate' => new \DateTime($data['register_date']), 'role' => $data['role']]);
		}

		$request->closeCursor();

		return $listUsers;
	}
}