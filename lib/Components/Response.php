<?php
namespace Components;

class Response
{
    private $twig;

    public function __construct()
    {
        $loader = new \Twig_Loader_Filesystem(__DIR__.'/../../App/Views');
	   	$this->twig = new \Twig_Environment($loader);
    }

	public function redirect($location)
	{
        header($location);
        exit;
    }
    
    public function render($page, array $data = [])
    {
        echo $this->twig->render($page, $data);
        exit;
    }
}