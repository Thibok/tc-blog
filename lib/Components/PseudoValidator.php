<?php
namespace Components;

class PseudoValidator extends Validator
{
	public function isValid($value)
	{
		return preg_match('#[a-zA-z0-9-]+#', $value);
	}
}