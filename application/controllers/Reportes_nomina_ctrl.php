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
		
        $reporteExcel = 1; //Si la  variables es igual a 1 entonces se va a imprimir excel
        //**********************************************************************************
        //       PDF
        //**********************************************************************************
        $this->load->library('m_pdf');
        if ($reporteExcel != 1) {
            if ($componenteRp == -1) {
                $mpdf = new \Mpdf\Mpdf([
                'mode' => 'utf-8',
                'margin_top' => 40,
                //'format' => [279.4, 215.9], 
                'format' => [216,350], 
                'orientation' => 'L'
                // 'margin_bottom' => 25,
                // 'margin_header' => 16,
                // 'margin_footer' => 13
                ]);
            }else{
                $mpdf = new \Mpdf\Mpdf([
                'mode' => 'utf-8',
                'margin_top' => 45
                ]);
            }
        }

        if ($reporteExcel != 1) {
            /**************************************** Hoja de estilos ****************************************************/
            //$stylesheet = file_get_contents('assets/css/pdf/pdf.css');
            $stylesheet = file_get_contents('assets/css/bootstrap.min.css');
            $mpdf->WriteHTML($stylesheet, 1); 
        }
        /******************************************** head pdf ******************************************************/
        //SI el $componenteRp == -1 SE VA A HACER UN REPORTE DONDE SE ENGLOBA TODOS LOS COMPONENTES
        //SI $tipo == 0 EL REPORTE SERÁ POR MES
        if ($componenteRp == -1 & $tipo == 0) {
           $nombre_reporte = "REPORTE POR COMPONENTES";
           $data['header_pdf1']['mes'] = $mes;
           $data['header_pdf1']['anio'] = $anio."<br>".$nombre_reporte;
        //SI el $componenteRp == -1 SE VA A HACER UN REPORTE DONDE SE ENGLOBA TODOS LOS COMPONENTES
        //SI $tipo == 1 EL REPORTE SERÁ POR QUINCENA
        }else if ($componenteRp == -1 & $tipo == 1) {
            $data['header_pdf'] = $this->Reportes_nomina_Model->informacionNomina($id_nomina);
            $data['header_pdf_comp'] = "REPORTE POR COMPONENTES";
        //SI el $componenteRp es mayor que 0 SE VA A HACER UN REPORTE INDIVIDUAL POR COMPONENTE
        //SI $tipo == 0 EL REPORTE SERÁ POR MES
        }else if ($componenteRp > 0 & $tipo == 0) {
           $comp = $this->Reportes_nomina_Model->getComponenteIndividual($componenteRp);
           $data['header_pdf1']['mes'] = $mes;
           $data['header_pdf1']['anio'] = $anio."<br>".$comp[0]->nombre;
        //SI el $componenteRp es mayor que 0 SE VA A HACER UN REPORTE INDIVIDUAL POR COMPONENTE
        //SI $tipo == 1 EL REPORTE SERÁ POR QUINCENA
        }else if ($componenteRp > 0 & $tipo == 1) {
            $comp = $this->Reportes_nomina_Model->getComponenteIndividual($componenteRp);
            $data['header_pdf'] = $this->Reportes_nomina_Model->informacionNomina($id_nomina);
            $data['header_pdf_comp'] = $comp[0]->nombre;
        //NO SE TOMAN EN CUENTA LOS COMPONENTES
        //SI $tipo == 0 EL REPORTE SERÁ POR MES
        //DE LO CONTRARIO EL REPORTE SE HARÁ POR QUINCENA SIN TOMAR EN CUENTA LOS COMPONENTES
        }else if ($tipo == 0) {
           $data['header_pdf1']['mes'] = $mes;
           $data['header_pdf1']['anio'] = $anio;
        }else{
            $data['header_pdf'] = $this->Reportes_nomina_Model->informacionNomina($id_nomina);
        }

        if ($reporteExcel != 1) {
            $head               = $this->load->view('admin/nomina/reportes/pdfTotalPorConcepto/header', $data, true);
            $mpdf->SetHTMLHeader($head);
        }
        
        // /***************************************** contenido pdf ****************************************************/
        if ($componenteRp == -1 & $tipo == 0) {
            $data2["componentes"] = $this->Reportes_nomina_Model->getComponentes();
            for ($i=0; $i < count($data2["componentes"]); $i++) {
                $id_comp =  $data2["componentes"][$i]->id_componente;
                $data2["totalesPercepciones"][$i] = $this->Reportes_nomina_Model->devengadoPorMesYComponentePercepcion($conceptosPercepciones,$mes,$anio,$id_comp);
                $data2["totalesDeducciones"][$i] = $this->Reportes_nomina_Model->devengadoPorMesYComponenteDeduccion($conceptosDeducciones,$mes,$anio,$id_comp);
                $data2["totalesAportaciones"][$i] = $this->Reportes_nomina_Model->devengadoPorMesYComponenteAportacion($conceptosAportaciones,$mes,$anio,$id_comp);
            }           
        }else if ($componenteRp == -1 & $tipo == 1) {
            $data2["componentes"] = $this->Reportes_nomina_Model->getComponentes();
            for ($i=0; $i < count($data2["componentes"]); $i++) {
            $id_comp =  $data2["componentes"][$i]->id_componente;
            $data2["totalesPercepciones"][$i] = $this->Reportes_nomina_Model->devengadoPorQuincenaYComponentePercepcion($conceptosPercepciones,$id_nomina,$id_comp);
            $data2["totalesDeducciones"][$i] = $this->Reportes_nomina_Model->devengadoPorQuincenaYComponenteDeduccion($conceptosDeducciones,$id_nomina,$id_comp);
            $data2["totalesAportaciones"][$i] = $this->Reportes_nomina_Model->devengadoPorQuincenaYComponenteAportacion($conceptosAportaciones,$id_nomina,$id_comp);
            } 
        }else if ($componenteRp > 0 & $tipo == 0) {
            $data2["totalesPercepciones"] = $this->Reportes_nomina_Model->devengadoPorMesYComponentePercepcion($conceptosPercepciones,$mes,$anio,$componenteRp);
            $data2["totalesDeducciones"] = $this->Reportes_nomina_Model->devengadoPorMesYComponenteDeduccion($conceptosDeducciones,$mes,$anio,$componenteRp);
            $data2["totalesAportaciones"] = $this->Reportes_nomina_Model->devengadoPorMesYComponenteAportacion($conceptosAportaciones,$mes,$anio,$componenteRp);
        }else if ($componenteRp > 0 & $tipo == 1){
            $data2["totalesPercepciones"] = $this->Reportes_nomina_Model->devengadoPorQuincenaYComponentePercepcion($conceptosPercepciones,$id_nomina,$componenteRp);
            $data2["totalesDeducciones"] = $this->Reportes_nomina_Model->devengadoPorQuincenaYComponenteDeduccion($conceptosDeducciones,$id_nomina,$componenteRp);
            $data2["totalesAportaciones"] = $this->Reportes_nomina_Model->devengadoPorQuincenaYComponenteAportacion($conceptosAportaciones,$id_nomina,$componenteRp);
        } else{
            $data2["totalesPercepciones"] = $this->Reportes_nomina_Model->sumaPorConceptoPercepcion($id_nomina, $conceptosPercepciones,$tipo,$mes,$anio);
    		$data2["totalesDeducciones"] = $this->Reportes_nomina_Model->sumaPorConceptoDeducciones($id_nomina, $conceptosDeducciones,$tipo,$mes,$anio);
    		$data2["totalesAportaciones"] = $this->Reportes_nomina_Model->sumaPorConceptoAportacion($id_nomina, $conceptosAportaciones,$tipo,$mes,$anio);
        }
        //$data2['header_pdf'] = $data['header_pdf'];

        if ($reporteExcel == 1) {
            $data2['reporteExcel'] = true;
            $this->load->view('admin/nomina/reportes/pdfTotalPorConcepto/contenidoHorizontal', $data2);
        }else if ($componenteRp == -1) {
            $html = $this->load->view('admin/nomina/reportes/pdfTotalPorConcepto/contenidoHorizontal', $data2, true);
        }else{
           $html = $this->load->view('admin/nomina/reportes/pdfTotalPorConcepto/contenido', $data2, true); 
        }

        if ($reporteExcel != 1) {
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

