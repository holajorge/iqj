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
        $data['extraordinarios'] = $this->Nomina_model->getAllPeriodosExtraordinario();
        
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
            $this->load->view('global_view/header', $dato);
            $this->load->view('admin/nomina/alta_extraudinaria', $query);
            $this->load->view('global_view/alert_procesando');
            $this->load->view('global_view/foother');
    }
    public function buscar_periodo(){

        $id_nomina = $this->input->post("id");
        // $id_nomina = 5;
        $query = $this->Nomina_model->buscar_periodo($id_nomina);

        if ($query != false) {
            $result['resultado'] = true;
            $result['empleado'] = $query;
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
        if ($query != false) {
            $result['resultado'] = true;
            $result['empleado'] = $query;
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
		
        $concepExtra = array(
            'fecha' => $this->input->post("fecha"), 
            'nombre' => $this->input->post('nombre'),
        );

		$this->Nomina_model->insertConceptoExtraoridinario($concepExtra);
        $query = $this->Nomina_model->gelAllCX();   

		if ($query != false) {
            $result['resultado'] = true;
            $result["extraordinarios"] = $query;
        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);

	}

    public function createNominaExtraordinaria(){

        $nominaExtraordinaria = array(
            'id_empleado'                 => $this->input->post("id"), 
            'id_concepto_extraordinario'  => $this->input->post("dia"), 
            'importe'                     => $this->input->post("importe"), 
            'isr'                         => $this->input->post("isr"), 
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
            'id_empleado'                 => $this->input->post("id"), 
            'id_concepto_extraordinario'  => $this->input->post("dia"), 
            'importe'                     => $this->input->post("importe"), 
            'isr'                         => $this->input->post("isr"), 
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
        $id_concepto_extraordinario = $this->input->post("id_nom_ex");

        $data['empEnNominaEx'] = $this->Nomina_model->datos_empleado_nomina_extraordinaria($id_empleado, $id_concepto_extraordinario);

        if ($data['empEnNominaEx']) {
            $result['resultado'] = true;
        } else {
            $result['resultado'] = false;
        }

        echo json_encode($result);
    }

    public function crearTimbre(){

        error_reporting(0);
        $id_empleado = $_GET["id_emp"];
        $id_nomina = $_GET["id_nom"];        

        $empleado = $this->Nomina_model->datos_empleado_nomina($id_empleado, $id_nomina);

        $percepciones = $this->Nomina_model->percepciones_nomina($id_empleado, $id_nomina);
        $data2['deducciones'] = $this->Nomina_model->deducciones_nomina($id_empleado, $id_nomina);
        $data2['aportaciones'] = $this->Nomina_model->aportaciones_nomina($id_empleado, $id_nomina);

        date_default_timezone_set('America/Cancun');

        require_once('./assets/cfdi/sdk2.php');

        // Se especifica el modulo para calculos automaticos
        $datos['modulos_pre'] = 'calculos_auto';

        $datos['complemento'] = 'nomina12';

        $datos['version_cfdi'] = '3.3';
        $datos['cfdi']='./assets/cfdi/timbrados/ejemplo_cfdi33_nomina12.xml';
        $datos['xml_debug']= './assets/cfdi/timbrados/debug_ejemplo_cfdi33_nomina12.xml';

        $datos['PAC']['usuario'] = 'DEMO700101XXX';
        $datos['PAC']['pass'] = 'DEMO700101XXX';
        $datos['PAC']['produccion'] = 'NO';

        $datos['conf']['cer'] = './assets/cfdi/certificados/lan7008173r5.cer.pem';
        $datos['conf']['key'] = './assets/cfdi/certificados/lan7008173r5.key.pem';
        $datos['conf']['pass'] = '12345678a';

        //$datos['factura']['descuento'] = '0.00';
        $datos['factura']['fecha_expedicion'] = date('Y-m-d\TH:i:s', time() - 120);
        $datos['factura']['folio'] = '100';
        $datos['factura']['forma_pago'] = '01';
        $datos['factura']['LugarExpedicion'] = '45079';
        $datos['factura']['metodo_pago'] = 'PUE';
        $datos['factura']['moneda'] = 'MXN';
        $datos['factura']['serie'] = 'A';
        //$datos['factura']['subtotal'] = '1000.00';
        $datos['factura']['tipocambio'] = '1.0';
        $datos['factura']['tipocomprobante'] = 'I';
        //$datos['factura']['total'] = '1000.00';

        /*$datos['CfdisRelacionados']['TipoRelacion'] = '01';
        $datos['CfdisRelacionados']['UUID'][0]='A39DA66B-52CA-49E3-879B-5C05185B0EF7';*/

        //$datos['factura']['Confirmacion'] = '0234';
        $datos['factura']['RegimenFiscal'] = '601';

        $datos['emisor']['rfc'] = 'LAN7008173R5'; //RFC DE PRUEBA
        $datos['emisor']['nombre'] = 'INSTITUTO QUINTANAROENSE DE LA JUVENTUD';  // EMPRESA DE PRUEBA

        $datos['receptor']['rfc'] = 'SOHM7509289MA';
        $datos['receptor']['nombre'] = $empleado[0]->empleado.' ' .$empleado[0]->ap_paterno. ' ' . $empleado[0]->ap_materno;
        //$datos['receptor']['ResidenciaFiscal'] = 'MEX';
        //$datos['receptor']['NumRegIdTrib'] = '1234567890';
        $datos['receptor']['UsoCFDI'] = 'P01';

        $datos['conceptos'][0]['cantidad'] = '1.00';
        $datos['conceptos'][0]['descripcion'] = "Págo de nómina";
        $datos['conceptos'][0]['valorunitario'] = '100.00';
        $datos['conceptos'][0]['importe'] = '100.00';
        $datos['conceptos'][0]['ClaveUnidad'] = 'ACT';

        // Obligatorios
        $datos['nomina12']['TipoNomina'] = 'O';
        $datos['nomina12']['FechaPago'] = '2016-10-31';
        $datos['nomina12']['FechaInicialPago'] = '2016-10-16';
        $datos['nomina12']['FechaFinalPago'] = '2016-10-31';
        $datos['nomina12']['NumDiasPagados'] = '15';
        // Opcionales
        //$datos['nomina12']['TotalPercepciones'] = '10500.05';
        //$datos['nomina12']['TotalDeducciones'] = '1234.09';
        //$datos['nomina12']['TotalOtrosPagos'] = '0.0';

        // SUB NODOS OPCIONALES DE NOMINA [Emisor, Percepciones, Deducciones, OtrosPagos, Incapacidades]
        // Nodo Emisor, OPCIONALES
        $datos['nomina12']['Emisor']['RegistroPatronal'] = '5525665412';
        $datos['nomina12']['Emisor']['RfcPatronOrigen'] = 'AAA010101AAA';

        // SUB NODOS OBLIGATORIOS DE NOMINA [Receptor]
        // Obligatorios de Receptor
        $datos['nomina12']['Receptor']['ClaveEntFed'] = 'ROO';
        $datos['nomina12']['Receptor']['Curp'] = 'CACF880922HJCMSR03';
        $datos['nomina12']['Receptor']['NumEmpleado'] = '060';
        $datos['nomina12']['Receptor']['PeriodicidadPago'] = '04';
        $datos['nomina12']['Receptor']['TipoContrato'] = '01';
        $datos['nomina12']['Receptor']['TipoRegimen'] = '02';

        // Opcionales de Receptor
        $datos['nomina12']['Receptor']['Antiguedad'] = 'P21W';
        $datos['nomina12']['Receptor']['Banco'] = '021';
        $datos['nomina12']['Receptor']['CuentaBancaria'] = '1234567890';
        $datos['nomina12']['Receptor']['FechaInicioRelLaboral'] = '2016-06-01';
        $datos['nomina12']['Receptor']['NumSeguridadSocial'] = '04078873454';
        $datos['nomina12']['Receptor']['Puesto'] = 'Desarrollador';
        $datos['nomina12']['Receptor']['RiesgoPuesto'] = '2';
        $datos['nomina12']['Receptor']['SalarioBaseCotApor'] = '435.50';
        $datos['nomina12']['Receptor']['SalarioDiarioIntegrado'] = '435.50';

        // NODO PERCEPCIONES
        // Totales Obligatorios
        //$datos['nomina12']['Percepciones']['TotalGravado'] = '10500.05';
        //$datos['nomina12']['Percepciones']['TotalExento'] = '0.00';

        // Totales Opcionales
        //$datos['nomina12']['Percepciones']['TotalSueldos'] = '10500.05';

        // Agregar Percepciones (Todos obligatorios)
        // foreach ($percepciones as  $pecepcion) {
        //     # code...
        //     $datos['nomina12']['Percepciones'][0]['TipoPercepcion'] = '001';
        //     $datos['nomina12']['Percepciones'][0]['Clave'] = $pecepcion[0]->indicador;
        //     $datos['nomina12']['Percepciones'][0]['Concepto'] = 'Sueldos, Salarios Rayas y Jornales';
        //     $datos['nomina12']['Percepciones'][0]['ImporteGravado'] = '6250.05';
        //     $datos['nomina12']['Percepciones'][0]['ImporteExento'] = '0.00';
        // }
        
        $datos['nomina12']['Percepciones'][0]['TipoPercepcion'] = '001';
        $datos['nomina12']['Percepciones'][0]['Clave'] = '001';
        $datos['nomina12']['Percepciones'][0]['Concepto'] = 'Sueldos, Salarios Rayas y Jornales';
        $datos['nomina12']['Percepciones'][0]['ImporteGravado'] = '6250.05';
        $datos['nomina12']['Percepciones'][0]['ImporteExento'] = '0.00';

        $datos['nomina12']['Percepciones'][1]['TipoPercepcion'] = '049';
        $datos['nomina12']['Percepciones'][1]['Clave'] = '014';
        $datos['nomina12']['Percepciones'][1]['Concepto'] = 'Premios de asistencia';
        $datos['nomina12']['Percepciones'][1]['ImporteGravado'] = '625.00';
        $datos['nomina12']['Percepciones'][1]['ImporteExento'] = '0.00';

        $datos['nomina12']['Percepciones'][2]['TipoPercepcion'] = '010';
        $datos['nomina12']['Percepciones'][2]['Clave'] = '013';
        $datos['nomina12']['Percepciones'][2]['Concepto'] = 'Premios por puntualidad';
        $datos['nomina12']['Percepciones'][2]['ImporteGravado'] = '625.00';
        $datos['nomina12']['Percepciones'][2]['ImporteExento'] = '0.00';

        $datos['nomina12']['Percepciones'][3]['TipoPercepcion'] = '045';
        $datos['nomina12']['Percepciones'][3]['Clave'] = '045';
        $datos['nomina12']['Percepciones'][3]['Concepto'] = 'Premios por puntualidad';
        $datos['nomina12']['Percepciones'][3]['ImporteGravado'] = '3000.00';
        $datos['nomina12']['Percepciones'][3]['ImporteExento'] = '0.00';

        // Acciones o Titulos en Percepciones (Todos obligatorios)
        $datos['nomina12']['Percepciones'][3]['AccionesOTitulos']['ValorMercado'] = '1000.00';
        $datos['nomina12']['Percepciones'][3]['AccionesOTitulos']['PrecioAlOtorgarse'] = '2000.00';

        // NODO DEDUCCIONES
        //$datos['nomina12']['Deducciones']['TotalOtrasDeducciones'] = '179.34'; // Opcional
        //$datos['nomina12']['Deducciones']['TotalImpuestosRetenidos'] = '1054.75'; // Opcional

        $datos['nomina12']['Deducciones'][0]['TipoDeduccion'] = '002';
        $datos['nomina12']['Deducciones'][0]['Clave'] = '001';
        $datos['nomina12']['Deducciones'][0]['Concepto'] = 'ISR';
        $datos['nomina12']['Deducciones'][0]['Importe'] = '1054.75';

        $datos['nomina12']['Deducciones'][1]['TipoDeduccion'] = '001';
        $datos['nomina12']['Deducciones'][1]['Clave'] = '012';
        $datos['nomina12']['Deducciones'][1]['Concepto'] = 'Seguridad social';
        $datos['nomina12']['Deducciones'][1]['Importe'] = '179.34';

        $res = mf_genera_cfdi($datos);

        ///////////    MOSTRAR RESULTADOS DEL ARRAY $res   ///////////
         
        echo "<h1>Respuesta Generar XML y Timbrado</h1>";
        foreach($res AS $variable=>$valor)
        {
            $valor=htmlentities($valor);
            $valor=str_replace('&lt;br/&gt;','<br/>',$valor);
            echo "<b>[$variable]=</b>$valor<hr>";
        }
        print_r($res);
    }

}