<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_file_model extends CI_Model
{

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function getMonth($id_empleado, $anio){

        $query = $this->db->query("SELECT id_empleadosxtimbrados, cat_empleados.id_empleado, MONTH(tab_nomina.periodo_inicio) as mes, tab_nomina.id_nomina
                                    FROM cat_empleadosxtimbrados, cat_empleados, tab_nomina
                                    where tab_nomina.id_nomina = cat_empleadosxtimbrados.id_nomina
                                            AND cat_empleados.id_empleado = cat_empleadosxtimbrados.id_empleado
                                            AND tab_nomina.id_nomina = cat_empleadosxtimbrados.id_nomina
                                            AND cat_empleadosxtimbrados.id_empleado = '".$id_empleado."' 
                                            AND YEAR(tab_nomina.periodo_inicio) = '".$anio."'
                                             GROUP BY mes");
        if ($query->num_rows() > 0) {
            return $query->result();
        }else{
            return false;
        }
    }
    public function getPrimerPeriodo($anio,$mes, $id_empleado)
    {
        $query = $this->db->query("select cat_empleadosxtimbrados.id_empleadosxtimbrados, cat_empleados.id_empleado,  cat_empleadosxtimbrados.file_name, tab_nomina.id_nomina,
                                    CONCAT (tab_nomina.periodo_inicio, ' ' ,tab_nomina.periodo_fin) as peridos, MONTH(tab_nomina.periodo_inicio) as mes 
                                       FROM cat_empleadosxtimbrados, cat_empleados, tab_nomina
                                       where tab_nomina.id_nomina = cat_empleadosxtimbrados.id_nomina
                                                AND cat_empleados.id_empleado = cat_empleadosxtimbrados.id_empleado
                                                AND tab_nomina.id_nomina = cat_empleadosxtimbrados.id_nomina
                                                AND cat_empleadosxtimbrados.id_empleado = '".$id_empleado."' 
                                                AND YEAR(tab_nomina.periodo_inicio) = '".$anio."' 
                                                AND MONTH(tab_nomina.periodo_inicio) = '".$mes."' 
                                                AND DAY(tab_nomina.periodo_inicio) = 1 ");
        if ($query->num_rows() > 0) {
            return $query->result();
        }else{
            return false;
        }
    }
    public function getSegundoPeriodo($anio,$mes, $id_empleado){

        $query = $this->db->query("select cat_empleadosxtimbrados.id_empleadosxtimbrados, cat_empleados.id_empleado,  cat_empleadosxtimbrados.file_name, tab_nomina.id_nomina,
                                    CONCAT (tab_nomina.periodo_inicio, ' ' ,tab_nomina.periodo_fin) as peridos, MONTH(tab_nomina.periodo_inicio) as mes 
                                       FROM cat_empleadosxtimbrados, cat_empleados, tab_nomina
                                       where tab_nomina.id_nomina = cat_empleadosxtimbrados.id_nomina
                                                AND cat_empleados.id_empleado = cat_empleadosxtimbrados.id_empleado
                                                AND tab_nomina.id_nomina = cat_empleadosxtimbrados.id_nomina
                                                AND cat_empleadosxtimbrados.id_empleado = '".$id_empleado."' 
                                                AND YEAR(tab_nomina.periodo_inicio) = '".$anio."' 
                                                AND MONTH(tab_nomina.periodo_inicio) = '".$mes."' 
                                                AND DAY(tab_nomina.periodo_inicio) = 16 ");
        if ($query->num_rows() > 0) {
            return $query->result();
        }else{
            return false;
        }
    }
    public function buscaNombreArchivo($id_empleado,$anio){

        $query = $this->db->query("select cat_empleadosxtimbrados.file_name, tab_nomina.periodo_inicio, tab_nomina.periodo_fin , MONTH(tab_nomina.periodo_inicio) as mes 
                                    FROM cat_empleadosxtimbrados, cat_empleados, tab_nomina
                                    where tab_nomina.id_nomina = cat_empleadosxtimbrados.id_nomina
                                            AND cat_empleados.id_empleado = cat_empleadosxtimbrados.id_empleado
                                            AND tab_nomina.id_nomina = cat_empleadosxtimbrados.id_nomina
                                            AND cat_empleadosxtimbrados.id_empleado = '".$id_empleado."' 
                                            AND YEAR(tab_nomina.periodo_inicio) = '".$anio."' ");
        if ($query->num_rows() > 0) {
            return $query->result();
        }else{
            return false;
        }
    }
    public function getInfoProfile_user($id_empleado){
        $status = 1;
        $query = $this->db->query("SELECT cat_empleados.id_empleado, cat_empleados.no_plaza,cat_empleados.no_empleado, cat_empleados.nombre, cat_empleados.ap_paterno, 
                                             cat_empleados.ap_materno, cat_empleados.fecha_nacimiento, cat_empleados.curp, cat_empleados.rfc,
                                             cat_tipo_trabajador.nombre_tipo_trabajador as trabajador,
                                             cat_depto.nombre as depto, 
                                             cat_puestos.nombre as puesto
                                    FROM  cat_empleados , cat_tipo_trabajador, cat_depto, cat_puestos
                                    WHERE cat_tipo_trabajador.id_tipo_trabajador = cat_empleados.id_tipo_trabajador								   		 
                                            AND cat_depto.id_depto = cat_empleados.id_depto
                                            AND cat_puestos.id_puesto = cat_empleados.id_puesto
                                            AND cat_empleados.status = '".$status."'
                                            AND cat_empleados.id_empleado = '".$id_empleado."' ");

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function changePAssword_user($id,$cambio){
        $this->db->where('id_empleado', $id);
        return $this->db->update('cat_empleados', $cambio);
    }
    public function getNameFile_downloader($id_empleado, $file_name){
        $query = $this->db->query("SELECT file_name 
									FROM cat_empleadosxtimbrados, tab_nomina, cat_empleados
									WHERE cat_empleados.id_empleado = cat_empleadosxtimbrados.id_empleado
											AND tab_nomina.id_nomina = cat_empleadosxtimbrados.id_nomina
											AND cat_empleadosxtimbrados.id_empleado = '".$id_empleado."'
											AND cat_empleadosxtimbrados.file_name = '".$file_name."' ");
        if ($query->num_rows() > 0) {
            return $query->result();
        }else{
            return false;
        }
    }

}