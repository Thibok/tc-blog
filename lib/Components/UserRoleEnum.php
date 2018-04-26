<?php
namespace Components;


trait UserRoleEnum
{
    private $roleEnum = ['Administrateur', 'Membre'];

    public function getRoleEnum()
    {
        return $this->roleEnum;
    }
}