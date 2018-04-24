<?php
namespace Components;

class NotNullValidator extends Validator
{
    /**
	 * {@inheritDoc}
	 * @return bool
	 */
    public function isValid($value)
    {
        return !empty($value);
    }
}