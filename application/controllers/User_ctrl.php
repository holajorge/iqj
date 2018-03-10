<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_ctrl extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('bcrypt');
        $this->load->model('Reportes_nomina_Model');
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

			$this->load->view('global_view/header', $dato);
			$this->load->view('admin/usuario/alta',$data);
			$this->load->view('global_view/foother');

	}
	public function getInfoEmploye(){

	    $query = $this->User_model->getAllEmploye_casiUser();

        if ($query != false) {
            $result['resultado'] = true;
            $result['informacionEmpleado'] = $query;
        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);
    }
	public function createUserNoRegistrado(){

            $alta = array(
                'nombre'    =>    $this->input->post("nombre"),
                'apellidos' =>    $this->input->post("apellidos"),
                'rfc'       =>    $this->input->post("rfc"),
                'password'  =>    $this->bcrypt->hash_password($this->input->post("password")),
                'status'    =>    1,
                'id_usuario'  =>   $this->input->post("usuario")
            );
            $query = $this->User_model->save_user_no_registrado($alta);

            if ($query != false) {
                $result['resultado'] = true;
            } else {
                $result['resultado'] = false;
            }
            echo json_encode($result);
	}
	public function createUsuarioRegistrado(){

        $alta = array(
            'id_empleado'    =>    $this->input->post("id_empleado"),
            'id_usuario'  =>    $this->input->post("usuario"),
            'password'  =>    $this->bcrypt->hash_password($this->input->post("password")),
            'status'    =>    1
        );
        $query = $this->User_model->guardaUsuarioRegistrado($alta);
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
	public function changePasswordUserSystema(){

	    $id_usuarioxsistema = $this->input->post("id");

        $datos = array(
            'nombre'     => $this->input->post("nombre"),
            'apellidos'  => $this->input->post("apellidos"),
            'password'   => $this->bcrypt->hash_password($this->input->post("password")),
            'rfc'        => $this->input->post("rfc"),
            'id_usuario' => $this->input->post("usuario")
        );
        $query = $this->User_model->changePAsswordUserAdmin($id_usuarioxsistema , $datos);
        if ($query != false) {
            $result['resultado'] = true;
        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);
    }
	public function deshabilitar_user(){

        $id_usuarioxsistema = $this->input->post('id');
        $query = $this->User_model->deshabilitarUsuario($id_usuarioxsistema);
        
        if ($query == 1) {
            $result['resultado'] = true;
        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);  
	}
	public function habilitar_User(){

        $id_usuarioxsistema = $this->input->post('id');
        $query = $this->User_model->habilitarUsuario($id_usuarioxsistema);

        if ($query == 1) {
            $result['resultado'] = true;
        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);  

	}
    public function deshabilitar_userEmpleado(){

        $id_empleadoxusuario = $this->input->post('id');
        $query = $this->User_model->deshabilitarUsuarioEmpleado($id_empleadoxusuario);

        if ($query == 1) {
            $result['resultado'] = true;
        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);
    }
    public function habilitar_UserEmpleado(){

        $id_empleadoxusuario = $this->input->post('id');
        $query = $this->User_model->habilitarUsuarioEmpleado($id_empleadoxusuario);

        if ($query == 1) {
            $result['resultado'] = true;
        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);

    }
    public function list_employee_change_password(){

        $dato['active'] = "usuarios";
        $dato['active1'] = "lista_empleados";
        $data['empleados'] = $this->User_model->getListEmployeeChangePass();

        $this->load->view('global_view/header', $dato);
        $this->load->view('admin/usuario/employee_list', $data);
        $this->load->view('global_view/foother');
    }
    public function timbres(){

        $data["years"] = $this->Reportes_nomina_Model->gelAllYear();
        $this->load->view('global_view/header');
        $this->load->view('admin/usuario/timbres', $data);
        $this->load->view('global_view/foother');
    }
    public function recovery_password_employe(){

        $id_empleado =  $this->input->post("id_empleado");
        $password = $this->bcrypt->hash_password($this->input->post("password"));
        $query = $this->User_model->changePasswordEmploye($id_empleado, $password);
        if ($query != false) {
            $result['resultado'] = true;
        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);
    }
    public function getUsuariosEmpleados(){

        $query = $this->User_model->getAllUsuariosEmpleados();

        if ($query != false) {
            $result['resultado'] = true;
            $result['infoEmpleadosUsuarios'] = $query;
        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);
    }
    public function obtirneRolesUsers(){

        $query = $this->User_model->getAllTipoUser();

        if ($query != false) {
            $result['resultado'] = true;
            $result['usuarios'] = $query;
        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);
    }
    public function editar_usuario_empleado(){

        $id_empleadoxusuario =  $this->input->post("id");
        $datos = array(
            'password'   => $this->bcrypt->hash_password($this->input->post("password")),
            'id_usuario' => $this->input->post("usuario"),
        );
        $query = $this->User_model->editUserEmployeRegister($id_empleadoxusuario, $datos);
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