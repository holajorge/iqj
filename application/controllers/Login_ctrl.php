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
            $fila = $this->Login_model->authUserRoot($rfc);

            if($fila){
                /*PARA QUE LOS USUARIOS CHEQUEN SUS ARCHIVOS */
                if (empty($fila[0]->tipo_usuario)){
                    if ($this->bcrypt->check_password($this->input->post('password'), $fila[0]->password)) {
                        $data = array(
                            'id_empleado' => $fila[0]->id_empleado,
                            'nombre' => $fila[0]->nombre,
                            'apellido' => $fila[0]->ap_paterno,
                            'materno' => $fila[0]->ap_materno,
                            'rfc' => $fila[0]->rfc,
                            'logged_in' => TRUE
                        );
                        $this->session->set_userdata($data);
                        redirect('Files_employee');
                    }
                }
                if ($fila[0]->tipo_usuario == "root") {
                    if ($this->bcrypt->check_password($this->input->post('password'), $fila[0]->password)) {
                        $data = array(
                            'id_empleado' => $fila[0]->id_empleado,
                            'id_usuario' => $fila[0]->id_usuario,
                            'nombre' => $fila[0]->nombre,
                            'apellidos' => $fila[0]->ap_paterno. ' ' .$fila[0]->ap_materno,
                            'logged_in' => TRUE,
                            'tipo_usuario' => $fila[0]->tipo_usuario
                        );
                        $this->session->set_userdata($data);
                        redirect('Admin_controller');
                    }
                }
                if ($fila[0]->tipo_usuario == "admin") {
                    if ($this->bcrypt->check_password($this->input->post('password'), $fila[0]->password)) {
                        $data = array(
                            'id_usuarioxsistema' => $fila[0]->id_usuarioxsistema,
                            'nombre' => $fila[0]->nombre,
                            'apellidos' => $fila[0]->apellidos,
                            'rfc' => $fila[0]->rfc,
                            'logged_in' => TRUE,
                            'tipo_usuario' => $fila[0]->tipo_usuario
                        );
                        $this->session->set_userdata($data);
                        redirect('Admin_controller');
                    }else {
                        $this->session->set_flashdata('error', '<strong style="color: red">Usuario o Contraseña Incorrecto*</strong>');
                        redirect('Login_ctrl');
                    }
                }
                else {
                    $this->session->set_flashdata('error', '<strong style="color: red">Usuario o Contraseña Incorrecto*</strong>');
                    redirect('Login_ctrl');
                }
            }else {
                $this->session->set_flashdata('error', '<strong style="color: red">Usuario o Contraseña Incorrecto*</strong>');
                redirect('Login_ctrl');
            }

        }
	}
    public function cerrar_sesion() 
	{
	   $this->session->sess_destroy();
	   redirect('Login_ctrl');
	}

}

/* End of file Login_crtl.php */
/* Location: ./application/controllers/Login_crtl.php */