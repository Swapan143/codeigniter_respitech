<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DoctorController extends CI_Controller {
	
	 function __construct(){

	  	parent::__construct(); 		
		$this->load->helper(array('common_helper', 'string', 'form', 'security', 'text'));	
		$this->load->library(array('form_validation', 'email'));	
		if(($this->session->userdata('adminDetails')==NULL)){
		   return redirect('admin');
		}
	} 

	public function index()
	{		
		// $this->db->where('is_active', 'Active');
		$this->db->where('is_delete', 'N');
		$this->db->order_by('id', 'DESC');
		$doctor_data=$this->db->get('tbl_doctor')->result();

		$this->data['page_title']='Respi Tech | Doctor';
		$this->data['subview']='doctor/index';
		$this->data['doctor_data']=$doctor_data;
		$this->load->view('admin/layout/default', $this->data);
	}

	public function add_doctor()
	{		
		$this->data['page_title']='Respi Tech | Doctor';
		$this->data['subview']='doctor/add';
		$this->load->view('admin/layout/default', $this->data);
	}

	public function save_doctor()
	{
		if($_POST)
		{
			$email=trim($this->input->post('email'));

	        $this->db->where('email', $email);
	        $this->db->where('is_delete', 'N');
	        $doctor_row=$this->db->get('tbl_doctor')->row();
	    
	        if(empty($doctor_row))
			{
				$name=trim($this->input->post('name'));
				$mobile=trim($this->input->post('mobile'));
				$hospital_name=trim($this->input->post('hospital_name'));
				$specialist=trim($this->input->post('specialist'));

				$data=array(
					'name' => $name,
					'email' => $email,
					'mobile' => $mobile,
					'hospital_name' => $hospital_name,
					'specialist' => $specialist,
				);			
    			$this->db->insert('tbl_doctor', $data);
				$this->session->set_flashdata('success', 'Doctor added successfully.');	
				redirect('admin/doctor');
    		}
			else
			{
    			$this->session->set_flashdata('error', 'Doctor name already exists!');	
				redirect('admin/doctor');
    		}
			
		}
	}
	
	public function doctor_edit($transid)
    {
        
        $this->db->where('id', $transid);
		$doctor_data=$this->db->get('tbl_doctor')->row();

       
        $this->data['doctor_data'] = $doctor_data;
	    
	    
        $this->data['page_title']='Respi Tech  | Edit Doctor';
        $this->data['subview']='doctor/edit';
        $this->load->view('admin/layout/default', $this->data);
    }

    public function update_doctor()
    {
		if($_POST)
		{

			$edit_id=$this->input->post('edit_id');

			$email=trim($this->input->post('email'));

	        $this->db->where('email', $email);
	        $this->db->where('id <>', $edit_id);
	        $this->db->where('is_delete', 'N');
	        $banner_row=$this->db->get('tbl_doctor')->row();

	        if(empty($banner_row))
			{
				$name=trim($this->input->post('name'));
				$mobile=trim($this->input->post('mobile'));
				$hospital_name=trim($this->input->post('hospital_name'));
				$specialist=trim($this->input->post('specialist'));

				$data=array(
					'name' => $name,
					'email' => $email,
					'mobile' => $mobile,
					'hospital_name' => $hospital_name,
					'specialist' => $specialist,
				);				
	        	$this->db->where('id', $edit_id);
    			$this->db->update('tbl_doctor', $data);
				$this->session->set_flashdata('success', 'Doctor updated successfully.');	
				redirect('admin/doctor');
    		}
			else
			{
    			$this->session->set_flashdata('error', 'Doctor email already exists!');	
				redirect('admin/doctor');
    		}
			
		} 
       
    }

	public function status()
	{	

        $transid=$this->input->post('uniqcode');        
        $this->db->where('is_delete', 'N');
        $this->db->where('id', $transid);
        $get_data=$this->db->get('tbl_doctor')->row();

        
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
        $this->db->update('tbl_doctor', $data);      
	}

	public function destroy($uniqcode)
	{
      	$data=array(
        'is_delete'=>'Y',
    	);
	  $this->db->where('id', $uniqcode);
	  $this->db->update('tbl_doctor', $data);
	  $this->session->set_flashdata('success', 'Doctor deleted successfully');                     
	  redirect('admin/banner');
	}


}