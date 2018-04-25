<?php

/*
 * This file is part of the Tc-blog project.
 *
 * (c) Thibault Cavailles <tcblog@tc-dev.ovh>
 *
 * First blog in PHP
 */

namespace Components;

class TextField extends Field
{
	/**
	 * 
	 * @var int
	 * @access private
	 */
	private $maxLength;

	/**
	 * 
	 * @var int
	 * @access private
	 */
	private $rows;

	/**
	 * 
	 * @var int
	 * @access private
	 */
	private $cols;

	/**
	 * {@inheritDoc}
	 * @return string
	 */
	public function buildField()
	{
		if (!empty($this->label)) {

			$label = '<label class="control-label text-white" for="'
				.$this->name.'">'.$this->label.'</label>';
		}

		$field = '<textarea class="form-control" id="'
			.$this->name.'" name="'.$this->name.'"';

		if (!empty($this->maxLength)) {

			$field .= ' maxlength="'.$this->maxLength.'"';
		}

		if (!empty($this->rows)) {

			$field .= ' rows="'.$this->rows.'"';
		}

		if (!empty($this->cols)) {

			$field .= ' cols="'.$this->cols.'"';
		}

		if (!empty($this->required) && $this->required === true) {

			$field .= ' required';
		}

		$field .= '>';

		if (!empty($this->value)) {

			$field .= htmlspecialchars($this->value);
		}

		$field .= '</textarea>';

		if (!empty($this->errorMessage)) {

			$field = '<div class="alert alert-danger">'.$this->errorMessage.$field.'</div>';
		}

		$container = '<div class="'.$this->class.'">';

		if (isset($label)) {

			$container .= $label;
		}

		$field = $container.$field.'</div>';

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
	 * @return int
	 */
	public function getCols()
	{
		return $this->cols;
	}

	/**
	 * @access public
	 * @param int $rows
	 * @return void
	 * @throws RuntimeException If $rows < 1
	 */
	public function setRows($rows)
	{
		$rows = (int) $rows;

		if ($rows > 0) {

			$this->rows = $rows;

		} else {

			throw new \RuntimeException('Le nombre de lignes doit être supérieur à 0 !');
		}
	}

	/**
	 * @access public
	 * @param int $cols
	 * @return void
	 * @throws RuntimeException If $cols < 1
	 */
	public function setCols($cols)
	{
		$cols = (int) $cols;

		if ($cols > 0) {

			$this->cols = $cols;

		} else {
			
			throw new \RuntimeException('Le nombre de colonnes doit être supérieur à 0 !');
		}
	}

	/**
	 * @access public
	 * @param int $maxLength
	 * @return void
	 * @throws RuntimeException If $maxLength < 1
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