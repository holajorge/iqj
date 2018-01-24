<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Puesto_ctrl extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Puesto_model');
    }

    public function index(){
		if($this->session->userdata('logged_in')==true){
	    
		    $dato['active'] = "puesto";
	        $dato['active1'] = "lista_puestos";
			$data['puestos'] = $this->Puesto_model->getAll();
			$this->load->view('global_view/header', $dato);
			$this->load->view('admin/puesto/lista_puesto',$data);
			$this->load->view('global_view/foother');

	    }else{
	      redirect('login_ctrl');
	    }	
	}
	public function create(){
		$dato['active'] = "puesto";
        $dato['active1'] = "registro";
		$this->load->view('global_view/header', $dato);
		$this->load->view('admin/puesto/registro');
		$this->load->view('global_view/foother');
	}
	public function create_puesto(){
		$puesto = array(
		    'nivel' => $this->input->post('nivel'),			    
		    'nombre' => $this->input->post('nombre'),	
		    'status'  => 1,      
		    );
		$query = $this->Puesto_model->insertPuesto($puesto);
		if ($query == 1) {
            $result['resultado'] = true;
        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);	
	}
	public function edit_puestos(){

		$id_puesto = $this->input->post('id');	
		$puesto = array(
		    'nivel' => $this->input->post('nivel'),			    
		    'nombre' => $this->input->post('nombre'),	

		    );

		$query = $this->Puesto_model->updatePuesto($id_puesto, $puesto);
		if ($query == 1) {
            $result['resultado'] = true;
        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);	
	}
	public function deshabilitar_Puesto(){

		$id = $this->input->post('id');
		$query = $this->Puesto_model->deshabilitarPuesto($id);

		if ($query == 1) {
            $result['resultado'] = true;
        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);	
	}
	public function habilitar_Puesto(){

		$id = $this->input->post('id');
		$query = $this->Puesto_model->habilitarPuesto($id);

		if ($query == 1) {
            $result['resultado'] = true;
        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);	
	}
}

 ?>