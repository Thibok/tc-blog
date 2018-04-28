<?php

/*
 * This file is part of the Tc-blog project.
 *
 * (c) Thibault Cavailles <tcblog@tc-dev.ovh>
 *
 * First blog in PHP
 */

namespace Components;
 
class Route
{
  	/**
	 * 
	 * @var string
	 * @access private
	 */
	private $action;

	/**
	 * 
	 * @var string
	 * @access private
	 */
	private $module;

	/**
	 * 
	 * @var string
	 * @access private
	 */
	private $url;
	
	/**
	 * 
	 * @var array
	 * @access private
	 */
	private $varsNames;

	/**
	 * 
	 * 
	 * @var array
	 * @access private
	 */
	private $vars = [];
	
	/**
	 * @access public
	 * @param string $url
	 * @param string $module
	 * @param string $action
	 * @param array $varsNames
	 */
	public function __construct($url, $module, $action, array $varsNames)
	{
		$this->setUrl($url);
		$this->setModule($module);
		$this->setAction($action);
		$this->setVarsNames($varsNames);
	}
	
	/**
	 * @access public
	 * @return bool
	 */
	public function hasVars()
	{
		return !empty($this->varsNames);
	}
	
	/**
	 * Verify if url match of route url
	 * 
	 * @access public
	 * @param string $url
	 * @return mixed
	 */
	public function match($url)
	{
		if (preg_match('`^'.$this->url.'$`', $url, $matches)) {

			return $matches;

		} else {

			return false;
		}
	}
	
	/**
	 * @access public
	 * @param string $action
	 * @return void
	 */
	public function setAction($action)
	{
		if (is_string($action)) {

			$this->action = $action;
		}
	}
	
	/**
	 * @access public
	 * @param string $module
	 * @return void
	 */
	public function setModule($module)
	{
		if (is_string($module)) {

			$this->module = $module;
		}
	}
	
	/**
	 * @access public
	 * @param string $url
	 * @return void
	 */
	public function setUrl($url)
	{
		if (is_string($url)) {
			
			$this->url = $url;
		}
	}
	
	/**
	 * @access public
	 * @param array $varsNames
	 * @return void
	 */
	public function setVarsNames(array $varsNames)
	{
		$this->varsNames = $varsNames;
	}
	
	/**
	 * @access public
	 * @param array $vars
	 * @return void
	 */
	public function setVars(array $vars)
	{
		$this->vars = $vars;
	}
	
	/**
	 * @access public
	 * @return string
	 */
	public function action()
	{
		return $this->action;
	}
	
	/**
	 * @access public
	 * @return string
	 */
	public function module()
	{
		return $this->module;
	}
	
	/**
	 * @access public
	 * @return array
	 */
	public function vars()
	{
		return $this->vars;
	}
	
	/**
	 * @access public
	 * @return array
	 */
	public function varsNames()
	{
		return $this->varsNames;
	}
}