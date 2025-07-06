<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Model extends CI_Model{
	
	function login($email, $password)
	{
		$this->db->where('email_id', $email);
		$this->db->where('password', $password);
		$result=$this->db->get('tbl_admin')->row();
		if(!empty($result)){
			return $result;
		}else{
			return false;
		}
	}

	
	
}
