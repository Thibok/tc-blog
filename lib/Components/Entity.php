<?php
namespace Components;

abstract class Entity
{
	/**
	 * 
	 * @var int
	 * @access protected
	 */
	protected $id;

	/**
	 * @access public
	 * @param array $data
	 */
	public function __construct(array $data = [])
	{
		if (!empty($data))
		{
			$this->hydrate($data);
		}
	}

	/**
	 * @access public
	 * @param array $data
	 * @return void
	 */
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
	
	/**
	 * @access public
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @access public
	 * @param int $id
	 * @return void
	 */
	public function setId($id)
	{
		$this->id = (int) $id;
	}
}