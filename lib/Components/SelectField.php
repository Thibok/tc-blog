<?php

/*
 * This file is part of the Tc-blog project.
 *
 * (c) Thibault Cavailles <tcblog@tc-dev.ovh>
 *
 * First blog in PHP
 */

namespace Components;

class SelectField extends Field
{
	/**
	 * 
	 * @var array
	 * @access private
	 */
	private $options = [];

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

		$field = '<select name="'.$this->name.'" class="form-control"';

		if (!empty($this->required) && $this->required === true) {

			$field .= ' required';
		}

		if(!empty($this->label)) {

			$field .= ' id="'.$this->name.'"';
		}

		$field .= '>';

		foreach ($this->options as $key => $option) {

			if ($option == $this->getValue()) {

				$field .= '<option value="'.$option.'" selected>'.$option.'</option>';

			} else {

				$field .= '<option value="'.$option.'">'.$option.'</option>';
			}
		}

		$field .= '</select>';

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
	 * @param array $options
	 * @return void
	 */
    public function setOptions(array $options)
    {
        $this->options = $options;
    }

	/**
	 * @access public
	 * @return array
	 */
    public function getOptions()
    {
        return $this->options;
    }
}