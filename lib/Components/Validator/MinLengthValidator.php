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

class MinLengthValidator extends Validator
{
	/**
	 * 
	 * @var int
	 * @access private
	 */
	private $minLength;

	/**
	 * {@inheritDoc}
	 * @param int $minLength
	 */
	public function __construct($errorMessage, $minLength)
	{
		parent::__construct($errorMessage);
		$this->setMinLength($minLength);
	}

	/**
	 * Verify if value is not too short
	 * 
	 * {@inheritDoc}
	 * @return bool
	 */
	public function isValid($value)
	{
		return strlen($value) >= $this->minLength;
	}

	/**
	 * @access public
	 * @param int $minLength
	 * @return void
	 * @throws RuntimeException If $minLength < 1
	 */
	public function setMinLength($minLength)
	{
		$minLength = (int) $minLength;

		if ($minLength > 0) {

			$this->minLength = $minLength;

		} else {
			
			throw new RuntimeException(
				'La longueur minimum doit être un nombre supérieur à 0'
			);
		}
	}
}