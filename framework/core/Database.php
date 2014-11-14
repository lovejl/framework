<?php
/**
 * PDO
 * @author fanzw
 */
namespace core;

class Database
{
	public $pdo;
	protected $config;
	public static $_instance;
	private function __clone(){}

	public static function getInstance($config = 'default')
	{
		if(empty(self::$_instance[$config]->pdo) || !(self::$_instance[$config] instanceof self))
		{
			self::$_instance[$config] = new self($config);
 		}
		return self::$_instance[$config];
	}
	
	private function __construct($config)
	{
		$this->pdo = NULL;
		$this->config = $config;
		if(!$this->connect())
		{
			trigger_error('fail to connect database');
		}
	}

	public final function connect()
	{
		$config = \core\Config::getInstance()->get_config($this->config, 'dbconfig');
		$dsn = 'mysql:host=' . $config['hostname'] . ';dbname=' . $config['database'];
		$this->pdo = new \PDO($dsn, $config['username'], $config['password'], array(
				\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8';"));
		if($this->pdo)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function __destruct()
	{
		$this->pdo = null;
	}
}
?>