<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PatientController extends CI_Controller {
	
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
		$patient_data=$this->db->get('tbl_users')->result();

		$this->data['page_title']='Respi Tech | Patient';
		$this->data['subview']='patient/index';
		$this->data['patient_data']=$patient_data;
		$this->load->view('admin/layout/default', $this->data);
	}

	public function add_patient()
	{		

		$this->db->order_by('id', 'desc');
	    $doctor_data=$this->db->get('tbl_doctor')->result();
	    $this->data['doctor_data']=$doctor_data;


		$this->data['page_title']='Respi Tech | Patient';
		$this->data['subview']='patient/add';
		$this->load->view('admin/layout/default', $this->data);
	}

	public function save_patient()
	{
		if($_POST)
		{
			$email=trim($this->input->post('email'));

	        $this->db->where('email', $email);
	        $this->db->where('is_delete', 'N');
	        $patient_row=$this->db->get('tbl_users')->row();
	    
	        if(empty($patient_row))
			{
				$name=trim($this->input->post('name'));
				$mobile=trim($this->input->post('mobile'));
				$addresh=trim($this->input->post('addresh'));
				$password=trim($this->input->post('password'));
				$patient_type=trim($this->input->post('patient_type'));
				$doctor_name=trim($this->input->post('doctor_name'));

				$this->db->where('id', $doctor_name);
				$doctor_data=$this->db->get('tbl_doctor')->row();

				$data=array(
					'name' => $name,
					'email' => $email,
					'mobile' => $mobile,
					'addresh' => $addresh,
					'password_text' => $password,
					'password' => md5($password),
					'patient_type' => $patient_type,
					'doctor_name' => $doctor_data->name,
					'doctor_id' => $doctor_name,
				);			
    			$this->db->insert('tbl_users', $data);
				$this->session->set_flashdata('success', 'Patient added successfully.');	
				redirect('admin/patient');
    		}
			else
			{
    			$this->session->set_flashdata('error', 'Patient name already exists!');	
				redirect('admin/patient');
    		}
			
		}
	}
	
	public function patient_edit($transid)
    {
        
        $this->db->where('id', $transid);
		$patient_data=$this->db->get('tbl_users')->row();
        $this->data['patient_data'] = $patient_data;

		$this->db->order_by('id', 'desc');
	    $doctor_data=$this->db->get('tbl_doctor')->result();
	    $this->data['doctor_data']=$doctor_data;
	    
	    
        $this->data['page_title']='Respi Tech  | Edit Patient';
        $this->data['subview']='patient/edit';
        $this->load->view('admin/layout/default', $this->data);
    }

    public function update_patient()
    {
		if($_POST)
		{

			$edit_id=$this->input->post('edit_id');

			$email=trim($this->input->post('email'));

	        $this->db->where('email', $email);
	        $this->db->where('id <>', $edit_id);
	        $this->db->where('is_delete', 'N');
	        $banner_row=$this->db->get('tbl_users')->row();

	        if(empty($banner_row))
			{
				$name=trim($this->input->post('name'));
				$mobile=trim($this->input->post('mobile'));
				$addresh=trim($this->input->post('addresh'));
				$password=trim($this->input->post('password'));
				$patient_type=trim($this->input->post('patient_type'));
				$doctor_name=trim($this->input->post('doctor_name'));

				$this->db->where('id', $doctor_name);
				$doctor_data=$this->db->get('tbl_doctor')->row();

				$data=array(
					'name' => $name,
					'email' => $email,
					'mobile' => $mobile,
					'addresh' => $addresh,
					'password_text' => $password,
					'password' => md5($password),
					'patient_type' => $patient_type,
					'doctor_name' => $doctor_data->name,
					'doctor_id' => $doctor_name,
				);				
	        	$this->db->where('id', $edit_id);
    			$this->db->update('tbl_users', $data);
				$this->session->set_flashdata('success', 'Patient updated successfully.');	
				redirect('admin/patient');
    		}
			else
			{
    			$this->session->set_flashdata('error', 'Patient email already exists!');	
				redirect('admin/patient');
    		}
			
		} 
        
    }

	public function status()
	{	

        $transid=$this->input->post('uniqcode');        
        $this->db->where('is_delete', 'N');
        $this->db->where('id', $transid);
        $get_data=$this->db->get('tbl_users')->row();

        
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
        $this->db->update('tbl_users', $data);      
	}

	public function destroy($uniqcode)
	{
      	$data=array(
        'is_delete'=>'Y',
    	);
	  $this->db->where('id', $uniqcode);
	  $this->db->update('tbl_users', $data);
	  $this->session->set_flashdata('success', 'Patient deleted successfully');                     
	  redirect('admin/patient');
	}



}