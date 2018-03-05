<?php 
defined('BASEPATH') or exit('No direct script access allowed');
class Nomina_model extends CI_Model { 
  public function __construct() {
      parent::__construct();
   }   
  public function getAll(){
   		$this->db->select('*');      
      	$this->db->from('tab_nomina');
      	$query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
   	}
  public function gelAllCX(){
        $query = $this->db->query("SELECT * FROM cat_nomina_extraordinaria WHERE year(fecha) = (
                                  SELECT MAX(year(fecha)) AS anio
                                  FROM cat_nomina_extraordinaria)");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
  }

  //SE OBTIENEN LOS REGISTROS DE LAS NOMINAS EXTRAORDINARIAS DEL AÑO SELECCIONADO
  public function getNomEAnioSeleccionado($anio){
      $query = $this->db->query("SELECT * FROM cat_nomina_extraordinaria WHERE year(fecha) = ".$anio);
      if ($query->num_rows() > 0) {
          return $query->result();
      } else {
          return false;
      }
  }

  public function gelAllCextraordinarios(){
      $this->db->select('*');
        $this->db->from('cat_concepto_extraordinario');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
  }
//SE OBTIENE TODOS LOS AÑOS EXISTENDES DE LAS NOMINAS EXTRAORDINARIAS
  public function gelAllYearsNomE(){
        $query = $this->db->query("SELECT id_nomina_e, YEAR(fecha) as year from cat_nomina_extraordinaria group by year ORDER BY year");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
  }

  public function getAllPeriodos(){

    $query = $this->db->query("SELECT * FROM tab_nomina");
      if ($query->num_rows() > 0) {
          return $query->result();
      }else{
          return false;
      }
  }
  public function getAllPeriodosExtraordinario(){
    $query = $this->db->query("SELECT * FROM cat_nomina_extraordinaria");    
      if ($query->num_rows() > 0) {
          return $query->result();
      }else{
          return false;
      }
    }

  public function insertConceptoExtraoridinario($extraordinario){
	    return $this->db->insert('cat_nomina_extraordinaria', $extraordinario);
	}
  public function insertNominaExtraordinaria($nominaExtraordinaria){
    return $this->db->insert('empleadosxextraoudinaria', $nominaExtraordinaria);
  }
  public function editNominaExtraordinaria($id, $editNominaExtraordi){
           $this->db->where('id_extraordinario', $id);        
    return $this->db->update('empleadosxextraoudinaria', $editNominaExtraordi);
  }
  public function buscar_periodo($id_nomina){

      $query = $this->db->query("SELECT ce.id_empleado, tn.id_nomina, (SELECT SUM(empleadosxpercepciones.importe)
                    FROM cat_empleados
                    INNER JOIN empleadosxpercepciones ON cat_empleados.id_empleado = empleadosxpercepciones.id_empleado
                    INNER JOIN cat_percepciones ON empleadosxpercepciones.id_percepcion = cat_percepciones.id_percepcion
                    INNER JOIN tab_nomina ON empleadosxpercepciones.id_nomina = tab_nomina.id_nomina
                    WHERE tab_nomina.id_nomina = ".$id_nomina." AND cat_empleados.id_empleado = ce.id_empleado) as totalPercepciones,
                    (select cat_empleadosxtimbrados.file_name 
							from cat_empleadosxtimbrados
							where cat_empleadosxtimbrados.id_empleado = ce.id_empleado and cat_empleadosxtimbrados.id_nomina = ".$id_nomina.") as filename,
                    (SELECT SUM(empleadosxdeducciones.importe) FROM cat_empleados INNER JOIN empleadosxdeducciones ON cat_empleados.id_empleado = empleadosxdeducciones.id_empleado INNER JOIN cat_deducciones ON empleadosxdeducciones.id_deduccion = cat_deducciones.id_deduccion INNER JOIN tab_nomina ON empleadosxdeducciones.id_nomina = tab_nomina.id_nomina WHERE tab_nomina.id_nomina = ".$id_nomina." AND cat_empleados.id_empleado = ce.id_empleado) AS totalDeducciones, (SELECT SUM(empleadosxaportaciones.importe)
                    FROM cat_empleados
                    INNER JOIN empleadosxaportaciones ON cat_empleados.id_empleado = empleadosxaportaciones.id_empleado
                    INNER JOIN cat_aportaciones ON empleadosxaportaciones.id_aportacion = cat_aportaciones.id_aportacion
                    INNER JOIN tab_nomina ON empleadosxaportaciones.id_nomina = tab_nomina.id_nomina
                    WHERE tab_nomina.id_nomina = ".$id_nomina." AND cat_empleados.id_empleado = ce.id_empleado) AS totalAportaciones,(SELECT empleadosxaportaciones.importe as imp
                    FROM cat_empleados
                    INNER JOIN empleadosxaportaciones ON cat_empleados.id_empleado = empleadosxaportaciones.id_empleado
                    INNER JOIN cat_aportaciones ON empleadosxaportaciones.id_aportacion = cat_aportaciones.id_aportacion
                    INNER JOIN tab_nomina ON empleadosxaportaciones.id_nomina = tab_nomina.id_nomina
                    WHERE tab_nomina.id_nomina = ".$id_nomina." AND cat_empleados.id_empleado = ce.id_empleado AND empleadosxaportaciones.id_aportacion = 9 GROUP by imp) AS subsidioAlEmpleo, ce.no_plaza, ce.rfc, ce.nombre  AS nombre_emp, ce.ap_paterno,  ce.ap_materno, ce.fecha_ingreso, cd.nombre as 'depto', cp.nombre as 'puesto',  ce.curp 
                    FROM empleadosxpercepciones  exp, cat_empleados ce, tab_nomina tn,  cat_depto cd, cat_puestos cp
                    WHERE cp.id_puesto=ce.id_puesto 
                        AND cd.id_depto=ce.id_depto 
                        AND ce.id_empleado=exp.id_empleado 
                        AND exp.id_nomina=tn.id_nomina 
                        AND tn.id_nomina= ".$id_nomina."
                        GROUP BY exp.id_empleado");

      if ($query->num_rows() > 0) {
          return $query->result();          
      }else{
          return false;
      }
  }
   public function buscar_periodoList($id_nomina){

      $query = $this->db->query("SELECT ce.id_empleado, tn.id_nomina, (SELECT SUM(empleadosxpercepciones.importe)
                    FROM cat_empleados
                    INNER JOIN empleadosxpercepciones ON cat_empleados.id_empleado = empleadosxpercepciones.id_empleado
                    INNER JOIN cat_percepciones ON empleadosxpercepciones.id_percepcion = cat_percepciones.id_percepcion
                    INNER JOIN tab_nomina ON empleadosxpercepciones.id_nomina = tab_nomina.id_nomina
                    WHERE tab_nomina.id_nomina = ".$id_nomina." AND cat_empleados.id_empleado = ce.id_empleado) as totalPercepciones, (SELECT SUM(empleadosxdeducciones.importe) FROM cat_empleados INNER JOIN empleadosxdeducciones ON cat_empleados.id_empleado = empleadosxdeducciones.id_empleado INNER JOIN cat_deducciones ON empleadosxdeducciones.id_deduccion = cat_deducciones.id_deduccion INNER JOIN tab_nomina ON empleadosxdeducciones.id_nomina = tab_nomina.id_nomina WHERE tab_nomina.id_nomina = ".$id_nomina." AND cat_empleados.id_empleado = ce.id_empleado) AS totalDeducciones, (SELECT SUM(empleadosxaportaciones.importe)
                    FROM cat_empleados
                    INNER JOIN empleadosxaportaciones ON cat_empleados.id_empleado = empleadosxaportaciones.id_empleado
                    INNER JOIN cat_aportaciones ON empleadosxaportaciones.id_aportacion = cat_aportaciones.id_aportacion
                    INNER JOIN tab_nomina ON empleadosxaportaciones.id_nomina = tab_nomina.id_nomina
                    WHERE tab_nomina.id_nomina = ".$id_nomina." AND cat_empleados.id_empleado = ce.id_empleado) AS totalAportaciones,(SELECT empleadosxaportaciones.importe as imp
                    FROM cat_empleados
                    INNER JOIN empleadosxaportaciones ON cat_empleados.id_empleado = empleadosxaportaciones.id_empleado
                    INNER JOIN cat_aportaciones ON empleadosxaportaciones.id_aportacion = cat_aportaciones.id_aportacion
                    INNER JOIN tab_nomina ON empleadosxaportaciones.id_nomina = tab_nomina.id_nomina
                    WHERE tab_nomina.id_nomina = ".$id_nomina." AND cat_empleados.id_empleado = ce.id_empleado AND empleadosxaportaciones.id_aportacion = 9 GROUP by imp) AS subsidioAlEmpleo, ce.no_plaza, ce.rfc, ce.nombre  AS nombre_emp, ce.ap_paterno,  ce.ap_materno, ce.fecha_ingreso, cd.nombre as 'depto', cp.nombre as 'puesto',  ce.curp 
                    FROM empleadosxpercepciones  exp, cat_empleados ce, tab_nomina tn,  cat_depto cd, cat_puestos cp
                    WHERE cp.id_puesto=ce.id_puesto 
                        AND cd.id_depto=ce.id_depto 
                        AND ce.id_empleado=exp.id_empleado 
                        AND exp.id_nomina=tn.id_nomina 
                        AND tn.id_nomina= ".$id_nomina."
                        GROUP BY ce.no_plaza");
      var_dump($query->result());
      if ($query->num_rows() > 0) {
          return $query->result();          
      }else{
          return false;
      }
  }
  public function seach_diaExtraordinario($id_extra){

      $query = $this->db->query("SELECT ce.id_empleado, YEAR(cpex.fecha) as yearNomE,exe.id_nomina_e, ce.no_plaza,ce.horas, ce.rfc, ce.curp, ce.nombre  AS nombre_emp, 
                                  ce.ap_paterno,  ce.ap_materno, ce.fecha_nacimiento, ce.fecha_ingreso, cd.nombre as 'depto', cp.nombre as 'puesto' , 
                                  exe.importeGravado,exe.importeExento, exe.isrSubsidio , exe.importeIsrSub, exe.id_extraordinario,
                                  cpex.nombre as conseptoextra,
                                  (SELECT TNE.file_name FROM cat_empleados_x_timbrados_nome TNE 
                                  WHERE TNE.id_empleado = ce.id_empleado 
                                  and TNE.id_nomina_e = '".$id_extra."') as file_name 
                                FROM cat_nomina_extraordinaria  cpex, cat_empleados ce, empleadosxextraoudinaria exe,  cat_depto cd, cat_puestos cp
                                WHERE cp.id_puesto=ce.id_puesto 
                                    AND cd.id_depto=ce.id_depto 
                                    AND ce.id_empleado=exe.id_empleado 
                                    AND cpex.id_nomina_e=exe.id_nomina_e                                   
                                    AND cpex.id_nomina_e='".$id_extra."' 
                                    GROUP BY exe.id_empleado");

      if ($query->num_rows() > 0) {        
          return $query->result();          
      }else{
          return false;
      }
  }
  public function guardar_percepciones_nomina($id_nomina,$id_empleado,$data_percepciones){
    for ($i=0; $i < (count($data_percepciones)- 1); $i++) { 
      $percepciones_nomina = array(
                    'id_empleado' => $id_empleado, 
                    'id_percepcion' => $data_percepciones[$i]["id"],
                    'importe' => $data_percepciones[$i]["importe"],
                    'id_nomina' => $id_nomina
                    );
      $this->db->insert('empleadosxpercepciones', $percepciones_nomina);
    }
    
    return true;
  }

  public function guardar_deducciones_nomina($id_nomina,$id_empleado,$data_deducciones){
    for ($i=0; $i < (count($data_deducciones) - 1); $i++) { 
      $deducciones_nomina = array(
                    'id_empleado' => $id_empleado, 
                    'id_deduccion' => $data_deducciones[$i]["id"],
                    'importe' => $data_deducciones[$i]["importe"],
                    'id_nomina' => $id_nomina
                    );
      $this->db->insert('empleadosxdeducciones', $deducciones_nomina);
    }
    
    return true;
  }

  public function guardar_aportaciones_nomina($id_nomina,$id_empleado,$data_aportaciones){
    for ($i=0; $i < (count($data_aportaciones) - 1); $i++) { 
      $aportaciones_nomina = array(
                    'id_empleado' => $id_empleado, 
                    'id_aportacion' => $data_aportaciones[$i]["id"],
                    'importe' => $data_aportaciones[$i]["importe"],
                    'id_nomina' => $id_nomina
                    );
      $this->db->insert('empleadosxaportaciones', $aportaciones_nomina);
    }
    
    return true;
  }
  //***************************************************************************
  //DATOS DEL EMPLEADO POR NOMINA PARA EL ENCABEZADO DEL PDF
  //***************************************************************************
  public function datos_empleado_nomina($id_empleado, $id_nomina){

    $query = $this->db->query("SELECT cat_empleados.id_empleado, cat_empleados.no_empleado, cat_empleados.nombre as 'empleado', cat_empleados.ap_paterno, cat_empleados.ap_materno, cat_empleados.curp, cat_empleados.no_plaza,  cat_empleados.rfc,cat_empleados.nss, cat_empleados.nivel as 'nivelEmpleado', cat_empleados.no_tarjeta,cat_empleados.sindicalizado,cat_empleados.fecha_ingreso,cat_empleados.horas, cat_puestos.nombre as 'puesto',
                      cat_depto.nombre as 'depto', cat_empleados.no_empleado, tab_nomina.id_nomina ,tab_nomina.periodo_inicio, tab_nomina.periodo_fin, tab_nomina.periodo_quinquenal, cat_tipo_trabajador.id_tipo_trabajador,cat_tipo_trabajador.nombre_tipo_trabajador as 'trabajador'
                      FROM cat_percepciones
                      INNER JOIN empleadosxpercepciones ON cat_percepciones.id_percepcion = empleadosxpercepciones.id_percepcion
                      INNER JOIN tab_nomina ON empleadosxpercepciones.id_nomina = tab_nomina.id_nomina
                      INNER JOIN cat_empleados ON empleadosxpercepciones.id_empleado = cat_empleados.id_empleado
                      INNER JOIN cat_puestos ON cat_empleados.id_puesto = cat_puestos.id_puesto
                      INNER JOIN cat_depto ON cat_empleados.id_depto = cat_depto.id_depto
                      INNER JOIN cat_tipo_trabajador on cat_empleados.id_tipo_trabajador = cat_tipo_trabajador.id_tipo_trabajador
                      AND cat_empleados.id_empleado =  ".$id_empleado."
                        AND tab_nomina.id_nomina = ".$id_nomina." group by cat_empleados.id_empleado");

      if ($query->num_rows() > 0) {
          return $query->result();
      }else{
          return false;
      }

  }
  //***************************************************************************
  //DATOS DE LISTA DE EMPLEADOS POR NOMINA PARA EL ENCABEZADO DEL PDF
  //***************************************************************************
  public function datos_lista_empleado($id_nomina){

      $query = $this->db->query("SELECT  tab_nomina.periodo_inicio, tab_nomina.periodo_fin, tab_nomina.periodo_quinquenal
                                  FROM tab_nomina
                                  WHERE tab_nomina.id_nomina = ".$id_nomina." ");

      if ($query->num_rows() > 0) {
          return $query->result();
      }else{
          return false;
      }

  }

   //***************************************************************************
  //VALIDAR QUE NO EXISTA DUPLICIDAD EN LOS LA NÓMINA EXTRAORDINARIA
  //***************************************************************************
  public function validarNoDuplicidadNomE($id_empleado, $id_nomina_e){
    $query = $this->db->query("SELECT * FROM empleadosxextraoudinaria 
                                WHERE empleadosxextraoudinaria.id_empleado = ".$id_empleado." 
                                and empleadosxextraoudinaria.id_nomina_e = ".$id_nomina_e);
    if ($query->num_rows() > 0) {
          return $query->result();
      }else{
          return false;
      }
  }
  //***************************************************************************
  //OBTENER REGISTRO DE NÓMINA EXTRAORDINARIA
  //***************************************************************************
  public function getInfoNomE($id_nomina_e){
    $query = $this->db->query("SELECT * FROM cat_nomina_extraordinaria WHERE id_nomina_e = ".$id_nomina_e);
    if ($query->num_rows() > 0) {
          return $query->result();
      }else{
          return false;
      }
  }
  //***************************************************************************
  //IMPORTE Y ISR POR NOMINA EXTRAORDINARIA PARA EL BODY DEL PDF
  //***************************************************************************
  public function extraordinaria_nomina($id_empleado, $id_extraordinario){

    $query = $this->db->query("SELECT cat_empleados.no_plaza, empleadosxextraoudinaria.importeGravado,empleadosxextraoudinaria.importeExento, empleadosxextraoudinaria.isrSubsidio,empleadosxextraoudinaria.importeIsrSub, 
                                      cat_empleados.nombre, cat_empleados.ap_paterno, cat_empleados.ap_materno
                                FROM empleadosxextraoudinaria, cat_empleados, cat_nomina_extraordinaria
                                WHERE cat_empleados.id_empleado = empleadosxextraoudinaria.id_empleado
                                      AND empleadosxextraoudinaria.id_nomina_e = cat_nomina_extraordinaria.id_nomina_e
                                      AND cat_empleados.id_empleado = '".$id_empleado."'
                                      AND empleadosxextraoudinaria.id_nomina_e = '".$id_extraordinario."'");
                             
      if ($query->num_rows() > 0) {
          return $query->result();
      }else{
          return false;
      }

  }

  //***************************************************************************
  //PERCEPCIONES POR NOMINA PARA EL PDF
  //***************************************************************************
  public function percepciones_nomina($id_empleado, $id_nomina){

    $query = $this->db->query("SELECT cat_percepciones.id_percepcion, cat_percepciones.indicador,cat_percepciones.codigoSat, cat_percepciones.nombre,  cat_percepciones.formula, empleadosxpercepciones.importe, 
                      cat_empleados.nombre as empleado, cat_empleados.curp, cat_empleados.no_plaza,  cat_empleados.rfc , cat_puestos.nombre as 'puesto',
                      cat_depto.nombre as 'depto', cat_empleados.no_empleado, tab_nomina.periodo_inicio, tab_nomina.periodo_fin, tab_nomina.periodo_quinquenal
                   FROM cat_percepciones, empleadosxpercepciones, tab_nomina,  cat_empleados, cat_puestos, cat_depto
                   WHERE cat_empleados.id_empleado = empleadosxpercepciones.id_empleado 
                      AND cat_depto.id_depto = cat_empleados.id_depto
                      AND cat_empleados.id_puesto = cat_puestos.id_puesto
                    AND empleadosxpercepciones.id_percepcion = cat_percepciones.id_percepcion 
                    AND empleadosxpercepciones.id_nomina = tab_nomina.id_nomina 
                        AND cat_empleados.id_empleado =  '".$id_empleado."'
                        AND tab_nomina.id_nomina = '".$id_nomina."' order by cat_percepciones.id_percepcion");

      if ($query->num_rows() > 0) {
          return $query->result();
      }else{
          return false;
      }

  }
  //***************************************************************************
  //DEDUCCIONES POR NÓMINA PARA EL PDF
  //***************************************************************************
  public function deducciones_nomina($id_empleado, $id_nomina){

    $query = $this->db->query("SELECT cat_deducciones.id_deduccion, cat_deducciones.indicador, cat_deducciones.codigoSat,cat_deducciones.nombre,empleadosxdeducciones.importe, 
                      cat_empleados.nombre as empleado, cat_empleados.ap_paterno, cat_empleados.ap_materno, cat_empleados.curp, cat_empleados.no_plaza,  cat_empleados.rfc , cat_puestos.nombre as 'puesto',
                      cat_depto.nombre as 'depto', cat_empleados.no_empleado, tab_nomina.periodo_inicio, tab_nomina.periodo_fin, tab_nomina.periodo_quinquenal
                   FROM cat_deducciones, empleadosxdeducciones, tab_nomina,  cat_empleados, cat_puestos, cat_depto
                   WHERE cat_empleados.id_empleado = empleadosxdeducciones.id_empleado 
                      AND cat_depto.id_depto = cat_empleados.id_depto
                      AND cat_empleados.id_puesto = cat_puestos.id_puesto
                    AND empleadosxdeducciones.id_deduccion = cat_deducciones.id_deduccion 
                    AND empleadosxdeducciones.id_nomina = tab_nomina.id_nomina 
                        AND cat_empleados.id_empleado =  '".$id_empleado."'
                        AND tab_nomina.id_nomina = '".$id_nomina."' order by cat_deducciones.id_deduccion");

      if ($query->num_rows() > 0) {
          return $query->result();
      }else{
          return false;
      }

  }

  //***************************************************************************
  //APORTACIONES POR NÓMINA PARA EL PDF
  //***************************************************************************
  public function aportaciones_nomina($id_empleado, $id_nomina){

    $query = $this->db->query("SELECT cat_aportaciones.id_aportacion, cat_aportaciones.indicador, cat_aportaciones.nombre,empleadosxaportaciones.importe, 
                      cat_empleados.nombre as empleado, cat_empleados.ap_paterno, cat_empleados.ap_materno, cat_empleados.curp, cat_empleados.no_plaza,  cat_empleados.rfc , cat_puestos.nombre as 'puesto',
                      cat_depto.nombre as 'depto', cat_empleados.no_empleado, tab_nomina.periodo_inicio, tab_nomina.periodo_fin, tab_nomina.periodo_quinquenal
                   FROM cat_aportaciones, empleadosxaportaciones, tab_nomina,  cat_empleados, cat_puestos, cat_depto
                   WHERE cat_empleados.id_empleado = empleadosxaportaciones.id_empleado 
                      AND cat_depto.id_depto = cat_empleados.id_depto
                      AND cat_empleados.id_puesto = cat_puestos.id_puesto
                    AND empleadosxaportaciones.id_aportacion = cat_aportaciones.id_aportacion 
                    AND empleadosxaportaciones.id_nomina = tab_nomina.id_nomina 
                        AND cat_empleados.id_empleado =  '".$id_empleado."'
                        AND tab_nomina.id_nomina = '".$id_nomina."' order by cat_aportaciones.id_aportacion");

      if ($query->num_rows() > 0) {
          return $query->result();
      }else{
          return false;
      }

  }
  //***************************************************************************
  //ELIMINAR REGISTROS DE LA NOMINA PARA SU ACUTUALIZACIÓN
  //***************************************************************************

  public function eliminarPercepciones($id_empleado, $id_nomina_editando){
      $this->db->where('id_empleado',$id_empleado);
      $this->db->where('id_nomina', $id_nomina_editando);
      $this->db->delete('empleadosxpercepciones');
      //$this->db->get();
  }

  public function eliminarDeducciones($id_empleado, $id_nomina_editando){
      $this->db->where('id_empleado',$id_empleado);
      $this->db->where('id_nomina', $id_nomina_editando);
      $this->db->delete('empleadosxdeducciones');
      //$this->db->get();
  }

  public function eliminarAportaciones($id_empleado,  $id_nomina_editando){
      $this->db->where('id_empleado',$id_empleado);
      $this->db->where('id_nomina', $id_nomina_editando);
      $this->db->delete('empleadosxaportaciones');
      //$this->db->get();

  }

  //***************************************************************************
  //SE TRAEN LOS REGISTROS DE LA ÚLTIMA NÓMINA DEL EMPLEADO
  //***************************************************************************
  public function getLastNominaPercepciones($id_empleado){

      $query = $this->db->query("SELECT cat_percepciones.id_percepcion, cat_percepciones.indicador, cat_percepciones.nombre, cat_percepciones.formula, empleadosxpercepciones.importe, 
                      cat_empleados.nombre as empleado, cat_empleados.curp, cat_empleados.no_plaza,  cat_empleados.rfc , cat_puestos.nombre as 'puesto',
                      cat_depto.nombre as 'depto', cat_empleados.no_empleado, tab_nomina.id_nomina,tab_nomina.periodo_inicio, tab_nomina.periodo_fin, tab_nomina.periodo_quinquenal 
                   FROM cat_percepciones, empleadosxpercepciones, tab_nomina,  cat_empleados, cat_puestos, cat_depto
                   WHERE cat_empleados.id_empleado = empleadosxpercepciones.id_empleado 
                      AND cat_depto.id_depto = cat_empleados.id_depto
                      AND cat_empleados.id_puesto = cat_puestos.id_puesto
                    AND empleadosxpercepciones.id_percepcion = cat_percepciones.id_percepcion 
                    AND empleadosxpercepciones.id_nomina = tab_nomina.id_nomina 
                        AND cat_empleados.id_empleado = ".$id_empleado." 
                        and tab_nomina.periodo_fin = ( SELECT MAX(tab_nomina.periodo_fin) 
                   FROM cat_percepciones, empleadosxpercepciones, tab_nomina,  cat_empleados, cat_puestos, cat_depto
                   WHERE cat_empleados.id_empleado = empleadosxpercepciones.id_empleado 
                      AND cat_depto.id_depto = cat_empleados.id_depto
                      AND cat_empleados.id_puesto = cat_puestos.id_puesto
                    AND empleadosxpercepciones.id_percepcion = cat_percepciones.id_percepcion 
                    AND empleadosxpercepciones.id_nomina = tab_nomina.id_nomina 
                        AND cat_empleados.id_empleado =  ".$id_empleado." )");
      if ($query->num_rows() > 0) {
          return $query->result();
      }else{
          return false;
      }
  }
  public function verificarNominaTimbrada($id_empleado,$id_nomina){

    $query = $this->db->query("select cat_empleadosxtimbrados.file_name from cat_empleadosxtimbrados where cat_empleadosxtimbrados.id_empleado = ".$id_empleado." AND cat_empleadosxtimbrados.id_nomina = ".$id_nomina);
      if ($query->num_rows() > 0) {
          return $query->result();
      }else{
          return false;
      }
  }

  public function totalTimbresFolio(){
    $query = $this->db->query("SELECT COUNT(cat_empleadosxtimbrados.file_name) as totalTimbres FROM cat_empleadosxtimbrados");
      if ($query->num_rows() > 0) {
          return $query->result();
      }else{
          return false;
      }
  }
  public function insertTimbradoFile($id_empleado,  $id_nomina, $nombreArchivoXML,$cadenaOriginalComplemtoSAT){

  	$file_name_timbrado = array(
  		'id_empleado' => $id_empleado,
		'id_nomina'   => $id_nomina,
		'file_name'   => $nombreArchivoXML,
    'cadenaOriginalComplemtoSAT' => $cadenaOriginalComplemtoSAT
	);
  	return $this->db->insert('cat_empleadosxtimbrados', $file_name_timbrado);

  }
  public function updateTimbradoFile($id_empleado,  $id_nomina, $cadenaOriginalComplemtoSAT){

    return $this->db->query("UPDATE cat_empleadosxtimbrados 
                            SET cat_empleadosxtimbrados.cadenaOriginalComplemtoSAT = '".$cadenaOriginalComplemtoSAT."'
                            WHERE cat_empleadosxtimbrados.id_empleado = ".$id_empleado." and cat_empleadosxtimbrados.id_nomina = ".$id_nomina);
  }
  public function deleteTimbradoFile($id_empleado,  $id_nomina){

    return $this->db->query("DELETE FROM cat_empleadosxtimbrados 
                            WHERE cat_empleadosxtimbrados.id_empleado = ".$id_empleado." 
                            and cat_empleadosxtimbrados.id_nomina = ".$id_nomina);
  }

  public function getNameFile($id_nomina, $id_empleado){
		$query = $this->db->query("SELECT file_name, cadenaOriginalComplemtoSAT
									FROM cat_empleadosxtimbrados, tab_nomina, cat_empleados
									WHERE cat_empleados.id_empleado = cat_empleadosxtimbrados.id_empleado
											AND tab_nomina.id_nomina = cat_empleadosxtimbrados.id_nomina
											AND cat_empleadosxtimbrados.id_empleado = '".$id_empleado."'
											AND cat_empleadosxtimbrados.id_nomina = '".$id_nomina."' ");
	  if ($query->num_rows() > 0) {
		  return $query->result();
	  }else{
		  return false;
	  }
  }
/********************************************************************************************************/
/********************************************************************************************************/
  
  //***********************************************************************************************
  //ÁREA DE TIMBRADO DE NÓMINA EXTRAORDINARIA
  //***********************************************************************************************
  public function verificarNominaTimbradaNomE($id_empleado,$id_nomina_e){

    $query = $this->db->query("SELECT TNE.file_name FROM cat_empleados_x_timbrados_nome TNE 
                               WHERE TNE.id_empleado = ".$id_empleado." 
                               AND TNE.id_nomina_e = ".$id_nomina_e);
      if ($query->num_rows() > 0) {
          return $query->result();
      }else{
          return false;
      }
  }
  //***************************************************************************
  //DATOS DEL EMPLEADO POR NOMINA EXTRAORDINARIA PARA EL ENCABEZADO DEL PDF
  //***************************************************************************
  public function datos_empleado_nomina_extraordinaria($id_empleado, $id_extraordinario){ 

    $query = $this->db->query("SELECT cat_empleados.no_plaza, cat_empleados.no_empleado, cat_empleados.id_empleado,  cat_empleados.nombre as 'empleado', 
                                      cat_empleados.ap_paterno, cat_empleados.ap_materno, cat_empleados.rfc, cat_empleados.curp, cat_empleados.nss, cat_empleados.horas,                                       
                                      cat_puestos.nivel, cat_puestos.nombre as 'puesto',cat_empleados.sindicalizado, cat_empleados.fecha_ingreso,
                                      cat_depto.nombre as 'depto',
                                      cat_tipo_trabajador.nombre_tipo_trabajador,
                                      cat_nomina_extraordinaria.fecha, month(cat_nomina_extraordinaria.fecha) as mesNomina, year(cat_nomina_extraordinaria.fecha) as anioNomina, cat_nomina_extraordinaria.nombre as 'concepto_extranombre'
                                FROM  cat_nomina_extraordinaria, empleadosxextraoudinaria, cat_empleados, cat_puestos, cat_depto, cat_tipo_trabajador
                                WHERE empleadosxextraoudinaria.id_empleado = cat_empleados.id_empleado
                                      AND cat_tipo_trabajador.id_tipo_trabajador = cat_empleados.id_tipo_trabajador
                                      AND cat_depto.id_depto = cat_empleados.id_depto
                                      AND cat_puestos.id_puesto = cat_empleados.id_puesto
                                      AND empleadosxextraoudinaria.id_nomina_e = cat_nomina_extraordinaria.id_nomina_e                                       
                                      AND empleadosxextraoudinaria.id_empleado =  '".$id_empleado."'
                                      AND cat_nomina_extraordinaria.id_nomina_e = '".$id_extraordinario."' 
                                      group by cat_empleados.id_empleado");

      if ($query->num_rows() > 0) {
          return $query->result();
      }else{
          return false;
      }

  }
  //***************************************************************************
  //DATOS DE LOS CONCEPTOS DE LA NÓMINA EXTRAODRINARIA
  //***************************************************************************
  public function conpcetos_nomina_ex($id_empleado, $id_nomina_e){
    $query = $this->db->query("SELECT exe.importeExento,exe.importeGravado, exe.isrSubsidio, exe.importeIsrSub,
                              nome.nombre as nombreNomE,
                              cone.nombre, cone.indicador,cone.codigoSat
                              FROM empleadosxextraoudinaria exe
                              INNER JOIN cat_nomina_extraordinaria nome ON exe.id_nomina_e = nome.id_nomina_e
                              INNER JOIN cat_concepto_extraordinario cone ON nome.tipoConcepto = cone.id_concepto_extraordinario
                              WHERE exe.id_empleado = ".$id_empleado." and nome.id_nomina_e = ".$id_nomina_e);
    if ($query->num_rows() > 0) {
        return $query->result();
    }else{
        return false;
    }
  }
  //***************************************************************************
  //SE OBTIENE EL TOTAL DE TIMBRES EXISTENTES PARA GENERAR UN FOLIO
  //***************************************************************************
  public function totalTimbresFolioNomE(){
    $query = $this->db->query("SELECT COUNT(cat_empleados_x_timbrados_nome.file_name) as totalTimbres FROM cat_empleados_x_timbrados_nome");
      if ($query->num_rows() > 0) {
          return $query->result();
      }else{
          return false;
      }
  }

  public function insertTimbradoFileNomE($id_empleado,  $id_nomina_e, $nombreArchivoXML,$cadenaOriginalComplemtoSAT){

    $file_name_timbrado = array(
      'id_empleado' => $id_empleado,
      'id_nomina_e'   => $id_nomina_e,
      'file_name'   => $nombreArchivoXML,
      'cadenaOriginalComplemtoSAT' => $cadenaOriginalComplemtoSAT
    );
    return $this->db->insert('cat_empleados_x_timbrados_nome', $file_name_timbrado);

  }

  public function updateTimbradoFileNomE($id_empleado,  $id_nomina_e, $cadenaOriginalComplemtoSAT){

    return $this->db->query("UPDATE cat_empleados_x_timbrados_nome 
                            SET cat_empleados_x_timbrados_nome.cadenaOriginalComplemtoSAT = '".$cadenaOriginalComplemtoSAT."'
                            WHERE cat_empleados_x_timbrados_nome.id_empleado = ".$id_empleado." and cat_empleados_x_timbrados_nome.id_nomina_e = ".$id_nomina_e);
  }
  public function deleteTimbradoFileNomE($id_empleado,  $id_nomina_e){

    return $this->db->query("DELETE FROM cat_empleados_x_timbrados_nome 
                            WHERE cat_empleados_x_timbrados_nome.id_empleado = ".$id_empleado." 
                            and cat_empleados_x_timbrados_nome.id_nomina_e = ".$id_nomina_e);
  }

  public function getNameFileNomE($id_nomina, $id_empleado){
    $query = $this->db->query("SELECT file_name, cadenaOriginalComplemtoSAT
                  FROM cat_empleados_x_timbrados_nome, cat_nomina_extraordinaria, cat_empleados
                  WHERE cat_empleados.id_empleado = cat_empleados_x_timbrados_nome.id_empleado
                      AND cat_nomina_extraordinaria.id_nomina_e = cat_empleados_x_timbrados_nome.id_nomina_e
                      AND cat_empleados_x_timbrados_nome.id_empleado = '".$id_empleado."'
                      AND cat_empleados_x_timbrados_nome.id_nomina_e = '".$id_nomina."' ");
    if ($query->num_rows() > 0) {
      return $query->result();
    }else{
      return false;
    }
  }

  //***************************************************************************
  //PERCEPCIONES POR NOMINA PARA CALCULAR EL SALARIO DIARIO INTEGRADO DE LA
  //NÓMINA EXTRAORDINARIA
  //***************************************************************************
  public function percepcionesNomE($id_empleado, $yearNomina,$mesNomina,$diaNomina){

    $query = $this->db->query("SELECT  cat_percepciones.id_percepcion, cat_percepciones.indicador,
                              cat_percepciones.codigoSat, cat_percepciones.nombre,  cat_percepciones.formula, empleadosxpercepciones.importe
                              FROM cat_percepciones
                              INNER JOIN empleadosxpercepciones ON cat_percepciones.id_percepcion = empleadosxpercepciones.id_percepcion
                              INNER JOIN tab_nomina ON empleadosxpercepciones.id_nomina = tab_nomina.id_nomina
                              WHERE empleadosxpercepciones.id_empleado = ".$id_empleado." AND year(tab_nomina.periodo_inicio) = ".$yearNomina."
                              AND month(tab_nomina.periodo_inicio) = ".$mesNomina." AND day(tab_nomina.periodo_inicio) = ".$diaNomina);

      if ($query->num_rows() > 0) {
          return $query->result();
      }else{
          return false;
      }

  }
  //***************************************************************************
  //SE OBTIENE LAS PERCEPCIONES POR EMPLEADOS DE LA ÚLTIMA NÓMINA EXTRAORDINARIA REGISTRADA
  //***************************************************************************
  public function getUltimaspercepcionesNomE($id_empleado){

    $query = $this->db->query("SELECT  cat_percepciones.id_percepcion, cat_percepciones.indicador,
                              cat_percepciones.codigoSat, cat_percepciones.nombre,  cat_percepciones.formula, empleadosxpercepciones.importe
                              FROM cat_percepciones
                              INNER JOIN empleadosxpercepciones ON cat_percepciones.id_percepcion = empleadosxpercepciones.id_percepcion
                              INNER JOIN tab_nomina ON empleadosxpercepciones.id_nomina = tab_nomina.id_nomina
                              WHERE empleadosxpercepciones.id_empleado = ".$id_empleado." 
                              AND tab_nomina.periodo_inicio = (SELECT MAX(tab_nomina.periodo_inicio) 
                                                        FROM tab_nomina INNER JOIN empleadosxpercepciones
                                                        ON tab_nomina.id_nomina = empleadosxpercepciones.id_nomina WHERE empleadosxpercepciones.id_empleado = ".$id_empleado.") "
                              );

      if ($query->num_rows() > 0) {
          return $query->result();
      }else{
          return false;
      }

  }

}

