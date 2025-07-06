<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StateController extends CI_Controller 
{
	
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
		$category_data=$this->db->get('states')->result();
		$this->data['category_data']=$category_data;
		
		$this->data['page_title']='Respi Tech | State';
		$this->data['subview']='state/index';
		$this->load->view('admin/layout/default', $this->data);
	}

	public function add_state()
	{
		$state_name=$this->input->post('state_name');
		$where1=array("name"=>$state_name);
		$data=$this->om->row_count('states',$where1);
		
		if($data == 0)
		{
			$date=date("Y-m-d");
			$data_array=array("name"=>$state_name);
			$this->om->insert('states',$data_array);
			echo 1;
			
		}
		else
		{
			echo 3;
			
		}
	}
	
	public function edit_state($transid)
	{
		$this->db->where('id', $transid);
		$category_row=$this->db->get('states')->row();

        $this->data['category_data']=$category_row;
        $this->data['page_title']='Respi Tech | State';
        $this->data['subview']='state/edit';
        $this->load->view('admin/layout/default', $this->data);
		          
	}

	public function update_state()
	{
		$transid=$this->input->post('transid');
		$state_name=trim($this->input->post('state_name'));
		
		$data=array(
			'name'=> $state_name
		);
		// pr($data);
		$this->db->where('id', $transid);
		$update=$this->db->update('states', $data);
		
		$this->session->set_flashdata('success', 'State update successfully.');	
		redirect('admin/state');        
	}

	public function status()
	{	
		
        $transid=$this->input->post('uniqcode');        
        $this->db->where('is_delete', 'N');
        $this->db->where('id', $transid);
        $get_data=$this->db->get('states')->row();

        
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
        $this->db->update('states', $data);      
	}

	public function destroy($uniqcode)
	{
		$data=array(
        'is_delete'=>'Y',
    	);
		$this->db->where('id', $uniqcode);
		$this->db->update('states', $data);
	  
	 	$this->session->set_flashdata('success', 'State deleted successfully');                     
	  	redirect('admin/state');
	}


}