<?php

/*
 * This file is part of the Tc-blog project.
 *
 * (c) Thibault Cavailles <tcblog@tc-dev.ovh>
 *
 * First blog in PHP
 */

namespace Components;

abstract class Validator
{
	/**
     * 
     * @var string
     * @access private
     */
	protected $errorMessage;
	
	/**
	 * @access public
	 * @param string $errorMessage
	 */
	public function __construct($errorMessage)
	{
		$this->setErrorMessage($errorMessage);
	}
	
	/**
	 * @access public
	 * @param mixed
	 * @abstract
	 */
	abstract public function isValid($value);
	
	/**
	 * @access public
	 * @param string $errorMessage
	 * @return void
	 */
	public function setErrorMessage($errorMessage)
	{
		if (is_string($errorMessage)) {
			
			$this->errorMessage = $errorMessage;
		}
	}

	/**
	 * @access public
	 * @return string
	 */
	public function getErrorMessage()
	{
		return $this->errorMessage;
	}
}