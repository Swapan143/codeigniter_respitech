<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CityController extends CI_Controller {
	
	function __construct()
	{
	  	parent::__construct(); 		
		$this->load->helper(array('common_helper', 'string', 'form', 'security', 'text'));	
		$this->load->library(array('form_validation', 'email'));	
		$this->load->model('Others_model','om');
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
		if(($this->session->userdata('adminDetails')==NULL)){
		   return redirect('admin');
		}
	} 

	public function index()
	{		
		$this->db->order_by('id', 'desc');
		$subcategory_data=$this->db->get('cities')->result();
		$this->data['subcategory_data']=$subcategory_data;
		
		$this->db->order_by('id', 'desc');
		$category_data=$this->db->get('states')->result();
		$this->data['category_data']=$category_data;
		
		$this->data['page_title']='Respi Tech | City';
		$this->data['subview']='city/index';
		$this->load->view('admin/layout/default', $this->data);
	}

	public function add_city()
	{
		$state_id=$this->input->post('state_id');
        $name=$this->input->post('name');
        
		$where1=array("state_id"=>$state_id,"name"=>$name);
		$data=$this->om->row_count('cities',$where1);
		
		if($data == 0)
		{
			$data_array=array(
								"state_id"=>$state_id,
								"name"=>$name,
								);
			$this->om->insert('cities',$data_array);
			echo 1;
			
		}
		else
		{
			echo 3;
			
		}
	}
	
	public function edit_city($transid)
	{
		$this->db->order_by('id', 'desc');
	    $category_data=$this->db->get('states')->result();
	    $this->data['category_data']=$category_data;

        $this->db->where('id', $transid);
		$sub_category_row=$this->db->get('cities')->row();

        $this->data['sub_category_data']=$sub_category_row;
        $this->data['category_data']=$category_data;

        $this->data['page_title']='Respi Tech | City';
        $this->data['subview']='city/edit';
        $this->load->view('admin/layout/default', $this->data);
		           
	}
	public function update_city()
	{
		$transid=$this->input->post('transid');
		$state_id=$this->input->post('state_id');
        $name=$this->input->post('name');


          
		$data=array(
			"state_id"=>$state_id,
			"name"=>$name,
		);
		// pr($data);
		$this->db->where('id', $transid);
		$update=$this->db->update('cities', $data);
		
		$this->session->set_flashdata('success', 'City update successfully.');	
		redirect('admin/city');       
	}

	public function status()
	{	
        $transid=$this->input->post('uniqcode');        
        $this->db->where('is_delete', 'N');
        $this->db->where('id', $transid);
        $get_data=$this->db->get('cities')->row();

        
        if($get_data->is_active=='Active'){
            $data=array(
                'is_active'=>'Inactive',
                
            );
        }elseif($get_data->is_active=='Inactive'){
            $data=array(
                'is_active'=>'Active',
            );
        }
		$this->db->where('id', $transid);        
        $this->db->update('cities', $data);      
	}

	public function destroy($uniqcode)
	{
		$data=array(
        'is_delete'=>'Y',
    	);
		$this->db->where('id', $uniqcode);
		$this->db->update('cities', $data);
	  
	 	$this->session->set_flashdata('success', 'State deleted successfully');                     
	  	redirect('admin/city');
	}


}