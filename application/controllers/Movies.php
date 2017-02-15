<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Movies extends CI_Controller {

	public function addMovie(){
		$this->load->model('Movie_model');
		$btn=$this->input->post('btnAddMovie');
		session_start();
		if (isset($btn)) {
			$year=$this->input->post('year');
			$month=$this->input->post('month');
			$day=$this->input->post('day');
			$mdate=$year.'-'.$month.'-'.$day;
			$insert_data=array(
				"mname"=>$this->input->post('mname'),
				"image"=>$this->input->post('image'),
				"mdate"=>$mdate,
				"mplot"=>$this->input->post('mplot'),
				"mdirector"=>$this->input->post('mdirector'),
				"mgenre"=>json_encode($this->input->post('mgenre'))
				);
			$result=$this->Movie_model->requestAddMovie($insert_data);
			if ($result){
				$data['page']='movies/addmovie';
				$data['comefrom']='addmovie';
				$data['mname']=$insert_data['mname'];
				$data['movieID']=$result;
				$this->load->view('menu/content',$data);
			} else {
				$data['page']='movies/addmovie';
				$data['comefrom']='false';
				$data['mname']=$insert_data['mname'];
				$this->load->view('menu/content',$data);
			}
		} else {
			$data['comefrom']='null';
			$data['page']='movies/addmovie';
			$this->load->view('menu/content',$data);
		}
	}

	public function listMovies(){
		session_start();
		$this->load->model('Movie_model');
		$data['movie']=$this->Movie_model->getAllMovies('mname','asc');
		$data['page']='movies/movielist';
		$this->load->view('menu/content',$data);
	}

	public function sortMovies($sort_field,$sort_dir){
		session_start();
		$this->load->model('Movie_model');
		$data['movie']=$this->Movie_model->getAllMovies($sort_field,$sort_dir);
		$data['page']='movies/movielist';
		$this->load->view('menu/content',$data);
	}

	public function movieDetails($comefrom,$movieID){
		session_start();
		$this->load->model('Movie_model');
		$data['movie']=$this->Movie_model->getOneMovie($movieID);
		$data['page']='movies/moviedetails';
		$data['comefrom']=$comefrom;
		$this->load->view('menu/content',$data);
	}

	/*public function showCustomers(){
		$this->load->model('Customer_model');
		$data['customer']=$this->Customer_model->getCustomers();
		$data['page']='customer/showcustomers';
		$this->load->view('menu/content',$data);
	}

	public function addCustomers(){
		$this->load->model('Customer_model');
		$test=0;
		$btn=$this->input->post('btnSave');
		if (isset($btn)) {
			$insert_data=array(
				"fname"=>$this->input->post('fn'),
				"lname"=>$this->input->post('ln')
				);
			$test=$this->Customer_model->insertCustomer($insert_data);
		}

		$data['test']=$test;
		$data['page']='customer/addcustomers';
		$this->load->view('menu/content',$data);
	}

	public function deleteCustomers(){
		$this->load->model('Customer_model');
		$data['customer']=$this->Customer_model->getCustomers();
		$data['page']='customer/deletecustomers';
		$this->load->view('menu/content',$data);
	}

	public function deleteThis($selected_id){
		$this->load->model('Customer_model');
		$this->Customer_model->deleteCustomer($selected_id);
		$this->showCustomers();
	}

	public function updateCustomers(){
		$this->load->model('Customer_model');
		$data['customer']=$this->Customer_model->getCustomers();
		$data['page']='customer/updatecustomers';
		$this->load->view('menu/content',$data);
	}

	public function doUpdate(){
		$this->load->model('Customer_model');
		$id_customers=$this->input->post('id');
		$fname=$this->input->post('fn');
		$lname=$this->input->post('ln');
		$amount=0;
		//calculate rows
		foreach ($id_customers as $row) {
			$amount++;
		}
		for($x=0; $x<$amount; $x++) {
			$update_data=array(
				"fname"=>$fname[$x],
				"lname"=>$lname[$x]
				);
			$this->Customer_model->updateCustomer($update_data,$id_customers[$x]);
		}
		$this->showCustomers();
	}*/
}