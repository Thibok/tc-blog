<?php
namespace Components;

class Request
{
	public function filesData($key)
	{
		return isset($_FILES[$key]) ? $_FILES[$key] : null;
	}

	public function sessionData($key)
	{
		return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
	}

	public function postData($key)
  	{
    	return isset($_POST[$key]) ? $_POST[$key] : null;
  	}

	public function getData($key)
	{
		return isset($_GET[$key]) ? $_GET[$key] : null;
	}

	public function getUrl()
	{
		return $_SERVER['REQUEST_URI'];
	}

	public function ip()
	{
		return $_SERVER['REMOTE_ADDR'];
	}

	public function method()
  	{
    	return $_SERVER['REQUEST_METHOD'];
	}
	 
	public function filesExists($key)
	{
		return isset($_FILES[$key]);
	}

	public function sessionExists($key)
	{
		return isset($_SESSION[$key]);
	}

  	public function postExists($key)
  	{
    	return isset($_POST[$key]);
  	}

  	public function getExists($key)
  	{
    	return isset($_GET[$key]);
  	}
}