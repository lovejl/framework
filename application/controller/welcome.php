<?php
/**
 * FRAME DEMO
 * @author fanzw
 */
namespace controller;

class Welcome extends \core\Controller
{
	public function index()
	{
		echo 'hello index';
	}
	
	public function home()
	{
		$this->library(array('log'));
		$oteModel = $this->model('ote');
		$oteData = $oteModel->getInfo();
		$productModel = $this->model('product');
		$productData = $productModel->getInfo();
		$this->log->log_message(json_encode($oteData));
		$this->view('welcome', array('ote' => $oteData, 'product' => $productData));
	}
	
	public function add()
	{
		$this->library(array('input', 'upload','uri'));
		$name = $this->input->get('name');
		$content = $this->input->get('content');
		$file = $_FILES['pic'];
		$this->upload->init();
		if(!$this->upload->upload($file))
		{
			exit($this->upload->errmsg);
		}
		else
		{
			$pic = $this->uri->site_url('application/upload/' . $this->upload->file_name . '.' . $this->upload->ext);
		}
		$model = $this->model($this->input->get('model'));
		$data = $model->insInfo($name, $content, $pic);
		header("LOCATION:" . 'home');
	}
}