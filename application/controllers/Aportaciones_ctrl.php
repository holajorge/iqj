<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aportaciones_ctrl extends CI_Controller {

	public function __construct(){
        parent::__construct();
        // $this->load->library('bcrypt');
        $this->load->model('Aportaciones_model');
    }    
    public function index(){
         if($this->session->userdata('logged_in')==true){
            $dato['active'] = "aportacion";
            $dato['active1'] = "lista_aportaciones";
            $data['aportaciones'] = $this->Aportaciones_model->getAll();
            $this->load->view('global_view/header', $dato);
            $this->load->view('admin/aportaciones/lista_aportaciones', $data);
            $this->load->view('global_view/foother');
         }else{
          redirect('Login_ctrl');
         }      
    }

    public function lista_aportaciones(){
        $query = $this->Aportaciones_model->get_apor_activos();
        if ($query != false) {
            $result['resultado'] = true;
            $result['aportaciones'] = $query;
        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);
    }

    public function create(){

            $dato['active'] = "aportacion";
            $dato['active1'] = "alta_aportaciones";          
            $this->load->view('global_view/header', $dato);
            $this->load->view('admin/aportaciones/alta');
            $this->load->view('global_view/foother');
    }

    public function create_aportacion(){
    
        $aportacion = array(
            'indicador' => $this->input->post('indicador'),        
            'nombre' => $this->input->post('nombre'),                    
            'status' => 1,
            );
        $query = $this->Aportaciones_model->createAportacion($aportacion);
        if ($query == 1) {
            $result['resultado'] = true;
        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);  
    }

    public function edit_apartacion(){

        $id = $this->input->post('id');
        $aportacion = array(
            'indicador' => $this->input->post('indicador'),        
            'nombre' => $this->input->post('nombre'),                    
            'status' => 1,
            );
        $query = $this->Aportaciones_model->updateAportacion($id,$aportacion);
        if ($query == 1) {
            $result['resultado'] = true;
        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);  
    }	

    public function deshabilitar_Aportacion(){

        $id = $this->input->post('id');
        $query = $this->Aportaciones_model->deshabilitarAportacion($id);
        
        if ($query == 1) {
            $result['resultado'] = true;
        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);  
    }
    public function habilitar_Aportacion(){

        $id = $this->input->post('id');
        $query = $this->Aportaciones_model->habilitarAportacion($id);

        if ($query == 1) {
            $result['resultado'] = true;
        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);  
    }

}