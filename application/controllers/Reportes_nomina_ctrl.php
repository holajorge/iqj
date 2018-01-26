<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes_nomina_ctrl extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('Reportes_nomina_Model');

    }
	public function index(){
		
		if($this->session->userdata('logged_in')==true){
			$this->load->view('global_view/header');	
			
			$datos["years"] = $this->Reportes_nomina_Model->gelAllYear();		
			$this->load->view('admin/nomina/concepto_totales', $datos);
			$this->load->view('global_view/foother');
      
        }else{
        	redirect('Login_ctrl');
    	}		
	}
	public function getAllPeriodosAjax(){

		$fecha = $this->input->post('anio');
		$query = $this->Reportes_nomina_Model->getAllPeriodoxAnio($fecha);
		if ($query != false) {
            $result['resultado'] = true;
            $result['periodos'] = $query;
        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);
	}
	public function getAllMontPeriodosC(){
		$fecha = $this->input->post('anio');
		$query = $this->Reportes_nomina_Model->getAllMontPeriodos($fecha);
		if ($query != false) {
            $result['resultado'] = true;
            $result['meses'] = $query;
        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);

	}
	public function getAllPeriodosPercepcion(){

		$id_nomina = $this->input->post('id');
		$query = $this->Reportes_nomina_Model->getAllConceptosPercepcionNominaPeriodo($id_nomina);
		$query1 = $this->Reportes_nomina_Model->getAllConceptosDeduccionNominaPeriodo($id_nomina);
		$query2 = $this->Reportes_nomina_Model->getAllConceptosAportacionNominaPeriodo($id_nomina);
		if ($query != false) {

            $result['resultado'] = true;
            $result['percepciones'] = $query;
            $result['deducciones'] = $query1;
            $result['aportaciones'] = $query2;

        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);
	}

	public function getAllPeriodosPercepcionMes(){

		$mes = $this->input->post('mes');
		$query = $this->Reportes_nomina_Model->getAllConceptosPercepcionNominaPeriodoMes($mes);
		$query1 = $this->Reportes_nomina_Model->getAllConceptosDeduccionNominaPeriodoMes($mes);
		$query2 = $this->Reportes_nomina_Model->getAllConceptosAportacionNominaPeriodoMes($mes);
		if ($query != false) {

            $result['resultado'] = true;
            $result['percepciones'] = $query;
            $result['deducciones'] = $query1;
            $result['aportaciones'] = $query2;

        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);
	}

}

/* End of file Reportes_nomina_ctrl.php */
/* Location: ./application/controllers/Reportes_nomina_ctrl.php */