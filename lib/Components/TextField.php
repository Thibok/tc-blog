<?php
namespace Components;

class TextField extends Field
{
	private $maxLength;

	public function buildField()
	{
		if (!empty($this->label))
		{
			$label = '<label class="control-label text-white" for="'.$this->name.'">'.$this->label.'</label>';
		}

		$field = '<textarea class="form-control" id="'.$this->name.'" name="'.$this->name.'"';

		if (!empty($this->maxLength))
		{
			$field .= ' maxlength="'.$this->maxLength.'"';
		}


		if (!empty($this->required) && $this->required === true)
		{
			$field .= ' required';
		}

		$field .= '>';

		if (!empty($this->value))
		{
			$field .= htmlspecialchars($this->value);
		}

		$field .= '</textarea>';

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

	public function getMaxLength()
	{
		return $this->maxLength;
	}

	public function setMaxLength($maxLength)
	{
		$maxLength = (int) $maxLength;

		if ($maxLength > 0)
		{
			$this->maxLength = $maxLength;
		}

		else
		{
			throw new \RuntimeException('La longueur maximale doit être supérieur à 0 !');
		}
	}
}