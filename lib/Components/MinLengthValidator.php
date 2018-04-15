<?php
namespace Components;

class MinLengthValidator extends Validator
{
  private $minLength;

  public function __construct($errorMessage, $minLength)
  {
    parent::__construct($errorMessage);
    $this->setMinLength($minLength);
  }

  public function isValid($value)
  {
    return strlen($value) >= $this->minLength;
  }

  public function setMinLength($minLength)
  {
    $minLength = (int) $minLength;

    if ($minLength > 0)
    {
      $this->minLength = $minLength;
    }

    else
    {
      throw new RuntimeException('La longueur minimum doit être un nombre supérieur à 0');
    }
  }
}