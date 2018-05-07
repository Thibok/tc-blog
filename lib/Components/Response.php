<?php

/*
 * This file is part of the Tc-blog project.
 *
 * (c) Thibault Cavailles <tcblog@tc-dev.ovh>
 *
 * First blog in PHP
 */

namespace Components;

class Response
{
    /**
	 * Use Twig of Symfony for render template
	 * 
	 * @var Twig_Environment
	 * @access private
	 */
    private $twig;

    /**
	 * @access public
	 */
    public function __construct()
    {
        $loader = new \Twig_Loader_Filesystem(__DIR__.'/../../App/Templates');
	   	$this->twig = new \Twig_Environment($loader);
    }

    /**
	 * @access public
	 * @param string $location
	 * @return void
	 */
	public function redirect($location)
	{
        header("Location: ".$location);
        exit;
    }
    
    /**
	 * Use function Twig render
	 * 
	 * @access public
	 * @param string $page
	 * @param array $data
	 * @return void
	 */
    public function render($page, array $data = [])
    {
        echo $this->twig->render($page, $data);
        exit;
	}

	/**
	 * @access public
	 * @return void
	 */
	public function endSession()
	{
		$_SESSION = array();
       	session_destroy();
	}
}