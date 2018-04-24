<?php
namespace Components;

class FileSendValidator extends Validator
{
    /**
	 * {@inheritDoc}
	 * @return bool
	 */
    public function isValid($value)
    {
        if ($value['size'] == 0 && empty($value['tmp_name']))
        {
            return true;
        }
        
        if ($value['error'] == 0)
        {
            return true;
        }

        else
        {
            return false;
        }
    }
}