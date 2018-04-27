<?php
namespace Entity;

use \Components\Entity;
use \Components\Ticket;
use \Components\Token;

class User extends Entity
{
    use \Components\UserRoleEnum;

    private $pseudo;
	private $email;
	private $password;
	private $registerDate;
	private $role;
	private $token;
	private $ticket;

	public function __construct(array $data = [])
	{
		parent::__construct($data);
		$this->ticket = new Ticket;
		$this->token = new Token;
	}

	public function getFlash()
	{
		$flash = $_SESSION['flash'];
		unset($_SESSION['flash']);

		return $flash;
	}

	public function setFlash($flash)
	{
		if (is_string($flash) && !empty($flash))
		{
			$_SESSION['flash'] = $flash;
		}
	}

	public function __sleep()
	{
		return ['id', 'role', 'token', 'ticket'];
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

	public function getTicket()
	{
		return $this->ticket;
	}

	public function getToken()
	{
		return $this->token;
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