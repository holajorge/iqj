<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Puesto_model extends CI_Model {

	public function __construct() {
      parent::__construct();
   	}

  public function getAll(){
   	 	  
        $this->db->select('*');
        $this->db->from('cat_puestos');         
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }    

  public function insertPuesto($puesto){
   	 	
      return $this->db->insert('cat_puestos', $puesto);
    }
  public function updatePuesto($id_puesto, $puesto){

      $this->db->where('id_puesto', $id_puesto);
      return $this->db->update('cat_puestos', $puesto);    
  }
  public function deshabilitarPuesto($id){
    $deshabilitar = array('status' => 0);
              $this->db->where('id_puesto', $id);
    return  $this->db->update('cat_puestos', $deshabilitar);
  }
  public function habilitarPuesto($id){

      $habilitar = array('status' => 1);
              $this->db->where('id_puesto', $id);
      return  $this->db->update('cat_puestos', $habilitar);
  }


}

/* End of file Puesto_model.php */
/* Location: ./application/models/Puesto_model.php */