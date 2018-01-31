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
	public function getInfoProfile($id_empleado){

		$query = $this->db->query("SELECT cat_empleados.id_empleado, cat_empleados.no_plaza,cat_empleados.no_empleado, cat_empleados.nombre, cat_empleados.ap_paterno, cat_empleados.ap_materno, cat_empleados.fecha_nacimiento,
									cat_tipo_trabajador.nombre_tipo_trabajador as trabajador,
									cat_depto.nombre as depto, 
									cat_puestos.nombre as puesto						
								   FROM  cat_empleados , cat_tipo_trabajador, cat_depto, cat_puestos
								   WHERE cat_tipo_trabajador.id_tipo_trabajador = cat_empleados.id_tipo_trabajador								   		 
								   		 AND cat_depto.id_depto = cat_empleados.id_depto
								   		 AND cat_puestos.id_puesto = cat_empleados.id_puesto
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

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */