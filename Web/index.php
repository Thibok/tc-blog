<?php

require __DIR__.'/../vendor/autoload.php';

use \Components\Router;
use \Components\Route;
use \Components\Request;

  $loader = new Twig_Loader_Filesystem(__DIR__.'/../App/Views');
  $twig = new Twig_Environment($loader);

  $request = new Request;
  $router = new Router;
 
  $xml = new \DOMDocument;
  $xml->load(__DIR__.'/../App/Config/routes.xml');
 
  $routes = $xml->getElementsByTagName('route');
 
  foreach ($routes as $route)
  {
    $vars = [];
 
    if ($route->hasAttribute('vars'))
    {
      $vars = explode(',', $route->getAttribute('vars'));
    }
 
    $router->addRoute(new Route($route->getAttribute('url'), $route->getAttribute('module'), $route->getAttribute('action'), $vars));
  }

  try
  {
    $matchedRoute = $router->getRoute($request->getUrl());
  }
  
  catch (\RuntimeException $e)
  {
    if ($e->getCode() == Router::NO_ROUTE)
    {
      echo $twig->render('404.html');
      exit;
	}
  }


  $_GET = array_merge($_GET, $matchedRoute->vars());
 	
 	$controller = '\Controllers\\'.$matchedRoute->module().'Controller';

 	$controller = new $controller;
   	

  $method = 'execute'.ucfirst($matchedRoute->action());
   	
  if (!is_callable([$controller, $method]))
  {
   	throw new \RuntimeException('La méthode '.$method.'n\'est pas définis sur ce controlleur');
  }

  $controller->$method($request);

?>