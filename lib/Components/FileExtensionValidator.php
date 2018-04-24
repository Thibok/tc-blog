<?php
namespace Components;

class FileExtensionValidator extends Validator
{
    /**
	 * 
	 * @var array
	 * @access private
	 */
    private $allowedExtensions;

    /**
	 * {@inheritDoc}
     * @param array $allowedExtensions
	 */
    public function __construct($errorMessage, $allowedExtensions)
    {
        parent::__construct($errorMessage);
        $this->setAllowedExtensions($allowedExtensions);
    }

    /**
	 * {@inheritDoc}
	 * @return bool
	 */
    public function isValid($value)
    {
        if ($value['size'] == 0 && empty($value['tmp_name']))
        {
            return true;
        }
        
        $uploadExtension = pathinfo($value['name'], PATHINFO_EXTENSION);

        if (in_array($uploadExtension, $this->allowedExtensions))
        {
            return true;
        }

        else
        {
            return false;
        }
    }

    /**
	 * @access public
	 * @param array $allowedExtensions
	 * @return void
     * @throws RuntimeException If $allowedExtensions is empty
	 */
    public function setAllowedExtensions(array $allowedExtensions)
    {
        if (!empty($allowedExtensions))
        {
            $this->allowedExtensions = $allowedExtensions;
        }

        else
        {
            throw new RuntimeException('Le tableau des extensions autorisées ne peut pas être vide !');
        }
    }
}