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

class MaxLengthValidator extends Validator
{
	/**
	 * 
	 * @var int
	 * @access private
	 */
	private $maxLength;

	/**
	 * {@inheritDoc}
	 * @param int $maxLength
	 */
	public function __construct($errorMessage, $maxLength)
	{
		parent::__construct($errorMessage);
		$this->setMaxLength($maxLength);
	}

	/**
	 * Verify if value is not too longer
	 * 
	 * {@inheritDoc}
	 * @return bool
	 */
	public function isValid($value)
	{
		return strlen($value) <= $this->maxLength;
	}

	/**
	 * @access public
	 * @param int $maxLength
	 * @return void
	 * @throws RuntimeException If $maxLength < 1
	 */
	public function setMaxLength($maxLength)
	{
		$maxLength = (int) $maxLength;

		if ($maxLength > 0) {

			$this->maxLength = $maxLength;

		} else {

			throw new \RuntimeException(
				'La longueur maximale doit être un nombre supérieur à 0'
			);
		}
	}
}