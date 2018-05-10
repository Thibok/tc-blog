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

class FileSizeValidator extends Validator
{
    /**
	 * 
	 * @var int
	 * @access private
	 */
    private $maxSize;

    /**
	 * {@inheritDoc}
	 * @param int $maxSize
	 */
    public function __construct($errorMessage, $maxSize)
    {
        parent::__construct($errorMessage);
        $this->setMaxSize($maxSize);
    }

    /**
     * Verify the file size.
     * 
	 * {@inheritDoc}
	 * @return bool
	 */
    public function isValid($value)
    {
        if ($value['size'] == 0 && empty($value['tmp_name'])) {

            return true;
        }

        if ($value['size'] <= $this->maxSize) {

            return true;

        } else {
            
            return false;
        }
    }

    /**
	 * @access public
	 * @param int $maxSize
	 * @return void
     * @throws RuntimeException If $maxSize < 1 OR $maxSize > 8000000
	 */
    public function setMaxSize($maxSize)
    {
        $maxSize = (int) $maxSize;

        if ($maxSize > 0 && $maxSize <= 8000000) {

            $this->maxSize = $maxSize;

        } else {

            throw new RuntimeException(
                'La taille maximal d\'un fichier doit être supérieur à 0 et inférieur à 8 000 000 d\'octets !'
            );      
        }
    }
}