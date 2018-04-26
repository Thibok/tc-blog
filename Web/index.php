<?php

require __DIR__.'/../vendor/autoload.php';

use \Components\Router;
use \Components\Route;
use \Components\Request;
use \Components\Response;
use \Entity\User;

  $response = new Response;
  $request = new Request;
  $router = new Router;

  if ($request->sessionExists('user'))
  {
    $user = $request->sessionData('user');
  }

  else
  {
    $user = new User;
  }
 
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
      session_start();
      $response->render('404.twig', ['title' => '404 Not Found', 'user' => $user]);
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

  session_start();

  $controller->$method($request);

?>