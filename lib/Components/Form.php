<?php

/*
 * This file is part of the Tc-blog project.
 *
 * (c) Thibault Cavailles <tcblog@tc-dev.ovh>
 *
 * First blog in PHP
 */

namespace Components;

class Form
{
	/**
	 * 
	 * @var Entity
	 * @access private
	 */
	private $entity;

	/**
	 * 
	 * @var array
	 * @access private
	 */
	private $fields = [];

	/**
	 * @access public
	 * @param Entity $entity
	 */
	public function __construct(Entity $entity)
	{
		$this->setEntity($entity);
	}

	/**
	 * Add field in form and set field value with entity getter.
	 * 
	 * @access public
	 * @param Field $field
	 * @return void
	 */
	public function add(Field $field)
	{
		$method = 'get'.ucfirst($field->getName());
		$field->setValue($this->entity->$method());

		$this->fields[] = $field;
	}

	/**
	 * @access public
	 * @param Entity $entity
	 * @return void
	 */
	public function setEntity(Entity $entity)
	{
		$this->entity = $entity;
	}

	/**
	 * @access public
	 * @return Entity
	 */
	public function getEntity()
	{
		return $this->entity;
	}

	/**
	 * Verify if all fields are valid with validators.
	 * 
	 * @access public
	 * @return bool
	 */
	public function isValid()
	{
		$valid = true;

		foreach ($this->fields as $field)  {

			if (!$field->isValid()) {

				$valid = false;
			}
		}

		return $valid;
	}

	/**
	 * Generate form in HTML.
	 * @access public
	 * @return string
	 */
	public function generate()
	{
		$form = '';

		foreach ($this->fields as $field)  {
			
			$form .= $field->buildField();
		}

		return $form;
	}
}