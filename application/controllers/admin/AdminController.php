<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {
	
	function __construct()
	{
	  	parent::__construct(); 	
	  	error_reporting(0);
		$this->load->helper(array('common_helper', 'string', 'form', 'security'));
		$this->load->library(array('form_validation', 'email'));
		$this->load->model('Admin/Login_Model');
		
		
	} 
	public function index()
	{		
			
		if(($this->session->userdata('adminDetails')!==NULL)){
		   redirect('admin/dashboard');
		}
		else {
			$this->load->view('admin/login');
		} 
	}

	public function forgotpass()
	{
		$this->load->view('admin/forgot_password');

	}	
	public function verify()
	{
			
		$view_password=$this->input->post('password');
		$this->session->set_userdata('view_password',$view_password);

		$email =$this->security->xss_clean($this->input->post('email'));
		$password = MD5($this->security->xss_clean($this->input->post('password')));		
		if($email!='' && $password!=''){
			$result =$this->Login_Model->login($email, $password);			
			if(!empty($result))
			{
					$this->session->set_userdata('adminDetails',$result);					
					$this->session->set_flashdata('success', 'You have logged in successfully.');	
					redirect('admin/dashboard');
			}
			else
			{
				$this->session->set_flashdata('error', 'Please enter your registered E-mail and valid password.');	
				redirect('/');

			}
		}
		
	}
	public function forgotpassword(){
		if($this->input->post('email')!=''){

			$email=$this->input->post('email');
			$this->db->where('email', $email);
			$row=$this->db->get('tbl_admin')->row();
			if(!empty($row)){

				$password=randomPassword();

				$data=array(
					'password'=>md5($password)
				);
				$this->db->where('id', $row->id);
				$update=$this->db->update('tbl_admin', $data);
				$config = Array(
		          'protocol' => 'smtp',
		          'mailtype' => 'html', 
		          'charset' => 'utf-8',
		          'wordwrap' => TRUE

		      );
				
				$this->load->library('email', $config);				
				$from='bongtech.solution@gmail.com';		
				$from_name='Bongtech';
				$to_email=$email;
				$subject='Bongtech : Reset password';
				$message='<p>Dear '.$row->first_name.' '.$row->last_name.'</p><p> You have successfully changed your password. <br> Your new password is: '.$password.' </p><p>Warm Regards <br>Team Bongtech</p> <p><span style="color:red">This is an automated response. Please do not directly reply to this email.</span></p>';
				
				email_send();
				$this->email->from($from, $from_name);
				$this->email->to($to_email);
				$this->email->subject($subject);
				$this->email->message($message);
				$this->email->send();
								
				$this->session->set_flashdata('success', 'We have sent you a new password to your registered email.');
					redirect('/');

			}else{
				$this->session->set_flashdata('error', 'Email is not registered with us');
					redirect('admin/forgotpassword');
			}
		}
	}
	function logout(){ 				
		$this->session->unset_userdata('adminDetails');				
	    redirect('/', 'refresh');
	}	
	public function resetpassword(){
		
		$transid=$this->session->userdata('adminDetails')->id;

		if(!empty($_POST)){

			$old_pass=MD5($this->input->post('current_password'));
			$this->db->where('email', $this->session->userdata('adminDetails')->email);
			$this->db->where('password', $old_pass);
			$old_data=$this->db->get('tbl_admin')->row();
			if(!empty($old_data)){

				$check_pass=MD5($this->input->post('password'));

				if($check_pass!=$old_data->password){

				if($this->input->post('password')!=''){
					$password=md5($this->input->post('password'));
					$data=array('password'=>$password);
					$this->db->where('id', $transid);				
					$update=$this->db->update('tbl_admin', $data);
					if($update){
						$this->session->set_flashdata('success', 'Your password has been changed successfully!');
						$this->session->unset_userdata('adminDetails');
						redirect('/');
					}

				}
			}else{
				$this->session->set_flashdata('error', 'Can not use old password!');
			}
			}else{
				$this->session->set_flashdata('error', 'Your current password are not correct!');
			}
		}

		$current_pass=$this->session->userdata('view_password');		

		$this->data['page_title']='Garments | Change Password';
		$this->data['subview']='change_pass/index';
		$this->data['current_pass']=$current_pass;
		//pr($this->data);die();
		$this->load->view('admin/layout/default', $this->data);
	}

	public function foorgot_pass_email()
	{
		$email=$this->input->post('email');

		$this->db->where('email', $email);
		$row=$this->db->get('tbl_admin')->row();

		if(!empty($row)){
		 
		 $email=false;
        }else{
           $email=true; 
        }
        echo $email;


	}
	
	
}






