<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aportaciones_model extends CI_Model {

  public function getAll(){
     	 	$this->db->select('*');      
        $this->db->from('cat_aportaciones');        
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
  }

  public function get_apor_activos(){
        $this->db->select('*');      
        $this->db->from('cat_aportaciones');
        $this->db->where('status',1);        
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
  }
  public function createAportacion($aportacion){
    
    return $this->db->insert('cat_aportaciones',$aportacion);
  }
  public function updateAportacion($id, $aportacion){
    $this->db->where('id_aportacion', $id);
    return $this->db->update('cat_aportaciones', $aportacion);
  }
  public function deshabilitarAportacion($id){
    $deshabilitar = array('status' => 0);
              $this->db->where('id_aportacion', $id);
    return  $this->db->update('cat_aportaciones', $deshabilitar);
  }
  public function habilitarAportacion($id){

      $habilitar = array('status' => 1);
              $this->db->where('id_aportacion', $id);
      return  $this->db->update('cat_aportaciones', $habilitar);
  }


}