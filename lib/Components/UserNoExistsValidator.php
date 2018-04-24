<?php
namespace Components;

use \Model\UserManager;

class UserNoExistsValidator extends Validator
{
    /**
     * 
     * @var string
     * @access private
     */
    private $fieldName;

    /**
	 * {@inheritDoc}
     * @param string $fieldName
	 */
    public function __construct($errorMessage, $fieldName)
    {
        parent::__construct($errorMessage);
        $this->setFieldName($fieldName);
    }

    /**
     * {@inheritDoc}
	 * @return bool
     * @throws RuntimeException If method no exists in UserManager class
	 */
    public function isValid($value)
    {
        $userManager = new UserManager;
        $value = htmlspecialchars($value);
        $method = 'countWhere'.ucfirst($this->fieldName);

        if (is_callable([$userManager, $method]))
        {
            $exists = $userManager->$method($value);

            if ($exists == true)
            {
                return false;
            }

            else
            {
                return true;
            }
        }

        else
        {
            throw new \RuntimeException('La méthode pour vérifier l\'existence en bdd n\'existe pas !');
        }
    }

    /**
	 * @access public
     * @param string $fieldName
	 * @return void
	 */
    public function setFieldName($fieldName)
    {
        if (is_string($fieldName) && !empty($fieldName))
        {
            $this->fieldName = $fieldName;
        }
    }
}