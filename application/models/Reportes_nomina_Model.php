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

      $query = $this->db->query("SELECT id_nomina, periodo_inicio, periodo_fin, periodo_quinquenal FROM tab_nomina WHERE YEAR(periodo_inicio)='".$fecha."' ");
     
      if ($query->num_rows() > 0) {
            return $query->result();
      } else {
              return false;
      }
    }
    public function getAllMontPeriodos($fecha){
      $query = $this->db->query("SELECT id_nomina, MONTH(tab_nomina.periodo_inicio) as mes, periodo_quinquenal  FROM tab_nomina WHERE YEAR(tab_nomina.periodo_inicio)='".$fecha."'  GROUP BY mes");
      if ($query->num_rows() > 0) {
            return $query->result();
      } else {
              return false;
      }
    }
    public function getAllConceptosPercepcionNominaPeriodo($id_nomina){

      $query = $this->db->query("SELECT ctp.indicador,ctp.id_percepcion, ctp.nombre AS percepcion
                                  FROM  tab_nomina tn, cat_percepciones ctp,
                                        empleadosxpercepciones expe
                                  WHERE ctp.id_percepcion = expe.id_percepcion
                                      AND expe.id_nomina = tn.id_nomina
                                      AND tn.id_nomina = '".$id_nomina."' GROUP BY ctp.id_percepcion");
     
      if ($query->num_rows() > 0) {
            return $query->result();
      } else {
              return false;
      }
    }

    //*****************************************************************************************
    //SE CALCULA LA SUMA DE CADA UNO DE LOS CONCEPTOS DE LAS PERCEPCIONES
    //*****************************************************************************************
    public function sumaPorConceptoPercepcion($id_nomina, $copceptosPercepciones,$tipo,$mes,$anio){

       //SI $tipo = 0 entonces se hace la busqueda por MES
       //Si $tipo = 1 entonces se hace la búsqueda por QUINCENA
        if ($tipo == 0) {
          for ($i=0; $i < count($copceptosPercepciones); $i++) { 
            $concepto = $copceptosPercepciones[$i];
            $query = $this->db->query("SELECT cat_percepciones.indicador, cat_percepciones.nombre,
                                       SUM(empleadosxpercepciones.importe) AS total 
                                       FROM tab_nomina 
                                       INNER JOIN empleadosxpercepciones ON tab_nomina.id_nomina = empleadosxpercepciones.id_nomina 
                                       INNER JOIN cat_percepciones ON empleadosxpercepciones.id_percepcion = cat_percepciones.id_percepcion 
                                       WHERE MONTH(tab_nomina.periodo_inicio) = ".$mes." AND YEAR(tab_nomina.periodo_inicio) = ".$anio." AND empleadosxpercepciones.id_percepcion = ".$concepto);
            $data = $query->result();
            $totales[] = array(
                    "indicador" =>$data[0]->indicador,
                    "concepto" =>$data[0]->nombre,
                    "total" => $data[0]->total
                    );
            }
        }else{
    
          for ($i=0; $i < count($copceptosPercepciones); $i++) { 
            $concepto = $copceptosPercepciones[$i];
            $query = $this->db->query("SELECT cat_percepciones.indicador, cat_percepciones.nombre,
                                        SUM(empleadosxpercepciones.importe) AS total 
                                        FROM empleadosxpercepciones, cat_percepciones
                                        WHERE cat_percepciones.id_percepcion = empleadosxpercepciones.id_percepcion
                                        AND empleadosxpercepciones.id_percepcion = ".$concepto." and empleadosxpercepciones.id_nomina = ".$id_nomina." ");
          $data = $query->result();
          $totales[] = array(
                    "indicador" =>$data[0]->indicador,
                    "concepto" =>$data[0]->nombre,
                    "total" => $data[0]->total
                    );
          }
        }
        
     
      return $totales;
    }

    //*****************************************************************************************
    //SE CALCULA LA SUMA DE CADA UNO DE LOS CONCEPTOS DE LAS DEDUCCIONES
    //*****************************************************************************************
    public function sumaPorConceptoDeducciones($id_nomina, $copceptosPercepciones,$tipo,$mes,$anio){

       //SI $tipo = 0 entonces se hace la busqueda por MES
       //Si $tipo = 1 entonces se hace la búsqueda por QUINCENA
       if ($tipo == 0) {
        for ($i=0; $i < count($copceptosPercepciones) ; $i++) { 
          $concepto = $copceptosPercepciones[$i];
          $query = $this->db->query("SELECT cat_deducciones.indicador, cat_deducciones.nombre,
                                       SUM(empleadosxdeducciones.importe) AS total 
                                       FROM tab_nomina 
                                       INNER JOIN empleadosxdeducciones ON tab_nomina.id_nomina = empleadosxdeducciones.id_nomina 
                                       INNER JOIN cat_deducciones ON empleadosxdeducciones.id_deduccion = cat_deducciones.id_deduccion 
                                       WHERE MONTH(tab_nomina.periodo_inicio) = ".$mes." AND YEAR(tab_nomina.periodo_inicio) = ".$anio." AND empleadosxdeducciones.id_deduccion = ".$concepto);
          $data = $query->result();
          $totales[] = array(
                      "indicador" =>$data[0]->indicador,
                      "concepto" =>$data[0]->nombre,
                      "total" => $data[0]->total
                      );
        }
       }else{
        for ($i=0; $i < count($copceptosPercepciones) ; $i++) { 
          $concepto = $copceptosPercepciones[$i];
          $query = $this->db->query("SELECT cat_deducciones.indicador,cat_deducciones.nombre,
                                      SUM(empleadosxdeducciones.importe) AS total 
                                      FROM empleadosxdeducciones, cat_deducciones
                                      WHERE cat_deducciones.id_deduccion = empleadosxdeducciones.id_deduccion
                                      AND empleadosxdeducciones.id_deduccion = ".$concepto." and empleadosxdeducciones.id_nomina = ".$id_nomina." ");
          $data = $query->result();
          $totales[] = array(
                      "indicador" =>$data[0]->indicador,
                      "concepto" =>$data[0]->nombre,
                      "total" => $data[0]->total
                      );
        }
       }
      return $totales;
    }
    //*****************************************************************************************
    //SE CALCULA LA SUMA DE CADA UNO DE LOS CONCEPTOS DE LAS APORTACIONES
    //*****************************************************************************************
    public function sumaPorConceptoAportacion($id_nomina, $copceptosPercepciones,$tipo,$mes,$anio){
       //SI $tipo = 0 entonces se hace la busqueda por MES
       //Si $tipo = 1 entonces se hace la búsqueda por QUINCENA
       if ($tipo == 0) {
          for ($i=0; $i < count($copceptosPercepciones) ; $i++) { 
            $concepto = $copceptosPercepciones[$i];
            $query = $this->db->query("SELECT cat_aportaciones.indicador, cat_aportaciones.nombre,
                                       SUM(empleadosxaportaciones.importe) AS total 
                                       FROM tab_nomina 
                                       INNER JOIN empleadosxaportaciones ON tab_nomina.id_nomina = empleadosxaportaciones.id_nomina 
                                       INNER JOIN cat_aportaciones ON empleadosxaportaciones.id_aportacion = cat_aportaciones.id_aportacion 
                                       WHERE MONTH(tab_nomina.periodo_inicio) = ".$mes." AND YEAR(tab_nomina.periodo_inicio) = ".$anio." AND empleadosxaportaciones.id_aportacion = ".$concepto);
            $data = $query->result();
            $totales[] = array(
                        "indicador" =>$data[0]->indicador,
                        "concepto" =>$data[0]->nombre,
                        "total" => $data[0]->total
                        );
        }
       }else{
          for ($i=0; $i < count($copceptosPercepciones) ; $i++) { 
            $concepto = $copceptosPercepciones[$i];
            $query = $this->db->query("SELECT cat_aportaciones.indicador,cat_aportaciones.nombre, SUM(empleadosxaportaciones.importe) AS total 
                                        FROM empleadosxaportaciones, cat_aportaciones
                                        WHERE cat_aportaciones.id_aportacion = empleadosxaportaciones.id_aportacion
                                        AND empleadosxaportaciones.id_aportacion = ".$concepto." and empleadosxaportaciones.id_nomina = ".$id_nomina." ");
            $data = $query->result();
            $totales[] = array(
                        "indicador" =>$data[0]->indicador,
                        "concepto" =>$data[0]->nombre,
                        "total" => $data[0]->total
                        );
          }
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
    public function getAllConceptosDeduccionNominaPeriodo($id_nomina){

      $query = $this->db->query("SELECT ctd.indicador,ctd.id_deduccion, ctd.nombre AS deduccion
                                  FROM tab_nomina tn, cat_deducciones ctd,
                                     empleadosxdeducciones exd
                                  WHERE exd.id_deduccion = ctd.id_deduccion   
                                      AND exd.id_nomina = tn.id_nomina
                                      AND tn.id_nomina = '".$id_nomina."' GROUP BY ctd.id_deduccion ");
     
      if ($query->num_rows() > 0) {
            return $query->result();
      } else {
              return false;
      }
    }
    public function getAllConceptosAportacionNominaPeriodo($id_nomina){

      $query = $this->db->query("SELECT cta.indicador, cta.id_aportacion, cta.nombre AS aportacion
                                  FROM tab_nomina tn, cat_aportaciones cta,
                                     empleadosxaportaciones exa
                                  WHERE exa.id_aportacion = cta.id_aportacion   
                                      AND exa.id_nomina = tn.id_nomina
                                      AND tn.id_nomina = '".$id_nomina."' GROUP BY cta.id_aportacion ");
     
      if ($query->num_rows() > 0) {
            return $query->result();
      } else {
              return false;
      }

    }
    public function getAllConceptosPercepcionNominaPeriodoMes($id_nomina){

      $query = $this->db->query("SELECT ctp.id_percepcion, ctp.nombre AS percepcion
                                  FROM  tab_nomina tn, cat_percepciones ctp,
                                        empleadosxpercepciones expe
                                  WHERE ctp.id_percepcion = expe.id_percepcion
                                      AND expe.id_nomina = tn.id_nomina
                                      AND MONTH(tn.periodo_inicio)  = '".$id_nomina."' GROUP BY ctp.id_percepcion");
     
      if ($query->num_rows() > 0) {
            return $query->result();
      } else {
              return false;
      }
    }
    public function getAllConceptosDeduccionNominaPeriodoMes($id_nomina){

      $query = $this->db->query("SELECT ctd.id_deduccion, ctd.nombre AS deduccion
                                  FROM tab_nomina tn, cat_deducciones ctd,
                                     empleadosxdeducciones exd
                                  WHERE exd.id_deduccion = ctd.id_deduccion   
                                      AND exd.id_nomina = tn.id_nomina
                                      AND MONTH(tn.periodo_inicio)  = '".$id_nomina."' GROUP BY ctd.id_deduccion ");
     
      if ($query->num_rows() > 0) {
            return $query->result();
      } else {
              return false;
      }
    }
    public function getAllConceptosAportacionNominaPeriodoMes($id_nomina){

      $query = $this->db->query("SELECT cta.id_aportacion, cta.nombre AS aportacion
                                  FROM tab_nomina tn, cat_aportaciones cta,
                                     empleadosxaportaciones exa
                                  WHERE exa.id_aportacion = cta.id_aportacion   
                                      AND exa.id_nomina = tn.id_nomina
                                      AND MONTH(tn.periodo_inicio)  = '".$id_nomina."' GROUP BY cta.id_aportacion ");
     
      if ($query->num_rows() > 0) {
            return $query->result();
      } else {
              return false;
      }
    }

}

/* End of file Reportes_nomina_Model.php */
/* Location: ./application/models/Reportes_nomina_Model.php */