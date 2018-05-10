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

class NotNullValidator extends Validator
{
    /**
     * Verify value not empty
     * 
	 * {@inheritDoc}
	 * @return bool
	 */
    public function isValid($value)
    {
        return !empty($value);
    }
}