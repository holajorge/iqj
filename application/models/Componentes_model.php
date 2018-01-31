<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Componentes_model extends CI_Model {
	
	public function getAll(){
     	
     	$this->db->select('*');      
        $this->db->from('cat_componentes');
        $this->db->order_by('id_componente', 'DESC');        
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
  	}

  	public function createComponente($componente){
  		return $this->db->insert('cat_componentes',$componente);
  	}
  	public function updateComponente($id, $componente){
  				$this->db->where('id_componente', $id);
  		return $this->db->update('cat_componentes', $componente);
  	}

}

/* End of file Componentes_model.php */
/* Location: ./application/models/Componentes_model.php */