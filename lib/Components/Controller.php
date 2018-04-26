<?php
namespace Components;

abstract class Controller
{
	protected $config;
	protected $response;
	protected $ticket;

	public function __construct()
	{
	   	$this->config = new Config(__DIR__.'/../../App/Config/app.xml');
		$this->response = new Response;
		$this->ticket = new Ticket;   
	}
}