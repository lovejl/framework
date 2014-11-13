<?php
namespace core;

class Common
{
	private static $_self;
	
	private function __construct(){}
	
	public static function getInstance(){
		if(empty(self::$_self))
		{
			self::$_self = new Common();
		}
		return self::$_self;
	}
	
	public function setFrameTimeZone($zone = 'Asia/Shanghai')
	{
		date_default_timezone_set($zone);
	}
	
	public function setFrameTimeLimit($limit = 300)
	{
		if(function_exists("set_time_limit"))
		{
			set_time_limit($limit);
		}
	}
	
	public function setFrameEnvironment($environment = 'testing')
	{
		switch($environment)
		{
			case 'development':
				error_reporting(E_ALL);
				break;
			case 'testing':
			case 'production':
				error_reporting(0);
				break;
		}
	}
}