<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Periodos_model extends CI_Model {

	public function __construct() {
      parent::__construct();
      $this->load->database();
   }
   public function getAll(){
   		$this->db->select('*');
        $this->db->from('tab_nomina');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
   }
   public function createPeriodo($periodo){
   		return $this->db->insert('tab_nomina', $periodo);
   }
   public function updatePeriodo($id,$periodo){
       $this->db->where('id_nomina', $id);
      return $this->db->update('tab_nomina', $periodo);
   }

   /*Nuevo*/
   public function deletNominaEmpleado($id_empleado,$id_nomina){
      $this->db->query("DELETE FROM empleadosxaportaciones
                        WHERE empleadosxaportaciones.id_empleado = ".$id_empleado." 
                        AND empleadosxaportaciones.id_nomina = ".$id_nomina);
      $this->db->query("DELETE FROM empleadosxdeducciones
                        WHERE empleadosxdeducciones.id_empleado = ".$id_empleado." 
                        AND empleadosxdeducciones.id_nomina = ".$id_nomina);
      return $this->db->query("DELETE FROM empleadosxpercepciones
                        WHERE empleadosxpercepciones.id_empleado = ".$id_empleado." 
                        AND empleadosxpercepciones.id_nomina = ".$id_nomina);
   }
}

/* End of file Periodos_model.php */
/* Location: ./application/models/Periodos_model.php */