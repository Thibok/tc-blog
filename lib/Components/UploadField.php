<?php   

/*
 * This file is part of the Tc-blog project.
 *
 * (c) Thibault Cavailles <tcblog@tc-dev.ovh>
 *
 * First blog in PHP
 */

namespace Components;

class UploadField extends Field
{
	/**
	 * {@inheritDoc}
     * @return string
	 */
	public function buildField()
	{
		$label = '<label class="control-label text-white" for="'
			.$this->name.'">'.$this->label.'</label>';

		$field = '<input type="file" class="form-control" id="'
			.$this->name.'" name="'.$this->name.'"';

		if (!empty($this->required) && $this->required === true) {

			$field .= ' required';
		}

		$field .= ' />';

		if (!empty($this->errorMessage)) {

			$field = '<div class="alert alert-danger">'
				.$this->errorMessage.$field.'</div>';
		}

		$field = '<div class="'.$this->class.'">'.$label.$field.'</div>';

		return $field;
	}

}