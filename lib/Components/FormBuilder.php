<?php
namespace Components;

abstract class FormBuilder
{
    protected $form;
    protected $config;

	public function __construct(Entity $entity)
	{
        $this->setForm(new Form($entity));
        $this->config = new Config(__DIR__.'/../../App/Config/app.xml');
	}

	abstract public function build();

	public function setForm(Form $form)
	{
		$this->form = $form;
	}

	public function getForm()
	{
		return $this->form;
	}
}