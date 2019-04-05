<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		$data=array();
		$data['slider']=$this->load->view('pages/slider','',true);
		$data['featureProduct']=$this->load->view('pages/featureProduct.php','',true);
		$data['productCategory']=$this->load->view('pages/productCategory.php','',true);
		$this->load->view('master',$data);
		//$this->load->view('welcome_message');
		
	}
	public function accounts(){
		$data=array();
		$data['slider']='';
		$data['featureProduct']='<h1 align="center">This is Account page</h1>';
		$this->load->view('master',$data);
	}
	public function product_details(){
		$data=array();
		$data['slider']='';
		$data['featureProduct']=$this->load->view('pages/product_details.php','',true);
		$this->load->view('master',$data);

	}
	
}
