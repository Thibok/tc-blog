<?php
namespace Components;

class Token
{
    /**
	 * @access public
	 * @return void
	 */
    public function create()
    {
        $_SESSION['token'] = bin2hex(random_bytes(32));
    }

    /**
	 * @access public
     * @param string $token
	 * @return bool
	 */
    public function isValid($token)
    {
        if ($_SESSION['token'] == $token)
        {
            return true;
        }

        else
        {
            return false;
        }
    }

    /**
	 * @access public
	 * @return string
	 */
    public function getValue()
    {
        return $_SESSION['token'];
    }
}