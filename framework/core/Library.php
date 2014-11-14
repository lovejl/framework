<?php
namespace core;

class Library
{
	private static $_self;

	private function __construct(){}

	public static function getInstance()
	{
		if(empty(self::$_self))
		{
			self::$_self = new Library();
		}
		return self::$_self;
	}
	
	public function getLibrary($name)
	{
		if(empty($name))
		{
			return false;
		}
		$name = ucfirst($name);
		$path = FRAME_PATH . '/library/' . $name . '.php';
		if(file_exists($path))
		{
			$library = "\\library\\" . $name;
			return $library::getInstance();
		}
		else
		{
			trigger_error($name . ' LIBREARY NOT FOUND');
		}
	}
}