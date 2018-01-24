<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Direcciones_model extends CI_Model {

  public function __construct() {
      parent::__construct();
      $this->load->database();
    }

  public function getAll(){

   	  $this->db->select('*');
   	  $this->db->from('cat_direcciones');
      $query = $this->db->get();
      if ($query->num_rows() > 0) {
            return $query->result();
      } else {
            return false;
      }
    }
  public function createDireccion($direccion){
        return $this->db->insert('cat_direcciones', $direccion );
    }
  public function updateDireccion($id, $direccion){

       $this->db->where('id_direccion', $id);
       return $this->db->update('cat_direcciones', $direccion);
    }
  public function deshabilitarDireccion($id){
    $deshabilitar = array('status' => 0);
              $this->db->where('id_direccion', $id);
    return  $this->db->update('cat_direcciones', $deshabilitar);
  }
  public function habilitarDireccion($id){

      $habilitar = array('status' => 1);
              $this->db->where('id_direccion', $id);
      return  $this->db->update('cat_direcciones', $habilitar);
  }

}

/* End of file Direeciones_model.php */
/* Location: ./application/models/Direeciones_model.php */