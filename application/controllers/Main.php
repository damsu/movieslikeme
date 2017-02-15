<?php
/**
* 
*/
class Main extends CI_controller
{
	
	public function index() {
		$data['page']='main/index';
		$this->load->view('menu/content',$data);
	}
}