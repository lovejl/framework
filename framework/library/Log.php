<?php
/**
 * LOG LIBRARY
 * @author fanzw
 */
namespace library;

class Log
{
	private static $_self;
	
	private function __construct(){}
	
	public static function getInstance()
	{
		if(empty(self::$_self))
		{
			self::$_self = new Log();
		}
		return self::$_self;
	}
	
	public function log_message($msg, $name = 'log')
	{
		$file = APP_PATH . '/log/' . $name . '_' . date('Y-m-d') . '.log';
		if(!is_dir(APP_PATH . '/log'))
		{
			mkdir(APP_PATH . '/log', 0777, true);
		}
		$message = '[' . date("Y-m-d H:i:s") . ']';
		$message .= '[' . $msg . ']' . "\n";
		return error_log($message, 3, $file);
	}
}