<?php
namespace core;

class Router
{
	private $router = array();
	
	public $class = '';
	
	public $method = '';
	
	private $default_class = '';
	
	private $default_method = '';
	
	public $params = array();
	
	public function __construct()
	{
		$this->default_class = \core\Config::getInstance()->get_config('default_class', 'router');
		$this->default_method = \core\Config::getInstance()->get_config('default_method', 'router');
		$this->router = \core\Config::getInstance()->get_config('router', 'router');
	}
	
	public function setAction()
	{
		$this->setSegments();
		if(!empty($this->router) && is_array($this->router))
		{
			$this->setRouter();
		}
		$this->class = empty($this->class) ? $this->default_class : $this->class;
		$this->method = empty($this->method) ? $this->default_method : $this->method;
	}
	
	private function setRouter()
	{
		$realRouter = empty($this->class) ? $this->default_class : $this->class;
		$realRouter .= empty($this->method) ? '' : '/' . $this->method;
		foreach($this->router as $key => $value)
		{
			if($key == $realRouter)
			{
				$segment = trim($value);
				if(substr($segment, 0, 1) == '/')
				{
					$segment = substr($segment, 1);
				}
				if(substr($segment, -1) == '/')
				{
					$segment = substr($segment, 0, -1);
				}
				$segments = explode('/', $segment);
				$class = empty($segments[0]) ? '' : $segments[0];
				$this->setClass($class);
				$method = empty($segments[1]) ? '' : $segments[1];
				$this->setMethod($method);
				$params = array_slice($segments, 2);
				$this->setParams($params);
			}
		}
	}
	
	private function setSegments()
	{
		$requestUri = $_SERVER['REQUEST_URI'];
		$scriptName = $_SERVER['SCRIPT_NAME'];
		$segment = str_replace($scriptName, '', $requestUri);
		if(substr($segment, 0, 1) == '/')
		{
			$segment = substr($segment, 1);
		}
		$segments = explode('/', $segment);
		$class = empty($segments[0]) ? '' : $segments[0];
		$this->setClass($class);
		$method = empty($segments[1]) ? '' : $segments[1];
		$this->setMethod($method);
		$params = array_slice($segments, 2);
		$this->setParams($params);
	}
	
	private function setClass($class)
	{
		$this->class = $class;
	}
	
	private function setMethod($method)
	{
		$this->method = $method;
	}
	
	private function setParams($params)
	{
		$this->params = $params;
	}
}