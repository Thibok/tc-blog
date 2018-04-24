<?php
namespace Components;


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