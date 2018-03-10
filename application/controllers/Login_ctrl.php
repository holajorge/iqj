<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_ctrl extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
        $this->load->library('bcrypt');
    }

	public function index(){
        if($this->session->userdata('logged_in')==true){
            redirect('Admin_controller');
        }else{
            $data['error'] = $this->session->flashdata('error');
            $this->load->view('login',$data);
        }
	}

    public function autentificarUser(){

        if ($this->input->post()) {

            $rfc = $this->input->post('rfc');
            $query1 = $this->Login_model->loginUserEmpleadoXusuario($rfc);
            $query2 = $this->Login_model->loginUserSistema($rfc);
            $query3 = $this->Login_model->loginUserTimbres($rfc);
            if($query1){
                if ($this->bcrypt->check_password($this->input->post('password'), $query1[0]->password)) {
                    $data = array(
                        'id_empleado' => $query1[0]->id_empleado,
                        'nombre' => $query1[0]->nombre,
                        'apellidos' => $query1[0]->ap_paterno.' '.$query1[0]->ap_materno,
                        'rfc' => $query1[0]->rfc,
                        'tipo_usuario' => $query1[0]->tipo_usuario,
                        'root' => true,
                        'logged_in' => TRUE
                    );
                    $this->session->set_userdata($data);
                    redirect('Admin_controller');
                }else {
                    $this->session->set_flashdata('error', '<strong style="color: red">Usuario o Contraseña Incorrecto*</strong>');
                    redirect('Login_ctrl');
                }
            }else if($query2){
                if ($this->bcrypt->check_password($this->input->post('password'), $query2[0]->password)) {
                    $data = array(
                        'nombre' => $query2[0]->nombre,
                        'apellidos' => $query2[0]->apellidos,
                        'rfc' => $query2[0]->rfc,
                        'tipo_usuario' => $query2[0]->tipo_usuario,
                        'admin' => true,
                        'logged_in' => TRUE
                    );
                    $this->session->set_userdata($data);
                    redirect('Admin_controller');
                }else {
                    $this->session->set_flashdata('error', '<strong style="color: red">Usuario o Contraseña Incorrecto*</strong>');
                    redirect('Login_ctrl');
                }
            }else if ($query3){
                if ($this->bcrypt->check_password($this->input->post('password'), $query3[0]->password)) {
                    $data = array(
                        'id_empleado' => $query3[0]->id_empleado,
                        'nombre' => $query3[0]->nombre,
                        'apellidos' => $query3[0]->ap_paterno.' '.$query3[0]->ap_materno,
                        'rfc' => $query3[0]->rfc,
                        'verTimbre' => TRUE,
                        'logged_in' => TRUE
                    );
                    $this->session->set_userdata($data);
                    redirect('Files_employee');
                }else {
                    $this->session->set_flashdata('error', '<strong style="color: red">Usuario o Contraseña Incorrecto*</strong>');
                    redirect('Login_ctrl');
                }
            }else {
                $this->session->set_flashdata('error', '<strong style="color: red">Usuario o Contraseña Incorrecto*</strong>');
                redirect('Login_ctrl');
            }
        }else {
            $this->session->set_flashdata('error', '<strong style="color: red">Usuario o Contraseña Incorrecto*</strong>');
            redirect('Login_ctrl');
        }
    }
    public function cerrar_sesion() 
	{
	   $this->session->sess_destroy();
	   redirect('Login_ctrl');
	}
    public function error(){

        if ($this->session->userdata('tipo_usuario')== "root") {
            redirect('Admin_controller');
        }
        if ($this->session->userdata('tipo_usuario')=="admin") {
            redirect('Admin_controller');
        }
        if ($this->session->userdata('verTimbre')== TRUE) {
            redirect('Files_employee');
        }

    }
}

/* End of file Login_crtl.php */
/* Location: ./application/controllers/Login_crtl.php */