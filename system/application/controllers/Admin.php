<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
	//	echo "admin page";
	
    $this->load->view('admin/admin_login');
		
    }
    public function admin_dashboard(){
	$user_email=$this->input->post('user_email',TRUE);
	$user_password=$this->input->post('user_password',TRUE);
	//$password_encript=md5($user_password);
	/*$password_encript=password_hash($user_password,PASSWORD_DEFAULT);
	echo $password_encript;
	exit();*/
	$this->load->model('admin_model');
	$user_detail=$this->admin_model->get_user_details($user_email);

	if(password_verify($user_password,$user_detail->user_password)){
		$this->load->view('admin/master');
	}
	else{
		//echo 'Passowrd wrong';
		$data=array();
		$data['error']='Password or Email worng';
		$this->load->view('admin/admin_login',$data);

	}
/*	echo '<pre>';
	print_r($user_detail);
		exit();
		*/
		
		
        
       
	}
	
	
}
