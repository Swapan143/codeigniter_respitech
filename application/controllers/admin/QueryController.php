<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class QueryController extends CI_Controller {
	
	 function __construct(){

	  	parent::__construct(); 		
		$this->load->helper(array('common_helper', 'string', 'form', 'security', 'text'));	
		$this->load->library(array('form_validation', 'email'));	
		if(($this->session->userdata('adminDetails')==NULL)){
		   return redirect('admin');
		}
	} 

	public function sleep_test()
	{		
		// $this->db->where('is_active', 'Active');
		$this->db->where('is_delete', 'N');
		$this->db->order_by('id', 'DESC');
		$sleep_data=$this->db->get('tbl_osa_sleep_test')->result();

		$this->data['page_title']='Respi Tech | Patient';
		$this->data['subview']='query/sleep';
		$this->data['sleep_data']=$sleep_data;
		$this->load->view('admin/layout/default', $this->data);
	}

	public function free_consultation()
	{		
		// $this->db->where('is_active', 'Active');
		$this->db->where('is_delete', 'N');
		$this->db->order_by('id', 'DESC');
		$consultancy_data=$this->db->get('tbl_copd_consultancy')->result();

		$this->data['page_title']='Respi Tech | Patient';
		$this->data['subview']='query/consultation';
		$this->data['consultancy_data']=$consultancy_data;
		$this->load->view('admin/layout/default', $this->data);
	}
	
	public function berlin_list()
	{		
		// $this->db->where('is_active', 'Active');
		$this->db->where('is_delete', 'N');
		$this->db->order_by('id', 'DESC');
		$consultancy_data=$this->db->get('tbl_berlin_question')->result();

		$this->data['page_title']='Respi Tech | Patient';
		$this->data['subview']='query/berlin_question';
		$this->data['consultancy_data']=$consultancy_data;
		$this->load->view('admin/layout/default', $this->data);
	}
	

	public function berlin_view($transid)
	{		
		
		$this->db->where('id', $transid);
		$query_data=$this->db->get('tbl_berlin_question')->row();

		$this->data['page_title']='Respi Tech | Patient';
		$this->data['subview']='query/berlin_question_view';
		$this->data['query_data']=$query_data;
		$this->load->view('admin/layout/default', $this->data);
	}

	



}