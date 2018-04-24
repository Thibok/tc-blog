<?php
namespace Components;

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

		if ($maxLength > 0)
		{
			$this->maxLength = $maxLength;
		}

		else
		{
			throw new \RuntimeException('La longueur maximale doit être un nombre supérieur à 0');
		}
	}
}