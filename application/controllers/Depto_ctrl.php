<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Depto_ctrl extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Depto_model');
    }
	public function index(){
		 if($this->session->userdata('logged_in')==true){
	      	$dato['active'] = "depto";
	        $dato['active1'] = "lista_departamentos";
			$data['deptos'] = $this->Depto_model->getAll();
			$data['direcciones'] = $this->Depto_model->get_direcciones();  
			$this->load->view('global_view/header', $dato);
			$this->load->view('admin/depto/lista_depto',$data);
			$this->load->view('global_view/foother');	
	      }else{
	      redirect('login_ctrl');
	}		
	}
	public function create(){
		$dato['active'] = "depto";
		$dato['active1'] = "registro";       
		$data['direcciones'] = $this->Depto_model->get_direcciones(); 
		$this->load->view('global_view/header', $dato);
		$this->load->view('admin/depto/registro', $data);
		$this->load->view('global_view/foother');
	}
	public function create_depto(){
		$depto = array(
		    'nombre' => $this->input->post('nombre'),	
		    'id_direccion' => $this->input->post('direccion'),	
		    'status' => 1,     
		    );
		$query = $this->Depto_model->insertDepto($depto);
		if ($query == 1) {
            $result['resultado'] = true;
        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);	
	}
	public function edit_depto(){
		$id = $this->input->post('id');
		$depto = array(	 
		    'nombre' => $this->input->post('nombre'),	
		    'id_direccion' => $this->input->post('direccion'),     
		    'status' => 1,
		    );
		$query = $this->Depto_model->updateDepto($id,$depto);
		if ($query == 1) {
            $result['resultado'] = true;
        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);	
	}
	public function deshabilitar_Depto(){

		$id = $this->input->post('id');
		$query = $this->Depto_model->deshabilitarDepto($id);
		
		if ($query == 1) {
            $result['resultado'] = true;
        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);	
	}
	public function habilitar_Depto(){

		$id = $this->input->post('id');
		$query = $this->Depto_model->habilitarDepto($id);

		if ($query == 1) {
            $result['resultado'] = true;
        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);	
	}


}

/* End of file Depto_ctrl.php */
/* Location: ./application/controllers/Depto_ctrl.php */