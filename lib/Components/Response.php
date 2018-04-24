<?php
namespace Components;

class Response
{
    /**
	 * 
	 * @var Twig_Environment
	 * @access private
	 */
    private $twig;

    /**
	 * @access public
	 */
    public function __construct()
    {
        $loader = new \Twig_Loader_Filesystem(__DIR__.'/../../App/Templates');
	   	$this->twig = new \Twig_Environment($loader);
    }

    /**
	 * @access public
	 * @param string $location
	 * @return void
	 */
	public function redirect($location)
	{
        header("Location: ".$location);
        exit;
    }
    
    /**
	 * @access public
	 * @param string $page
	 * @param array $data
	 * @return void
	 */
    public function render($page, array $data = [])
    {
        echo $this->twig->render($page, $data);
        exit;
    }
}