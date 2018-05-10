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

class FileSendValidator extends Validator
{
    /**
     * Verify if file has been send.
     * 
	 * {@inheritDoc}
	 * @return bool
	 */
    public function isValid($value)
    {
        if ($value['size'] == 0 && empty($value['tmp_name'])) {

            return true;
        }
        
        if ($value['error'] == 0) {

            return true;
            
        } else {

            return false;
        }
    }
}