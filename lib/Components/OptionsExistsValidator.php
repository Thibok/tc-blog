<?php
namespace Components;

class OptionsExistsValidator extends Validator
{
  private $options;

  public function __construct($errorMessage, array $options)
  {
    parent::__construct($errorMessage);
    $this->setOptions($options);
  }

  public function isValid($value)
  {
    if (in_array($value, $this->options))
    {
        return true;
    }

    else
    {
        return false;
    }
  }

  public function setOptions(array $options)
  {
    if (!empty($options))
    {
        $this->options = $options;
    }
  }
}