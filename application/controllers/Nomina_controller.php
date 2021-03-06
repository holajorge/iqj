<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nomina_controller extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        // $this->load->library('bcrypt');
        $this->load->model('Nomina_model');
        $this->load->model('Empleado_model');
        $this->load->helper('url');
    }

    public function getAll(){
		$query = $this->Nomina_model->getAll();

		if ($query != false) {
            $result['resultado'] = true;
            $result['periodo_nomina'] = $query;
        } else {
            $result['resultado'] = false;
        }

        echo json_encode($result);
	}

    //SE OBTIENE LA LISTA DE NOMINAS EXTRAORDINARIAS POR AÑO SELECCIONADO
    public function listNomEporAnio(){
        $anio = $this->input->post("anio_nomina");
        $query = $this->Nomina_model->getNomEAnioSeleccionado($anio);
        if ($query != false) {
            $result['resultado'] = true;
            $result['periodosNomE'] = $query;
        } else {
            $result['resultado'] = false;
        }

        echo json_encode($result);
    }

    public function periodos(){

        $dato['active'] = "nomina";
        $dato['active1'] = "periodos";
        $data['periodos'] = $this->Nomina_model->getAllPeriodos();
        $this->load->view('global_view/header',$dato);
        $this->load->view('admin/nomina/periodos', $data);
        $this->load->view('global_view/alert_procesando');
        $this->load->view('global_view/foother');
    }

    public function extraordinario(){

        $dato['active'] = "nomina";
        $dato['active1'] = "extraordinario";
        $data['years'] = $this->Nomina_model->gelAllYearsNomE();
        $data["tipoConceptoExtraordinario"] = $this->Nomina_model->gelAllCextraordinarios();
        $this->load->view('global_view/header',$dato);
        $this->load->view('admin/nomina/extraordinario', $data);
        $this->load->view('global_view/foother');

    }

    public function getConceptosExtraordinarios(){

       $query = $this->Nomina_model->getAllPeriodosExtraordinario();

        if ($query != false) {
            $result['resultado'] = true;
            $result['conseptoExtra'] = $query;

        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);
    }

    public function create_extraordinaria(){
        
            $dato['active'] = "nomina";
            $dato['active1'] = "alta_nomina_extradinaria";      
            $query["empleados"] = $this->Empleado_model->get_lista_empleados();  
            $query["extraordinarios"] = $this->Nomina_model->gelAllCX();
            $query["tipoConceptoExtraordinario"] = $this->Nomina_model->gelAllCextraordinarios();
            $query["yearsNominaE"] = $this->Nomina_model->gelAllYearsNomE();       
            $this->load->view('global_view/header', $dato);
            $this->load->view('admin/nomina/alta_extraudinaria', $query);
            $this->load->view('global_view/alert_procesando');
            $this->load->view('global_view/foother');
    }
    public function buscar_periodo(){

        $id_nomina = $this->input->post("id");

        $query = $this->Nomina_model->buscar_periodo($id_nomina);
        $tipoUsuario =  $this->session->userdata('tipo_usuario');
        if ($query != false) {
            $result['resultado'] = true;
            $result['empleado'] = $query;
            $result['usertype'] = $tipoUsuario;
        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);
    }

    public function print_list_employee(){
        ob_start();
         $id_nomina = $_GET["id"];
        //**********************************************************************************
        //       PDF
        //**********************************************************************************
        $this->load->library('m_pdf');
        $mpdf = new \Mpdf\Mpdf([
        'mode' => 'utf-8',
        'margin_top' => 40,
        'format' => 'A4-L'
        // 'margin_bottom' => 25,
        // 'margin_header' => 16,
        // 'margin_footer' => 13
        ]);
        // $mpdf->AddPage('L');
        /**************************************** Hoja de estilos ****************************************************/
        //$stylesheet = file_get_contents('assets/css/pdf/pdf.css');
        $stylesheet = file_get_contents('assets/css/bootstrap.min.css');
        $mpdf->WriteHTML($stylesheet, 1); 
        /******************************************** head pdf ******************************************************/
        $data['header_pdf'] = $this->Nomina_model->datos_lista_empleado($id_nomina);
        $head               = $this->load->view('admin/nomina/pdf/pdf_det_lista_totales/header', $data, true);
        $mpdf->SetHTMLHeader($head);
        // /***************************************** contenido pdf ****************************************************/
        $data2["listaPeriodoTotales"] = $this->Nomina_model->buscar_periodoList($id_nomina);   
        // $data2['header_pdf'] = $data['header_pdf'];
        $html = $this->load->view('admin/nomina/pdf/pdf_det_lista_totales/contenido', $data2, true);
        //**************************************** footer 1 ********************************************************
        $data3['pie_pagina'] = "";
        $footer = $this->load->view('admin/nomina/pdf/pdf_det_lista_totales/footer', $data3, true);
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

    public function buscar_diasExtraordinarios(){

        $id_nomina = $this->input->post("id");
        $query = $this->Nomina_model->seach_diaExtraordinario($id_nomina);
        $tipoUsuario =  $this->session->userdata('tipo_usuario');
        if ($query != false) {
            $result['resultado'] = true;
            $result['empleado'] = $query;
            $result['usertype'] = $tipoUsuario;
        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);
    }

	public function detalle_nomina(){
        $rfc = $this->input->post("rfc");
        $query["empleados"] = $this->Empleado_model->get_lista_empleados();  
		$dato['active'] = "nomina";
		$dato['active1'] = "alta_nomina";
        $showScript['NominaJs'] = true;
        $this->load->view('global_view/header',$dato);
		$this->load->view('admin/nomina/detalle_nomina',$query);
        $this->load->view('global_view/alert_procesando');
		$this->load->view('global_view/foother',$showScript);
	}

    public function editar(){
        $id_empleado = $this->input->get("id_emp");
        $id_nomina = $this->input->get("id_nom");
        $dato['active'] = "nomina";
        $dato['active1'] = "alta_nomina";

        $data["id_empleado"] = $id_empleado;
        $data["id_nomina"] = $id_nomina;
        $data['empleado'] = $this->Nomina_model->datos_empleado_nomina($id_empleado, $id_nomina);
        $data["periodos"] = $this->Nomina_model->getAllPeriodos();
        $data["percepciones"] = $this->Nomina_model->percepciones_nomina($id_empleado, $id_nomina);
        $data['deducciones'] = $this->Nomina_model->deducciones_nomina($id_empleado, $id_nomina);
        $data['aportaciones'] = $this->Nomina_model->aportaciones_nomina($id_empleado, $id_nomina);
        $showScript['editarNominaJs'] = true;
        $this->load->view('global_view/header',$dato);
        $this->load->view('admin/nomina/editar',$data);
        $this->load->view('global_view/alert_procesando');
        $this->load->view('global_view/foother',$showScript);
    }
	public function create_conceptoExtra(){
		$inputFecha = $this->input->post("fecha");
        $porcionesFecha = explode("-", $inputFecha);
        $anio = $porcionesFecha[0];
        $concepExtra = array(
            'fecha' => $this->input->post("fecha"), 
            'nombre' => $this->input->post('nombre'),
            'tipoConcepto' => $this->input->post('tipoConcepto')
        );

		$this->Nomina_model->insertConceptoExtraoridinario($concepExtra);
        $query = $this->Nomina_model->getNomEAnioSeleccionado($anio);   
        $yearsNominaE = $this->Nomina_model->gelAllYearsNomE();
		if ($query != false) {
            $result['resultado'] = true;
            $result["extraordinarios"] = $query;
            $result["yearsNominaE"] = $yearsNominaE;
            $result["year"] = $anio;
        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);

	}

    public function getNominaExSeleccionadoPorAnio(){
        $anio = $this->input->post("anio");
        $query = $this->Nomina_model->getNomEAnioSeleccionado($anio);
        if ($query != false) {
            $result['resultado'] = true;
            $result["extraordinarios"] = $query;
        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);
    }

    public function getDataEditNomE(){
        $anio = $this->input->post("anio");
        $query = $this->Nomina_model->getNomEAnioSeleccionado($anio);
        $queryYear = $this->Nomina_model->gelAllYearsNomE();
        if ($query != false) {
            $result['resultado'] = true;
            $result["extraordinarios"] = $query;
            $result["yearsNomE"] = $queryYear;
        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);
    }

    public function createNominaExtraordinaria(){
        $nominaExtraordinaria = array(
            'id_empleado'  => $this->input->post("id"), 
            'id_nomina_e'  => $this->input->post("dia"),
            'importeExento'      => $this->input->post("importeExento"),
            'importeGravado'      => $this->input->post("importeGravado"),  
            'isrSubsidio'  => $this->input->post("isrSubsidio"), 
            'importeIsrSub'=> $this->input->post("impSubsidioIsr")

        );
        
        $query = $this->Nomina_model->insertNominaExtraordinaria($nominaExtraordinaria);
        if ($query == 1) {
            $result['resultado'] = true;
        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);  
    }

    public function editNominaExtraordinaria(){
        $id_extraordinario = $this->input->post("idExtra");
        $editNominaExtraordinaria = array(
            'id_empleado'  => $this->input->post("idEmpleado"), 
            'id_nomina_e'  => $this->input->post("dia"),
            'importeExento'      => $this->input->post("importeExento"),
            'importeGravado'      => $this->input->post("importeGravado"),  
            'isrSubsidio'  => $this->input->post("isrSubsidio"), 
            'importeIsrSub'=> $this->input->post("impSubsidioIsr")
        );
         
        $query = $this->Nomina_model->editNominaExtraordinaria($id_extraordinario,$editNominaExtraordinaria);
        if ($query == 1) {
            $result['resultado'] = true;
        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);  

    }

    public function guardar_detalle_nomina(){
        $id_nomina = $this->input->post("id_nomina");
        $id_empleado = $this->input->post("id_empleado");
        $data_percepciones = $this->input->post("data_percepciones");
        $data_deducciones = $this->input->post("data_deducciones");
        $data_aportaciones = $this->input->post("data_aportaciones");

        //SE GUARDAN LAS PERCEPCIONES
        $query_per = $this->Nomina_model->guardar_percepciones_nomina($id_nomina,$id_empleado,$data_percepciones);

        $query_ded = $this->Nomina_model->guardar_deducciones_nomina($id_nomina,$id_empleado,$data_deducciones);

        if (count($data_aportaciones) > 0) {
           $query_apor = $this->Nomina_model->guardar_aportaciones_nomina($id_nomina,$id_empleado,$data_aportaciones);
        }
        

        if ($query_per) {
            $result['resultado'] = true;
            $result['data_per'] = "LOS DATOS SE GUARDARON CORRECTAMENTE";
            // $result['data_per'] = $data_percepciones[0]["importe"];
        } else {
            $result['resultado'] = false;
        }

        echo json_encode($result);
    }
    // ****************************************************************************************
    //IMPRIMIR NÓMINA EN PDF POR EMPLEADO
    // ****************************************************************************************
    public function editar_detalle_nomina(){
        $id_nomina_editando = $this->input->post("id_nomina_editando");
        $id_nomina_nueva = $this->input->post("id_nomina");
        $id_empleado = $this->input->post("id_empleado");
        $data_percepciones = $this->input->post("data_percepciones");
        $data_deducciones = $this->input->post("data_deducciones");
        $data_aportaciones = $this->input->post("data_aportaciones");

        $this->Nomina_model->eliminarPercepciones($id_empleado, $id_nomina_editando);
        $this->Nomina_model->eliminarDeducciones($id_empleado, $id_nomina_editando);
        $this->Nomina_model->eliminarAportaciones($id_empleado, $id_nomina_editando);
       
        //SE GUARDAN LAS PERCEPCIONES
        $query_per = $this->Nomina_model->guardar_percepciones_nomina($id_nomina_nueva,$id_empleado,$data_percepciones);
        //SE GUARDAN LAS DEDUCCIONES
        $query_ded = $this->Nomina_model->guardar_deducciones_nomina($id_nomina_nueva,$id_empleado,$data_deducciones);
        //SE GUARDAN LAS APORTACIONES
        if (count($data_aportaciones) > 0) {
           $query_apor = $this->Nomina_model->guardar_aportaciones_nomina($id_nomina_nueva,$id_empleado,$data_aportaciones);
        }
        


        if ($query_per) {
            $result['resultado'] = true;
            $result['data_per'] = "LOS DATOS SE GUARDARON CORRECTAMENTE";
            // $result['data_per'] = $data_percepciones[0]["importe"];
        } else {
            $result['resultado'] = false;
        }

        echo json_encode($result);
    }

    public function save_pdf()
    { 
        //load mPDF library
        $this->load->library('m_pdf'); 
        //now pass the data//
        //$data['mobiledata'] = $this->pdf->mobileList();
        //$html=$this->load->view('pdf/pdf',$data, true); //load the pdf.php by passing our data and get all data in $html varriable.
        $pdfFilePath ="webpreparations-".time().".pdf";     
        //actually, you can pass mPDF parameter on this load() function
        $pdf = $this->m_pdf->load();
        //generate the PDF!
        $stylesheet = '<style>'.file_get_contents('assets/css/bootstrap.min.css').'</style>';
        // apply external css
        $pdf->WriteHTML($stylesheet,1);
        $pdf->WriteHTML($html,2);
        //offer it to user via browser download! (The PDF won't be saved on your server HDD)
        $pdf->Output($pdfFilePath, "D");
        exit;
    }
    // ****************************************************************************************
    //IMPRIMIR NÓMINA EN PDF POR EMPLEADO
    // ****************************************************************************************
    public function pdf_por_empleado(){
         ob_start();
         $id_empleado = $_GET["id_emp"];
         $id_nomina = $_GET["id_nom"];
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
        $data['header_pdf'] = $this->Nomina_model->datos_empleado_nomina($id_empleado, $id_nomina);
        $head               = $this->load->view('admin/nomina/pdf/pdf_det_nomina/header', $data, true);
        $mpdf->SetHTMLHeader($head);
        // /***************************************** contenido pdf ****************************************************/
        $data2["percepciones"] = $this->Nomina_model->percepciones_nomina($id_empleado, $id_nomina);
        $data2['deducciones'] = $this->Nomina_model->deducciones_nomina($id_empleado, $id_nomina);
        $data2['aportaciones'] = $this->Nomina_model->aportaciones_nomina($id_empleado, $id_nomina);
        $data2['header_pdf'] = $data['header_pdf'];
        $html = $this->load->view('admin/nomina/pdf/pdf_det_nomina/contenido', $data2, true);
        //**************************************** footer 1 ********************************************************
        $data3['pie_pagina'] = "";
        $footer = $this->load->view('admin/nomina/pdf/pdf_det_nomina/footer', $data3, true);
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

    public function pdf_por_empleadoExtraordinario(){

        ob_start();
         $id_empleado = $_GET["id_emp"];
         $id_concepto_extraordinario = $_GET["id_nom"];         

        //**********************************************************************************
        //       PDF
        //**********************************************************************************
        $this->load->library('m_pdf');
        $mpdf = new \Mpdf\Mpdf([
        'mode' => 'utf-8',
        'margin_top' => 36
        ]);        /**************************************** Hoja de estilos ****************************************************/
        //$stylesheet = file_get_contents('assets/css/pdf/pdf.css');
        $stylesheet = file_get_contents('assets/css/bootstrap.min.css');
        $mpdf->WriteHTML($stylesheet, 1); 
        /******************************************** head pdf ******************************************************/
        $data['header_pdf'] = $this->Nomina_model->datos_empleado_nomina_extraordinaria($id_empleado, $id_concepto_extraordinario);
        $head               = $this->load->view('admin/nomina/pdf/pdf_det_extraordinaria/header', $data, true);
        $mpdf->SetHTMLHeader($head);
        // /***************************************** contenido pdf ****************************************************/
        $data2['header_pdf']=$data['header_pdf'];
        $data2["detalles"] = $this->Nomina_model->extraordinaria_nomina($id_empleado, $id_concepto_extraordinario);
        $html = $this->load->view('admin/nomina/pdf/pdf_det_extraordinaria/contenido', $data2, true);
        //**************************************** footer 1 ********************************************************
        //$data3['DatosLabEstudio'] = $this->recepcion_model->DatosLaboratoristaEstudio($dato);
        $data3['DatosLabEstudio'] = "";
        $footer = $this->load->view('admin/nomina/pdf/pdf_det_extraordinaria/footer', $data3, true);
        $mpdf->SetHTMLFooter($footer);
        /****************************************** imprmir pagina ********************************************************/
        $mpdf->WriteHTML($html);
        ob_clean();
        $mpdf->Output('Resultados.pdf', "I");
    }

    // ****************************************************************************************
    //SE VALIDA QUE EL EMPLEADO NO SE PUEDA DAR DE ALTA EN EL MISMO PERIODO
    //QUINQUENAL MAS DE UNA VEZ
    // ****************************************************************************************
    public function validar_empleado_nomina(){
       $id_empleado = $this->input->post("id_empleado");
       $id_nomina = $this->input->post("id_nomina");

       $query = $this->Nomina_model->datos_empleado_nomina($id_empleado, $id_nomina);
       if ($query) {
            $result['resultado'] = true;
            $result["data"] = $query;
        } else {
            $result['resultado'] = false;
        }

        echo json_encode($result);
    }

    // ****************************************************************************************
    //SE OBTIENEN LOS DATOS DE LA ÚLTIMA NÓMINA DEL EMPLEADO
    // ****************************************************************************************

    public function datosDeNomina(){
        $id_empleado = $this->input->post("id_empleado");
        $data["percepciones"] = $this->Nomina_model->getLastNominaPercepciones($id_empleado);
        $id_nomina = $data["percepciones"][0]->id_nomina;
        $data['deducciones'] = $this->Nomina_model->deducciones_nomina($id_empleado, $id_nomina);
        $data['aportaciones'] = $this->Nomina_model->aportaciones_nomina($id_empleado, $id_nomina);

        if ($data["percepciones"]) {
            $result['resultado'] = true;
            $result["data"] = $data;
        } else {
            $result['resultado'] = false;
        }

        echo json_encode($result);
        
    }
    // ****************************************************************************************
    //SE VALIDA QUE EL EMPLEADO NO PUEDA DARSE DE ALTA EN LA MISMA NÓMINA EXTRAORDINARIA
    // ****************************************************************************************
    public function validarEmpEnNominaEx(){
        $id_empleado = $this->input->post("id_empleado");
        $id_nomina_e = $this->input->post("id_nom_ex");

        $data['empEnNominaEx'] = $this->Nomina_model->validarNoDuplicidadNomE($id_empleado, $id_nomina_e);
        $query = $this->Nomina_model->getInfoNomE($id_nomina_e);
        if ($data['empEnNominaEx']) {
            $result['resultado'] = true;
        } else {
            $result['resultado'] = false;
            $result['infoNomE'] = $query;
        }

        echo json_encode($result);
    }

    public function verificaExisteTimbre(){
        //SE VALIDA QUE EXISTAN LOS DATOS REQUERIODOS PARA EL TIMBRADO EN LA URL METODO GET
        if (isset($_GET["id_emp"]) & isset($_GET["id_nom"]) & isset($_GET["origenR"])) {
            $id_empleado = $_GET["id_emp"];
            $id_nomina = $_GET["id_nom"];
            $origen_recurso = $_GET["origenR"];
            //SE VALIDA QUE LOS DATOS NO ESTEN VACIOS
            if ( ($id_empleado != "") & ($id_nomina != "") & ($origen_recurso != "") ) {
                //SE VERIFICA QUE NO SE HAYA TIMBRADO LA NÓMINA PREVIAMENTE
                $queryExisteTimbre = $this->Nomina_model->verificarNominaTimbrada($id_empleado,$id_nomina);
                if (($queryExisteTimbre == false)) {
                    $this->timbrarNomina($id_empleado,$id_nomina,$origen_recurso);
                }else{
                    $data['heading'] = "ERROR LA NÓMINA YA HA SIDO TIMBRADA";
                    $data['message'] = "PARA VER EL ARCHIVO XML Y PDF ENTRE AL MÓDULO nomina->ordinaria Y SELECCIONE EL PERIODO QUINQUENAL CORRESPONDIENTE";
                    $this->load->view('errors/validation/msj_validation_error', $data);
                }
            }else{
                $data['heading'] = "ERROR EN DATOS";
                $data['message'] = "LOS DATOS CAPTURADOS NO DEBEN ESTAR VACIOS <br> CIERRE ESTA VENTANA Y VUELVA A REALIZAR EL TIMBRADO DESDE EL INICIO";
                $this->load->view('errors/validation/msj_validation_error', $data);
            }
        }else{
            $data['heading'] = "ERROR EN DATOS";
            $data['message'] = "FALTAN DATOS PARA REALIZAR EL TIMBRADO <br> CIERRE ESTA VENTANA Y VUELVA A REALIZAR EL TIMBRADO DESDE EL INICIO";
            $this->load->view('errors/validation/msj_validation_error', $data);
        }
        
    }

    public function timbrarNomina($id_emp,$id_nom,$origen_recurso){

        error_reporting(0);
        $id_empleado = $id_emp;
        $id_nomina = $id_nom;  

        $OrigenRecurso = $origen_recurso;
        //---------------------------------------------------------------------------------------------
        //---------------------------------------------------------------------------------------------
        //SE REALIZAN LAS CONSULTAS A LA BASE DE DATOS Y SE VERIFICA QUE NO HAYAN ERRORES PARA
        //CONTINUAR CON EL TIMBRADO
        $empleado = $this->Nomina_model->datos_empleado_nomina($id_empleado, $id_nomina);
        $percepciones = $this->Nomina_model->percepciones_nomina($id_empleado, $id_nomina);
        $deducciones = $this->Nomina_model->deducciones_nomina($id_empleado, $id_nomina);
        $data2['aportaciones'] = $this->Nomina_model->aportaciones_nomina($id_empleado, $id_nomina);
        //---------------------------------------------------------------------------------------------
        //---------------------------------------------------------------------------------------------
        //SE CREA LA HORA Y FECHA DE EXPEDICIÓN
        //SE CREA EL NOMBRE DEL ARCHIVO XML Y PDF
        $fecha_expedicion = date('Y-m-d\TH:i:s', time() - ((60 * (60 * 7)) + 120) ); //SE CALCULA LA FECHA Y HORA DE CHETUMAL
        $nombreArchivoXML = "cfdi_".$empleado[0]->rfc."_P".$empleado[0]->periodo_quinquenal."_".str_replace(':', '-', $fecha_expedicion);
        //---------------------------------------------------------------------------------------------
        //---------------------------------------------------------------------------------------------
        //SE AGREGAN LOS DATOS DE LA NOMINA TIMBRADA A LA BASE DE DATOS
        $query = $this->Nomina_model->insertTimbradoFile($id_empleado, $id_nomina, $nombreArchivoXML, "");
        //---------------------------------------------------------------------------------------------
        //SE CALCULA EL TOTAL DE PERCEPCIONES
        $totalPer = 0;
        foreach ($percepciones as $per) {
            $totalPer += $per->importe;
        }
        //---------------------------------------------------------------------------------------------
        //---------------------------------------------------------------------------------------------
        //SE CALCULA EL TOTAL DE LAS DEDUCCIONES
        $totalDed = 0;
        $TotalOtrasDed = 0;
        $TotalImpuestosReten = 0;
        foreach ($deducciones as $ded) {
            $totalDed += $ded->importe;
            if ($ded->id_deduccion == 1) {
               $TotalImpuestosReten = $ded->importe;
            }else{
                $TotalOtrasDed += $ded->importe;
            }
        }
        //---------------------------------------------------------------------------------------------
        //---------------------------------------------------------------------------------------------
        //Se verifica que si existe compenzación para agregar el nodo de otros pagos
        $compenzacion = false;
        $importeCompenzacion = 0;
        $impComp = 0;
        foreach ($data2['aportaciones'] as $apor) {
            if ($apor->id_aportacion == 9) {
                $compenzacion = true; 
                $impComp = $apor->importe;
                $importeCompenzacion = 0;
            }
        }
        //---------------------------------------------------------------------------------------------
        //---------------------------------------------------------------------------------------------
        //SE CALCULA EL TOTAL DE DÍAS PAGADOS
        //$diasPagados = $this->calcularDiasPagados($empleado[0]->periodo_inicio,$empleado[0]->periodo_fin) + 1;
          $diasPagados = 15;
        //---------------------------------------------------------------------------------------------
        //---------------------------------------------------------------------------------------------
        //SE CALCULA EL TotalGravado
        $totalGravado =  $this->calcularTotalParaFormula($percepciones,4);
        //---------------------------------------------------------------------------------------------
        //---------------------------------------------------------------------------------------------
        //SE CALCULA EL SalarioDiarioIntegrado
        $SalarioDiarioIntegrado =  $this->calcularTotalParaFormula($percepciones,5) / $diasPagados;
        //---------------------------------------------------------------------------------------------
        //---------------------------------------------------------------------------------------------
        //SE CALCULAN LOS TOTALES DE LAS PERCEPCIONES
        //NOM197-TotalSueldos, debe existir. Ya que la clave expresada en TipoPercepcion es distinta de 022, 023, 025, 039 y 044.
        $array = array("022", "023", "025", "039" , "044");
        $existeTotalSueldos = false;
        $totalSueldos = 0;

        $arrayPerSeparacion = array("022", "023", "025");
        $existeSeparacion = false;
        $TotalSeparacionIndemnizacion = 0;

        $arrayJubilacionPR = array("039", "044");
        $existeJubilacionPR = false;
        $totalJubilacionPensionRetiro = 0;

        $arrayTotalUnaExhibicion = array("039");
        $existeTotalUnaExhibicion = false;
        $totalUnaExhibicion = 0;

        $arrayTotalUnaExhibicion044 = array("044");
        $existeTotalUnaExhibicion044 = false;
        $totalUnaExhibicion044 = 0;

        $x = 0;
        foreach ($percepciones as $percepcion) {
            $clavePer = $percepcion->codigoSat;
            //--------------------------------------------------------------------------------------------
            //NOM197-TotalSueldos, debe existir. Ya que la clave expresada en TipoPercepcion es distinta de 022, 023, 025, 039 y 044.
            if (!in_array($clavePer, $array)) {
                $existeTotalSueldos = true;
                $totalSueldos += $percepcion->importe;
            }
            //--------------------------------------------------------------------------------------------
            /*Si se registraron las claves tipo percepción "022" (Prima por Antigüedad), "023" (Pagos
            por separación), "025" (Indemnizaciones), debe existir el campo
            TotalSeparacionIndemnizacion y la información de los datos de
            SeparacionIndemnizacion.*/
            if (in_array($clavePer, $arrayPerSeparacion)) {
                $TotalSeparacionIndemnizacion += $percepcion->importe; 
                $existeSeparacion = true;
            }
            //--------------------------------------------------------------------------------------------
            /*Si se registraron las claves tipo percepción "039" (Jubilaciones, pensiones o haberes de
            retiro en una exhibición) y "044" (Jubilaciones, pensiones o haberes de retiro en
            parcialidades), debe existir el campo TotalJubilacionPensionRetiro y la información de
            los datos de JubilacionPensionRetiro.*/
            if (in_array($clavePer, $arrayJubilacionPR)) {
                $totalJubilacionPensionRetiro += $percepcion->importe; 
                $existeJubilacionPR = true;
            }
            //---------------------------------------------------------------------------------------------
            /*Si se registró la CLAVE TipoPercepcion '039' (Jubilaciones, pensiones o haberes de retiro
            en una exhibición) debe existir el campo TotalUnaExhibicion y no deben existir los
            campos TotalParcialidad, MontoDiario*/
            if (in_array($clavePer, $arrayTotalUnaExhibicion)) {
                $totalUnaExhibicion += $percepcion->importe; 
                $existeTotalUnaExhibicion = true;
            }
            //---------------------------------------------------------------------------------------------
            /*Si se registró la clave TipoPercepcion "044" (Jubilaciones, pensiones o haberes de retiro
            en parcialidades) no debe existir el campo TotalUnaExhibicion y deben existir los
            campos TotalParcialidad, MontoDiario.*/
            if (in_array($clavePer, $arrayTotalUnaExhibicion044)) {
                $totalUnaExhibicion044 += $percepcion->importe; 
                $existeTotalUnaExhibicion044 = true;
            }


        }
        //---------------------------------------------------------------------------------------------
        //----------------------------------------------------------------------------------------------
        //SE CALCULA EL TOTAL DE LAS PERCEPCIONES
        $totalPercepciones = $totalSueldos + $TotalSeparacionIndemnizacion + $totalJubilacionPensionRetiro;
        date_default_timezone_set('America/Cancun');

        require_once('./assets/cfdi/sdk2.php');

                // Se especifica el modulo para calculos automaticos
        //$datos['modulos_pre'] = 'calculos_auto';

        $datos['complemento'] = 'nomina12';

        $datos['version_cfdi'] = '3.3';
        $datos['cfdi']='./assets/cfdi/timbrados/xml/'.$nombreArchivoXML.".xml";
        $datos['xml_debug']='./assets/cfdi/timbrados/xml/debug_'.$nombreArchivoXML.".xml";

        $datos['PAC']['usuario'] = 'DEMO700101XXX';
        $datos['PAC']['pass'] = 'DEMO700101XXX';
        $datos['PAC']['produccion'] = 'NO';

        $datos['conf']['cer'] = './assets/cfdi/certificados/lan7008173r5.cer.pem';
        $datos['conf']['key'] = './assets/cfdi/certificados/lan7008173r5.key.pem';
        $datos['conf']['pass'] = '12345678a';
        $datos['factura']['Descuento'] = number_format(($totalDed), 2, '.', '');
        $datos['factura']['fecha_expedicion'] = $fecha_expedicion;
        $folioQuery = $this->Nomina_model->totalTimbresFolio();
        if ($folioQuery) {
             $folioN = intval($folioQuery[0]->totalTimbres);
         }else{
            $folioN = 1;
         }
        $datos['factura']['folio'] = $folioN;
        $datos['factura']['forma_pago'] = '99'; //99 = por definir
        $datos['factura']['LugarExpedicion'] = '77000';
        $datos['factura']['metodo_pago'] = 'PUE'; // Pago en una sola exhibición
        $datos['factura']['moneda'] = 'MXN';
        $datos['factura']['serie'] = $empleado[0]->no_empleado."-".$folioN; //Es el número de serie que utiliza el contribuyente para control interno de su información. 
        $datos['factura']['subtotal'] = number_format(($totalPer), 2, '.', '');
        //$datos['factura']['tipocambio'] = '1.0'; //Este campo no debe existir. 
        $datos['factura']['tipocomprobante'] = 'N';
        $datos['factura']['total'] = number_format(($totalPer - $totalDed), 2, '.', '');

        /*$datos['CfdisRelacionados']['TipoRelacion'] = '01';
        $datos['CfdisRelacionados']['UUID'][0]='A39DA66B-52CA-49E3-879B-5C05185B0EF7';*/

        //$datos['factura']['Confirmacion'] = '0234';
        $datos['factura']['RegimenFiscal'] = '603'; //Personas Morales con Fines no Lucrativos


        //$datos['emisor']['rfc'] = 'IQJ1706288Z7'; //RFC DEL IQJ
/**/    $datos['emisor']['rfc'] = 'LAN7008173R5';
        $datos['emisor']['nombre'] = 'INSTITUTO QUINTANARROENSE DE LA JUVENTUD';  // EMPRESA DE PRUEBA
        //Se puede registrar la CURP del empleador (emisor) del comprobante de nómina cuando 
        //se trate de una persona física.
        //En el caso de personas morales, éstas no cuentan con CURP, por lo tanto no se debe
        //registrar información en este campo.

        $datos['receptor']['rfc'] = $empleado[0]->rfc;
        $datos['receptor']['nombre'] = $empleado[0]->empleado." ".$empleado[0]->ap_paterno." ".$empleado[0]->ap_materno;
        //$datos['receptor']['ResidenciaFiscal'] = 'MEX';
        //$datos['receptor']['NumRegIdTrib'] = '1234567890';
        $datos['receptor']['UsoCFDI'] = 'P01'; //"P01 = POR DEFINIR"

        $datos['conceptos'][0]['cantidad'] = '1';
        $datos['conceptos'][0]['descripcion'] = "Pago de nómina";
        $datos['conceptos'][0]['valorunitario'] = number_format(($totalPercepciones + $importeCompenzacion), 2, '.', ''); //Se debe registrar la suma de los campos TotalPercepciones más TotalOtrosPagos del Complemento Nómina
        //$datos['conceptos'][0]['importe'] = number_format(($totalPercepciones + $importeCompenzacion), 2, '.', ''); //Se debe registrar la suma de los campos TotalPercepciones más TotalOtrosPagos del Complemento Nómina
        $datos['conceptos'][0]['importe'] = number_format(($totalPercepciones + $importeCompenzacion), 2, '.', ''); //Se debe registrar la suma de los campos TotalPercepciones más TotalOtrosPagos del Complemento Nómina
        $datos['conceptos'][0]['ClaveUnidad'] = 'ACT';
        $datos['conceptos'][0]['ClaveProdServ'] = '84111505';
        $datos['conceptos'][0]['Descuento'] = number_format(($totalDed), 2, '.', '');

        // Obligatorios
        $datos['nomina12']['TipoNomina'] = 'O'; //O = ORDINARIA - E = EXTRAORDINARIA
        $datos['nomina12']['FechaPago'] = $empleado[0]->periodo_fin;
        $datos['nomina12']['FechaInicialPago'] = $empleado[0]->periodo_inicio;
        $datos['nomina12']['FechaFinalPago'] = $empleado[0]->periodo_fin;
        $datos['nomina12']['NumDiasPagados'] = $diasPagados;

        // Opcionales
        $datos['nomina12']['TotalPercepciones'] = number_format(($totalPercepciones), 2, '.', '');
        $datos['nomina12']['TotalDeducciones'] = number_format(($totalDed), 2, '.', '');
        //En caso de existir compenzación debe existir el campo TotalOtrosPagos
        if ($compenzacion) {
 /*-*/      //$datos['nomina12']['TotalOtrosPagos'] = number_format(($impComp), 2, '.', ''); 
        }


        // SUB NODOS OPCIONALES DE NOMINA [Emisor, Percepciones, Deducciones, OtrosPagos, Incapacidades]
        // Nodo Emisor, OPCIONALES
        $datos['nomina12']['Emisor']['RegistroPatronal'] = 'Y5560015453'; //Por excepción, este dato no aplica cuando el empleador realice el pago a contribuyentes asimilados a salarios
 /*-*/  //$datos['nomina12']['Emisor']['RfcPatronOrigen'] = 'AAA010101AAA'; // VERIFICAR
//-----------------------------------------------------------------------------------------
        //NODO: EntidadSNCF;
/*-*/   //$datos['nomina12']['Emisor']['EntidadSNCF']['OrigenRecurso'] = $OrigenRecurso;

        if ($OrigenRecurso == "IM" ) {
            $datos['nomina12']['Emisor']['EntidadSNCF']['MontoRecursoPropio'] =number_format(($MontoRecursoPropio), 2, '.', ''); 
        }
//------------------------------------------------------------------------------------------
        // SUB NODOS OBLIGATORIOS DE NOMINA [Receptor]
        // Obligatorios de Receptor
        $datos['nomina12']['Receptor']['ClaveEntFed'] = 'ROO';
        $datos['nomina12']['Receptor']['Curp'] = $empleado[0]->curp;
        $datos['nomina12']['Receptor']['NumEmpleado'] = $empleado[0]->no_empleado;
        $datos['nomina12']['Receptor']['Departamento'] = $empleado[0]->depto;
        $datos['nomina12']['Receptor']['PeriodicidadPago'] = '04'; //CLAVE 04 = QUINCENAL
        $datos['nomina12']['Receptor']['TipoContrato'] = '01'; // 01 = Contrato de trabajo por tiempo indeterminado
        $datos['nomina12']['Receptor']['Sindicalizado'] = $empleado[0]->sindicalizado;
        $datos['nomina12']['Receptor']['TipoRegimen'] = '02'; // 02 = sueldos
        $datos['nomina12']['Receptor']['TipoJornada'] = '01'; // 01 = diurna

        // Opcionales de Receptor
       
        $datos['nomina12']['Receptor']['Antiguedad'] = $this->calcularAntiguedad($empleado[0]->fecha_ingreso,$empleado[0]->periodo_fin); //VERIFICAR ------------- w = semanas Por excepción, este dato no aplica cuando ...
        $datos['nomina12']['Receptor']['Banco'] = '014'; // 014 = SANTANDER VERIFICAR -------------
        $datos['nomina12']['Receptor']['CuentaBancaria'] = $empleado[0]->no_tarjeta; //leer abajo
        /*Si el valor de este campo contiene una cuenta CLABE (18 posiciones), no debe existir el
        campo Banco, este dato será objeto de validación por el SAT o el proveedor de
        certificación de CFDI, se debe confirmar que el dígito de control es correcto.*/
        $datos['nomina12']['Receptor']['FechaInicioRelLaboral'] = $empleado[0]->fecha_ingreso; // Por excepción, este dato no aplica cuando el empleador realice el pago a contribuyentes asimilados a salarios
        $datos['nomina12']['Receptor']['NumSeguridadSocial'] = $empleado[0]->nss;
        $datos['nomina12']['Receptor']['Puesto'] = $empleado[0]->puesto;
        $datos['nomina12']['Receptor']['RiesgoPuesto'] = '1'; // 1 = clase I  Por excepción, este dato no aplica cuando el empleador realice el pago a contribuyentes asimilados a salarios
        //$datos['nomina12']['Receptor']['SalarioBaseCotApor'] = '435.50';
        $datos['nomina12']['Receptor']['SalarioDiarioIntegrado'] = number_format((round($SalarioDiarioIntegrado, 2)), 2, '.', '');

        // NODO PERCEPCIONES
        // Totales Obligatorios
        $datos['nomina12']['Percepciones']['TotalGravado'] =  number_format(($totalGravado), 2, '.', ''); 
        $datos['nomina12']['Percepciones']['TotalExento'] =  number_format(($totalPercepciones - $totalGravado), 2, '.', '');

        $x = 0;
        $totImpgravado = 0;
        $totImpExento = 0;
        foreach ($percepciones as $percepcion) {
            $clavePer = $percepcion->codigoSat;
            $codigoPercepcion = $percepcion->indicador;
            // Agregar Percepciones (Todos obligatorios)
            $datos['nomina12']['Percepciones'][$x]['TipoPercepcion'] = $clavePer;
            $datos['nomina12']['Percepciones'][$x]['Clave'] = $codigoPercepcion; //VERIFICAR
            $datos['nomina12']['Percepciones'][$x]['Concepto'] = $percepcion->nombre;
            //SE VERIFICA QUE EL CONCEPTO SEA GRAVADO O EXCENTO
            $importeGravado = $this->verificarSiGravadoOexcento($percepcion->formula);
            if ($importeGravado) {
                $totImpgravado += $percepcion->importe;;
               $datos['nomina12']['Percepciones'][$x]['ImporteGravado'] =number_format(($percepcion->importe), 2, '.', ''); 
               $datos['nomina12']['Percepciones'][$x]['ImporteExento'] = "0.00";
            }else{
                $totImpExento += $percepcion->importe;
                $datos['nomina12']['Percepciones'][$x]['ImporteGravado'] = "0.00";
                $datos['nomina12']['Percepciones'][$x]['ImporteExento'] = number_format(($percepcion->importe), 2, '.', '');  // VERIFICAR -----
            }
            $x++;
        }
        //NODO OTROS PAGOS
        if ($compenzacion) {
           $datos['nomina12']['SubsidioAlEmpleo']['SubsidioCausado'] = number_format(($impComp), 2, '.', ''); 
           $datos['nomina12']['OtroPago'][0]['Clave'] = "002"; // 002 = Subsidio para el empleo (efectivamente entregado al trabajador).
           $datos['nomina12']['OtroPago'][0]['Concepto'] = "Subsidio Al Empleo";
           $datos['nomina12']['OtroPago'][0]['Importe'] = number_format(($impComp), 2, '.', '');
           $datos['nomina12']['OtroPago'][0]['TipoOtroPago'] = "002";

        }
        // Totales Opcionales
        if ($existeTotalSueldos) {
            $datos['nomina12']['Percepciones']['TotalSueldos'] = number_format(($totalSueldos), 2, '.', '');
        }
        //Nodo:SeparacionIndemnizacion
        if ($existeSeparacion) {
            $datos['nomina12']['Percepciones']['TotalSeparacionIndemnizacion'] =number_format(($TotalSeparacionIndemnizacion), 2, '.', ''); 
        }

        if ($existeJubilacionPR) {
            $datos['nomina12']['Percepciones']['TotalJubilacionPensionRetiro'] =number_format(($totalJubilacionPensionRetiro), 2, '.', ''); 
        }

        if ($existeTotalUnaExhibicion) {
            $datos['nomina12']['JubilacionPensionRetiro']['TotalUnaExhibicion'] =number_format(($totalUnaExhibicion), 2, '.', ''); 
        }

        
        if ($existeTotalUnaExhibicion044) {
            $datos['nomina12']['JubilacionPensionRetiro']['TotalUnaExhibicion'] =number_format(($totalUnaExhibicion), 2, '.', ''); 
        }

        // Acciones o Titulos en Percepciones (Todos obligatorios)
        //$datos['nomina12']['Percepciones'][3]['AccionesOTitulos']['ValorMercado'] = '1000.00'; //En este nodo se pueden expresar los ingresos por acciones o titulos valor que representen bienes. 
                                                                                            // Es requerido cuando existan ingresos por sueldos derivados de adquisición de acciones o títulos (Artículo 94, fracción VII LISR)
        //$datos['nomina12']['Percepciones'][3]['AccionesOTitulos']['PrecioAlOtorgarse'] = '2000.00';

        // NODO DEDUCCIONES
        $datos['nomina12']['Deducciones']['TotalOtrasDeducciones'] = number_format(($TotalOtrasDed), 2, '.', ''); // Opcional
        //SE VALIDA QUE EL EMPLEADO TENGA ISR
        if (!$compenzacion) {
            $datos['nomina12']['Deducciones']['TotalImpuestosRetenidos'] = number_format(($TotalImpuestosReten), 2, '.', ''); // Opcional
        }

        $j = 0;
        foreach ($deducciones as $deduccion) {
            $datos['nomina12']['Deducciones'][$j]['TipoDeduccion'] = $deduccion->codigoSat;
            $datos['nomina12']['Deducciones'][$j]['Clave'] = $deduccion->indicador;
            $datos['nomina12']['Deducciones'][$j]['Concepto'] = $deduccion->nombre;
            $datos['nomina12']['Deducciones'][$j]['Importe'] = number_format(($deduccion->importe), 2, '.', ''); 
            $j++;
        }

        
        
        $res = mf_genera_cfdi($datos);

        ///////////    MOSTRAR RESULTADOS DEL ARRAY $res   ///////////
        
        //echo "<h1>Respuesta Generar XML y Timbrado</h1>";
        foreach($res AS $variable=>$valor)
        {
            $valor=htmlentities($valor);
            $valor=str_replace('&lt;br/&gt;','<br/>',$valor);
            //echo "<b>[$variable]=</b>$valor<hr>";
        }
        //print_r($res);
        $codigoError = $res['codigo_mf_numero'];

        if ($codigoError == 0) {
            //SE LEEN LOS DATOS QUE DEVUELVE EL TIMBRADO DEL CFDI Y SE GUARDA EN UNA VARIABLE (ARRAY)
            $timbreOrdinaria = true;
            $dataCFDI = $this->leer($res,true,"timbrados",null,null,$timbreOrdinaria);
            //SE AGREGAN LOS DATOS DE LA NOMINA TIMBRADA A LA BASE DE DATOS
            $query = $this->Nomina_model->updateTimbradoFile($id_empleado, $id_nomina, $dataCFDI['cadenaOriginalComplemtoSAT']);
            //SE IMPRIME EL PDF CON LOS DATOS DEL CFDI TIMBRADO
            $this->pdfCFDI($dataCFDI, $id_empleado, $id_nomina,$nombreArchivoXML, true);
        }else if ($codigoError == 2){
            $query = $this->Nomina_model->deleteTimbradoFile($id_empleado, $id_nomina);
            $data['heading'] = "¡ERROR!";
            $data['message'] = $res['codigo_mf_texto'];
            $this->load->view('errors/validation/msj_validation_error', $data);
        }else{
            $query = $this->Nomina_model->deleteTimbradoFile($id_empleado, $id_nomina);
            $data['heading'] = "¡ERROR!";
            $data['message'] = $codigoError." ".$res['codigo_mf_texto'];
            $this->load->view('errors/validation/msj_validation_error', $data);
        }
             
    }

    //La fn leer recibe 5 parametos
    //1 $data Son los datos de la respuesta del timbrado del PAC
    //O es el nombre del archivo xml que se va a procesar
    //2 $xmlTimbre es una varible booleana, sirve para saber si se
    //va a procesar un xml de la respuesta del PAC
    //o un xml que ya esta guardado en el servidor
    //3 $nombreFolder es el nombre del folder donde se encuentra el archivo
    //xml que se va a procesar para diferenciar los xml de la nómina 
    //ordinaria y extraordinaria
    public function leer($data,$xmlTimbre,$nombreFolder,$id_empleado,$id_nomina,$timbreOrdinaria){
        // Si $xmlTimbre = TRUE entonces se va a procesar un archivo xml del PAC
        if ($xmlTimbre) {
            $xmlCFDI = $data['cfdi']; //Este es el xml que devuelve la respuesta del CFDI
            $xml = new SimpleXMLElement ($xmlCFDI);
        }else{
            $pathXML = "./assets/cfdi/".$nombreFolder."/xml/".$data;
            $xml        = new SimpleXMLElement ($pathXML,null,true);
        }
        //Se agrega el Namespace del nodo tfd para que se pueda acceder a su información
        $ns = $xml->getNamespaces(true);
        $xml->registerXPathNamespace('t', $ns['tfd']);

        //Se obtienen todas las precepciones que devuelve el xml del timbrado de la nómina 
          foreach ($xml->xpath('//nomina12:Percepcion') as $percepcion){  // SECCION EMISOR
               $percepciones[] = array('TipoPercepcion' => $percepcion['TipoPercepcion'],
                               'Clave' => $percepcion['Clave'],
                               'Concepto' => $percepcion['Concepto'],
                               'ImporteGravado' => $percepcion['ImporteGravado'],
                               'ImporteExento' => $percepcion['ImporteExento']);
        }
        //Se obtienen todas las deducciones que devuelve el xml del timbrado de la nómina 
          foreach ($xml->xpath('//nomina12:Deduccion') as $deduccion){  // SECCION EMISOR
               $deducciones[] = array('TipoDeduccion' => $deduccion['TipoPercepcion'],
                               'Clave' => $deduccion['Clave'],
                               'Concepto' => $deduccion['Concepto'],
                               'Importe' => $deduccion['Importe']); 
          }
          //Se obtiene el total de las percepciones que devuelve el xml del timbrado de la nómina 
          foreach ($xml->xpath('//nomina12:Percepciones') as $total){  // SECCION EMISOR
               $totalPercepciones = array('TotalSueldos' => $total['TotalSueldos'],
                               'TotalGravado' => $total['TotalGravado'],
                               'TotalExento' => $total['TotalExento']); 
          }
          //Se obtiene el total de las deducciones que devuelve el xml del timbrado de la nómina 
          foreach ($xml->xpath('//nomina12:Deducciones') as $total){  // SECCION EMISOR
               $totalDeducciones = array('TotalImpuestosRetenidos' => $total['TotalImpuestosRetenidos'], //Es la suma del impuesto sobre la renta retenido, es decir, donde la clave de tipo de deducción sea 002 (ISR). dato en este campo.
                               'TotalOtrasDeducciones' => $total['TotalOtrasDeducciones']); //Se puede registrar el total de las deducciones (descuentos) aplicables al trabajador, sin considerar la clave de tipo deducción 002 (ISR). 
    
          }
          //Se obtien el total de las PERCEPCIONES y las DEDUCCIONES y en general datos de la nómina
          foreach ($xml->xpath('//nomina12:Nomina') as $Nomina){  // SECCION EMISOR
               $datosNomina = array('Version' => $Nomina['Version'], //Es la suma del impuesto sobre la renta retenido, es decir, donde la clave de tipo de deducción sea 002 (ISR). dato en este campo.
                               'TipoNomina' => $Nomina['TipoNomina'],
                               'FechaPago' => $Nomina['FechaPago'],
                               'FechaInicialPago' => $Nomina['FechaInicialPago'],
                               'FechaFinalPago' => $Nomina['FechaFinalPago'],
                               'NumDiasPagados' => $Nomina['NumDiasPagados'],
                               'TotalPercepciones' => $Nomina['TotalPercepciones'],
                               'TotalDeducciones' => $Nomina['TotalDeducciones']); //Se puede registrar el total de las deducciones (descuentos) aplicables al trabajador, sin considerar la clave de tipo deducción 002 (ISR). 
          }

          //Se obtiene la fecha de expedición 
          foreach ($xml->xpath('//cfdi:Comprobante') as $Fecha){  // SECCION EMISOR
               $fecha_expedicion = $Fecha['Fecha']; 
    
          }
          //Se obtiene el FOLIO del cfdi 
          foreach ($xml->xpath('//cfdi:Comprobante') as $Folio){  // SECCION EMISOR
               $folioN = $Folio['Folio']; 
    
          }
//--------------------------------------------------------------------------------------------          
          //Se obtiene el Serie del Certificado del Emisor: 
          foreach ($xml->xpath('//cfdi:Comprobante') as $NoCertificado){  // SECCION EMISOR
               $representacion_impresa_certificado_no = $NoCertificado['NoCertificado']; 
    
          }
           //Se obtiene el Folio Fiscal: 
          foreach ($xml->xpath('//t:TimbreFiscalDigital') as $UUID){  // SECCION EMISOR
               $folioFiscalUuid = $UUID['UUID']; 
    
          }
          //No. de Serie del Certificado del SAT: 
          foreach ($xml->xpath('//t:TimbreFiscalDigital') as $NoCertificadoSAT){  // SECCION EMISOR
               $representacion_impresa_certificadoSAT = $NoCertificadoSAT['NoCertificadoSAT']; 
    
          }
          //Se obtiene la Fecha y Hora de Certificación: 
          foreach ($xml->xpath('//t:TimbreFiscalDigital') as $FechaTimbrado){  // SECCION EMISOR
               $representacion_impresa_fecha_timbrado = $FechaTimbrado['FechaTimbrado']; 
    
          }
          //Se obtiene el Sello digital del CFDI 
          foreach ($xml->xpath('//t:TimbreFiscalDigital') as $SelloCFD){  // SECCION EMISOR
               $selloDigitalCFDI = $SelloCFD['SelloCFD']; 
    
          }
          //Se obtiene el Sello del SAT
          foreach ($xml->xpath('//t:TimbreFiscalDigital') as $SelloSAT){  // SECCION EMISOR
               $selloDelSAT = $SelloSAT['SelloSAT']; 
    
          } 
            
          //$selloDigitalCFDI = $data['representacion_impresa_sello'];
          //$selloDelSAT = $data['representacion_impresa_selloSAT'];
          if ($xmlTimbre) {
              $cadenaOriginalComplemtoSAT = $data['representacion_impresa_cadena'];
          }else if ($timbreOrdinaria) {
              $RepIcadenaSat = $this->Nomina_model->getNameFile($id_nomina,$id_empleado);
              $cadenaOriginalComplemtoSAT = $RepIcadenaSat[0]->cadenaOriginalComplemtoSAT;
          }else{
              $RepIcadenaSat = $this->Nomina_model->getNameFileNomE($id_nomina,$id_empleado);
              $cadenaOriginalComplemtoSAT = $RepIcadenaSat[0]->cadenaOriginalComplemtoSAT;
          }
          
          //$representacion_impresa_certificado_no = $data['representacion_impresa_certificado_no'];
          //$folioFiscalUuid = $data['uuid'];
          //$representacion_impresa_certificadoSAT = $data['representacion_impresa_certificadoSAT'];
          //$representacion_impresa_fecha_timbrado = $data['representacion_impresa_fecha_timbrado'];
    
          $dataCFDI = array('percepciones' => $percepciones,
                            'deducciones' => $deducciones,
                            'totalPercepciones' =>$totalPercepciones,
                            'totalDeducciones' =>$totalDeducciones,
                            'datosNomina' => $datosNomina,
                            'selloDigitalCFDI'=> $selloDigitalCFDI,
                            'selloDelSAT' => $selloDelSAT,
                            'cadenaOriginalComplemtoSAT' => $cadenaOriginalComplemtoSAT,
                            'representacion_impresa_certificado_no' => $representacion_impresa_certificado_no,
                            'folioFiscalUuid' => $folioFiscalUuid,
                            'representacion_impresa_certificadoSAT' => $representacion_impresa_certificadoSAT,
                            'representacion_impresa_fecha_timbrado' => $representacion_impresa_fecha_timbrado,
                            'fecha_expedicion' => $fecha_expedicion,
                            'folioN' => $folioN
                            );
        return $dataCFDI; 
    }

    public function pdfCFDI($dataCFDI,$id_empleado, $id_nomina,$nombreArchivoXML,$outputPdf){
        ob_start();
        //**********************************************************************************
        //       PDF
        //**********************************************************************************
        $this->load->library('m_pdf');
        $mpdf = new \Mpdf\Mpdf([
        'mode' => 'utf-8',
        'margin_top' => 42
        // 'margin_bottom' => 25,
        // 'margin_header' => 16,
        // 'margin_footer' => 13
        ]);
        /**************************************** Hoja de estilos ****************************************************/
        //$stylesheet = file_get_contents('assets/css/pdf/pdf.css');
        $stylesheet = file_get_contents('assets/css/bootstrap.min.css');
        $mpdf->WriteHTML($stylesheet, 1); 
        /******************************************** head pdf ******************************************************/
        $data['header_pdf'] = $this->Nomina_model->datos_empleado_nomina($id_empleado, $id_nomina);
        $data['folioN'] = $dataCFDI['folioN'];
        $head               = $this->load->view('admin/nomina/pdf/pdf_cfdi_ordinaria/header', $data, true);
        $mpdf->SetHTMLHeader($head);
        // /***************************************** contenido pdf ****************************************************/
        // $data2["percepciones"] = $this->Nomina_model->percepciones_nomina($id_empleado, $id_nomina);
        // $data2['deducciones'] = $this->Nomina_model->deducciones_nomina($id_empleado, $id_nomina);
        // $data2['aportaciones'] = $this->Nomina_model->aportaciones_nomina($id_empleado, $id_nomina);
        $data2['header_pdf'] = $data['header_pdf'];
        $data2['aportaciones'] = $this->Nomina_model->aportaciones_nomina($id_empleado, $id_nomina);
        $data2['dataCFDI'] = $dataCFDI;
        $data2['nombreArchivoXML'] = $nombreArchivoXML;
        $data2['fecha_expedicion'] = $dataCFDI['fecha_expedicion'];
        $html = $this->load->view('admin/nomina/pdf/pdf_cfdi_ordinaria/contenido', $data2, true);
        //**************************************** footer 1 ********************************************************
        $data3['pie_pagina'] = "";
        $footer = $this->load->view('admin/nomina/pdf/pdf_cfdi_ordinaria/footer', $data3, true);
        $mpdf->SetHTMLFooter($footer);

        /****************************************** imprmir pagina ********************************************************/
        $mpdf->WriteHTML($html);
        //$mpdf->AddPage();
        ob_clean();
        $extencion = ".pdf";
        $mpdf->Output('./assets/cfdi/timbrados/pdf/'.$nombreArchivoXML.$extencion, 'F');
        if ($outputPdf) {
            $mpdf->Output($nombreArchivoXML.pdf, 'I');
        }		
        //**********************************************************************************
        //    FIN   PDF
        //**********************************************************************************
    }

    public function calcularDiasPagados($fInicial,$fFinal){
        date_default_timezone_set('America/Cancun');
        $date1 = new DateTime($fInicial);
        $date2 = new DateTime($fFinal);
        $diff = $date1->diff($date2);
        
        return $diff->days;
    }

    public function calcularAntiguedad($fInicioLaboral,$fPago){
        date_default_timezone_set('America/Cancun');
        //$fInicioLaboral = "2018-01-15";
        $hoy = getdate();
        //$fechaHoy = $hoy['year']."-".$hoy['mon']."-".$hoy['mday'];
        //$fechaHoy = "2018-02-01";
        
        $date1 = new DateTime($fInicioLaboral);
        $date2 = new DateTime($fPago);
        $fecha = $date1->diff($date2);
        $tiempo = "P";
            //años
        if($fecha->y > 0)
        {
            $tiempo .= $fecha->y;
            $tiempo .= "Y";

        }
             
        //meses
        if($fecha->m > 0)
        {
            //Si el mes es igual a 1 y el año es igual a 0 y los días es igual a 0, entonces la cantidad de meses se pondrá en días     
            if(($fecha->m == 1) & ($fecha->y == 0) & ($fecha->d == 0)){
                
                $diasMesActual = cal_days_in_month(CAL_GREGORIAN,$hoy['mon'], $hoy['year']);
                $diasMesAnterior = cal_days_in_month(CAL_GREGORIAN,intval(($hoy['mon']) - 1), $hoy['year']);

                $porciones = explode("-", $fInicioLaboral);
                $diaInicioLaboral = $porciones[2];
                $diaActual = $hoy['mday'];
                $restoMes1 = $diasMesAnterior - $diaInicioLaboral;
                $restoMes2 = $diaActual;

                $totslDias = $restoMes1 + $restoMes2;
                $tiempo .= $totslDias;
                $tiempo .= "D";

            }else if(($fecha->m > 1) & ($fecha->y == 0) & ($fecha->d == 0)){
                $tiempo .= ($fecha->m * 4);
                $tiempo .= "W";
            }else {
                $tiempo .= $fecha->m;
                $tiempo .= "M";
            }
        }
        //dias
        if($fecha->d > 0)
        {
            $tiempo .= ($fecha->d) + 1;
            $tiempo .= "D"; 
        }

        return $tiempo;
    }
    //Se calcula el TotalGravado para el timbrado
    public function calcularTotalParaFormula($percepciones,$formulaNum){
        $suma_total = 0;
        foreach ($percepciones as $key) {
            $formula = $key->formula;
            if (strlen($formula) > 0) {
                $formulaExplode = explode("-", $formula);
                $n_formula = $formulaExplode[intval($formulaNum) - 1];
                if (intval($n_formula) == 1) {
                    $suma_total += $key->importe;
                }
            }
        }
        return $suma_total;
    }

    public function prueba_pdf_timbrado(){

        ob_start();
         $id_empleado = $_GET["id_emp"];
         $id_nomina = $_GET["id_nom"];
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
        $stylesheet = file_get_contents('./assets/css/bootstrap.min.css');
        $mpdf->WriteHTML($stylesheet, 1); 
        /******************************************** head pdf ******************************************************/
        $data['header_pdf'] = $this->Nomina_model->datos_empleado_nomina($id_empleado, $id_nomina);
        $head               = $this->load->view('admin/nomina/pdf/pdf_det_timbrado/header', $data, true);
        $mpdf->SetHTMLHeader($head);
        // /***************************************** contenido pdf ****************************************************/
        $data2["percepciones"] = $this->Nomina_model->percepciones_nomina($id_empleado, $id_nomina);
        $data2['deducciones'] = $this->Nomina_model->deducciones_nomina($id_empleado, $id_nomina);
        $data2['aportaciones'] = $this->Nomina_model->aportaciones_nomina($id_empleado, $id_nomina);
        $data2['header_pdf'] = $data['header_pdf'];
        $html = $this->load->view('admin/nomina/pdf/pdf_det_timbrado/contenido', $data2, true);
        //**************************************** footer 1 ********************************************************
        $data3['pie_pagina'] = "";
        $footer = $this->load->view('admin/nomina/pdf/pdf_det_nomina/footer', $data3, true);
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

    function verificarSiGravadoOexcento($formula){
        $esGravado = false;
        if (strlen($formula) > 0) {
            $formulaExplode = explode("-", $formula);
            $n_formula = $formulaExplode[3];
            if (intval($n_formula) == 1) {
                $esGravado = true;
            }
        }
        return $esGravado;
    }

    public function timbradopdf(){
		$id_empleado = $_GET["id_emp"];
		$id_nomina = $_GET["id_nom"];
		$query = $this->Nomina_model->getNameFile($id_nomina,$id_empleado);
		$exte = ".pdf";
		$filename = $query[0]->file_name;
		$filePath = './assets/cfdi/timbrados/pdf/'.$filename.$exte;
		if(file_exists($filePath)){
			$this->downloadFile($filePath,$filename,$exte);
		}else{
			$exteXml = ".xml";
            $filePathXml = './assets/cfdi/timbrados/xml/'.$filename.$exteXml;
            if(file_exists($filePathXml)){
            //SE LEEN LOS DATOS QUE DEVUELVE EL TIMBRADO DEL CFDI Y SE GUARDA EN UNA VARIABLE (ARRAY)
            $timbreOrdinaria = true;
            $dataCFDI = $this->leer($filename.$exteXml,false,"timbrados",$id_empleado,$id_nomina,$timbreOrdinaria);
            //SE IMPRIME EL PDF CON LOS DATOS DEL CFDI TIMBRADO
            //SI EL ULTIMO PARAMENTO ENVIADO ES == FALSE entonces SE ESTÁ RECONSTRUYENDO EL PDF DAÑADO
            //POR LO TANTO NO SE MOSTRARÁ EL PDF EN LA VENTA
            //SINO QUE SE GUARDARÁ EN UN DIRECTORIO PARA PODER DESCARGARSE
            $this->pdfCFDI($dataCFDI, $id_empleado, $id_nomina,$filename,false);
                if(file_exists($filePath)){
                    $this->downloadFile($filePath,$filename,$exte);
                }else{
                    echo 'HUBO UN ERROR AL RECONSTRUIR EL PDF';
                }
            }else{
                echo 'NO EXISTE EL ARCHIVO XML TIMBRADO.';
            }

		}
	}
	public function timbradoxml(){
		$id_empleado = $_GET["id_emp"];
		$id_nomina = $_GET["id_nom"];
		$query = $this->Nomina_model->getNameFile($id_nomina,$id_empleado);
		$exte = ".xml";
		$filename = $query[0]->file_name;
		$filePath = './assets/cfdi/timbrados/xml/'.$query[0]->file_name.$exte;
		if(file_exists($filePath)){
			$this->downloadFile($filePath,$filename,$exte);
		}else{
			echo 'NO EXISTE EL ARCHIVO PDF TIMBRADO.';
		}
	}

    public function downloadFile($filePath,$filename,$exte){
        // Define headers
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename.$exte");
        header("Content-Type: application/zip");
        header("Content-Transfer-Encoding: binary");
        // Read the file
        readfile($filePath);
        exit;
    }
    //***********************************************************************************************
    //ÁREA DE TIMBRADO DE NÓMINA EXTRAORDINARIA
    //***********************************************************************************************
    public function verificaExisteTimbreNomE(){
        //SE VALIDA QUE EXISTAN LOS DATOS REQUERIODOS PARA EL TIMBRADO EN LA URL METODO GET
        if (isset($_GET["id_emp"]) & isset($_GET["id_nom"]) & isset($_GET["origenR"])) {
            $id_empleado = $_GET["id_emp"];
            $id_nomina_e = $_GET["id_nom"];
            $origen_recurso = $_GET["origenR"];
            //SE VALIDA QUE LOS DATOS NO ESTEN VACIOS
            if ( ($id_empleado != "") & ($id_nomina_e != "") & ($origen_recurso != "") ) {
                //SE VERIFICA QUE NO SE HAYA TIMBRADO LA NÓMINA PREVIAMENTE
                $queryExisteTimbre = $this->Nomina_model->verificarNominaTimbradaNomE($id_empleado,$id_nomina_e);
                if (($queryExisteTimbre == false)) {
                    $this->timbrarNominaNomE($id_empleado,$id_nomina_e,$origen_recurso);
                }else{
                    $data['heading'] = "ERROR LA NÓMINA YA HA SIDO TIMBRADA";
                    $data['message'] = "PARA VER EL ARCHIVO XML Y PDF ENTRE AL MÓDULO nomina->extraordinaria Y SELECCIONE LA NÓMINA EXTRAODRINARIA CORRESPONDIENTE";
                    $this->load->view('errors/validation/msj_validation_error', $data);
                }
            }else{
                $data['heading'] = "ERROR EN DATOS";
                $data['message'] = "LOS DATOS CAPTURADOS NO DEBEN ESTAR VACIOS <br> CIERRE ESTA VENTANA Y VUELVA A REALIZAR EL TIMBRADO DESDE EL INICIO";
                $this->load->view('errors/validation/msj_validation_error', $data);
            }
        }else{
            $data['heading'] = "ERROR EN DATOS";
            $data['message'] = "FALTAN DATOS PARA REALIZAR EL TIMBRADO <br> CIERRE ESTA VENTANA Y VUELVA A REALIZAR EL TIMBRADO DESDE EL INICIO";
            $this->load->view('errors/validation/msj_validation_error', $data);
        }
    }

    public function timbrarNominaNomE($id_emp,$id_nom,$origen_recurso){

        error_reporting(0);
        $id_empleado = $id_emp;
        $id_nomina_e = $id_nom;  

        $OrigenRecurso = $origen_recurso;
        //---------------------------------------------------------------------------------------------
        //---------------------------------------------------------------------------------------------
        //SE REALIZAN LAS CONSULTAS A LA BASE DE DATOS Y SE VERIFICA QUE NO HAYAN ERRORES PARA
        //CONTINUAR CON EL TIMBRADO
        $empleado = $this->Nomina_model->datos_empleado_nomina_extraordinaria($id_empleado, $id_nomina_e);
        $conceptosNomE = $this->Nomina_model->conpcetos_nomina_ex($id_empleado, $id_nomina_e);
        //---------------------------------------------------------------------------------------------
        //---------------------------------------------------------------------------------------------
        //SE OBTIENEN LAS PERCEPCIONES PARA CALCULAR EL SALARIO DIARIO INTEGRADO
        $mesNomina = $empleado[0]->mesNomina;
        $yearNomina = $empleado[0]->anioNomina;
        $diaNomina = 1;
        //SE OBTIENE LAS PERCEPCIONES DE LA QUINCENA CORRESPONDIENTE AL MES AL QUE PERTENECE LA NOMINA EXTRAORDINARIA
        $percepciones = $this->Nomina_model->percepcionesNomE($id_empleado,$yearNomina,$mesNomina,$diaNomina);
        //Si la consulta resulta false entonces se vuelve a realizar otra consulta con el mes anterior
        if ($percepciones == false) {
            if (intval($mesNomina) == 1) {
                $mesNomina = 12;
                $yearNomina = intval($empleado[0]->anioNomina) - 1;
            }else{
                $mesNomina = intval($empleado[0]->mesNomina) - 1;
            }
            $percepciones = $this->Nomina_model->percepcionesNomE($id_empleado,$yearNomina,$mesNomina,$diaNomina);
        }
        //En caso de que aun no se obtengan resultados se vuelve a realizar otra consulta
        if ($percepciones == false) {
            $percepciones = $this->Nomina_model->getUltimaspercepcionesNomE($id_empleado);
        }

        if ($percepciones == false) {
            $data['heading'] = "¡ERROR!";
            $data['message'] = "ERROR AL CALCULAR EL SALARIO DIARIO INTEGRADO";
            $this->load->view('errors/validation/msj_validation_error', $data);
        }else{
            //---------------------------------------------------------------------------------------------
            //---------------------------------------------------------------------------------------------
            //SE CALCULA EL TOTAL DE DÍAS PAGADOS
            $diasPagados = 15;
            //---------------------------------------------------------------------------------------------
            //---------------------------------------------------------------------------------------------
            //SE CALCULA EL SalarioDiarioIntegrado
            $SalarioDiarioIntegrado =  $this->calcularTotalParaFormula($percepciones,5) / $diasPagados;
            //---------------------------------------------------------------------------------------------
            //---------------------------------------------------------------------------------------------
            //SE CREA LA HORA Y FECHA DE EXPEDICIÓN
            //SE CREA EL NOMBRE DEL ARCHIVO XML Y PDF
            $fecha_expedicion = date('Y-m-d\TH:i:s', time() - ((60 * (60 * 7)) + 120) ); //SE CALCULA LA FECHA Y HORA DE CHETUMAL
            $nombreArchivoXML = "cfdi_ex_".$empleado[0]->rfc."_".str_replace(':', '-', $fecha_expedicion);
            //---------------------------------------------------------------------------------------------
            //---------------------------------------------------------------------------------------------
            //SE AGREGAN LOS DATOS DE LA NOMINA QUE SE VA A TIMBRAR A LA BASE DE DATOS
            $query = $this->Nomina_model->insertTimbradoFileNomE($id_empleado, $id_nomina_e, $nombreArchivoXML, "");
            //---------------------------------------------------------------------------------------------
            //SE CALCULA EL TOTAL DE PERCEPCIONES
            $importeGravado = $conceptosNomE[0]->importeGravado;
            $importeExento = $conceptosNomE[0]->importeExento;
            $totalPer = floatval($importeGravado) + $importeExento;
            //---------------------------------------------------------------------------------------------
            //---------------------------------------------------------------------------------------------
            //SE CALCULA EL TOTAL DE LAS DEDUCCIONES
            $totalDed = 0;
            $TotalOtrasDed = 0;
            $TotalImpuestosReten = 0;
            if (intval($conceptosNomE[0]->isrSubsidio) == 0) {
                $isr = $conceptosNomE[0]->importeIsrSub;
                $TotalImpuestosReten = $isr;
                $totalDed = $isr;
            }
            //---------------------------------------------------------------------------------------------
            //---------------------------------------------------------------------------------------------
            //Se verifica que si existe compenzación para agregar el nodo de otros pagos
            $compenzacion = false;
            $importeCompenzacion = 0;
            if (intval($conceptosNomE[0]->isrSubsidio) == 1) {
                $compenzacion = true;
                $importeCompenzacion = $conceptosNomE[0]->importeIsrSub;
            }
            //---------------------------------------------------------------------------------------------
            //---------------------------------------------------------------------------------------------
            //SE CALCULAN LOS TOTALES DE LAS PERCEPCIONES
            //NOM197-TotalSueldos, debe existir. Ya que la clave expresada en TipoPercepcion es distinta de 022, 023, 025, 039 y 044.
            $array = array("022", "023", "025", "039" , "044");
            $existeTotalSueldos = false;
            $totalSueldos = 0;

            $arrayPerSeparacion = array("022", "023", "025");
            $existeSeparacion = false;
            $TotalSeparacionIndemnizacion = 0;

            $arrayJubilacionPR = array("039", "044");
            $existeJubilacionPR = false;
            $totalJubilacionPensionRetiro = 0;

            $arrayTotalUnaExhibicion = array("039");
            $existeTotalUnaExhibicion = false;
            $totalUnaExhibicion = 0;

            $arrayTotalUnaExhibicion044 = array("044");
            $existeTotalUnaExhibicion044 = false;
            $totalUnaExhibicion044 = 0;


            $clavePer = $conceptosNomE[0]->codigoSat;
            //--------------------------------------------------------------------------------------------
            //NOM197-TotalSueldos, debe existir. Ya que la clave expresada en TipoPercepcion es distinta de 022, 023, 025, 039 y 044.
            if (!in_array($clavePer, $array)) {
                $existeTotalSueldos = true;
                $totalSueldos += floatval($importeExento) + floatval($importeGravado);
            }
            //--------------------------------------------------------------------------------------------
            /*Si se registraron las claves tipo percepción "022" (Prima por Antigüedad), "023" (Pagos
            por separación), "025" (Indemnizaciones), debe existir el campo
            TotalSeparacionIndemnizacion y la información de los datos de
            SeparacionIndemnizacion.*/
            if (in_array($clavePer, $arrayPerSeparacion)) {
                $TotalSeparacionIndemnizacion += $conceptosNomE[0]->importe;
                $existeSeparacion = true;
            }
            //--------------------------------------------------------------------------------------------
            /*Si se registraron las claves tipo percepción "039" (Jubilaciones, pensiones o haberes de
            retiro en una exhibición) y "044" (Jubilaciones, pensiones o haberes de retiro en
            parcialidades), debe existir el campo TotalJubilacionPensionRetiro y la información de
            los datos de JubilacionPensionRetiro.*/
            if (in_array($clavePer, $arrayJubilacionPR)) {
                $totalJubilacionPensionRetiro +=$conceptosNomE[0]->importe;
                $existeJubilacionPR = true;
            }
            //---------------------------------------------------------------------------------------------
            /*Si se registró la CLAVE TipoPercepcion '039' (Jubilaciones, pensiones o haberes de retiro
            en una exhibición) debe existir el campo TotalUnaExhibicion y no deben existir los
            campos TotalParcialidad, MontoDiario*/
            if (in_array($clavePer, $arrayTotalUnaExhibicion)) {
                $totalUnaExhibicion += $conceptosNomE[0]->importe;
                $existeTotalUnaExhibicion = true;
            }
            //---------------------------------------------------------------------------------------------
            /*Si se registró la clave TipoPercepcion "044" (Jubilaciones, pensiones o haberes de retiro
            en parcialidades) no debe existir el campo TotalUnaExhibicion y deben existir los
            campos TotalParcialidad, MontoDiario.*/
            if (in_array($clavePer, $arrayTotalUnaExhibicion044)) {
                $totalUnaExhibicion044 += $conceptosNomE[0]->importe;
                $existeTotalUnaExhibicion044 = true;
            }
            //---------------------------------------------------------------------------------------------
            //----------------------------------------------------------------------------------------------
            //SE CALCULA EL TOTAL DE LAS PERCEPCIONES
            $totalPercepciones = $totalSueldos + $TotalSeparacionIndemnizacion + $totalJubilacionPensionRetiro;
            date_default_timezone_set('America/Cancun');

            require_once('./assets/cfdi/sdk2.php');

                    // Se especifica el modulo para calculos automaticos
            //$datos['modulos_pre'] = 'calculos_auto';

            $datos['complemento'] = 'nomina12';

            $datos['version_cfdi'] = '3.3';        
            $datos['cfdi']='./assets/cfdi/timbradosNominaExtraordinaria/xml/'.$nombreArchivoXML.".xml";
            $datos['xml_debug']='./assets/cfdi/timbradosNominaExtraordinaria/xml/debug_'.$nombreArchivoXML.".xml";

            $datos['PAC']['usuario'] = 'DEMO700101XXX';
            $datos['PAC']['pass'] = 'DEMO700101XXX';
            $datos['PAC']['produccion'] = 'NO';

            $datos['conf']['cer'] = './assets/cfdi/certificados/lan7008173r5.cer.pem';
            $datos['conf']['key'] = './assets/cfdi/certificados/lan7008173r5.key.pem';
            $datos['conf']['pass'] = '12345678a';
            if (intval($totalDed) >= 0) {
    /***/      $datos['factura']['Descuento'] = number_format(($totalDed), 2, '.', '');
            }        
    /***/   $datos['factura']['fecha_expedicion'] = $fecha_expedicion;
            $folioQuery = $this->Nomina_model->totalTimbresFolioNomE();
            if ($folioQuery) {
                 $folioN = intval($folioQuery[0]->totalTimbres);
             }else{
                $folioN = 1;
             }
            $datos['factura']['folio'] = $folioN;
            //$datos['factura']['folio'] = $folioN;
            $datos['factura']['forma_pago'] = '99'; //99 = por definir
            $datos['factura']['LugarExpedicion'] = '77000';
            $datos['factura']['metodo_pago'] = 'PUE'; // Pago en una sola exhibición
            $datos['factura']['moneda'] = 'MXN';
            //$datos['factura']['serie'] = $empleado[0]->no_empleado."-".$empleado[0]->periodo_quinquenal; //Es el número de serie que utiliza el contribuyente para control interno de su información. 
            $datos['factura']['serie'] = $empleado[0]->no_empleado."-".$folioN;
            $datos['factura']['subtotal'] = number_format(($totalPer), 2, '.', '');
            //$datos['factura']['tipocambio'] = '1.0'; //Este campo no debe existir. 
            $datos['factura']['tipocomprobante'] = 'N';
            $datos['factura']['total'] = number_format(($totalPer - $totalDed), 2, '.', '');

            /*$datos['CfdisRelacionados']['TipoRelacion'] = '01';
            $datos['CfdisRelacionados']['UUID'][0]='A39DA66B-52CA-49E3-879B-5C05185B0EF7';*/

            //$datos['factura']['Confirmacion'] = '0234';
            $datos['factura']['RegimenFiscal'] = '603'; //Personas Morales con Fines no Lucrativos


            //$datos['emisor']['rfc'] = 'IQJ1706288Z7'; //RFC DEL IQJ
            $datos['emisor']['rfc'] = 'LAN7008173R5';
            $datos['emisor']['nombre'] = 'INSTITUTO QUINTANARROENSE DE LA JUVENTUD';  // EMPRESA DE PRUEBA
            //Se puede registrar la CURP del empleador (emisor) del comprobante de nómina cuando 
            //se trate de una persona física.
            //En el caso de personas morales, éstas no cuentan con CURP, por lo tanto no se debe
            //registrar información en este campo.

            $datos['receptor']['rfc'] = $empleado[0]->rfc;
            $datos['receptor']['nombre'] = $empleado[0]->empleado." ".$empleado[0]->ap_paterno." ".$empleado[0]->ap_materno;
            //$datos['receptor']['ResidenciaFiscal'] = 'MEX';
            //$datos['receptor']['NumRegIdTrib'] = '1234567890';
            $datos['receptor']['UsoCFDI'] = 'P01'; //"P01 = POR DEFINIR"

            $datos['conceptos'][0]['cantidad'] = '1';
            $datos['conceptos'][0]['descripcion'] = "Pago de nómina";
            $datos['conceptos'][0]['valorunitario'] = number_format(($totalPercepciones), 2, '.', ''); //Se debe registrar la suma de los campos TotalPercepciones más TotalOtrosPagos del Complemento Nómina
            //$datos['conceptos'][0]['importe'] = number_format(($totalPercepciones + $importeCompenzacion), 2, '.', ''); //Se debe registrar la suma de los campos TotalPercepciones más TotalOtrosPagos del Complemento Nómina
            $datos['conceptos'][0]['importe'] = number_format(($totalPercepciones), 2, '.', ''); //Se debe registrar la suma de los campos TotalPercepciones más TotalOtrosPagos del Complemento Nómina
            $datos['conceptos'][0]['ClaveUnidad'] = 'ACT';
            $datos['conceptos'][0]['ClaveProdServ'] = '84111505';
            if (intval($totalDed) >= 0) {
    /**/       $datos['conceptos'][0]['Descuento'] = number_format(($totalDed), 2, '.', '');
            }
            

            // Obligatorios
            $datos['nomina12']['TipoNomina'] = 'E'; //O = ORDINARIA - E = EXTRAORDINARIA
            $datos['nomina12']['FechaPago'] = $empleado[0]->fecha;
            $datos['nomina12']['FechaInicialPago'] = $empleado[0]->fecha;
            $datos['nomina12']['FechaFinalPago'] = $empleado[0]->fecha;
    /**/    $datos['nomina12']['NumDiasPagados'] = $diasPagados;

            // Opcionales
            $datos['nomina12']['TotalPercepciones'] = number_format(($totalPercepciones), 2, '.', '');
            if (!$compenzacion) {
                $datos['nomina12']['TotalDeducciones'] = number_format(($totalDed), 2, '.', '');
            }
             
            //En caso de existir compenzación debe existir el campo TotalOtrosPagos
            if ($compenzacion) {
     /*-*/      //$datos['nomina12']['TotalOtrosPagos'] = number_format(($importeCompenzacion), 2, '.', ''); 
            }


            // SUB NODOS OPCIONALES DE NOMINA [Emisor, Percepciones, Deducciones, OtrosPagos, Incapacidades]
            // Nodo Emisor, OPCIONALES
            $datos['nomina12']['Emisor']['RegistroPatronal'] = 'Y5560015453'; //Por excepción, este dato no aplica cuando el empleador realice el pago a contribuyentes asimilados a salarios
     /*-*/  //$datos['nomina12']['Emisor']['RfcPatronOrigen'] = 'AAA010101AAA'; // VERIFICAR
    //-----------------------------------------------------------------------------------------
            //NODO: EntidadSNCF;
    /*-*/   //$datos['nomina12']['Emisor']['EntidadSNCF']['OrigenRecurso'] = $OrigenRecurso;

            if ($OrigenRecurso == "IM" ) {
                $datos['nomina12']['Emisor']['EntidadSNCF']['MontoRecursoPropio'] =number_format(($MontoRecursoPropio), 2, '.', ''); 
            }
    //------------------------------------------------------------------------------------------
            // SUB NODOS OBLIGATORIOS DE NOMINA [Receptor]
            // Obligatorios de Receptor
            $datos['nomina12']['Receptor']['ClaveEntFed'] = 'ROO';
            $datos['nomina12']['Receptor']['Curp'] = $empleado[0]->curp;
            $datos['nomina12']['Receptor']['NumEmpleado'] = $empleado[0]->no_empleado;
            $datos['nomina12']['Receptor']['Departamento'] = $empleado[0]->depto;
            $datos['nomina12']['Receptor']['PeriodicidadPago'] = '99'; //si el tipo de nómina es extraordinaria, se debe registrar la clave 99 (Otra Periodicidad).
            $datos['nomina12']['Receptor']['TipoContrato'] = '01'; // 01 = Contrato de trabajo por tiempo indeterminado
            $datos['nomina12']['Receptor']['Sindicalizado'] = $empleado[0]->sindicalizado;
            $datos['nomina12']['Receptor']['TipoRegimen'] = '02'; // 02 = sueldos
            $datos['nomina12']['Receptor']['TipoJornada'] = '01'; // 01 = diurna

            // Opcionales de Receptor
           
            $datos['nomina12']['Receptor']['Antiguedad'] = $this->calcularAntiguedad($empleado[0]->fecha_ingreso,$empleado[0]->fecha); //VERIFICAR ------------- w = semanas Por excepción, este dato no aplica cuando ...
            $datos['nomina12']['Receptor']['Banco'] = '014'; // 014 = SANTANDER VERIFICAR -------------
            $datos['nomina12']['Receptor']['CuentaBancaria'] = $empleado[0]->no_tarjeta; //leer abajo
            /*Si el valor de este campo contiene una cuenta CLABE (18 posiciones), no debe existir el
            campo Banco, este dato será objeto de validación por el SAT o el proveedor de
            certificación de CFDI, se debe confirmar que el dígito de control es correcto.*/
            $datos['nomina12']['Receptor']['FechaInicioRelLaboral'] = $empleado[0]->fecha_ingreso; // Por excepción, este dato no aplica cuando el empleador realice el pago a contribuyentes asimilados a salarios
            $datos['nomina12']['Receptor']['NumSeguridadSocial'] = $empleado[0]->nss;
            $datos['nomina12']['Receptor']['Puesto'] = $empleado[0]->puesto;
            $datos['nomina12']['Receptor']['RiesgoPuesto'] = '1'; // 1 = clase I  Por excepción, este dato no aplica cuando el empleador realice el pago a contribuyentes asimilados a salarios
            //$datos['nomina12']['Receptor']['SalarioBaseCotApor'] = '435.50';
    /***/   $datos['nomina12']['Receptor']['SalarioDiarioIntegrado'] = number_format((round($SalarioDiarioIntegrado, 2)), 2, '.', '');

            // NODO PERCEPCIONES
            // Totales Obligatorios
            $datos['nomina12']['Percepciones']['TotalGravado'] =  number_format(($importeGravado), 2, '.', ''); 
            $datos['nomina12']['Percepciones']['TotalExento'] =  number_format(($importeExento), 2, '.', '');

            $datos['nomina12']['Percepciones'][0]['TipoPercepcion'] = $conceptosNomE[0]->codigoSat;
            $datos['nomina12']['Percepciones'][0]['Clave'] = $conceptosNomE[0]->indicador; //VERIFICAR
            $datos['nomina12']['Percepciones'][0]['Concepto'] = $conceptosNomE[0]->nombreNomE;
            $datos['nomina12']['Percepciones'][0]['ImporteGravado'] =number_format(($importeGravado), 2, '.', ''); 
            $datos['nomina12']['Percepciones'][0]['ImporteExento'] = number_format(($importeExento), 2, '.', '');

            //NODO OTROS PAGOS
            if ($compenzacion) {
               $datos['nomina12']['SubsidioAlEmpleo']['SubsidioCausado'] = number_format(($importeCompenzacion), 2, '.', ''); 
               $datos['nomina12']['OtroPago'][0]['Clave'] = "002"; // 002 = Subsidio para el empleo (efectivamente entregado al trabajador).
               $datos['nomina12']['OtroPago'][0]['Concepto'] = "Subsidio Al Empleo";
               $datos['nomina12']['OtroPago'][0]['Importe'] = number_format(($importeCompenzacion), 2, '.', '');
               $datos['nomina12']['OtroPago'][0]['TipoOtroPago'] = "002";

            }
            // Totales Opcionales
            if ($existeTotalSueldos) {
                $datos['nomina12']['Percepciones']['TotalSueldos'] = number_format(($totalSueldos), 2, '.', '');
            }
            //Nodo:SeparacionIndemnizacion
            if ($existeSeparacion) {
                $datos['nomina12']['Percepciones']['TotalSeparacionIndemnizacion'] =number_format(($TotalSeparacionIndemnizacion), 2, '.', ''); 
            }

            if ($existeJubilacionPR) {
                $datos['nomina12']['Percepciones']['TotalJubilacionPensionRetiro'] =number_format(($totalJubilacionPensionRetiro), 2, '.', ''); 
            }

            if ($existeTotalUnaExhibicion) {
                $datos['nomina12']['JubilacionPensionRetiro']['TotalUnaExhibicion'] =number_format(($totalUnaExhibicion), 2, '.', ''); 
            }

            
            if ($existeTotalUnaExhibicion044) {
                $datos['nomina12']['JubilacionPensionRetiro']['TotalUnaExhibicion'] =number_format(($totalUnaExhibicion), 2, '.', ''); 
            }

            // Acciones o Titulos en Percepciones (Todos obligatorios)
            //$datos['nomina12']['Percepciones'][3]['AccionesOTitulos']['ValorMercado'] = '1000.00'; //En este nodo se pueden expresar los ingresos por acciones o titulos valor que representen bienes. 
                                                                                                // Es requerido cuando existan ingresos por sueldos derivados de adquisición de acciones o títulos (Artículo 94, fracción VII LISR)
            //$datos['nomina12']['Percepciones'][3]['AccionesOTitulos']['PrecioAlOtorgarse'] = '2000.00';

            // NODO DEDUCCIONES
     /***/  //$datos['nomina12']['Deducciones']['TotalOtrasDeducciones'] = number_format(($TotalOtrasDed), 2, '.', ''); // Opcional
            //SE VALIDA QUE EL EMPLEADO TENGA ISR
            if (!$compenzacion) {
                $datos['nomina12']['Deducciones']['TotalImpuestosRetenidos'] = number_format(($TotalImpuestosReten), 2, '.', ''); // Opcional
            }
            
            if (!$compenzacion) {
                $datos['nomina12']['Deducciones'][0]['TipoDeduccion'] = "002";
                $datos['nomina12']['Deducciones'][0]['Clave'] = "0001";
                $datos['nomina12']['Deducciones'][0]['Concepto'] = "ISR";
                $datos['nomina12']['Deducciones'][0]['Importe'] = number_format(($TotalImpuestosReten), 2, '.', ''); 
            }
            $res = mf_genera_cfdi($datos);

            ///////////    MOSTRAR RESULTADOS DEL ARRAY $res   ///////////
            //echo "<h1>Respuesta Generar XML y Timbrado</h1>";
            foreach($res AS $variable=>$valor)
            {
                $valor=htmlentities($valor);
                $valor=str_replace('&lt;br/&gt;','<br/>',$valor);
                //echo "<b>[$variable]=</b>$valor<hr>";
            }
            //print_r($res);
            $codigoError = $res['codigo_mf_numero'];

            if ($codigoError == 0) {
                //SE LEEN LOS DATOS QUE DEVUELVE EL TIMBRADO DEL CFDI Y SE GUARDA EN UNA VARIABLE (ARRAY)
                $timbreOrdinaria = false;
                $dataCFDI = $this->leer($res,true,"timbradosNominaExtraordinaria",null,null,$timbreOrdinaria);
                //SE AGREGAN LOS DATOS DE LA NOMINA TIMBRADA A LA BASE DE DATOS
                $query = $this->Nomina_model->updateTimbradoFileNomE($id_empleado, $id_nomina_e, $dataCFDI['cadenaOriginalComplemtoSAT']);
                //SE IMPRIME EL PDF CON LOS DATOS DEL CFDI TIMBRADO
                $this->pdfCFDIextraordinaria($dataCFDI, $id_empleado, $id_nomina_e,$nombreArchivoXML,true);
            }else if ($codigoError == 2){
                $query = $this->Nomina_model->deleteTimbradoFileNomE($id_empleado, $id_nomina_e);
                $data['heading'] = "¡ERROR!";
                $data['message'] = $res['codigo_mf_texto'];
                $this->load->view('errors/validation/msj_validation_error', $data);
            }else{
                $query = $this->Nomina_model->deleteTimbradoFileNomE($id_empleado, $id_nomina_e);
                $data['heading'] = "¡ERROR!";
                $data['message'] = $res['codigo_mf_texto'];
                $this->load->view('errors/validation/msj_validation_error', $data);
            }
        }    
    }

    public function pdfCFDIextraordinaria($dataCFDI,$id_empleado, $id_nomina_e,$nombreArchivoXML,$outputPdf){
        ob_start();
        //**********************************************************************************
        //       PDF
        //**********************************************************************************
        $this->load->library('m_pdf');
        $mpdf = new \Mpdf\Mpdf([
        'mode' => 'utf-8',
        'margin_top' => 44
        // 'margin_bottom' => 25,
        // 'margin_header' => 16,
        // 'margin_footer' => 13
        ]);
        /**************************************** Hoja de estilos ****************************************************/
        //$stylesheet = file_get_contents('assets/css/pdf/pdf.css');
        $stylesheet = file_get_contents('assets/css/bootstrap.min.css');
        $mpdf->WriteHTML($stylesheet, 1); 
        /******************************************** head pdf ******************************************************/
        $data['header_pdf'] = $this->Nomina_model->datos_empleado_nomina_extraordinaria($id_empleado, $id_nomina_e);
        $data['folioN'] = $dataCFDI['folioN'];
        $head               = $this->load->view('admin/nomina/pdf/pdf_cfdi_extraordinaria/header', $data, true);
        $mpdf->SetHTMLHeader($head);
        // /***************************************** contenido pdf ****************************************************/
        $data2['header_pdf'] = $data['header_pdf'];
        $data2['dataCFDI'] = $dataCFDI;
        $data2['nombreArchivoXML'] = $nombreArchivoXML;
        $data2['fecha_expedicion'] = $dataCFDI['fecha_expedicion'];
        $conceptosNomE = $this->Nomina_model->conpcetos_nomina_ex($id_empleado, $id_nomina_e);
        $data2['importeCompenzacion'] = $conceptosNomE[0]->importeIsrSub;
        $html = $this->load->view('admin/nomina/pdf/pdf_cfdi_extraordinaria/contenido', $data2, true);
        //**************************************** footer 1 ********************************************************
        $data3['pie_pagina'] = "";
        $footer = $this->load->view('admin/nomina/pdf/pdf_cfdi_extraordinaria/footer', $data3, true);
        $mpdf->SetHTMLFooter($footer);

        /****************************************** imprmir pagina ********************************************************/
        $mpdf->WriteHTML($html);
        //$mpdf->AddPage();
        ob_clean();
        $extencion = ".pdf";
        $mpdf->Output('./assets/cfdi/timbradosNominaExtraordinaria/pdf/'.$nombreArchivoXML.$extencion, 'F');
        if ($outputPdf) {
            $mpdf->Output($nombreArchivoXML.pdf, 'I');
        }
        
        if ($query) {
            $result['resultado'] = true;
        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);
        //**********************************************************************************
        //    FIN   PDF
        //**********************************************************************************
    }

        public function timbradopdfNomE(){
        $id_empleado = $_GET["id_emp"];
        $id_nomina = $_GET["id_nom"];
        $query = $this->Nomina_model->getNameFileNomE($id_nomina,$id_empleado);
        $exte = ".pdf";
        $filename = $query[0]->file_name;
        $filePath = './assets/cfdi/timbradosNominaExtraordinaria/pdf/'.$filename.$exte;
        if(file_exists($filePath)){
            $this->downloadFile($filePath,$filename,$exte);
        }else{
            $exteXml = ".xml";
            $filePathXml = './assets/cfdi/timbradosNominaExtraordinaria/xml/'.$filename.$exteXml;
            if(file_exists($filePathXml)){
            //SE LEEN LOS DATOS QUE DEVUELVE EL TIMBRADO DEL CFDI Y SE GUARDA EN UNA VARIABLE (ARRAY)
            $timbreOrdinaria = false;
            $dataCFDI = $this->leer($filename.$exteXml,false,"timbradosNominaExtraordinaria",$id_empleado,$id_nomina,$timbreOrdinaria);
            //SE IMPRIME EL PDF CON LOS DATOS DEL CFDI TIMBRADO
            //SI EL ULTIMO PARAMENTO ENVIADO ES == FALSE entonces SE ESTÁ RECONSTRUYENDO EL PDF DAÑADO
            //POR LO TANTO NO SE MOSTRARÁ EL PDF EN LA VENTA
            //SINO QUE SE GUARDARÁ EN UN DIRECTORIO PARA PODER DESCARGARSE
            $this->pdfCFDIextraordinaria($dataCFDI, $id_empleado, $id_nomina,$filename,false);
                if(file_exists($filePath)){
                    $this->downloadFile($filePath,$filename,$exte);
                }else{
                    echo 'HUBO UN ERROR AL RECONSTRUIR EL PDF';
                }
            }else{
                echo 'NO EXISTE EL ARCHIVO XML TIMBRADO.';
            }

        }
    }

    public function timbradoxmlNomE(){
        $id_empleado = $_GET["id_emp"];
        $id_nomina = $_GET["id_nom"];
        $query = $this->Nomina_model->getNameFileNomE($id_nomina,$id_empleado);
        $exte = ".xml";
        $filename = $query[0]->file_name;
        $filePath = './assets/cfdi/timbradosNominaExtraordinaria/xml/'.$query[0]->file_name.$exte;
        if(file_exists($filePath)){
            $this->downloadFile($filePath,$filename,$exte);
        }else{
            echo 'NO EXISTE EL ARCHIVO PDF TIMBRADO.';
        }
    }

}
