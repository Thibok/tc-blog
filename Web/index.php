<?php

// This file is for routing request and call good controller with good method

require __DIR__.'/../vendor/autoload.php';

use \Components\Router;
use \Components\Route;
use \Components\Request;
use \Components\Response;
use \Entity\User;

$response = new Response;
$request = new Request;
$router = new Router;

if ($request->sessionExists('user')) {

	$user = $request->sessionData('user');

} else {

	$user = new User;
}
	
// Load xml routes file with DOMDocument
$xml = new \DOMDocument;
$xml->load(__DIR__.'/../App/Config/routes.xml');
	
// Get routes in routes.xml
$routes = $xml->getElementsByTagName('route');
	
foreach ($routes as $route) {

	$vars = [];
	
	// If route has vars, example : id
	if ($route->hasAttribute('vars')) {

		// Get vars names in array
		$vars = explode(',', $route->getAttribute('vars'));
	}
	
	// Add route in routes array of Router
	$router->addRoute(new Route(
		$route->getAttribute('url'),
		$route->getAttribute('module'),
		$route->getAttribute('action'),
		$vars
	));
}

try {

	// Get route match with request url and set values of varsNames
	$matchedRoute = $router->getRoute($request->getUrl());
}
	
catch (\RuntimeException $e) {

	// If no route has matched
	if ($e->getCode() == Router::NO_ROUTE) {

		session_start();
		$response->render('404.twig', ['title' => '404 Not Found', 'user' => $user]);
	}
}


// Add vars in $_GET array
$_GET = array_merge($_GET, $matchedRoute->vars());
		
// Instantiate the good controller
$controller = '\Controllers\\'.$matchedRoute->module().'Controller';
$controller = new $controller;  
		
// Get method has execute in controller
$method = 'execute'.ucfirst($matchedRoute->action());
		
if (!is_callable([$controller, $method])) {

	throw new \RuntimeException(
		'La méthode '.$method.'n\'est pas définis sur ce controlleur'
	);
}

// Call method with good controller and start session
session_start();
$controller->$method($request);
