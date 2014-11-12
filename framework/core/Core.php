<?php
namespace core;

class Core
{
	private static $_self;
	
	private function __construct(){}
	
	public static function getInstance(){
		if(empty(self::$_self)) 
		{
			self::$_self = new Core();
		}
		return self::$_self;
	}
	
	/**
	 * FRAME INIT
	 */
	public function frameInit()
	{
		include 'core/AutoLoader.php';
		\core\AutoLoader::getInstance()->registerAutoloader();
		$config = new \core\Config();
		var_dump($config->get_config('xxxx'));
	}
}
?>