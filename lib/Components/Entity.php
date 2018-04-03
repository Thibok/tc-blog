<?php
namespace Components;

abstract class Entity
{
	protected $id;

	public function __construct(array $data = [])
	{
		if (!empty($data))
		{
			$this->hydrate($data);
		}
		
	}

	abstract public function isValid();

	public function hydrate(array $data)
	{
		foreach ($data as $key => $value) 
		{
			$action = 'set'.ucfirst($key);

			if (is_callable([$this, $action]))
			{
				$this->$action($value);
			}
		}
	}

	public function isNew()
	{
		return empty($this->id);
	}

	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = (int) $id;
	}
}