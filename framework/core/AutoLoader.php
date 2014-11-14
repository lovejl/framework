<?php
namespace core;

class AutoLoader
{
	private static $_self;
	
	private static $_is_register = FALSE;
	
	private function __construct(){}
	
	public static function getInstance()
	{
		if(empty(self::$_self))
		{
			self::$_self = new AutoLoader();
		}
		return self::$_self;
	}
	
	public function registerAutoloader()
	{
		if(self::$_is_register)
		{
			return;
		}
		self::$_is_register = TRUE;
		spl_autoload_register(array($this, 'frameAutoLoader'));
    }
	
	public function frameAutoLoader($class_name)
	{
		if(strpos($class_name, '\\') === FALSE)
		{
			return;
		}
		$file_name = str_replace('\\', '/', $class_name);
		$file_name .= '.php';
		include $file_name;
	}
}