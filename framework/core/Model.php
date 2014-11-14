<?php
namespace core;

class Model
{
	private static $_self;
	
	public $db;
	
	private function __construct(){
		
	}
	
	public static function getInstance()
	{
		if(empty(self::$_self))
		{
			self::$_self = new Model();
		}
		return self::$_self;
	}
	
	public function getModel($name)
	{
		$path = APP_PATH . '/model/' . $name . 'Mod.php';
		if(file_exists($path))
		{
			$model = '\\model\\' . $name . 'Mod';
			return new $model();
		}
		else
		{
			trigger_error('MODEL NOT FOUND');
		}
	}
	
	public function connect($dbConfig = 'default')
	{
		$db = \core\Database::getInstance($dbConfig);
		$this->db = $db->pdo;
	}
}