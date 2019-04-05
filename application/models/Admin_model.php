<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
    public function get_user_details($user_email){
        $user_detail=$this->db->select('*')->from('user_table')->where('user_email',$user_email)->get()->row();
        return $user_detail;


    }

    public function getcat(){
    	$this->db->select('*');
    	$this->db->from('add_category');
    	$this->db->where('category_status',1);
    	$query_result=$this->db->get();
    	$result=$query_result->result();
    	return $result;
    }




}