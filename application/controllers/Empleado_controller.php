<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleado_controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // $this->load->library('bcrypt');
        $this->load->model('Empleado_model');
    }

    public function create(){
        $data['deptos'] = $this->Empleado_model->get_departamentos();
        $data['puestos'] = $this->Empleado_model->get_puestos();
        $data['tipo_trabajador'] = $this->Empleado_model->get_tipoTrabajador();
        $data['componentes'] = $this->Empleado_model->get_lista_componente();
        $dato['active'] = "empleado";
        $dato['active1'] = "alta_empleado";
        $this->load->view('global_view/header',$dato);
        $this->load->view('admin/registro',$data);
        $this->load->view('global_view/foother');
    }

    public function lista_empleado(){
        
        $data['empleados'] = $this->Empleado_model->get_lista_empleados();              
        
        $dato['active'] = "empleado";
        $dato['active1'] = "lista_empleado";

        $this->load->view('global_view/header',$dato);
        $this->load->view('admin/empleados/lista_empleados',$data);
        $this->load->view('global_view/foother');
    }
    public function getSelected(){
    
        $query = $this->Empleado_model->get_departamentos();
        $query1 = $this->Empleado_model->get_puestos();
        $query2 = $this->Empleado_model->get_lista_componente();
        $query3 = $this->Empleado_model->get_tipoTrabajador();

        if ($query != false) {
            $result['resultado'] = true;
            $result['deptos'] = $query;
            $result['puestos'] = $query1;
            $result['componentes'] = $query2;
            $result['tipo_trabajador'] = $query3;

        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);
    }
    public function lista_deshabilitados(){

        $dato['active'] = "empleado";
        $dato['active1'] = "lista_deshabilitados";
        $data['empleados'] = $this->Empleado_model->get_deshabilidatos();
        $this->load->view('global_view/header',$dato);
        $this->load->view('admin/empleados/desahabilitados',$data);
        $this->load->view('global_view/foother');

    }
    public function searchRFC(){
        $rfc = $this->input->post("rfc");
        $query = $this->Empleado_model->existRFC($rfc);
        if ($query == 1) {
            $result['resultado'] = true;
        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);  
    }
    public function searchRFCEdit(){
        $rfc = $this->input->post("rfc");
        $id = $this->input->post("id");
        $query = $this->Empleado_model->existRFCEdit($id, $rfc);
        if ($query != false) {
            $result['resultado'] = true;
            $result['empleado'] = $query;            
        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);  
    }
    public function guardar_empleado(){
        $no_plaza = $this->input->post("no_plaza");
        $horas = $this->input->post("horas");
        $nss = $this->input->post("nss");
		$no_tarjeta = $this->input->post("tarjeta");
        $nombre = $this->input->post("nombre");
        $ap_paterno = $this->input->post("ap_paterno");
        $ap_materno = $this->input->post("ap_materno");
        $fecha_nacimiento = $this->input->post("fecha_nacimiento");
        $fecha_ingreso = $this->input->post("fecha_ingreso");
        $curp = $this->input->post("curp");
        $id_depto = $this->input->post("id_depto");
        $id_puesto = $this->input->post("id_puesto");
        $no_empleado = $this->input->post("no_empleado");
        $rfc = $this->input->post("rfc");        
        $id_tipo_trabajador = $this->input->post("id_tipo_trabajador");
        $id_componente = $this->input->post("componente");

        $emplado = array(
                    'no_plaza' => $no_plaza, 
                    'nombre' => $nombre,
                    'nss' => $nss,
                    'no_tarjeta' => $no_tarjeta,
                    'ap_paterno' => $ap_paterno,
                    'ap_materno' => $ap_materno,
                    'fecha_nacimiento' => $fecha_nacimiento,
                    'fecha_ingreso' => $fecha_ingreso,
                    'curp' => $curp,
                    'id_depto' => $id_depto,
                    'id_puesto' => $id_puesto,
                    'no_empleado' => $no_empleado,
                    'rfc' => $rfc,
                    'horas' => $horas,
                    'id_tipo_trabajador' => $id_tipo_trabajador,
                    'id_componente' => $id_componente,
                    'status' => 1

                    );
        $query = $this->Empleado_model->guardar_empleado($emplado);
        if ($query == 1) {
            $result['resultado'] = true;
        } else {
            $result['resultado'] = false;
        }

        echo json_encode($result);
    }
    public function updater_empleado(){

        $id_empleado = $this->input->post("id");
        $no_plaza = $this->input->post("no_plaza");
        $horas = $this->input->post("horas");
        $nss = $this->input->post("nss");
		$no_tarjeta = $this->input->post("tarjeta");
        $nombre = $this->input->post("nombre");
        $ap_paterno = $this->input->post("ap_paterno");
        $ap_materno = $this->input->post("ap_materno");
        $fecha_nacimiento = $this->input->post("fecha_nacimiento");
        $fecha_ingreso = $this->input->post("fecha_ingreso");
        $curp = $this->input->post("curp");
        $rfc = $this->input->post("rfc"); 
        $id_depto = $this->input->post("depto");
        $id_puesto = $this->input->post("puesto");
        $no_empleado = $this->input->post("no_empleado");               
        $id_tipo_trabajador = $this->input->post("tipo_trabajador");
        $id_componente = $this->input->post("componente");

        $empleado = array(
            'no_plaza' => $no_plaza, 
            'horas' => $horas,
            'nss' => $nss,
			'no_tarjeta' => $no_tarjeta,
            'nombre' => $nombre,
            'ap_paterno' => $ap_paterno,
            'ap_materno' => $ap_materno,
            'fecha_nacimiento' => $fecha_nacimiento,
            'fecha_ingreso' => $fecha_ingreso,
            'curp' => $curp,
            'id_depto' => $id_depto,
            'id_puesto' => $id_puesto,
            'no_empleado' => $no_empleado,
            'rfc' => $rfc,                    
            'id_tipo_trabajador' => $id_tipo_trabajador,
            'id_componente' => $id_componente,
        );
        $query = $this->Empleado_model->updateEmpleado($id_empleado,$empleado);
        if ($query == 1) {
            $result['resultado'] = true;
        } else {
            $result['resultado'] = false;
        }

        echo json_encode($result);
    }

    public function deshabilitar_Empleado(){

        $id = $this->input->post('id');
        $query = $this->Empleado_model->deshabilitarEmpleado($id);
        
        if ($query == 1) {
            $result['resultado'] = true;
        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);  
    }

    public function habilitar_Empleado(){

        $id = $this->input->post('id');
        $query = $this->Empleado_model->habilitarEmpleado($id);        
        if ($query == 1) {
            $result['resultado'] = true;
        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);
    }

}
