<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TipoEmpleado_model extends CI_Model {

	public function __construct() {
      parent::__construct();
      $this->load->database();
  }

  public function getAll(){

   		$this->db->select('*');
   		$this->db->from('cat_tipo_trabajador');
      $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
   }
   public function createTiploEmpleado($tipoEmpleao){
      return $this->db->insert('cat_tipo_trabajador', $tipoEmpleao );
   }
   public function updateTipoEmpleado($id, $tipo){
       $this->db->where('id_tipo_trabajador', $id);
       return $this->db->update('cat_tipo_trabajador', $tipo);
    }
  public function deshabilitarEmpleadoTipo($id){

        $deshabilitar = array('status' => 0);
        $this->db->where('id_tipo_trabajador', $id);
        return $this->db->update('cat_tipo_trabajador', $deshabilitar);
   }
  public function habilitarEmpleadoTipo($id){
        $habilitar = array('status' => 1);
        $this->db->where('id_tipo_trabajador', $id);
        return $this->db->update('cat_tipo_trabajador', $habilitar);
  }

}

/* End of file TipoEmpleado_model.php */
/* Location: ./application/models/TipoEmpleado_model.php */