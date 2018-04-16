<?php
namespace Components;

class SelectField extends Field
{
    private $options = [];

    public function buildField()
	{
		if (!empty($this->label))
		{
			$label = '<label class="control-label text-white" for="'.$this->name.'">'.$this->label.'</label>';

		}

		$field = '<select name="'.$this->name.'" class="form-control"';

		if (!empty($this->required) && $this->required === true)
		{
			$field .= ' required';
		}

		if(!empty($this->label))
		{
			$field .= ' id="'.$this->name.'"';
		}

		$field .= '>';

		foreach ($this->options as $key => $option) 
		{
			if ($option == $this->getValue())
			{
				$field .= '<option value="'.$option.'" selected>'.$option.'</option>';
			}

			else
			{
				$field .= '<option value="'.$option.'">'.$option.'</option>';
			}
		}

		$field .= '</select>';

		if (!empty($this->errorMessage))
		{
			$field = '<div class="alert alert-danger">'.$this->errorMessage.$field.'</div>';
		}

		$container = '<div class="'.$this->class.'">';

		if (isset($label))
		{
			$container .= $label;
		}

		$field = $container.$field.'</div>';

		return $field;
	}

    public function setOptions(array $options)
    {
        $this->options = $options;
    }

    public function getOptions()
    {
        return $this->options;
    }
}