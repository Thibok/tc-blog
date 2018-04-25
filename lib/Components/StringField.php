<?php 

/*
 * This file is part of the Tc-blog project.
 *
 * (c) Thibault Cavailles <tcblog@tc-dev.ovh>
 *
 * First blog in PHP
 */

namespace Components;

class StringField extends Field
{
	/**
	 * 
	 * @var int
	 * @access private
	 */
	private $maxLength;

	/**
	 * 
	 * @var string
	 * @access private
	 */
	private $placeHolder;

	/**
	 * 
	 * @var string
	 * @access private
	 */
	private $type;

	/**
	 * {@inheritDoc}
	 * @return string
	 */
	public function buildField()
	{
		$label = '<label class="control-label text-white" for="'
			.$this->name.'">'.$this->label.'</label>';

		$field = '<input type="'.$this->type.'" class="form-control" id="'
			.$this->name.'" name="'.$this->name.'"';

		if (!empty($this->value)) {

			$field .= ' value="'.htmlspecialchars($this->value).'"';
		}

		if (!empty($this->maxLength)) {

			$field .= ' maxlength="'.$this->maxLength.'"';
		}

		if (!empty($this->placeHolder)) {

			$field .= ' placeholder="'.$this->placeHolder.'"';
		}

		if (!empty($this->required) && $this->required === true) {

			$field .= ' required';
		}

		$field .= ' />';

		if (!empty($this->errorMessage)) {

			$field = '<div class="alert alert-danger">'.$this->errorMessage.$field.'</div>';
		}

		$field = '<div class="'.$this->class.'">'.$label.$field.'</div>';

		return $field;
	}

	/**
	 * @access public
	 * @return int
	 */
	public function getMaxLength()
	{
		return $this->maxLength;
	}
	
	/**
	 * @access public
	 * @return string
	 */
	public function getType()
	{
		return $this->type;
	}

	/**
	 * @access public
	 * @return string
	 */
	public function getPlaceHolder()
	{
		return $this->placeHolder;
	}

	/**
	 * @access public
	 * @param string $type
	 * @return void
	 */
	public function setType($type)
	{
		if (is_string($type)) {

			$this->type = $type;
		}
	}

	/**
	 * @access public
	 * @param string $placeHolder
	 * @return void
	 */
	public function setPlaceHolder($placeHolder)
	{
		if (is_string($placeHolder)) {

			$this->placeHolder = $placeHolder;
		}
	}

	/**
	 * @access public
	 * @param int $maxLength
	 * @return void
	 * @throws RuntimeException If maxLength < 1
	 */
	public function setMaxLength($maxLength)
	{
		$maxLength = (int) $maxLength;

		if ($maxLength > 0) {

			$this->maxLength = $maxLength;

		} else {
			
			throw new \RuntimeException('La longueur maximale doit être supérieur à 0 !');
		}
	}
}