<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function __construct() {
      parent::__construct();
      $this->load->database();
      $this->load->library('bcrypt');
   }
    public function loginUserEmpleadoXusuario($rfc){
        $this->db->select("cat_empleados.id_empleado, cat_empleados.nombre, cat_empleados.ap_paterno, cat_empleados.ap_materno,
                           empleadosxusuario.id_usuario, empleadosxusuario.id_empleadoxusuario, empleadosxusuario.password, cat_usuarios.tipo_usuario");
        $this->db->from("cat_empleados");
        $this->db->join("empleadosxusuario","cat_empleados.id_empleado = empleadosxusuario.id_empleado");
        $this->db->join("cat_usuarios","empleadosxusuario.id_usuario = cat_usuarios.id_usuario");
        $this->db->where("cat_empleados.rfc = ", $rfc);
        $this->db->where("empleadosxusuario.status", 1);
        $query =  $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function loginUserSistema($rfc){
        $this->db->select("cat_usuarioxsistema.id_usuarioxsistema, cat_usuarioxsistema.nombre, cat_usuarioxsistema.apellidos, cat_usuarioxsistema.rfc,
                            cat_usuarioxsistema.password, cat_usuarios.id_usuario, cat_usuarios.tipo_usuario");
        $this->db->from("cat_usuarioxsistema");
        $this->db->join("cat_usuarios","cat_usuarioxsistema.id_usuario =  cat_usuarios.id_usuario");
        $this->db->where("cat_usuarioxsistema.rfc = ", $rfc);
        $this->db->where("cat_usuarioxsistema.status =", 1);
        $query =  $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function loginUserTimbres($rfc){
        $this->db->select("cat_empleados.id_empleado, cat_empleados.nombre, cat_empleados.ap_paterno, cat_empleados.ap_materno, cat_empleados.rfc,
                            cat_empleados.password");
        $this->db->from("cat_empleados");
        $this->db->where("cat_empleados.rfc = ", $rfc);
        $this->db->where("cat_empleados.status =", 1);
        $query =  $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


}

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */