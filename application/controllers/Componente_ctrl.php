<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Componente_ctrl extends CI_Controller {

	public function __construct(){
        parent::__construct();
        // $this->load->library('bcrypt');
        $this->load->model('Componentes_model');
    } 
	public function index(){
		if($this->session->userdata('logged_in')==true){
			$dato['active'] = "componente";
            $dato['active1'] = "lista_componentes";
            $data['componentes'] = $this->Componentes_model->getAll();
            $this->load->view('global_view/header', $dato);
            $this->load->view('admin/componente/lista_componente', $data);
            $this->load->view('global_view/foother');
		}else{
			redirect('Login_ctrl');
		}
	}
	public function create(){
			$dato['active'] = "componente";
            $dato['active1'] = "alta_componente";           
            $this->load->view('global_view/header', $dato);
            $this->load->view('admin/componente/alta');
            $this->load->view('global_view/foother');
	}
	public function create_componente(){

		$componente = array(
            'clave' => $this->input->post('clave'),        
            'nombre' => $this->input->post('nombre'),                    
            );
        $query = $this->Componentes_model->createComponente($componente);
        if ($query == 1) {
            $result['resultado'] = true;
        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);  
	}
	public function edit_componente(){
		$id_componente = $this->input->post('id');
		$componente = array(
            'clave' => $this->input->post('clave'),        
            'nombre' => $this->input->post('nombre'),                    
            );
        $query = $this->Componentes_model->updateComponente($id_componente,$componente);
        if ($query == 1) {
            $result['resultado'] = true;
        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);  
	}

}

/* End of file Componente_ctrl.php */
/* Location: ./application/controllers/Componente_ctrl.php */