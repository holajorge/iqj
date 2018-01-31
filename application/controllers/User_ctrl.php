<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_ctrl extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('bcrypt');
    }
	public function list(){
	      	$dato['active'] = "usuarios";
	        $dato['active1'] = "lista_usuarios";
			$data['users'] = $this->User_model->getAll();			
			$this->load->view('global_view/header', $dato);
			$this->load->view('admin/usuario/lista_users',$data);
			$this->load->view('global_view/foother');	
	}
	public function perfil(){
			$id_empleado = $this->session->userdata('id_empleado');
			$data['info'] = $this->User_model->getInfoProfile($id_empleado);			
			$this->load->view('global_view/header');
			$this->load->view('admin/usuario/perfil',$data);
			$this->load->view('global_view/foother');	
	}
	public function changePasswordUser(){

			$password = $this->input->post("password");
			$id_exu =  $this->session->userdata("id_empleado");

			$cambio = array(
				'password' => $this->bcrypt->hash_password($password)
			);
			$query = $this->User_model->changePAssword($id_exu, $cambio);	
			if ($query != false) {
            $result['resultado'] = true;            
	        } else {
	            $result['resultado'] = false;
	        }
	        echo json_encode($result);


	}


}

/* End of file User_ctrl.php */
/* Location: ./application/controllers/User_ctrl.php */