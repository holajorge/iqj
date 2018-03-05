<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function __construct() {
      parent::__construct();
      $this->load->database();
      $this->load->library('bcrypt');
   }
   public function authUserRoot($rfc){
	 $tipo = "root";
   	 $query = $this->db->query("SELECT ct_eds.id_empleado, ct_eds.nombre, ct_eds.ap_paterno, ct_eds.ap_materno,
                                      uxe.id_usuario, uxe.id_empleadoxusuario, uxe.password,
                                      ct_us.tipo_usuario
   	 						                 FROM cat_usuarios ct_us, cat_empleados ct_eds, empleadosxusuario uxe
   	 						                 WHERE ct_us.id_usuario = uxe.id_usuario
                                      AND ct_eds.id_empleado = uxe.id_empleado
                                      AND uxe.status = 1
                                      AND ct_us.tipo_usuario = '".$tipo."'
                                      AND ct_eds.rfc='".$rfc."' ");
        //var_dump($query->result()); die();
   	 if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return $this->authUserAdmin($rfc);
        }
   }
   public function authUserAdmin($rfc){

        $query = $this->db->query("SELECT cat_usuarioxsistema.id_usuarioxsistema, cat_usuarioxsistema.nombre, cat_usuarioxsistema.apellidos,
                                             cat_usuarioxsistema.rfc, cat_usuarios.tipo_usuario, cat_usuarioxsistema.password
                                    FROM cat_usuarios,
                                          cat_usuarioxsistema
                                    WHERE cat_usuarios.id_usuario = cat_usuarioxsistema.id_usuario
                                          AND cat_usuarioxsistema.status = 1
                                          AND cat_usuarios.tipo_usuario = 'admin'
                                          AND cat_usuarioxsistema.rfc= '".$rfc."' ");

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return $this->authUserFile($rfc);
        }
    }
   public function authUserFile($rfc){

        $query = $this->db->query("SELECT cat_empleados.id_empleado, cat_empleados.nombre, cat_empleados.ap_paterno,
                                          cat_empleados.ap_materno, cat_empleados.password, cat_empleados.rfc
                                   FROM cat_empleados
                                   WHERE cat_empleados.status = 1
                                      AND cat_empleados.rfc ='".$rfc."' ");

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


}

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */