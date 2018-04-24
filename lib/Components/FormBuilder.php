<?php
namespace Components;

abstract class FormBuilder
{
	/**
	 * 
	 * @var Form
	 * @access protected
	 */
	protected $form;

	/**
	 * 
	 * @var Config
	 * @access protected
	 */
    protected $config;

	/**
	 * @access public
	 * @param Entity $entity
	 */
	public function __construct(Entity $entity)
	{
        $this->setForm(new Form($entity));
        $this->config = new Config(__DIR__.'/../../App/Config/app.xml');
	}

	/**
	 * @access public
	 * @abstract
	 */
	abstract public function build();

	/**
	 * @access public
	 * @param Form $form
	 */
	public function setForm(Form $form)
	{
		$this->form = $form;
	}

	/**
	 * @access public
	 * @return Form
	 */
	public function getForm()
	{
		return $this->form;
	}
}