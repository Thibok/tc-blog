<?php
namespace Components;

class Response
{
    private $twig;

    public function __construct()
    {
        $loader = new \Twig_Loader_Filesystem(__DIR__.'/../../App/Templates');
	   	$this->twig = new \Twig_Environment($loader);
    }

	public function redirect($location)
	{
        header("Location: ".$location);
        exit;
    }
    
    public function render($page, array $data = [])
    {
        echo $this->twig->render($page, $data);
        exit;
	}
	
	public function endSession()
	{
		$_SESSION = array();
        session_destroy();
	}
}