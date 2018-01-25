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

    public function getAllConceptosPercepcionNominaPeriodo($id_nomina){

      $query = $this->db->query("SELECT ctp.id_percepcion, ctp.nombre AS percepcion
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
    public function getAllConceptosDeduccionNominaPeriodo($id_nomina){

      $query = $this->db->query("SELECT ctd.id_deduccion, ctd.nombre AS deduccion
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

      $query = $this->db->query("SELECT cta.id_aportacion, cta.nombre AS aportacion
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

}

/* End of file Reportes_nomina_Model.php */
/* Location: ./application/models/Reportes_nomina_Model.php */