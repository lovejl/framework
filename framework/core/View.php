<?php
namespace core;

class View
{
	private static $_self;
	
	private function __construct(){}
	
	public static function getInstance()
	{
		if(empty(self::$_self))
		{
			self::$_self = new View();
		}
		return self::$_self;
	}
	
	public function show($name, $data)
	{
		$path = APP_PATH . '/view/' . $name . '.php';
		if(file_exists($path))
		{
			exit($this->getBuffer($path, $data));
		}
		else 
		{
			trigger_error('view not found');
		}
	}
	
	private function getBuffer($path, $data)
	{
		ob_start();
		if(!empty($data) && is_array($data))
		{
			foreach($data as $key => $value)
			{
				$$key = $value;
			}
		}
		include $path;
		$buffer = ob_get_contents();
		ob_end_clean();
		return $buffer;
	}
}