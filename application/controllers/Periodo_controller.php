<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Periodo_controller extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Periodos_model');        
    }
	public function index()
	{
		 if($this->session->userdata('logged_in')==true){
		 	$dato['active'] = "periodo";
	        $dato['active1'] = "lista_periodos";
			$data['periodos'] = $this->Periodos_model->getAll();
			$this->load->view('global_view/header', $dato);
			$this->load->view('admin/periodos/lista_periodos', $data);
			$this->load->view('global_view/foother');
		 }else{
	      redirect('login_ctrl');
	     }		
	}	
	public function create(){

			$dato['active'] = "periodo";
	        $dato['active1'] = "alta_periodo";			
			$this->load->view('global_view/header', $dato);
			$this->load->view('admin/periodos/alta');
			$this->load->view('global_view/foother');
	}	
	public function create_periodo(){
	
		$periodo = array(
			'periodo_inicio' => $this->input->post('inicio'),		 
		    'periodo_fin' => $this->input->post('fin'),
		    'periodo_quinquenal' => $this->input->post('quinquenio'),		     
		    'status' => 1,
		    );
		$query = $this->Periodos_model->createPeriodo($periodo);
		if ($query == 1) {
            $result['resultado'] = true;
        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);	
	}

	public function edit_periodo(){

		$id = $this->input->post('id');
		$periodo = array(
			'periodo_inicio' => $this->input->post('inicio'),		 
		    'periodo_fin' => $this->input->post('fin'),
		    'periodo_quinquenal' => $this->input->post('quinquenio'),		     
		    'status' => 1,
		    );
		$query = $this->Periodos_model->updatePeriodo($id,$periodo);
		if ($query == 1) {
            $result['resultado'] = true;
        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);	
	}


}

/* End of file Periodo_controller.php */
/* Location: ./application/controllers/Periodo_controller.php */