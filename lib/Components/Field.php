<?php
namespace Components;

abstract class Field
{
	protected $name;
	protected $value;
	protected $label;
	protected $errorMessage;
	protected $class;
    protected $required;
    protected $validators = [];

	public function __construct(array $options = [])
	{
		if (!empty($options))
		{
			$this->hydrate($options);
		}
	}

	public function isValid()
    {
        foreach ($this->validators as $validator)
        {
            if (!$validator->isValid($this->value))
            {
                $this->errorMessage = $validator->errorMessage();
                return false;
            }
        }
    
        return true;
    }

	public function hydrate($data)
  	{
		foreach ($data as $key => $value)
	    {
	      $method = 'set'.ucfirst($key);
	      
	      if (is_callable([$this, $method]))
	      {
	        $this->$method($value);
	      }
	    }
    }

    abstract public function buildField();

    public function setName($name)
    {
    	if (is_string($name))
    	{
    		$this->name = $name;
    	}
    }

    public function setClass($class)
    {
    	if (is_string($class))
    	{
    		$this->class = $class;
    	}
    }

    public function setRequired($required)
    {
        if (is_bool($required))
        {
            $this->required = $required;
        }
    }

    public function setValue($value)
    {
    	if (is_string($value))
    	{
    		$this->value = $value;
    	}
    }

    public function setValidators(array $validators)
    {
        foreach ($validators as $validator)
        {
          if ($validator instanceof Validator && !in_array($validator, $this->validators))
          {
            $this->validators[] = $validator;
          }
        }
    }

    public function setLabel($label)
    {
    	if (is_string($label))
    	{
    		$this->label = $label;
    	}
    }

    public function getName()
    {
    	return $this->name;
    }

    public function getClass()
    {
    	return $this->class;
    }

    public function getValue()
    {
    	return $this->value;
    }
    public function getLabel()
    {
    	return $this->label;
    }

    public function getValidators()
    {
        return $this->validators;
    }
}