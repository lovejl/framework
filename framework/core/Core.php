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
		//SET AUTO LOADER
		include 'core/AutoLoader.php';
		\core\AutoLoader::getInstance()->registerAutoloader();
		//GET CONFIG
		$config = new \core\Config();
		//SET FRAME EXCEPTIONS
		if($config->get_config('frame_exception') == 'on')
		{
			\core\Exceptions::getInstance()->registerExceptions();
		}
		//SET ENVIRONMENT
		\core\Common::getInstance()->setFrameEnvironment($config->get_config('frame_environment'));
		//SET TIME ZONE
		\core\Common::getInstance()->setFrameTimeZone($config->get_config('frame_time_zone'));
		//SET TIME LIMIT
		\core\Common::getInstance()->setFrameTimeLimit();
		//RUN ACTION
		$this->runAction();
	}
	
	/**
	 * RUN ACTION
	 */
	public function runAction()
	{
		$router = new \core\Router();
		$router->setAction();
		if(file_exists(APP_PATH . '/controller/' . $router->class . '.php'))
		{
			$class = '\\controller\\' . $router->class;
			$method = $router->method;
			$class = new $class();
			if(method_exists($class, $method))
			{
				$class->$method();
			}
			else
			{
				\core\Exceptions::getInstance()->show404();
			}
		}
		else
		{
			\core\Exceptions::getInstance()->show404();
		}
	}
}
?>