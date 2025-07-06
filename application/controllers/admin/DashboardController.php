<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {
	
	 function __construct(){

	  	parent::__construct(); 
	  	error_reporting(0);
		$this->load->helper(array('common_helper', 'string', 'form', 'security', 'text'));	
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
		if(($this->session->userdata('adminDetails')==NULL)){
		   return redirect('/');
		}
	} 
	public function index()   
	{		
        // echo "++++++++";
		// $this->db->where('status <>', 'Delete');
		// $greeting_data=$this->db->get('tbl_greeting')->result();
		// $this->data['greeting_data']=$greeting_data;

		$this->data['page_title']='Respi Tech| Dashboard';
		$this->data['subview']='dashboard/dashboard';
		$this->load->view('admin/layout/default', $this->data);   
		//pr($this->data);die();
	}
	
}
