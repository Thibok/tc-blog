<?php
namespace Components;

class StructureValidator extends Validator
{
	/**
	 * 
	 * @var string
	 * @access private
	 */
	private $pattern;

	/**
	 * {@inheritDoc}
	 * @param string $pattern
	 */
	public function __construct($errorMessage, $pattern)
	{
		parent::__construct($errorMessage);
		$this->setPattern($pattern);
	}
	
	/**
	 * {@inheritDoc}
	 * @return bool
	 */
	public function isValid($value)
	{
		return preg_match($this->pattern, $value);
	}

	/**
	 * @access public
	 * @param string $pattern
	 * @return void
	 * @throws RuntimeException If $pattern != string type OR if $pattern is empty
	 */
	public function setPattern($pattern)
	{
		if (is_string($pattern) && !empty($pattern))
		{
			$this->pattern = $pattern;
		}

		else
		{
			throw new RuntimeException('Le pattern dois être une chaine de caractère non vide !');
			
		}
	}
}