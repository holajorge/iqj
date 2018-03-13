<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function __construct(){	
      parent::__construct();
   	}
   	public function getAll(){
   	 	
	    $query = $this->db->query("SELECT exu.id_usuarioxsistema, exu.nombre, exu.apellidos, exu.rfc, exu.status , 
                                     u.id_usuario, u.tipo_usuario as 'usuario'
                                  FROM cat_usuarios u ,cat_usuarioxsistema exu 
                                  WHERE u.id_usuario = exu.id_usuario 
                                        ");
	    if ($query->num_rows() > 0) {
	        return $query->result();
	    } else {
	        return false;
	    }
    }
    public function getAllUsuariosEmpleados(){

        $query = $this->db->query("SELECT empleadosxusuario.id_empleadoxusuario, empleadosxusuario.id_empleado, empleadosxusuario.status,
                                            cat_empleados.nombre , cat_empleados.ap_paterno, cat_empleados.ap_materno ,  cat_empleados.rfc, cat_empleados.no_plaza,
                                            cat_usuarios.tipo_usuario as 'usuario' 
                                    FROM cat_usuarios,empleadosxusuario, cat_empleados
                                    WHERE cat_usuarios.id_usuario = empleadosxusuario.id_usuario 
                                            AND cat_empleados.id_empleado = empleadosxusuario.id_empleado                                      
                                          ORDER BY cat_empleados.no_plaza ");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function getAllTipoUser(){

    	$this->db->select("*");
    	$this->db->from("cat_usuarios");

    	$query = $this->db->get();
	    if ($query->num_rows() > 0) {
	        return $query->result();
	    } else {
	        return false;
	    }
    }
    /*  NO SE ESTA USANDO */
    public function getAllEmpleado(){

    	$query = $this->db->query("SELECT cat_empleados.id_empleado, cat_empleados.no_plaza,cat_empleados.no_empleado, cat_empleados.nombre, cat_empleados.ap_paterno, 
										cat_empleados.ap_materno, cat_empleados.fecha_nacimiento, cat_empleados.rfc,
										cat_tipo_trabajador.nombre_tipo_trabajador as trabajador,
										cat_depto.nombre as depto, 
										cat_puestos.nombre as puesto
								   FROM  cat_empleados , cat_tipo_trabajador, cat_depto, cat_puestos
								   WHERE cat_tipo_trabajador.id_tipo_trabajador = cat_empleados.id_tipo_trabajador
								   		 AND cat_depto.id_depto = cat_empleados.id_depto
								   		 AND cat_puestos.id_puesto = cat_empleados.id_puesto
								   		 AND cat_empleados.status = 1 
								   		 AND cat_empleados.password = 0");
	    if ($query->num_rows() > 0) {
	        return $query->result();
	    } else {
	        return false;
	    }
    }
    /* fin ESTE METODO*/
    public function getAllEmploye_casiUser(){
        $query = $this->db->query("select cat_empleados.id_empleado, cat_empleados.no_plaza, cat_empleados.rfc, cat_empleados.nombre, cat_empleados.ap_paterno, cat_empleados.ap_materno
                                    from cat_empleados
                                    left join empleadosxusuario on empleadosxusuario.id_empleado = cat_empleados.id_empleado
                                    where empleadosxusuario.id_empleado IS NULL
                                            ORDER BY cat_empleados.no_plaza");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
	public function getInfoProfile($id_empleado){

		$query = $this->db->query("SELECT cat_empleados.id_empleado, cat_empleados.no_plaza,cat_empleados.no_empleado, cat_empleados.nombre, cat_empleados.ap_paterno, 
										cat_empleados.ap_materno, cat_empleados.fecha_nacimiento, cat_empleados.curp, cat_empleados.rfc,
										cat_tipo_trabajador.nombre_tipo_trabajador as trabajador,
										cat_depto.nombre as depto, 
										cat_puestos.nombre as puesto,
										cat_usuarios.tipo_usuario as tipo
								   FROM  cat_empleados , cat_tipo_trabajador, cat_depto, cat_puestos, cat_usuarios, empleadosxusuario
								   WHERE cat_tipo_trabajador.id_tipo_trabajador = cat_empleados.id_tipo_trabajador								   		 
								   		 AND cat_depto.id_depto = cat_empleados.id_depto
								   		 AND cat_puestos.id_puesto = cat_empleados.id_puesto
								   		 AND cat_usuarios.id_usuario = empleadosxusuario.id_usuario
								   		 AND cat_empleados.id_empleado = empleadosxusuario.id_empleado
								   		 AND cat_empleados.id_empleado = '".$id_empleado."' ");
	    
	    if ($query->num_rows() > 0) {
	        return $query->result();
	    } else {
	        return false;
	    }
	}
	public function getInfoProfileNoEmployee($id_usuarioxsistema){
        $query = $this->db->query("SELECT cat_usuarioxsistema.id_usuarioxsistema, cat_usuarioxsistema.nombre, cat_usuarioxsistema.apellidos, cat_usuarioxsistema.rfc,
                                          cat_usuarios.id_usuario, cat_usuarios.tipo_usuario
                                   FROM cat_usuarioxsistema, cat_usuarios
                                   WHERE cat_usuarioxsistema.id_usuario = cat_usuarios.id_usuario
                                        AND cat_usuarioxsistema.id_usuarioxsistema = '".$id_usuarioxsistema."' ");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
	public function changePAssword($id,$cambio){
		 $this->db->where('id_empleado', $id);
    return $this->db->update('empleadosxusuario', $cambio);
	}
    public function changePAsswordUserNoRegister($id,$cambio){
        $this->db->where('id_usuarioxsistema', $id);
        return $this->db->update('cat_usuarioxsistema', $cambio);
    }
    public function resetearPaswordEmpleado($id_empleado, $resetear){
        $this->db->where('id_empleado', $id_empleado);
        return $this->db->update('cat_empleados', $resetear);
    }
    public function changePasswordEmploye($id_empleado,$password){
	    $datos = array('password' => $password);
        $this->db->where('id_empleado', $id_empleado);
        return $this->db->update('cat_empleados', $datos);
    }
    public function changePAsswordUserAdmin($id_usuarioxsistema,$cambio){
        $this->db->where('id_usuarioxsistema', $id_usuarioxsistema);
        return $this->db->update('cat_usuarioxsistema', $cambio);
    }
    public function save_user_no_registrado($alta){
		return $this->db->insert('cat_usuarioxsistema', $alta);
	}
    public function guardaUsuarioRegistrado($alta){
        return $this->db->insert('empleadosxusuario', $alta);
    }
	public function deshabilitarUsuario($id){

		$deshabilitar = array('status' => 0);
        $this->db->where('id_usuarioxsistema', $id);
   		return $this->db->update('cat_usuarioxsistema', $deshabilitar);
	}
	public function deshabilitarUsuarioEmpleado($id){

        $deshabilitar = array('status' => 0);
        $this->db->where('id_empleadoxusuario', $id);
        return $this->db->update('empleadosxusuario', $deshabilitar);

    }
	public function habilitarUsuario($id){

		$habilitar = array('status' => 1);
              $this->db->where('id_usuarioxsistema', $id);
      return  $this->db->update('cat_usuarioxsistema', $habilitar);
	}
	public function habilitarUsuarioEmpleado($id){

        $habilitar = array('status' => 1);

        $this->db->where('id_empleadoxusuario', $id);
        return  $this->db->update('empleadosxusuario', $habilitar);
    }
    public function getListEmployeeChangePass(){
        $this->db->select("cat_empleados.id_empleado, cat_empleados.horas, cat_empleados.nss, cat_empleados.status , cat_empleados.no_empleado, cat_empleados.no_plaza, cat_empleados.nombre AS nombre_emp, 
                        cat_empleados.ap_paterno, cat_empleados.ap_materno, cat_empleados.fecha_nacimiento,  cat_empleados.curp, 
                        cat_empleados.fecha_ingreso, cat_empleados.rfc, cat_depto.id_depto, cat_depto.nombre AS nombre_depto,
                        cat_puestos.id_puesto, cat_puestos.nivel, cat_puestos.nombre AS nombre_puesto, cat_tipo_trabajador.id_tipo_trabajador,cat_tipo_trabajador.nombre_tipo_trabajador as trabajador,
                        cat_componentes.nombre AS componente ");
        $this->db->from("cat_depto");
        $this->db->join("cat_empleados","cat_depto.id_depto = cat_empleados.id_depto");
        $this->db->join("cat_puestos","cat_empleados.id_puesto = cat_puestos.id_puesto");
        $this->db->join("cat_componentes","cat_componentes.id_componente = cat_empleados.id_componente");
        $this->db->join("cat_tipo_trabajador","cat_tipo_trabajador.id_tipo_trabajador = cat_empleados.id_tipo_trabajador");
        $this->db->where("cat_empleados.status", 1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function editUserEmployeRegister($id_empleadoxusuario, $datos){
        $this->db->where('id_empleadoxusuario', $id_empleadoxusuario);
        return $this->db->update('empleadosxusuario', $datos);
    }
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */