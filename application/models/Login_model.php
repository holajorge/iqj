<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function __construct() {
      parent::__construct();
      $this->load->database();
      $this->load->library('bcrypt');

   }

   public function authUserRoot($rfc){
   	 $admin = "admin";
   	 $query = $this->db->query("SELECT ct_eds.id_empleado, ct_eds.nombre, ct_eds.ap_paterno, ct_eds.ap_materno,
                                      uxe.id_usuario, uxe.id_empleadoxusuario, uxe.password,
                                      ct_us.tipo_usuario
   	 						                 FROM cat_usuarios ct_us, cat_empleados ct_eds, empleadosxusuario uxe
   	 						                 WHERE ct_us.tipo_usuario='".$admin."' AND ct_eds.rfc='".$rfc."' ");
   	 
   	//$resultado = $query->row();
   	
   	 if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
   }
	

}

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */