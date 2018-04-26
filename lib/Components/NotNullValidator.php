<?php
namespace Components;

class NotNullValidator extends Validator
{
    public function isValid($value)
    {
        return !empty($value);
    }
}