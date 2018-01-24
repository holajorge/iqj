<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TipoEmpleado_ctrl extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        // $this->load->library('bcrypt');
        $this->load->model('TipoEmpleado_model');
    }    
    public function index(){
         if($this->session->userdata('logged_in')==true){
            $dato['active'] = "empleado";
            $dato['active1'] = "lista_TipoEmpleado";   
            $data['tipos'] = $this->TipoEmpleado_model->getAll();
            $this->load->view('global_view/header', $dato);
            $this->load->view('admin/empleados/lista_tipo', $data);
            $this->load->view('global_view/foother');
         }else{
          redirect('login_ctrl');
         }      
    }

    public function create(){

            $dato['active'] = "empleado";
            $dato['active1'] = "alta_tipo";          
            $this->load->view('global_view/header', $dato);
            $this->load->view('admin/empleados/alta_tipo');
            $this->load->view('global_view/foother');
    }

    public function create_tipoEmpleado(){
    
        $tipoEmpleado = array(            
            'nombre_tipo_trabajador' => $this->input->post('nombre')                             
            );
        $query = $this->TipoEmpleado_model->createTiploEmpleado($tipoEmpleado);
        if ($query == 1) {
            $result['resultado'] = true;
        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);  
    }

    public function edit_tipoEmpleado(){

        $id = $this->input->post('id');

        $tipo = array(
            'nombre_tipo_trabajador' => $this->input->post('nombre')        
            );
        $query = $this->TipoEmpleado_model->updateTipoEmpleado($id,$tipo);
        if ($query == 1) {
            $result['resultado'] = true;
        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);  
    }	
    public function deshabilitar_EmpleadoTipo(){

        $id = $this->input->post('id');
        $query = $this->TipoEmpleado_model->deshabilitarEmpleadoTipo($id);
        
        if ($query == 1) {
            $result['resultado'] = true;
        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);  
    }

    public function habilitar_EmpleadoTipo(){

        $id = $this->input->post('id');
        $query = $this->TipoEmpleado_model->habilitarEmpleadoTipo($id);        
        if ($query == 1) {
            $result['resultado'] = true;
        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);
    }	

}

/* End of file TipoEmpleado_ctrl.php */
/* Location: ./application/controllers/TipoEmpleado_ctrl.php */