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
             $datos["componentes"] = $this->Reportes_nomina_Model->getComponentes();    		
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
        $componenteRp = $this->input->post("inputComponente");
        $id_nomina = $this->input->post("id_nomina");
        $tipo = $this->input->post("tipo");
        $mes= $this->input->post("mess");
        $anio = $this->input->post("anio");
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
        if ($componenteRp > 0 & $tipo == 0) {
            $comp = $this->Reportes_nomina_Model->getComponenteIndividual($componenteRp);
           $data['header_pdf1']['mes'] = $mes;
           $data['header_pdf1']['anio'] = $anio."<br>".$comp[0]->nombre;
        }else if ($componenteRp > 0 & $tipo == 1) {
            $comp = $this->Reportes_nomina_Model->getComponenteIndividual($componenteRp);
            $data['header_pdf'] = $this->Reportes_nomina_Model->informacionNomina($id_nomina);
            $data['header_pdf_comp'] = $comp[0]->nombre;
        }else if ($tipo == 0) {
           $data['header_pdf1']['mes'] = $mes;
           $data['header_pdf1']['anio'] = $anio;
        }else{
            $data['header_pdf'] = $this->Reportes_nomina_Model->informacionNomina($id_nomina);
        }
        $head               = $this->load->view('admin/nomina/reportes/pdfTotalPorConcepto/header', $data, true);
        $mpdf->SetHTMLHeader($head);
        // /***************************************** contenido pdf ****************************************************/
        if ($componenteRp > 0 & $tipo == 0) {
            $data2["totalesPercepciones"] = $this->Reportes_nomina_Model->devengadoPorMesYComponentePercepcion($conceptosPercepciones,$mes,$anio,$componenteRp);
            $data2["totalesDeducciones"] = $this->Reportes_nomina_Model->devengadoPorMesYComponenteDeduccion($conceptosDeducciones,$mes,$anio,$componenteRp);
            $data2["totalesAportaciones"] = $this->Reportes_nomina_Model->devengadoPorMesYComponenteAportacion($conceptosAportaciones,$mes,$anio,$componenteRp);
        }else if ($componenteRp > 0 & $tipo == 1){
            $data2["totalesPercepciones"] = $this->Reportes_nomina_Model->devengadoPorQuincenaYComponentePercepcion($conceptosPercepciones,$id_nomina,$componenteRp);
            $data2["totalesDeducciones"] = $this->Reportes_nomina_Model->devengadoPorQuincenaYComponenteDeduccion($conceptosDeducciones,$id_nomina,$componenteRp);
            $data2["totalesAportaciones"] = $this->Reportes_nomina_Model->devengadoPorQuincenaYComponenteAportacion($conceptosAportaciones,$id_nomina,$componenteRp);
            // var_dump($data2["totalesAportaciones"]);
            // die();
        } else{
            $data2["totalesPercepciones"] = $this->Reportes_nomina_Model->sumaPorConceptoPercepcion($id_nomina, $conceptosPercepciones,$tipo,$mes,$anio);
            $data2["totalesDeducciones"] = $this->Reportes_nomina_Model->sumaPorConceptoDeducciones($id_nomina, $conceptosDeducciones,$tipo,$mes,$anio);
            $data2["totalesAportaciones"] = $this->Reportes_nomina_Model->sumaPorConceptoAportacion($id_nomina, $conceptosAportaciones,$tipo,$mes,$anio);
        }
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