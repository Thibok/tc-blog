<?php
namespace Components;

class StructureValidator extends Validator
{
	private $pattern;

	public function __construct($errorMessage, $pattern)
	{
		parent::__construct($errorMessage);
		$this->setPattern($pattern);
	}
	
	public function isValid($value)
	{
		return preg_match($this->pattern, $value);
	}

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