<?php   
namespace Components;

class CaptchaField extends Field
{
    private $publicKey;
    
	public function buildField()
	{
        $field = '<div style="transform:scale(0.77);-webkit-transform:scale(0.87);transform-origin:0 0;-webkit-transform-origin:0 0;" class="g-recaptcha" data-sitekey="'.$this->publicKey.'"></div>';
        
        if (!empty($this->errorMessage))
        {
            $field .= '<small style="color:red;">Le captcha doit être valide !</small>';
        }

        $field = '<div class="'.$this->class.'">'.$field.'</div>';

		return $field;
	}

    public function getPublicKey()
    {
        return $this->publicKey;
    }

    public function setPublicKey($publicKey)
    {
        if (is_string($publicKey) && !empty($publicKey))
        {
            $this->publicKey = $publicKey;
        }
    }
}