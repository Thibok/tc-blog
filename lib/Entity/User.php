<?php
namespace Entity;

use \Components\Entity;

class User extends Entity
{
    use \Components\UserRoleEnum;

    private $pseudo;
	private $email;
	private $password;
	private $registerDate;
    private $role;
    
    public function isValid()
    {
        return !empty($this->pseudo) || empty($this->email) || empty($this->password) || empty($this->role);
    }

	public function getFlash()
	{
		$flash = $_SESSION['flash'];
		unset($_SESSION['flash']);

		return $flash;
	}

	public function __sleep()
	{
		return ['id', 'role'];
	}
	
	public function hasFlash()
	{
		return isset($_SESSION['flash']);
	}

	public function isAdmin()
	{
		return $this->role == 'Administrateur';
	}

	public function isAuthenticated()
	{
		return isset($_SESSION['auth']) && $_SESSION['auth'] === true;
	}

	public function setAuthenticated($authenticated = true)
	{
		$_SESSION['auth'] = (bool) $authenticated;
	}

	public function getPseudo()
	{
		return $this->pseudo;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function getPassword()
	{
		return $this->password;
	}

	public function getRegisterDate()
	{
		return $this->registerDate;
	}

	public function getRole()
	{
		return $this->role;
	}

	public function setPseudo($pseudo)
	{
		if (is_string($pseudo) && !empty($pseudo))
		{
			$this->pseudo = htmlspecialchars($pseudo);
		}
	}

	public function setEmail($email)
	{
		if (is_string($email) && !empty($email))
		{
			$this->email = htmlspecialchars($email);
		}
	}

	public function setPassword($password)
	{
		if (is_string($password) && !empty($password))
		{
			$this->password = htmlspecialchars($password);
		}
	}

	public function setRegisterDate(\DateTime $registerDate)
	{
		$this->registerDate = $registerDate;
	}

	public function setRole($role)
	{
		if (is_string($role) && !empty($role))
		{
            $role = htmlspecialchars($role);
            $roleEnum = $this->getRoleEnum();

            if (in_array($role, $roleEnum))
            {
                $this->role = $role;
            }
		}
	}
}