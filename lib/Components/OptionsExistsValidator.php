<?php
namespace Components;

class OptionsExistsValidator extends Validator
{
	/**
	 * 
	 * @var array
	 * @access private
	 */
	private $options;

	/**
	 * {@inheritDoc}
	 * @param array $options
	 */
	public function __construct($errorMessage, array $options)
	{
		parent::__construct($errorMessage);
		$this->setOptions($options);
	}

	/**
	 * {@inheritDoc}
	 * @return bool
	 */
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

	/**
	 * @access public
	 * @param array $options
	 * @return void
	 */
	public function setOptions(array $options)
	{
		if (!empty($options))
		{
			$this->options = $options;
		}
	}
}