<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes_nomina_Model extends CI_Model {

	public function __construct() {
      parent::__construct();
      $this->load->database();
    }

    public function gelAllYear(){
    	
    	$query = $this->db->query("SELECT id_nomina, YEAR(periodo_inicio) as year from tab_nomina group by year");
    	if ($query->num_rows() > 0) {
            return $query->result();
	    } else {
	            return false;
	    }
    }
    public function getAllPeriodoxAnio($fecha){

      $query = $this->db->query("SELECT id_nomina, periodo_inicio, periodo_fin FROM tab_nomina WHERE YEAR(periodo_inicio)='".$fecha."' ");
     
      if ($query->num_rows() > 0) {
            return $query->result();
      } else {
              return false;
      }
    }

    //*****************************************************************************************
    //SE CALCULA LA SUMA DE CADA UNO DE LOS CONCEPTOS DE LAS PERCEPCIONES
    //*****************************************************************************************
    public function sumaPorConceptoPercepcion($id_nomina, $copceptosPercepciones){

      for ($i=0; $i < count($copceptosPercepciones) ; $i++) { 
        $concepto = $copceptosPercepciones[$i];
        //$query = $this->db->query("SELECT sumaConcepto(".$concepto.",".$id_nomina.") AS total");
        $query = $this->db->query("SELECT cat_percepciones.nombre, SUM(empleadosxpercepciones.importe) AS total 
                                    FROM empleadosxpercepciones, cat_percepciones
                                    WHERE cat_percepciones.id_percepcion = empleadosxpercepciones.id_percepcion
                                    AND empleadosxpercepciones.id_percepcion = ".$concepto." and empleadosxpercepciones.id_nomina = ".$id_nomina." ");
        $data = $query->result();
        $totales[] = array(
                    "concepto" =>$data[0]->nombre,
                    "total" => $data[0]->total
                    );
      }
      return $totales;
    }

    //*****************************************************************************************
    //SE CALCULA LA SUMA DE CADA UNO DE LOS CONCEPTOS DE LAS DEDUCCIONES
    //*****************************************************************************************
    public function sumaPorConceptoDeducciones($id_nomina, $copceptosPercepciones){

      for ($i=0; $i < count($copceptosPercepciones) ; $i++) { 
        $concepto = $copceptosPercepciones[$i];
        $query = $this->db->query("SELECT cat_deducciones.nombre, SUM(empleadosxdeducciones.importe) AS total 
                                    FROM empleadosxdeducciones, cat_deducciones
                                    WHERE cat_deducciones.id_deduccion = empleadosxdeducciones.id_deduccion
                                    AND empleadosxdeducciones.id_deduccion = ".$concepto." and empleadosxdeducciones.id_nomina = ".$id_nomina." ");
        $data = $query->result();
        $totales[] = array(
                    "concepto" =>$data[0]->nombre,
                    "total" => $data[0]->total
                    );
      }
      return $totales;
    }
    //*****************************************************************************************
    //SE CALCULA LA SUMA DE CADA UNO DE LOS CONCEPTOS DE LAS APORTACIONES
    //*****************************************************************************************
    public function sumaPorConceptoAportacion($id_nomina, $copceptosPercepciones){

      for ($i=0; $i < count($copceptosPercepciones) ; $i++) { 
        $concepto = $copceptosPercepciones[$i];
        $query = $this->db->query("SELECT cat_aportaciones.nombre, SUM(empleadosxaportaciones.importe) AS total 
                                    FROM empleadosxaportaciones, cat_aportaciones
                                    WHERE cat_aportaciones.id_aportacion = empleadosxaportaciones.id_aportacion
                                    AND empleadosxaportaciones.id_aportacion = ".$concepto." and empleadosxaportaciones.id_nomina = ".$id_nomina." ");
        $data = $query->result();
        $totales[] = array(
                    "concepto" =>$data[0]->nombre,
                    "total" => $data[0]->total
                    );
      }
      return $totales;
    }
    //*****************************************************************************************
    //SE BUSCA LA INFORMACIÓN DE LA NÓMINA (PERIODO QUINQUENAL) DE FORMA INDIVIDUAL 
    //*****************************************************************************************
    public function informacionNomina($id){
      $this->db->select("*");
      $this->db->from("tab_nomina");
      $this->db->where("tab_nomina.id_nomina",$id);
      $query = $this->db->get();
      if ($query->num_rows() > 0) {
            return $query->result();
      } else {
              return false;
      }

    }
}

/* End of file Reportes_nomina_Model.php */
/* Location: ./application/models/Reportes_nomina_Model.php */