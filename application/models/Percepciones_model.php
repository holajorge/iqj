<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Percepciones_model extends CI_Model {

	public function __construct() {
      parent::__construct();
   }
   
   public function getAll(){
   	 	  
        $this->db->select('*');
        $this->db->from('cat_percepciones');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
   }

   public function get_per_activos(){

        $this->db->select('*');
        $this->db->from('cat_percepciones');
        $this->db->where('status',1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
   }
  public function existIndicador($indicador){
      $query= $this->db->query("select * from cat_percepciones where indicador='".$indicador."'");             
      if ($query -> num_rows() > 0){
        return true;
      }else{
       return false;
      }
  }
  public function insertPercepciones( $percepcion){
   	 	return $this->db->insert('cat_percepciones', $percepcion);
  }

  public function updatePercepciones($id, $percepcion){
             $this->db->where('id_percepcion', $id);
      return $this->db->update('cat_percepciones', $percepcion);

  }
  function deshabilitarPercepcion($id){
              
      $deshabilitar = array('status' => 0);
              $this->db->where('id_percepcion', $id);
      return  $this->db->update('cat_percepciones', $deshabilitar);
  }

  public function habilitarPercepcion($id){

      $habilitar = array('status' => 1);
              $this->db->where('id_percepcion', $id);
      return  $this->db->update('cat_percepciones', $habilitar);
  }

}

/* End of file Percepciones_model.php */
/* Location: ./application/models/Percepciones_model.php */