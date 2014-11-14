<?php
namespace controller;

class Welcome extends \core\Controller
{
	public function index()
	{
		echo 'hello index';
	}
	
	public function home()
	{
		$model = $this->model('welcome');
		$data = $model->getInfo();
		$this->library('log')->log_message(json_encode($data));
		$this->view('welcome', array('data' => $data));
	}
	
	public function add()
	{
		$name = $this->library('input')->input('name');
		$content = $this->library('input')->input('content');
		$model = $this->model('welcome');
		$data = $model->insInfo($name, $content);
		header("LOCATION:" . 'home');
	}
}