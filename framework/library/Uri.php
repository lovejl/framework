<?php 
/**
 * Uri LIBRARY
 * @author fanzw
 */
namespace library;

class Uri
{
	private static $_self;
	
	private function __construct(){}
	
	public static function getInstance()
	{
		if(empty(self::$_self))
		{
			self::$_self = new Uri();
		}
		return self::$_self;
	}
	
	public function site_url($url = '')
	{
		$serverName = empty($_SERVER['SERVER_NAME']) ? $_SERVER['HTTP_HOST'] : $_SERVER['SERVER_NAME'];
		$port = ($_SERVER['SERVER_PORT'] == 80 || $_SERVER['SERVER_PORT'] == 443) ? '' : ':' . $_SERVER['SERVER_PORT'];
		$ssl = $_SERVER['SERVER_PORT'] == 443 ? 'https://' : 'http://';
		$baseUrl = $ssl . $serverName . $port;
		if(!empty($url))
		{
			if(substr($url, 0, 1) != '/')
			{
				$url = '/' . $url;	
			}
		}
		return $baseUrl . $url;
	}
}