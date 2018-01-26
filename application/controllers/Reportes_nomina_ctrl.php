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

	//********************************************************************************
	//SE CALCULA EL TOTAL DE LOS CONSEPTOS DE LA NÓMINA SELECCIONADA
	//********************************************************************************
	public function reporteNominaPorConcepto(){
		ob_start();
		$id_nomina = $this->input->post("id_nomina");
        $tipo = 0;
        $mes= 2;
        $anio = 2018;
		$conceptosPercepciones = $this->input->post("percepcion");
		$conceptosDeducciones = $this->input->post("deduccion");
		$conceptosAportaciones = $this->input->post("aportacion");
		
        //**********************************************************************************
        //       PDF
        //**********************************************************************************
        $this->load->library('m_pdf');
        $mpdf = new \Mpdf\Mpdf([
        'mode' => 'utf-8',
        'margin_top' => 36
        // 'margin_bottom' => 25,
        // 'margin_header' => 16,
        // 'margin_footer' => 13
        ]);
        /**************************************** Hoja de estilos ****************************************************/
        //$stylesheet = file_get_contents('assets/css/pdf/pdf.css');
        $stylesheet = file_get_contents('assets/css/bootstrap.min.css');
        $mpdf->WriteHTML($stylesheet, 1); 
        /******************************************** head pdf ******************************************************/
        // $data['header_pdf'] = $this->Nomina_model->datos_empleado_nomina($id_empleado, $id_nomina);
        $data['header_pdf'] = $this->Reportes_nomina_Model->informacionNomina($id_nomina);
        $head               = $this->load->view('admin/nomina/reportes/pdfTotalPorConcepto/header', $data, true);
        $mpdf->SetHTMLHeader($head);
        // /***************************************** contenido pdf ****************************************************/
        $data2["totalesPercepciones"] = $this->Reportes_nomina_Model->sumaPorConceptoPercepcion($id_nomina, $conceptosPercepciones,$tipo,$mes,$anio);
		$data2["totalesDeducciones"] = $this->Reportes_nomina_Model->sumaPorConceptoDeducciones($id_nomina, $conceptosDeducciones,$tipo,$mes,$anio);
		$data2["totalesAportaciones"] = $this->Reportes_nomina_Model->sumaPorConceptoAportacion($id_nomina, $conceptosAportaciones,$tipo,$mes,$anio);
        $data2['header_pdf'] = $data['header_pdf'];
        $html = $this->load->view('admin/nomina/reportes/pdfTotalPorConcepto/contenido', $data2, true);
        //**************************************** footer 1 ********************************************************
        $data3['pie_pagina'] = "";
        $footer = $this->load->view('admin/nomina/reportes/pdfTotalPorConcepto/footer', $data3, true);
        $mpdf->SetHTMLFooter($footer);

        /****************************************** imprmir pagina ********************************************************/
        $mpdf->WriteHTML($html);
        //$mpdf->AddPage();
        ob_clean();
        $mpdf->Output('Nomina_ordinaria.pdf', "I");
        //**********************************************************************************
        //    FIN   PDF
        //**********************************************************************************
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