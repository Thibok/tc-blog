<?php

/*
 * This file is part of the Tc-blog project.
 *
 * (c) Thibault Cavailles <tcblog@tc-dev.ovh>
 *
 * First blog in PHP
 */

namespace Components;
 
class Router
{
	/**
	 * 
	 * @var array
	 * @access private
	 */
	private $routes = [];
	
	/**
	 * 
	 * @var int
	 * @static
	 * @access public
	 */
	const NO_ROUTE = 1;
	
	/**
	 * Add Route in $routes array
	 * 
	 * @access public
	 * @param Route $route
	 * @return void
	 */
	public function addRoute(Route $route)
	{
		if (!in_array($route, $this->routes)) {

			$this->routes[] = $route;
		}
	}
	
	/**
	 * Get Route match with url
	 * 
	 * @access public
	 * @param string $url
	 * @return Route
	 * @throws RuntimeException If url param isn't in url list
	 */
	public function getRoute($url)
	{
		foreach ($this->routes as $route) {

			// If url match with Route url
			if (($varsValues = $route->match($url)) !== false) {

				// If route has vars, example : id
				if ($route->hasVars()) {

					// Get vars names
					$varsNames = $route->varsNames();
					$listVars = [];

					foreach ($varsValues as $key => $match) {

						// 0 contains complete url
						if ($key !== 0) {

							// Set array with names/values of vars
							$listVars[$varsNames[$key - 1]] = $match;
						}
					}
					
					$route->setVars($listVars);
				}
	
				return $route;
			}
		}
	
		throw new \RuntimeException(
			'Aucune route ne correspond à l\'URL', self::NO_ROUTE
		);
	}
}