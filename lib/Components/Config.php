<?php
namespace Components;
 
class Config
{
  private $vars = [];
  private $pathConfig;

  public function __construct($pathConfig)
  {
    $this->setPathConfig($pathConfig);
  }
 
  public function get($var)
  {
    if (!$this->vars)
    {
      $xml = new \DOMDocument;
      $xml->load($this->pathConfig);
 
      $elements = $xml->getElementsByTagName('define');
 
      foreach ($elements as $element)
      {
        $this->vars[$element->getAttribute('var')] = $element->getAttribute('value');
      }
    }
 
    if (isset($this->vars[$var]))
    {
      return $this->vars[$var];
    }
 
    return null;
  }

  public function setPathConfig($pathConfig)
  {
    if (file_exists($pathConfig))
    {
      $this->pathConfig = $pathConfig;
    }

    else
    {
      throw new RuntimeException('Le chemin d\'accès au fichier est invalide !');
    }
  }
}