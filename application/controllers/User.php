<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class User extends CI_Controller {

	public function registerUser(){
		$this->load->model('User_model');
		$used_names='ha';/*$this->User_model->getAllUsernames();*/
		$btn=$this->input->post('btnRegister');
		if(isset($_SESSION)) {
					echo("<script>console.log('before destroy: ".$SESSION['username']."');</script>");
            		session_destroy();
            		echo("<script>console.log('after destroy: ".$SESSION['username']."');</script>");
        		}
		if (isset($btn)) {
			$year=$this->input->post('year');
			$month=$this->input->post('month');
			$day=$this->input->post('day');
			$birthday=$year.'-'.$month.'-'.$day;
			$insert_data=array(
				"username"=>$this->input->post('username'),
				"password"=>$this->input->post('password'),
				"birthdate"=>$birthday,
				"gender"=>$this->input->post('gender'),
				"country"=>$this->input->post('country'),
				"preferences"=>json_encode($this->input->post('preferences'))
				);
			$result=$this->User_model->requestRegistration($insert_data);
			echo("<script>console.log('before destroy: ".$insert_data['preferences']."');</script>");
			if ($result){
				$user_data=$this->User_model->requestLogin($insert_data['username'], $insert_data['password']);
	   			session_start();
				$_SESSION['userID']=$user_data['userID'];
				$_SESSION['username']=$user_data['username'];
				$_SESSION['birthdate']=$user_data['birthdate'];
				$_SESSION['gender']=$user_data['gender'];
				$_SESSION['country']=$user_data['country'];
				$_SESSION['preferences']=$user_data['preferences'];
				echo("<script>console.log('before destroy: ".$user_data['preferences']."');</script>");
				$data['page']='main/index';
					//$this->load->view('menu/header');
				$this->load->view('menu/content',$data);
					//$this->load->view('menu/footer');
			}
		} else {
			$data['page']='user/registeruser';
			$data['used_names']=$used_names;
			$this->load->view('menu/content',$data);
		}
	}

	public function loginUser(){
		$this->load->model('User_model');
		$btn=$this->input->post('btnLogin');
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		if(isset($_SESSION['username'])) {
            session_destroy();
        }
		if (isset($btn)) {
				$user_data=$this->User_model->requestLogin($username, $password);
   				session_start();
				$_SESSION['userID']=$user_data['userID'];
				$_SESSION['username']=$user_data['username'];
				$_SESSION['birthdate']=$user_data['birthdate'];
				$_SESSION['gender']=$user_data['gender'];
				$_SESSION['country']=$user_data['country'];
				$_SESSION['preferences']=$user_data['preferences'];
				echo("<script>console.log('before destroy: ".$_SESSION['preferences']."');</script>");
				$data['page']='main/index';
				//$this->load->view('menu/header');
				$this->load->view('menu/content',$data);
				//$this->load->view('menu/footer');
		} else {
			$data['page']='user/loginuser';
			$this->load->view('menu/content',$data);
		}
	}

	public function logoutUser(){
		if(isset($_SESSION['username'])) {
			echo("<script>console.log('before destroy: ".$_SESSION['username']."');</script>");
            session_destroy();
            echo("<script>console.log('after destroy: ".$_SESSION['username']."');</script>");
        }
		$data['page']='user/loginuser';
		$this->load->view('menu/content',$data);
	}

	public function editProfile(){
		session_start();
		$this->load->model('User_model');
		$data['page']='user/editprofile';
		$data['edited']='false';
		$this->load->view('menu/content',$data);
	}

	public function updateProfile(){
		$this->load->model('User_model');
		$btnUpdate=$this->input->post('btnUpdate');
		if (isset($btnUpdate)) {
			session_start();
			$year=$this->input->post('year');
			$month=$this->input->post('month');
			$day=$this->input->post('day');
			$birthday=$year.'-'.$month.'-'.$day;
			$insert_data=array(
				"username"=>$this->input->post('username'),
				"birthdate"=>$birthday,
				"gender"=>$this->input->post('gender'),
				"country"=>$this->input->post('country'),
				"preferences"=>json_encode($this->input->post('preferences')),
				"userID"=>$_SESSION['userID']
				);
			$result=$this->User_model->requestProfileUpdate($insert_data);
			if ($result){
				$_SESSION['userID']=$insert_data['userID'];
				$_SESSION['username']=$insert_data['username'];
				$_SESSION['birthdate']=$insert_data['birthdate'];
				$_SESSION['gender']=$insert_data['gender'];
				$_SESSION['country']=$insert_data['country'];
				$_SESSION['preferences']=$insert_data['preferences'];
				$data['edited']='true';
				$data['page']='user/editprofile';
				$this->load->view('menu/content',$data);
			}
		}
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