<?php

/*
 * This file is part of the Tc-blog project.
 *
 * (c) Thibault Cavailles <tcblog@tc-dev.ovh>
 *
 * First blog in PHP
 */

namespace Components;
 
class Config
{
    /**
     * 
     * @var array
     * @access private
     */
    private $vars = [];

    /**
     * Path to xml config document
	 * 
     * @var string
     * @access private
     */
    private $pathConfig;

    /**
     * @access public
	 * @param string $pathConfig
     */
    public function __construct($pathConfig)
    {
        $this->setPathConfig($pathConfig);
    }
    
    /**
	 * Get in xml document config value of var
	 * 
     * @access public
	 * @param string $var
     * @return mixed
     */
    public function get($var)
    {
        if (!$this->vars) {

          $xml = new \DOMDocument;
          $xml->load($this->pathConfig);
    
          $elements = $xml->getElementsByTagName('define');
    
          foreach ($elements as $element) {

            $this->vars[$element->getAttribute('var')] = $element->getAttribute('value');
		  }
		  
		} 
		
		if (isset($this->vars[$var])) {

          return $this->vars[$var];
        }
    
        return null;
	}
	
	/**
	 * @access public
	 * @param string $pathConfig
	 * @return void
	 * @throws RuntimeException If the path of file doesn't exists.
	 */
    public function setPathConfig($pathConfig)
    {
		if (file_exists($pathConfig)) {

			$this->pathConfig = $pathConfig;

		} else {
			
			throw new RuntimeException('Le chemin d\'accès au fichier est invalide !');
		}
    }
}