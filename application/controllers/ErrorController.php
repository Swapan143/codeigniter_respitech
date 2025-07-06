<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ErrorController extends CI_Controller {
	

	public function error(){

		$result=$this->output->set_status_header('404');
		$errors=$this->output->set_status_header('403');
		
		if (!empty($result) || !empty($errors)) {
			
			$this->load->view('error_page/custom_error_page');
		}
	

	}


}