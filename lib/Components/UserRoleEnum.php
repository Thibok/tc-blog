<?php

/*
 * This file is part of the Tc-blog project.
 *
 * (c) Thibault Cavailles <tcblog@tc-dev.ovh>
 *
 * First blog in PHP
 */

namespace Components;


/**
* 
* @internal
*/
trait UserRoleEnum
{
    /**
     * 
     * @var array
     * @access private
     */
    private $roleEnum = ['Administrateur', 'Membre'];

    /**
	 * @access public
	 * @return array
	 */
    public function getRoleEnum()
    {
        return $this->roleEnum;
    }
}