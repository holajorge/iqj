<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_ctrl extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
    }

	public function index()
	{
		
			if($this->session->userdata('logged_in')==true){
				redirect('Admin_controller');
			}else{
				$data["error"] = "";
				$this->load->view('login',$data);
			}
					
	}

	public function autentificarUser(){

		if ($this->input->post())  {

	      $rfc = $this->input->post('rfc');
	      $password = $this->input->post('password');
	      
	      $fila =  $this->Login_model->authUserRoot($rfc, $password);

	      // var_dump($fila); die();

	      if($fila){  	    
	        $tipo = $fila[0]->tipo_usuario;
		        if($tipo == "admin"){
			          $data = array(
			            'id_usuario'   =>  $fila[0]->id_usuario,
			            'nombre'   =>  $fila[0]->nombre,
			            'apellido'   =>  $fila[0]->ap_paterno,
			            'logged_in' =>TRUE,
			            'tipo_usuario'=> $fila[0]->tipo_usuario
			            );
			          $this->session->set_userdata($data);

			          redirect('Admin_controller');	      
			     } 
	   	  }else{	
	   	  	 $this->session->set_flashdata('error', '<strong>Usuario o Contraseña</strong> Incorrecto*');   
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