<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Direcciones_ctrl extends CI_Controller {

	public function __construct(){    
        parent::__construct();        
        $this->load->model('Direcciones_model');
    }    
    public function index(){
         if($this->session->userdata('logged_in')==true){
            $dato['active'] = "direccion";
            $dato['active1'] = "lista_direcciones";   
            $data['direcciones'] = $this->Direcciones_model->getAll();            
            $this->load->view('global_view/header', $dato);
            $this->load->view('admin/direcciones/lista_direcciones', $data);
            $this->load->view('global_view/foother');
         }else{
          redirect('login_ctrl');
         }      
    }
    public function create(){

            $dato['active'] = "direccion";
            $dato['active1'] = "registro";          
            $this->load->view('global_view/header', $dato);
            $this->load->view('admin/direcciones/alta');
            $this->load->view('global_view/foother');
    }

    public function create_direccion(){

    	$direccion = array(
            'nombre' => $this->input->post('nombre'),
            'status' => 1        
            );
        $query = $this->Direcciones_model->createDireccion($direccion);
        if ($query == 1) {
            $result['resultado'] = true;
        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result); 
    }

    public function edit_direccion(){

    	$id = $this->input->post('id');
        $direccion = array(
            'nombre' => $this->input->post('nombre')        
            );
        $query = $this->Direcciones_model->updateDireccion($id,$direccion);
        if ($query == 1) {
            $result['resultado'] = true;
        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result); 
    }

    public function deshabilitar_Direccion(){

        $id = $this->input->post('id');
        $query = $this->Direcciones_model->deshabilitarDireccion($id);
        
        if ($query == 1) {
            $result['resultado'] = true;
        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);  
    }
    public function habilitar_Direccion(){

        $id = $this->input->post('id');
        $query = $this->Direcciones_model->habilitarDireccion($id);

        if ($query == 1) {
            $result['resultado'] = true;
        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);  
    }

}

/* End of file Direcciones_ctrl.php */
/* Location: ./application/controllers/Direcciones_ctrl.php */