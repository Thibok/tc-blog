<?php

/*
 * This file is part of the Tc-blog project.
 *
 * (c) Thibault Cavailles <tcblog@tc-dev.ovh>
 *
 * First blog in PHP
 */

namespace Validator;

use \Components\Validator;

class OptionsExistsValidator extends Validator
{
	/**
	 * 
	 * @var array
	 * @access private
	 */
	private $options;

	/**
	 * {@inheritDoc}
	 * @param array $options
	 */
	public function __construct($errorMessage, array $options)
	{
		parent::__construct($errorMessage);
		$this->setOptions($options);
	}

	/**
	 * Verify if $value is in options list
	 * 
	 * {@inheritDoc}
	 * @return bool
	 */
	public function isValid($value)
	{
		if (in_array($value, $this->options)) {

			return true;

		} else {

			return false;
		}
	}

	/**
	 * @access public
	 * @param array $options
	 * @return void
	 */
	public function setOptions(array $options)
	{
		if (!empty($options)) {
			
			$this->options = $options;
		}
	}
}