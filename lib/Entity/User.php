<?php

/*
 * This file is part of the Tc-blog project.
 *
 * (c) Thibault Cavailles <tcblog@tc-dev.ovh>
 *
 * First blog in PHP
 */

namespace Entity;

use \Components\Entity;
use \Components\Ticket;
use \Components\Token;

class User extends Entity
{
	use \Components\UserRoleEnum;

	/**
	 * 
	 * @var string
	 * @access private
	 */
	private $pseudo;
	
	/**
	 * 
	 * @var string
	 * @access private
	 */
	private $email;

	/**
	 * 
	 * @var string
	 * @access private
	 */
	private $password;

	/**
	 * 
	 * @var string
	 * @access private
	 */
	private $resetCode;
	
	/**
	 * 
	 * @var DateTime
	 * @access private
	 */
    private $codeExpirationDate;
	
	/**
	 * 
	 * @var DateTime
	 * @access private
	 */
	private $registerDate;
	
	/**
	 * 
	 * @var string
	 * @access private
	 */
	private $role;
	
	/**
	 * 
	 * @var string
	 * @access private
	 */
	private $token;

	/**
	 * 
	 * @var string
	 * @access private
	 */
	private $ticket;

	/**
	 * 
	 * @var string
	 * @access private
	 */
    private $captcha;

	/**
	 * {@inheritDoc}
	 */
	public function __construct(array $data = [])
	{
		parent::__construct($data);
		$this->ticket = new Ticket;
		$this->token = new Token;
	}

	/**
	 * @access public
	 * @return string
	 */
	public function getFlash()
	{
		$flash = $_SESSION['flash'];
		unset($_SESSION['flash']);

		return $flash;
	}

	/**
	 * @access public
	 * @param string $flash
	 * @return void
	 */
	public function setFlash($flash)
	{
		if (is_string($flash) && !empty($flash)) {

			$_SESSION['flash'] = $flash;
		}
	}

	/**
	 * @access public
	 * @return array
	 */
	public function __sleep()
	{
		return ['id', 'role', 'token', 'ticket'];
	}
	
	/**
	 * @access public
	 * @return bool
	 */
	public function hasFlash()
	{
		return isset($_SESSION['flash']);
	}

	/**
	 * @access public
	 * @return bool
	 */
	public function isAdmin()
	{
		return $this->role == 'Administrateur';
	}

	/**
	 * @access public
	 * @return bool
	 */
	public function isAuthenticated()
	{
		return isset($_SESSION['auth']) && $_SESSION['auth'] === true;
	}

	/**
	 * @access public
	 * @param bool $authenticated
	 * @return void
	 */
	public function setAuthenticated($authenticated = true)
	{
		$_SESSION['auth'] = (bool) $authenticated;
	}

	/**
	 * @access public
	 * @return string
	 */
	public function getPseudo()
	{
		return $this->pseudo;
	}

	/**
	 * @access public
	 * @return string
	 */
	public function getCaptcha()
	{
		return $this->captcha;
	}

	/**
	 * @access public
	 * @return string
	 */
	public function getResetCode()
	{
		return $this->resetCode;
	}

	/**
	 * @access public
	 * @return DateTime
	 */
	public function getCodeExpirationDate()
	{
		return $this->codeExpirationDate;
	}

	/**
	 * @access public
	 * @return string
	 */
	public function getTicket()
	{
		return $this->ticket;
	}

	/**
	 * @access public
	 * @return string
	 */
	public function getToken()
	{
		return $this->token;
	}

	/**
	 * @access public
	 * @return string
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * @access public
	 * @return string
	 */
	public function getPassword()
	{
		return $this->password;
	}

	/**
	 * @access public
	 * @return DateTime
	 */
	public function getRegisterDate()
	{
		return $this->registerDate;
	}

	/**
	 * @access public
	 * @return string
	 */
	public function getRole()
	{
		return $this->role;
	}
	
	/**
	 * @access public
	 * @param string $captcha
	 * @return void
	 */
    public function setCaptcha($captcha)
    {
        if (!empty($captcha)) {

            $this->captcha = $captcha;
        }
    }

	/**
	 * @access public
	 * @param string $resetCode
	 * @return void
	 */
	public function setResetCode($resetCode)
	{
		if (is_string($resetCode) && !empty($resetCode))
		{
			$this->resetCode = htmlspecialchars($resetCode);
		}
	}

	/**
	 * @access public
	 * @param DateTime $codeExpirationDate
	 * @return void
	 */
	public function setCodeExpirationDate(\DateTime $codeExpirationDate)
	{
		$this->codeExpirationDate = $codeExpirationDate;
	}

	/**
	 * @access public
	 * @param string $pseudo
	 * @return void
	 */
	public function setPseudo($pseudo)
	{
		if (is_string($pseudo) && !empty($pseudo)) {

			$this->pseudo = htmlspecialchars($pseudo);
		}
	}

	/**
	 * @access public
	 * @param string $email
	 * @return void
	 */
	public function setEmail($email)
	{
		if (is_string($email) && !empty($email)) {

			$this->email = htmlspecialchars($email);
		}
	}

	/**
	 * @access public
	 * @param string $password
	 * @return void
	 */
	public function setPassword($password)
	{
		if (is_string($password) && !empty($password)) {

			$this->password = htmlspecialchars($password);
		}
	}

	/**
	 * @access public
	 * @param DateTime $registerDate
	 * @return void
	 */
	public function setRegisterDate(\DateTime $registerDate)
	{
		$this->registerDate = $registerDate;
	}

	/**
	 * @access public
	 * @param string $role
	 * @return void
	 */
	public function setRole($role)
	{
		if (is_string($role) && !empty($role)) {

            $role = htmlspecialchars($role);
            $roleEnum = $this->getRoleEnum();

            if (in_array($role, $roleEnum)) {
				
                $this->role = $role;
            }
		}
	}
}