<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function __construct(){	
      parent::__construct();
   	}
   	public function getAll(){
   	 	
	    $query = $this->db->query("SELECT exu.id_empleadoxusuario,  exu.status ,
										  ce.id_empleado, ce.nombre, ce.ap_paterno, ce.no_empleado, ce.rfc,
									      u.id_usuario, u.tipo_usuario as 'usuario'
									FROM cat_usuarios u , cat_empleados ce, empleadosxusuario exu 
									WHERE 	 u.id_usuario = exu.id_usuario 
											AND ce.id_empleado = exu.id_empleado AND u.tipo_usuario = 'usuario'  ");	
											
											    
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
								   		 AND cat_empleados.usuario = 0");
								   
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
	public function changePAssword($id,$cambio){
		 $this->db->where('id_empleado', $id);
    return $this->db->update('empleadosxusuario', $cambio);
	}  

	public function saveUserType($alta, $id_empleado, $usuario){
				$this->db->where('id_empleado', $id_empleado);
				$this->db->update('cat_empleados', $usuario);
		return $this->db->insert('empleadosxusuario', $alta);
	}

	public function deshabilitarUsuario($id, $id_empleado){

		
		$usuarioDeshabilitar = array('usuario' => 0);

			$this->db->where('id_empleado', $id_empleado);
			$this->db->update('cat_empleados', $usuarioDeshabilitar);

		$deshabilitar = array('status' => 0);
            $this->db->where('id_empleadoxusuario', $id);
   		return $this->db->update('empleadosxusuario', $deshabilitar);
	}
	public function habilitarUsuario($id, $id_empleado){

		$usuariohabilitar = array('usuario' => 1);

			$this->db->where('id_empleado', $id_empleado);
			$this->db->update('cat_empleados', $usuariohabilitar);

		$habilitar = array('status' => 1);

              $this->db->where('id_empleadoxusuario', $id);
      return  $this->db->update('empleadosxusuario', $habilitar);
	}


}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */