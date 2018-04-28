<?php   

/*
 * This file is part of the Tc-blog project.
 *
 * (c) Thibault Cavailles <tcblog@tc-dev.ovh>
 *
 * First blog in PHP
 */

namespace Components;

class CaptchaField extends Field
{
    /**
	 * 
	 * @var string
	 * @access private
	 */
    private $publicKey;
    
    /**
	 * {@inheritDoc}
	 * @return string
	 */
	public function buildField()
	{
        $field = '<div style="transform:scale(0.77);-webkit-transform:scale(0.87);
            transform-origin:0 0;-webkit-transform-origin:0 0;" 
            class="g-recaptcha" data-sitekey="'.$this->publicKey.'"></div>'
            ;
        
        if (!empty($this->errorMessage)) {

            $field .= '<small style="color:red;">'.$this->errorMessage.'</small>';
        }

        $field = '<div class="'.$this->class.'">'.$field.'</div>';

		return $field;
	}

    /**
	 * @access public
	 * @return string
	 */
    public function getPublicKey()
    {
        return $this->publicKey;
    }

    /**
	 * @access public
	 * @param string $publicKey
	 * @return void
	 */
    public function setPublicKey($publicKey)
    {
        if (is_string($publicKey) && !empty($publicKey)) {
            
            $this->publicKey = $publicKey;
        }
    }
}