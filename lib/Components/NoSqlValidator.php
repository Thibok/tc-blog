<?php
namespace Components;

class NoSqlValidator extends Validator
{
    /**
	 * {@inheritDoc}
	 * @return bool
	 */
    public function isValid($value)
    {
        if (preg_match("#drop|delete|update|insert|union|select|where|like|create|set|join#i", $value))
        {
            return false;
        }

        else
        {
            return true;
        }
    }
    
}