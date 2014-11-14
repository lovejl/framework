<?php
/**
 * EXCEPTIONS LIBRARY
 * @author fanzw
 */
namespace core;

class Exceptions
{
	private static $_self;
	
	private static $_is_register = FALSE;
	
	private $levels = array(
			E_ERROR				=>	'Error',
			E_WARNING				=>	'Warning',
			E_PARSE				=>	'Parsing Error',
			E_NOTICE				=>	'Notice',
			E_CORE_ERROR			=>	'Core Error',
			E_CORE_WARNING		=>	'Core Warning',
			E_COMPILE_ERROR		=>	'Compile Error',
			E_COMPILE_WARNING	=>	'Compile Warning',
			E_USER_ERROR			=>	'User Error',
			E_USER_WARNING		=>	'User Warning',
			E_USER_NOTICE		=>	'User Notice',
			E_STRICT				=>	'Runtime Notice'
	);
	
	private function __construct(){}
	
	public static function getInstance()
	{
		if(empty(self::$_self))
		{
			self::$_self = new Exceptions();
		}
		return self::$_self;
	}
	
	public function registerExceptions()
	{
		if(self::$_is_register)
		{
			return;
		}
		self::$_is_register = TRUE;
		set_error_handler(array($this, 'frameExceptions'));
	}
	
	public function frameExceptions($errno, $errstr, $errfile, $errline)
	{
		echo $this->showError('error', $errno, $errstr, $errline, $errfile);
		exit;
	}
	
	public function show404()
	{
		echo $this->showError('404');
		exit;
	}
	
	private function showError($type, $errno = '', $errstr = '', $errline = '', $errfile = '')
	{
		$template = $type == '404' ? 'error_404' : 'error_php';
		ob_start();
		include 'errors/' . $template . '.php';
		$buffer = ob_get_contents();
		ob_end_clean();
		return $buffer;
	}
}