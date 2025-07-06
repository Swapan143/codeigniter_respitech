<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VendorController extends CI_Controller {
	
	 
	function __construct()
	{
	  	parent::__construct();
	  	error_reporting(0);
		$this->load->helper(array('common_helper', 'string', 'form', 'security'));
		$this->load->library(array('form_validation', 'email'));
		$this->load->model('order/Order_Model');
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
		if(($this->session->userdata('adminDetails')==NULL)){
		   return redirect('/');
		}
		
	}

	public function vendor()
	{
	    $this->db->select('tbl_buyer.id as buyer_id,tbl_buyer.buyer_name,tbl_buyer.buyer_phoneno,tbl_buyer.buyer_address,tbl_buyer.buyer_code,tbl_buyer.email_id');
        $this->db->from('tbl_buyer');
        $this->db->where('tbl_buyer.status','Vendor');
	    $this->db->order_by('tbl_buyer.id', 'desc');
	    $vendor_data=$this->db->get()->result();
	   // pr($vendor_data);
	    $this->data['vendor_data']=$vendor_data;
	    
// 		$pending_data=$this->Order_Model->pending_order_data();
// 		$this->data['pending_data']=$pending_data;  
		$this->data['page_title']="Book Shop | Vendor";
		$this->data['subview']='vendor/vendor';
		$this->load->view('admin/layout/default', $this->data);
	}
	
	public function vendor_product_view($id)
	{
	    $this->db->select('tbl_byuerproduct.id,tbl_byuerproduct.date,tbl_byuerproduct.product_name,tbl_byuerproduct.product_bye_rate,tbl_byuerproduct.bye_qty,tbl_byuerproduct.date,tbl_byuerproduct.buyer_id,tbl_byuerproduct.product_code');
        $this->db->from('tbl_byuerproduct');
        $this->db->where('tbl_byuerproduct.buyer_id',$id);
	    $this->db->order_by('tbl_byuerproduct.id', 'desc');
	    $buyer_product_data=$this->db->get()->result();
	    $this->data['buyer_product_data']=$buyer_product_data;
        
        $this->data['page_title']='Book Shop | View Product';
        $this->data['subview']='vendor/product_view';
        $this->load->view('admin/layout/default', $this->data);
	}
	

}
