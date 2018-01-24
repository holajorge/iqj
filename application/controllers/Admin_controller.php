<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_controller extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('logged_in')==true){

			$this->load->view('global_view/header');
			$this->load->view('admin/index');
			$this->load->view('global_view/foother');
      
        }else{
        	redirect('Login_ctrl');
    	}
		
	}

	public function getSkinConfig(){
		$this->load->view('skin-config');
	}

	

}