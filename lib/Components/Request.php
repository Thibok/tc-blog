<?php

/*
 * This file is part of the Tc-blog project.
 *
 * (c) Thibault Cavailles <tcblog@tc-dev.ovh>
 *
 * First blog in PHP
 */

namespace Components;

class Request
{
	/**
	 * @access public
	 * @param string $key
	 * @return mixed
	 */
	public function filesData($key)
	{
		return isset($_FILES[$key]) ? $_FILES[$key] : null;
	}

	/**
	 * @access public
	 * @param string $key
	 * @return mixed
	 */
	public function sessionData($key)
	{
		return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
	}

	/**
	 * @access public
	 * @param string $key
	 * @return mixed
	 */
	public function postData($key)
  	{
    	return isset($_POST[$key]) ? $_POST[$key] : null;
  	}

	/**
	 * @access public
	 * @param string $key
	 * @return mixed
	 */
	public function getData($key)
	{
		return isset($_GET[$key]) ? $_GET[$key] : null;
	}

	/**
	 * @access public
	 * @return string
	 */
	public function getUrl()
	{
		return $_SERVER['REQUEST_URI'];
	}

	/**
	 * @access public
	 * @return string
	 */
	public function ip()
	{
		return $_SERVER['REMOTE_ADDR'];
	}

	/**
	 * @access public
	 * @return string
	 */
	public function method()
  	{
    	return $_SERVER['REQUEST_METHOD'];
	}
	 
	/**
	 * @access public
	 * @param string $key
	 * @return bool
	 */
	public function filesExists($key)
	{
		return isset($_FILES[$key]);
	}

	/**
	 * @access public
	 * @param string $key
	 * @return bool
	 */
	public function sessionExists($key)
	{
		return isset($_SESSION[$key]);
	}

	/**
	 * @access public
	 * @param string $key
	 * @return bool
	 */
  	public function postExists($key)
  	{
    	return isset($_POST[$key]);
  	}

	/**
	 * @access public
	 * @param string $key
	 * @return bool
	 */
  	public function getExists($key)
  	{
    	return isset($_GET[$key]);
  	}
}