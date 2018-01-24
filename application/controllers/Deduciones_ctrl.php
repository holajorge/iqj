<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deduciones_ctrl extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('Deduciones_model');
    }
	public function index(){
	  if($this->session->userdata('logged_in')==true){
	      
	    $dato['active'] = "deduccion";
        $dato['active1'] = "lista_deducciones";
		$data['deducciones'] = $this->Deduciones_model->getAll();
		$this->load->view('global_view/header', $dato);
		$this->load->view('admin/deducciones/lista_deducciones',$data);
		$this->load->view('global_view/foother');
	  }else{
	      redirect('login_ctrl');
	    }
	}
	public function create(){
		$dato['active'] = "deduccion";
		$dato['active1'] = "registro";        
		$this->load->view('global_view/header', $dato);
		$this->load->view('admin/deducciones/registro');
		$this->load->view('global_view/foother');
	}
	public function create_deducciones(){
		$deduccion = array(
			'indicador' => $this->input->post('indicador'),		 
		    'nombre' => $this->input->post('nombre'),
		    'status' => 1,	       
		    );
		$query = $this->Deduciones_model->insertDeducciones($deduccion);
		if ($query == 1) {
            $result['resultado'] = true;
        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);	
	}
	public function edit_deduccion(){

		$id = $this->input->post('id');
		$deduccion = array(
			'indicador' => $this->input->post('indicador'),		 
		    'nombre' => $this->input->post('nombre'),
		    'opcion_default' => 1,	       
		    'status' => 1,
		    );
		$query = $this->Deduciones_model->updateDeducciones($id,$deduccion);
		if ($query == 1) {
            $result['resultado'] = true;
        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);	
	}
	public function deshabilitar_Deduccion(){

		$id = $this->input->post('id');
		$query = $this->Deduciones_model->deshabilitarDeduccion($id);
		
		if ($query == 1) {
            $result['resultado'] = true;
        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);	
	}
	public function habilitar_Deduccion(){

		$id = $this->input->post('id');
		$query = $this->Deduciones_model->habilitarDeduccion($id);

		if ($query == 1) {
            $result['resultado'] = true;
        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);	
	}

	public function lista_deducciones(){
		$query = $this->Deduciones_model->get_ded_activos();
		if ($query != false) {
            $result['resultado'] = true;
            $result['deducciones'] = $query;
        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);
	}

}

/* End of file Deduciones_ctrl.php */
/* Location: ./application/controllers/Deduciones_ctrl.php */