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

	/* public  function __construct(){
		 parent::__construct();
		 if(!isset($this->session->user_id) &&($this->user_status !==1)){
			 redirect('admin-login');
		 }
	 }*/
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
		if($user_detail->user_status==1){
			$session_data['user_email']=$user_detail->user_email;
			$session_data['user_status']=$user_detail->user_status;
			$session_data['user_role']=$user_detail->user_role;
			$session_data['user_id']=$user_detail->user_id;

			$this->session->set_userdata($session_data); 
			
			$data['maincontant']='';
			//$this->load->view('admin/master',$session_data);
			$this->load->view('admin/master',$data);
		
		}
		else{
			$data=array();
		$data['error']='Invalid user';
		$this->load->view('admin/admin_login',$data);

		}
		
	}
	else{
		//echo 'Passowrd wrong';
		$data=array();
		$data['error']='Password or Email worng';
		//$this->load->view('admin/admin_login',$data);
	
		redirect('/admin-login',$data);

	}
/*	echo '<pre>';
	print_r($user_detail);
		exit();
		*/
	  
	}


	public function admin_logout(){
		$this->session->sess_destroy();
	//	$this->load->view('admin/admin_login');

		redirect('/admin-login','refresh');

	}
	

	public function re_action(){
		$this->load->helper(array('form', 'url'));


		$this->load->library('form_validation');
		
		///form Validation
		$this->form_validation->set_rules('user_name', 'User Name', 'required|max_length[255]');
		$this->form_validation->set_rules('user_email', 'User Email', 'required|max_length[255]|is_unique[user_table.user_email]');
		$this->form_validation->set_rules('user_password', 'User Password', 'required');
	
		if ($this->form_validation->run()){
			$data['user_name']=$this->input->post('user_name',TRUE);
			$data['user_email']=$this->input->post('user_email',TRUE);
	
			$password=$this->input->post('user_password',TRUE);
			$password_encript=password_hash($password,PASSWORD_DEFAULT);
			$data['user_password']=$password_encript;
	
		//	$data['user_password']=password_hash($this->input->post('user_email',TRUE),PASSWORD_DEFAULT);
	
	
			$data['user_role']=1;
			$data['user_status']=1;
			
			$this->db->insert('user_table', $data);
			$data=array();

			$data['successmassage']='Data Save Successfully';
			$data['maincontant']=$this->load->view('admin/maincontant.php',$data,true);
			$this->load->view('admin/master',$data);
			//echo 'success';
		}
		else{
			$data=array();
		$data['maincontant']=$this->load->view('admin/maincontant.php','',true);
		$this->load->view('admin/master',$data);
		}
	

	
		
		
	}
	public function admin_form(){
		$data=array();
		$data['maincontant']=$this->load->view('admin/maincontant.php','',true);
		$this->load->view('admin/master',$data);
	}

	public function add_categori(){
		$data=array();
		$data['maincontant']=$this->load->view('admin/category/add_categori.php','',true);
		$this->load->view('admin/master',$data);
		
		
	}
	public function save_categori(){
		$data['category_name']=$this->input->post('category_name',TRUE);
		$data['category_desc']=$this->input->post('category_desc',TRUE);
		$data['category_status']=1;
		$this->db->insert('add_category', $data);
		//redirect('/add_categori','refresh');
		echo 'success';
		/*$data['maincontant']=$this->load->view('admin/category/add_categori.php','',true);
		$this->load->view('admin/master',$data);*/
		
	}
	
	public function manage_categori(){
		$category_data['showcat']=$this->db->select('*')->from('add_category')->get()->result();
		$data['maincontant']=$this->load->view('admin/category/manage_categori.php',$category_data,true);
		$this->load->view('admin/master',$data);
	}

	public function change_category_status($category_id,$status){
		//echo $category_id;
		//echo $status;
		$data['category_status']=$status;
		$this->db->where('category_id',$category_id);
		$this->db->update('add_category',$data);
		redirect('manage_categori');

	}
	public function edit_category($category_id){
		$data['category_edit_data']=$this->db->select('*')->from('add_category')->where('category_id',$category_id)->get()->row();
		$data['maincontant']=$this->load->view('admin/category/edit_categori.php',$data,true); 
		$this->load->view('admin/master',$data);

	}
	public function update_categori(){
		/*$data=array();
		$data['id']=$this->input->post('id',TRUE);
		
		$data['category_name']=$this->input->post('category_name',TRUE);
		$data['category_desc']=$this->input->post('category_desc',TRUE);
		*/
		$data=$this->input->post(NULL,TRUE);
		$category_id=$data['category_id'];
		
		unset($data['category_id']);
		
		$this->db->where('category_id',$category_id)->update('add_category',$data);
		redirect('manage_categori');
		
		//$this->db->where('category_id',$category_id)->update('add_category',$data);
		//print_r($data); 
		//echo 'success';
		
	}

	// public function get_active_category(){
	// 	$getcat['getcat']=$this->db->select('*')->from('add_category')->where('category_status',1)->get()->result();
	
	// 	// $data=array();
	// 	// $data['maincontant']=$this->load->view('admin/add_product/add_product.php','',true);
	// 	// $this->load->view('admin/master',$data);

	// }

	public function add_product_page(){
		$getcat['getcat']=$this->db->select('*')->from('add_category')->where('category_status',1)->get()->result();
		 $data=array();
		 $data['maincontant']=$this->load->view('admin/add_product/add_product.php',$getcat,true);
		 $this->load->view('admin/master',$data);


	}
	public function upload_img(){
		$config['upload_path']='./upload/';

        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1000;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);
         if ($this->upload->do_upload('p_img'))//p_img input fild name
                {
                       
                        $data=$this->upload->data();
                        $image_path="upload/$data[file_name]";
                        return $image_path;
                }
                else
                {
                      $error=$this->upload->display_errors();
                      print_r($error);
                }
	}

	public function save_product(){
		$product=$this->input->post(NULL,TRUE);
		$product['p_img']=$this->upload_img();
		$this->db->insert('add_product', $product);
		$this->add_product_page();
		
}




	
	
}
