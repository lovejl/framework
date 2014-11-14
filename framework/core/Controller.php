<?php
namespace core;

class Controller
{
	public static $load;
	
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
		return \core\Library::getInstance()->getLibrary($name);
	}
}