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

class NoSqlValidator extends Validator
{
    /**
     * Verify $value not contains SQL keywords
     * 
	 * {@inheritDoc}
	 * @return bool
	 */
    public function isValid($value)
    {
        if (preg_match("#drop|delete|update|insert|union|select|where|like|create|set|join#i", $value)) {

            return false;

        } else {
            
            return true;
        }
    }
    
}