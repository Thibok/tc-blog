<?php
namespace Components;

class FileSendValidator extends Validator
{
    public function isValid($value)
    {
        if (empty($value))
        {
            return true;
        }
        
        if ($value['error' == 0])
        {
            return true;
        }

        else
        {
            return false;
        }
    }
}