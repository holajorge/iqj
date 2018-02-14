<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_ctrl extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('bcrypt');
    }
	public function lista(){
		if($this->session->userdata('logged_in')==true){
	      	$dato['active'] = "usuarios";
	        $dato['active1'] = "lista_usuarios";
			$data['users'] = $this->User_model->getAll();
			$this->load->view('global_view/header', $dato);
			$this->load->view('admin/usuario/lista_users',$data);
			$this->load->view('global_view/foother');
		}else{
          redirect('login_ctrl');
         } 
	}
	public function create(){

			$dato['active'] = "usuarios";
	        $dato['active1'] = "registro";
	        $data['tipos'] = $this->User_model->getAllTipoUser();
			$data['empleados'] = $this->User_model->getAllEmpleado();
			$this->load->view('global_view/header', $dato);
			$this->load->view('admin/usuario/alta',$data);
			$this->load->view('global_view/foother');

	}
	public function createUserType(){
		
		$password = $this->input->post("password");			
		$id_empleado = $this->input->post("id_empleado");

		$alta = array(
			'id_empleado' => $this->input->post("id_empleado"),
			'id_usuario' => $this->input->post("id_usuario"),				
			'password' => $this->bcrypt->hash_password($password),
			'status'  => 1
		);
		$usuario = array(
			'usuario' => 1
		);
		$query = $this->User_model->saveUserType($alta, $id_empleado, $usuario);

		if ($query != false) {
        $result['resultado'] = true;
        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);
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
	public function deshabilitar_user(){

		$id_empleadoxusuario = $this->input->post('id');
		$id_empleado = $this->input->post('id_empleado');
        $query = $this->User_model->deshabilitarUsuario($id_empleadoxusuario, $id_empleado);
        
        if ($query == 1) {
            $result['resultado'] = true;
        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);  
	}

	public function habilitar_User(){

		$id_empleadoxusuario = $this->input->post('id');
		$id_empleado = $this->input->post('id_empleado');
        $query = $this->User_model->habilitarUsuario($id_empleadoxusuario, $id_empleado);

        if ($query == 1) {
            $result['resultado'] = true;
        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);  

	}


}

/* End of file User_ctrl.php */
/* Location: ./application/controllers/User_ctrl.php */