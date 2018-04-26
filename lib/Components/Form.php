<?php
namespace Components;

class Form
{
	private $entity;
	private $fields = [];

	public function __construct(Entity $entity)
	{
		$this->setEntity($entity);
	}

	public function add(Field $field)
	{

		$method = 'get'.ucfirst($field->getName());
		$field->setValue($this->entity->$method());

		$this->fields[] = $field;
	}

	public function setEntity(Entity $entity)
	{
		$this->entity = $entity;
	}

	public function getEntity()
	{
		return $this->entity;
	}

	public function isValid()
	{
		$valid = true;

		foreach ($this->fields as $field) 
		{
			if (!$field->isValid())
			{
				$valid = false;
			}
		}

		return $valid;
	}

	public function generate()
	{
		$form = '';

		foreach ($this->fields as $field) 
		{
			$form .= $field->buildField();
		}

		return $form;
	}
}