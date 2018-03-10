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
        $reporteExcel = $this->input->post("reporteExcel");
		
        //$reporteExcel = 1; //Si la  variables es igual a 1 entonces se va a imprimir excel
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
        //SI el $componenteRp == -1 SE VA A HACER UN REPORTE DONDE SE ENGLOBAN TODOS LOS COMPONENTES
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
            $data2['headerExcel'] =  $data;
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
	//********************************************************************************
	//CONSULTA DE EMPLEADOS POR CONCEPTO ALL METTHOD
	//********************************************************************************
	public function consultaspd(){
		$this->load->view('global_view/header');
		$datos["years"] = $this->Reportes_nomina_Model->gelAllYear();
		$datos["componentes"] = $this->Reportes_nomina_Model->getComponentes();
		$this->load->view('admin/nomina/consultaPD', $datos);
		$this->load->view('global_view/foother');
	}
	public function getAllPerecepcionAjax(){

		$query = $this->Reportes_nomina_Model->getAllPercepciones();
		if ($query != false) {
			$result['resultado'] = true;
			$result['percepciones'] = $query;
		} else {
			$result['resultado'] = false;
		}
		echo json_encode($result);
	}
	public function getAllDeduccionAjax(){
		$query = $this->Reportes_nomina_Model->getAllDeducciones();
		if ($query != false) {
			$result['resultado'] = true;
			$result['deducciones'] = $query;
		} else {
			$result['resultado'] = false;
		}
		echo json_encode($result);
	}
	public function getAllAportacionesAjax(){
		$query = $this->Reportes_nomina_Model->getAllAportaciones();
		if ($query != false) {
			$result['resultado'] = true;
			$result['aportaciones'] = $query;
		} else {
			$result['resultado'] = false;
		}
		echo json_encode($result);
	}

	public function getAllEmpleadosConsultaAjax(){
		$fecha = $this->input->post('anio');
		$indicador = $this->input->post('indicador');
		$id_nomina = $this->input->post('id_nomina');
		$id_componente = $this->input->post('id_componente');
        if ($this->input->post('id_componente')){
            $query = $this->Reportes_nomina_Model->getAllEmployee($fecha,$indicador, $id_nomina, $id_componente);
        }else{
            $query = $this->Reportes_nomina_Model->getAllEmployeePercepcionTodos($fecha,$indicador, $id_nomina);
        }

		if ($query != false) {
			$result['resultado'] = true;
			$result['employees'] = $query;
		} else {
			$result['resultado'] = false;
		}
		echo json_encode($result);
	}
	public function getAllEmpleadosConsultaDeduccionAjax(){
		$fecha = $this->input->post('anio');
		$indicador = $this->input->post('indicador');
		$id_nomina = $this->input->post('id_nomina');
		$id_componente = $this->input->post('id_componente');
        if ($this->input->post('id_componente')){
		    $query = $this->Reportes_nomina_Model->getAllEmployeeDeduccion($fecha,$indicador, $id_nomina, $id_componente);
        }else{
            $query = $this->Reportes_nomina_Model->getAllEmployeeDeduccionTodos($fecha,$indicador, $id_nomina);
        }
		if ($query != false) {
			$result['resultado'] = true;
			$result['employees'] = $query;
		} else {
			$result['resultado'] = false;
		}
		echo json_encode($result);
	}
	public function getAllEmpleadosConsultaAportacionAjax(){
		$fecha = $this->input->post('anio');
		$indicador = $this->input->post('indicador');
		$id_nomina = $this->input->post('id_nomina');
		$id_componente = $this->input->post('id_componente');
		if ($this->input->post('id_componente')){
            $query = $this->Reportes_nomina_Model->getAllEmployeeAportacion($fecha,$indicador, $id_nomina, $id_componente);
        }else{
            $query = $this->Reportes_nomina_Model->getAllEmployeeAportacionTodo($fecha,$indicador, $id_nomina);
        }
		if ($query != false) {
			$result['resultado'] = true;
			$result['employees'] = $query;
		} else {
			$result['resultado'] = false;
		}
		echo json_encode($result);
	}
	public function getNameComponenteAjax(){
		$id_componente = $this->input->post('id_componente');
		$query = $this->Reportes_nomina_Model->getnameComponente($id_componente);

		if ($query != false) {
			$result['resultado'] = true;
			$result['nombreComponente'] = $query;
		} else {
			$result['resultado'] = false;
		}
		echo json_encode($result);
	}
	//********************************************************************************
	// FIN DE LOS METODOS PARA CONSULTA DE EMPLEADOS POR CONSULTA
	//********************************************************************************
    //*****************************************************************************************************
    //EMPLEADOS POR CONCEPTS
    //*****************************************************************************************************
    public function empleados_conceptos(){
            $this->load->view('global_view/header');    
            $datos["years"] = $this->Reportes_nomina_Model->gelAllYear();
            $datos["componentes"] = $this->Reportes_nomina_Model->getComponentes(); 
            $this->load->view('admin/nomina/empleados_por_conceptos', $datos);
            $this->load->view('global_view/foother');
    }
    //********************************************************************************
    //SE CALCULA EL TOTAL DE LOS CONSEPTOS DE LA NÓMINA SELECCIONADA
    //********************************************************************************
    public function reporteEmpleadosPorConcepto(){
        $id_nomina = $this->input->post("id_nomina");
        $tipo = $this->input->post("tipo");
        $mes= $this->input->post("mess");
        $anio = $this->input->post("anio");
        $componenteRp = $this->input->post("inputComponente");
        //SI TIPO = 1 ENTONCES EL REPORTE SE HARÁ POR QUINCENA
        //SI $componenteRp == 0 significa que no se toma en cuenta el componente
        if ($tipo == 1 & $componenteRp == 0) {
            //SE GENERA EL REPORTE POR QUINCENA SIN COMPONENTE
            $this->reporteSabanaPorQuincena($id_nomina);
        }else if($tipo == 0 & $componenteRp == 0){
            //SE GENERA EL REPORTE POR MES SIN COMPONENTE
            $this->reporteSabanaPorMes($mes,$anio);
        }else if ($tipo == 1 & $componenteRp > 0) {
            //SE GENERA EL REPORTE POR QUINCENA Y COMPONENTE
            $this->reporteSabanaPorQuincenaYComponente($id_nomina,$componenteRp);
        }else if ($tipo == 0 & $componenteRp > 0) {
            //SE GENERA EL REPORTE POR QUINCENA Y COMPONENTE
            $this->reporteSabanaPorMesYComponente($mes,$anio,$componenteRp);
        }
    }
    //********************************************************************************
    //SE GENERA EL REPORTE EN EXCEL POR DE TODOS LOS EMPLEADOS POR TODOS LOS CONCEPTOS
    //POR QUINCENA
    //********************************************************************************
    public function reporteSabanaPorQuincena($id_nomina){
        $empleadosEnNomina = $this->Reportes_nomina_Model->obtenerEmpleadosEnNomina($id_nomina);
        $nombresPercepcionesEnNomina = $this->Reportes_nomina_Model->obtenerNombrePerNomina($id_nomina);
        $nombresDeduccionesEnNomina = $this->Reportes_nomina_Model->obtenerNombreDedNomina($id_nomina);
        $nombresAportacionesEnNomina = $this->Reportes_nomina_Model->obtenerNombreAporNomina($id_nomina);
        //SE VALIDA QUE HAYAN EMPLEADOS EN LA NOMINA SELECCIONADA
        if ($empleadosEnNomina) {
            //SE OBTIENEN LOS DATOS DE LAS PERCEPCIONES DE LA NOMINA POR EMPLEADO
            foreach ($empleadosEnNomina as $key) {
                $percepciones[] = $this->Reportes_nomina_Model->obtnerPercepcionesPorEmpleado($id_nomina, $key->id_empleado);
            }
            //SE OBTIENEN LOS DATOS DE LAS DEDUCCIONES DE LA NÓMINA POR EMPLEADO
            foreach ($empleadosEnNomina as $key) {
                $deducciones[] = $this->Reportes_nomina_Model->obtnerDeduccionesPorEmpleado($id_nomina, $key->id_empleado);
            }
            //SE OBTIENEN LOS DATOS DE LAS APORTACIONES DE LA NÓMINA POR EMPLEADO
            foreach ($empleadosEnNomina as $key) {
                $aportaciones[] = $this->Reportes_nomina_Model->obtnerAportacionesPorEmpleado($id_nomina, $key->id_empleado);
            }
                $data["percepciones"] = $percepciones;
                $data["nombresPercepcionesEnNomina"] = $nombresPercepcionesEnNomina;
                $data["deducciones"] = $deducciones;
                $data["nombresDeduccionesEnNomina"] = $nombresDeduccionesEnNomina;
                $data["aportaciones"] = $aportaciones;
                $data["nombresAportacionesEnNomina"] = $nombresAportacionesEnNomina;
                $data["empleadosEnNomina"] = $empleadosEnNomina;
                $data["datosNomina"] = $this->Reportes_nomina_Model->informacionNomina($id_nomina);
                $data["quincena"] = true;
            $this->load->view('admin/nomina/reportes/pdf_AllEmploye_AllConceptos/contenido_excel',$data);
            
        }else{
            var_dump("No hay información en esta nómina");
        }
    }
    //********************************************************************************
    //SE GENERA EL REPORTE EN EXCEL POR DE TODOS LOS EMPLEADOS POR TODOS LOS CONCEPTOS
    //POR MES
    //********************************************************************************
    public function reporteSabanaPorMes($mes,$anio){
        $empleadosEnNomina = $this->Reportes_nomina_Model->obtenerEmpleadosEnNominaMensual($mes,$anio);
        $nombresPercepcionesEnNomina = $this->Reportes_nomina_Model->obtenerNombrePerNominaMensual($mes,$anio);
        $nombresDeduccionesEnNomina = $this->Reportes_nomina_Model->obtenerNombreDedNominaMensual($mes,$anio);
        $nombresAportacionesEnNomina = $this->Reportes_nomina_Model->obtenerNombreAporNominaMensual($mes,$anio);
        
            //SE VALIDA QUE HAYAN EMPLEADOS EN LA NOMINA SELECCIONADA
        if ($empleadosEnNomina) {
            //SE OBTIENEN LOS DATOS DE LAS PERCEPCIONES DE LA NOMINA POR EMPLEADO
            foreach ($empleadosEnNomina as $key) {
                $percepciones[] = $this->Reportes_nomina_Model->obtnerPercepcionesPorEmpleadoMensual($mes,$anio,$key->id_empleado);
            }
            //SE OBTIENEN LOS DATOS DE LAS DEDUCCIONES DE LA NÓMINA POR EMPLEADO
            foreach ($empleadosEnNomina as $key) {
                $deducciones[] = $this->Reportes_nomina_Model->obtnerDeduccionesPorEmpleadoMensual($mes,$anio, $key->id_empleado);
            }
            //SE OBTIENEN LOS DATOS DE LAS APORTACIONES DE LA NÓMINA POR EMPLEADO
            foreach ($empleadosEnNomina as $key) {
                $aportaciones[] = $this->Reportes_nomina_Model->obtnerAportacionesPorEmpleadoMensual($mes,$anio, $key->id_empleado);
            }
                $data["percepciones"] = $percepciones;
                $data["nombresPercepcionesEnNomina"] = $nombresPercepcionesEnNomina;
                $data["deducciones"] = $deducciones;
                $data["nombresDeduccionesEnNomina"] = $nombresDeduccionesEnNomina;
                $data["aportaciones"] = $aportaciones;
                $data["nombresAportacionesEnNomina"] = $nombresAportacionesEnNomina;
                $data["empleadosEnNomina"] = $empleadosEnNomina;
                $data["mes"] = $mes;
                $data["anio"] = $anio;
                $this->load->view('admin/nomina/reportes/pdf_AllEmploye_AllConceptos/contenido_excel',$data);
        }else{
            var_dump("No hay información en esta nómina");
        }
    }
    //********************************************************************************
    //SE GENERA EL REPORTE EN EXCEL POR DE TODOS LOS EMPLEADOS POR TODOS LOS CONCEPTOS
    //POR QUINCENA Y COMPONENTE
    //********************************************************************************
    public function reporteSabanaPorQuincenaYComponente($id_nomina,$id_componente){
        $empleadosEnNomina = $this->Reportes_nomina_Model->obtenerEmpleadosEnNominaQuincenaComponente($id_nomina,$id_componente);
        $nombresPercepcionesEnNomina = $this->Reportes_nomina_Model->obtenerNombrePerNominaQuincenaYcomponente($id_nomina,$id_componente);
        $nombresDeduccionesEnNomina = $this->Reportes_nomina_Model->obtenerNombreDedNominaQuincenaYcomponente($id_nomina,$id_componente);
        $nombresAportacionesEnNomina = $this->Reportes_nomina_Model->obtenerNombreAporNominaQuincenaYcomponente($id_nomina,$id_componente);

         //SE VALIDA QUE HAYAN EMPLEADOS EN LA NOMINA SELECCIONADA
        if ($empleadosEnNomina) {
            //SE OBTIENEN LOS DATOS DE LAS PERCEPCIONES DE LA NOMINA POR EMPLEADO
            foreach ($empleadosEnNomina as $key) {
                $percepciones[] = $this->Reportes_nomina_Model->obtnerPercepcionesPorEmpleadoQuincenaComponente($id_nomina,$id_componente, $key->id_empleado);
            }
            //SE OBTIENEN LOS DATOS DE LAS DEDUCCIONES DE LA NÓMINA POR EMPLEADO
            foreach ($empleadosEnNomina as $key) {
                $deducciones[] = $this->Reportes_nomina_Model->obtnerDeduccionesPorEmpleadoQuincenaComponente($id_nomina,$id_componente, $key->id_empleado);
            }
            //SE OBTIENEN LOS DATOS DE LAS APORTACIONES DE LA NÓMINA POR EMPLEADO
            foreach ($empleadosEnNomina as $key) {
                $aportaciones[] = $this->Reportes_nomina_Model->obtnerAportacionesPorEmpleadoQuincenaComponente($id_nomina,$id_componente, $key->id_empleado);
            }
                $comp = $this->Reportes_nomina_Model->getComponenteIndividual($id_componente);
                $data["percepciones"] = $percepciones;
                $data["nombresPercepcionesEnNomina"] = $nombresPercepcionesEnNomina;
                $data["deducciones"] = $deducciones;
                $data["nombresDeduccionesEnNomina"] = $nombresDeduccionesEnNomina;
                $data["aportaciones"] = $aportaciones;
                $data["nombresAportacionesEnNomina"] = $nombresAportacionesEnNomina;
                $data["empleadosEnNomina"] = $empleadosEnNomina;
                $data["datosNomina"] = $this->Reportes_nomina_Model->informacionNomina($id_nomina);
                $data["quincena"] = true;
                $data["componente"] =$comp[0]->nombre;
            $this->load->view('admin/nomina/reportes/pdf_AllEmploye_AllConceptos/contenido_excel',$data);
            
        }else{
            var_dump("No hay información en esta nómina");
        }
    }

    //********************************************************************************
    //SE GENERA EL REPORTE EN EXCEL POR DE TODOS LOS EMPLEADOS POR TODOS LOS CONCEPTOS
    //POR MES Y COMPONENTE
    //********************************************************************************
    public function reporteSabanaPorMesYComponente($mes,$anio,$id_componente){
        $empleadosEnNomina = $this->Reportes_nomina_Model->obtenerEmpleadosEnNominaMensualCompoente($mes,$anio,$id_componente);
        $nombresPercepcionesEnNomina = $this->Reportes_nomina_Model->obtenerNombrePerNominaMensualComponente($mes,$anio,$id_componente);
        $nombresDeduccionesEnNomina = $this->Reportes_nomina_Model->obtenerNombreDedNominaMensualComponente($mes,$anio,$id_componente);
        $nombresAportacionesEnNomina = $this->Reportes_nomina_Model->obtenerNombreAporNominaMensualComponente($mes,$anio,$id_componente);
        
         //SE VALIDA QUE HAYAN EMPLEADOS EN LA NOMINA SELECCIONADA
        if ($empleadosEnNomina) {
            //SE OBTIENEN LOS DATOS DE LAS PERCEPCIONES DE LA NOMINA POR EMPLEADO
            foreach ($empleadosEnNomina as $key) {
                $percepciones[] = $this->Reportes_nomina_Model-> obtnerPercepcionesPorEmpleadoMensualComponente($mes,$anio,$id_componente, $key->id_empleado);
            }
            //SE OBTIENEN LOS DATOS DE LAS DEDUCCIONES DE LA NÓMINA POR EMPLEADO
            foreach ($empleadosEnNomina as $key) {
                $deducciones[] = $this->Reportes_nomina_Model->obtnerDeduccionesPorEmpleadoMensualComponente($mes,$anio,$id_componente, $key->id_empleado);
            }
            //SE OBTIENEN LOS DATOS DE LAS APORTACIONES DE LA NÓMINA POR EMPLEADO
            foreach ($empleadosEnNomina as $key) {
                $aportaciones[] = $this->Reportes_nomina_Model->obtnerAportacionesPorEmpleadoMensualComponente($mes,$anio,$id_componente, $key->id_empleado);
            }
                $comp = $this->Reportes_nomina_Model->getComponenteIndividual($id_componente);
                $data["percepciones"] = $percepciones;
                $data["nombresPercepcionesEnNomina"] = $nombresPercepcionesEnNomina;
                $data["deducciones"] = $deducciones;
                $data["nombresDeduccionesEnNomina"] = $nombresDeduccionesEnNomina;
                $data["aportaciones"] = $aportaciones;
                $data["nombresAportacionesEnNomina"] = $nombresAportacionesEnNomina;
                $data["empleadosEnNomina"] = $empleadosEnNomina;
                $data["componente"] =$comp[0]->nombre;
                $data["mes"] = $mes;
                $data["anio"] = $anio;
            $this->load->view('admin/nomina/reportes/pdf_AllEmploye_AllConceptos/contenido_excel',$data);
            
        }else{
            var_dump("No hay información en esta nómina");
        }
    }
}

