<?php
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
	 * @access public
	 * @param Route $route
	 * @return void
	 */
	public function addRoute(Route $route)
	{
		if (!in_array($route, $this->routes))
		{
			$this->routes[] = $route;
		}
	}
	
	/**
	 * @access public
	 * @param string $url
	 * @return Route
	 * @throws RuntimeException If url param isn't in url list
	 */
	public function getRoute($url)
	{
		foreach ($this->routes as $route)
		{
			if (($varsValues = $route->match($url)) !== false)
			{
				if ($route->hasVars())
				{
					$varsNames = $route->varsNames();
					$listVars = [];

					foreach ($varsValues as $key => $match)
					{
						if ($key !== 0)
						{
							$listVars[$varsNames[$key - 1]] = $match;
						}
					}
			
					$route->setVars($listVars);
				}
	
				return $route;
			}
		}
	
		throw new \RuntimeException('Aucune route ne correspond à l\'URL', self::NO_ROUTE);
	}
}