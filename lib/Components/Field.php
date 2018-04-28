<?php

/*
 * This file is part of the Tc-blog project.
 *
 * (c) Thibault Cavailles <tcblog@tc-dev.ovh>
 *
 * First blog in PHP
 */

namespace Components;

abstract class Field
{
    /**
	 * 
	 * @var string
	 * @access protected
	 */
    protected $name;

    /**
	 * 
	 * @var mixed
	 * @access protected
	 */
    protected $value;
    
    /**
	 * 
	 * @var string
	 * @access protected
	 */
    protected $label;
    
    /**
	 * 
	 * @var string
	 * @access protected
	 */
    protected $errorMessage;
    
    /**
	 * 
	 * @var string
	 * @access protected
	 */
    protected $class;
    
    /**
	 * 
	 * @var bool
	 * @access protected
	 */
    protected $required;

    /**
	 * 
	 * @var array
	 * @access protected
	 */
    protected $validators = [];

    /**
	 * @access public
	 * @param array $options
	 */
	public function __construct(array $options = [])
	{
		if (!empty($options)) {

			$this->hydrate($options);
		}
	}

    /**
	 * Verify value set in field and get a error message if not valid
	 * 
	 * @access public
	 * @return bool
	 */
	public function isValid()
    {
        foreach ($this->validators as $validator) {

            if (!$validator->isValid($this->value)) {

                $this->errorMessage = $validator->getErrorMessage();
                return false;
            }
        }
    
        return true;
    }

    /**
	 * @access public
	 * @param array $options
	 * @return void
	 */
	public function hydrate(array $options)
  	{
		foreach ($options as $key => $value) {

	      $method = 'set'.ucfirst($key);
	      
	      if (is_callable([$this, $method])) {

	        $this->$method($value);
	      }
	    }
    }

    /**
	 * Build the field in HTML with $options
	 * 
	 * @access public
	 * @abstract
	 */
    abstract public function buildField();

    /**
	 * @access public
	 * @param string $name
	 * @return void
	 */
    public function setName($name)
    {
    	if (is_string($name)) {

    		$this->name = $name;
    	}
    }

    /**
	 * @access public
	 * @param string $class
	 * @return void
	 */
    public function setClass($class)
    {
    	if (is_string($class)) {

    		$this->class = $class;
    	}
    }

    /**
	 * @access public
	 * @param bool $required
	 * @return void
	 */
    public function setRequired($required)
    {
        if (is_bool($required)) {

            $this->required = $required;
        }
    }

    /**
	 * @access public
	 * @param mixed $data
	 * @return void
	 */
    public function setValue($value)
    {   	
    	$this->value = $value; 	
    }

    /**
	 * @access public
	 * @param array $validators
	 * @return void
	 */
    public function setValidators(array $validators)
    {
        foreach ($validators as $validator) {

          if ($validator instanceof Validator && !in_array($validator, $this->validators)) {

			$this->validators[] = $validator;
			
          }
        }
    }

    /**
	 * @access public
	 * @param string $label
	 * @return void
	 */
    public function setLabel($label)
    {
    	if (is_string($label)) {
			
    		$this->label = $label;
    	}
    }

    /**
	 * @access public
	 * @return string
	 */
    public function getName()
    {
    	return $this->name;
    }

    /**
	 * @access public
	 * @return string
	 */
    public function getClass()
    {
    	return $this->class;
    }

    /**
	 * @access public
	 * @return mixed
	 */
    public function getValue()
    {
    	return $this->value;
    }

    /**
	 * @access public
	 * @return string
	 */
    public function getLabel()
    {
    	return $this->label;
    }

    /**
	 * @access public
	 * @return array
	 */
    public function getValidators()
    {
        return $this->validators;
    }
}