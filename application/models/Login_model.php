<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function __construct() {
      parent::__construct();
      $this->load->database();

   }

   public function authUserRoot($rfc, $password){
   	 $admin = "admin";
   	 $query = $this->db->query("SELECT ct_eds.nombre, ct_eds.ap_paterno, ct_eds.ap_materno , uxe.id_usuario, ct_us.tipo_usuario
   	 						   FROM cat_usuarios ct_us, cat_empleados ct_eds, empleadosxusuario uxe
   	 						   WHERE ct_us.tipo_usuario='".$admin."' AND ct_eds.rfc='".$rfc."' AND uxe.password='".$password."' ");
   	 
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