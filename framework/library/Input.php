<?php
namespace library;

class Input
{
	private static $_self;
	
	private function __construct(){}
	
	public static function getInstance()
	{
		if(empty(self::$_self))
		{
			self::$_self = new Input();
		}
		return self::$_self;
	}
	
	public function input($name)
	{
		if(isset($_POST[$name]))
		{
			return $this->setInput($_POST[$name]);
		}
		if(isset($_GET[$name]))
		{
			return $this->setInput($_GET[$name]);
		}
		return FALSE;
	}
	
	private function setInput($data)
	{
		$data = addslashes($data);
		return htmlspecialchars($data);
	}
}