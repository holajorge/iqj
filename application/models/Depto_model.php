<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Depto_model extends CI_Model {

	public function __construct(){	
      parent::__construct();
  }
   
  public function getAll(){

	  $query = $this->db->query("SELECT dp.id_depto, dp.status, dp.nombre, dc.nombre as 'direccion' 
                               FROM cat_direcciones dc, cat_depto dp 
                               WHERE dp.id_direccion = dc.id_direccion ");	  
    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }
  public function get_direcciones(){

       $this->db->select('*');
        $this->db->from('cat_direcciones');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
  }
  public function insertDepto( $depto){
   	return $this->db->insert('cat_depto', $depto);
  }
  public function updateDepto($id, $depto){

      $this->db->where('id_depto', $id);
      return $this->db->update('cat_depto', $depto);
  }
  public function deshabilitarDepto($id){
    $deshabilitar = array('status' => 0);
              $this->db->where('id_depto', $id);
    return  $this->db->update('cat_depto', $deshabilitar);
  }
  public function habilitarDepto($id){

      $habilitar = array('status' => 1);
              $this->db->where('id_depto', $id);
      return  $this->db->update('cat_depto', $habilitar);
  }

}

/* End of file Depto_model.php */
/* Location: ./application/models/Depto_model.php */