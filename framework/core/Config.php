<?php
namespace core;

class Config
{
	private static $_config = FALSE;
	
	public function get_config($name = '', $path = 'config')
	{
		if(!self::$_config[$path])
		{
			if(file_exists(APP_PATH . '/config/' . $path . '.php'))
			{
				include 'config/' . $path . '.php';
			}
			else
			{
				return FALSE;
			}
			if(isset($config))
			{
				self::$_config[$path] = $config;
			}
			else
			{
				return FALSE;
			}
		}
		$config = self::$_config[$path];
		if(empty($name))
		{
			return $config;
		}
		else
		{
			return isset($config[$name]) ? $config[$name] : FALSE;
		}
	}
}
?>