<?php
namespace Components;

abstract class Manager
{
	/**
	 * 
	 * @var PDO
	 * @access protected
	 */
	protected $db;

	/**
	 * @access public
	 */
	public function __construct()
	{
		$this->db = PDOFactory::getMySqlConnexion();
	}
}