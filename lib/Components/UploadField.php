<?php   
namespace Components;

class UploadField extends Field
{
	
	public function buildField()
	{
		$label = '<label class="control-label text-white" for="'.$this->name.'">'.$this->label.'</label>';

		$field = '<input type="file" class="form-control" id="'.$this->name.'" name="'.$this->name.'"';

		if (!empty($this->required) && $this->required === true)
		{
			$field .= ' required';
		}

		$field .= ' />';

		if (!empty($this->errorMessage))
		{
			$field = '<div class="alert alert-danger">'.$this->errorMessage.$field.'</div>';
		}

		$field = '<div class="'.$this->class.'">'.$label.$field.'</div>';

		return $field;
	}

}