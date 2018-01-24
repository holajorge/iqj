<?php 
defined('BASEPATH') or exit('No direct script access allowed');
class Empleado_model extends CI_Model { 
   public function __construct() {
      parent::__construct();
   }
   public function get_departamentos(){
      $this->db->select('*');
        $this->db->from('cat_depto');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
   }
   public function get_puestos(){
      $this->db->select('*');
        $this->db->from('cat_puestos');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
   }
   public function get_tipoTrabajador(){
      $this->db->select('*');
        $this->db->from('cat_tipo_trabajador');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
   }   
   public function get_lista_empleados(){
      $this->db->select("cat_empleados.id_empleado, cat_empleados.horas, cat_empleados.nss, cat_empleados.status , cat_empleados.no_empleado, cat_empleados.no_plaza, cat_empleados.nombre AS nombre_emp, 
                        cat_empleados.ap_paterno, cat_empleados.ap_materno, cat_empleados.fecha_nacimiento,  cat_empleados.curp, 
                        cat_empleados.fecha_ingreso, cat_empleados.rfc, cat_depto.id_depto, cat_depto.nombre AS nombre_depto,
                        cat_puestos.id_puesto, cat_puestos.nivel, cat_puestos.nombre AS nombre_puesto, cat_tipo_trabajador.id_tipo_trabajador,cat_tipo_trabajador.nombre_tipo_trabajador as 'trabajador'");
      $this->db->from("cat_depto");
      $this->db->join("cat_empleados","cat_depto.id_depto = cat_empleados.id_depto");
      $this->db->join("cat_puestos","cat_empleados.id_puesto = cat_puestos.id_puesto");
      $this->db->join("cat_tipo_trabajador","cat_tipo_trabajador.id_tipo_trabajador = cat_empleados.id_tipo_trabajador");      

      $query = $this->db->get();
      
      if ($query->num_rows() > 0) {
          return $query->result();
      }else{
          return false;
      }
   }
   public function  select_datosRegstrados(){

    // armamos la consulta
    $query = $this->db->query('SELECT id_depto, nombre FROM cat_depto');
        // si hay resultados
      if ($query->num_rows() > 0) {
              // almacenamos en una matriz bidimensional
        foreach($query->result() as $row)
         $arrDatos[htmlspecialchars($row->id_depto, ENT_QUOTES)] =  htmlspecialchars($row->nombre, ENT_QUOTES);
       
        $query->free_result();
        return $arrDatos;
      }
   }
   public function guardar_empleado($empleado){
      return $this->db->insert('cat_empleados', $empleado);
   }
   public function updateEmpleado($id_empleado,$empleado){

              $this->db->where('id_empleado', $id_empleado);
      return $this->db->update('cat_empleados', $empleado);   
   }
   public function deshabilitarEmpleado($id){

        $deshabilitar = array('status' => 0);
        $this->db->where('id_empleado', $id);
        return $this->db->update('cat_empleados', $deshabilitar);

   }
  public function habilitarEmpleado($id){
        $habilitar = array('status' => 1);
        $this->db->where('id_empleado', $id);
        return $this->db->update('cat_empleados', $habilitar);
  }

}