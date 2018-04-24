<?php

/*
 * This file is part of the Tc-blog project.
 *
 * (c) Thibault Cavailles <tcblog@tc-dev.ovh>
 *
 * First blog in PHP
 */

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