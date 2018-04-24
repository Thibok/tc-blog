<?php

/*
 * This file is part of the Tc-blog project.
 *
 * (c) Thibault Cavailles <tcblog@tc-dev.ovh>
 *
 * First blog in PHP
 */

namespace Components;

abstract class Controller
{
	/**
	 * 
	 * @var Config
	 * @access protected
	 */
	protected $config;

	/**
	 * 
	 * @var Response
	 * @access protected
	 */
	protected $response;

	/**
	 * @access public
	 * @return void
	 */
	public function __construct()
	{
	   	$this->config = new Config(__DIR__.'/../../App/Config/app.xml');
		$this->response = new Response; 
	}
}