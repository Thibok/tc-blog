<?php
namespace Components;

abstract class Manager
{
	protected $db;

	public function __construct()
	{
		$this->db = PDOFactory::getMySqlConnexion();
	}
}