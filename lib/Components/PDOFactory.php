<?php

/*
 * This file is part of the Tc-blog project.
 *
 * (c) Thibault Cavailles <tcblog@tc-dev.ovh>
 *
 * First blog in PHP
 */

namespace Components;

class PDOFactory
{
	/**
	 * @access public
	 * @static
	 * @return PDO
	 */
	public static function getMySqlConnexion()
	{
		$config = new Config(__DIR__.'/../../App/Config/config.xml');

		$host = $config->get('db_host');
		$name = $config->get('db_name');
		$username = $config->get('db_username');
		$password = $config->get('db_password');

		$db = new \PDO('mysql:host='.$host.';dbname='.$name.';charset=utf8',
						$username, $password);
		
		$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

		return $db;
	}
}