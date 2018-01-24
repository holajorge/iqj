<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function __construct(){	
      parent::__construct();
   	}

   	public function getAll(){
   	 	
	    $query = $this->db->query("SELECT exu.id_empleadoxusuario, ce.nombre, ce.ap_paterno, cu.tipo_usuario as 'usuario', exu.status FROM cat_usuarios cu , cat_empleados ce, empleadosxusuario exu WHERE cu.id_usuario = exu.id_usuario AND ce.id_empleado = exu.id_empleado AND status = 1  ");
	    
	    if ($query->num_rows() > 0) {
	        return $query->result();
	    } else {
	        return false;
	    }
   }
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */