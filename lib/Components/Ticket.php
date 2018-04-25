<?php

/*
 * This file is part of the Tc-blog project.
 *
 * (c) Thibault Cavailles <tcblog@tc-dev.ovh>
 *
 * First blog in PHP
 */

namespace Components;

class Ticket
{
    /**
	 * @access public
	 * @return void
	 */
    public function generate()
    {
        $cookie_name = 'kw_g';
        $ticket = session_id().microtime().rand(0,9999999999);
        $ticket = hash('sha512', $ticket);

        setcookie($cookie_name, $ticket, time() + (60 * 15), '/', null, false, true);
        $_SESSION['ticket'] = $ticket;
    }

    /**
	 * @access public
	 * @return bool
	 */
    public function isValid()
    {
        if ($_COOKIE['kw_g'] == $_SESSION['ticket']) {    

            return true;

        } else {
            
            return false;
        }
    }
}