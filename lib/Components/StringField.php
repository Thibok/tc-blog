<?php   
namespace Components;

class StringField extends Field
{
	private $maxLength;
	private $placeHolder;
	private $type;

	public function buildField()
	{
		$label = '<label class="control-label text-white" for="'.$this->name.'">'.$this->label.'</label>';

		$field = '<input type="'.$this->type.'" class="form-control" id="'.$this->name.'" name="'.$this->name.'"';

		if (!empty($this->value))
		{
			$field .= ' value="'.htmlspecialchars($this->value).'"';
		}

		if (!empty($this->maxLength))
		{
			$field .= ' maxlength="'.$this->maxLength.'"';
		}

		if (!empty($this->placeHolder))
		{
			$field .= ' placeholder="'.$this->placeHolder.'"';
		}

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

	public function getMaxLength()
	{
		return $this->maxLength;
	}
	
	public function getType()
	{
		return $this->type;
	}

	public function getPlaceHolder($placeHolder)
	{
		return $this->placeHolder;
	}

	public function setType($type)
	{
		if (is_string($type))
		{
			$this->type = $type;
		}
	}

	public function setPlaceHolder($placeHolder)
	{
		if (is_string($placeHolder))
		{
			$this->placeHolder = $placeHolder;
		}
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