<?php
/**
 * CONTROLLER CORE
 * @author fanzw
 */
namespace core;

class Controller
{	
	public $input;
	
	public $log;
	
	public $uri;
	
	public $upload;
	
	public function view($name, $data)
	{
		\core\View::getInstance()->show($name, $data);
	}
	
	public function model($name)
	{
		return \core\Model::getInstance()->getModel($name);
	}
	
	public function library($name)
	{
		if(is_array($name))
		{
			foreach($name as $value)
			{
				$this->$value = \core\Library::getInstance()->getLibrary($value);
			}
		}
	}
}