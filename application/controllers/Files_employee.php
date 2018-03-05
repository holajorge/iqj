<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Files_employee extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('Periodos_model');
        $this->load->model('Reportes_nomina_Model');
        $this->load->model('User_file_model');
    }
    public function index(){

        if($this->session->userdata('logged_in')==true){
            $data["years"] = $this->Reportes_nomina_Model->gelAllYear();
            $data['periodos'] = $this->Periodos_model->getAll();
            $dato['active'] = "archivos";
            $dato['active1'] = "lista_periodos";
            $this->load->view('user/global_view/header', $dato);
            $this->load->view('user/index', $data);
            $this->load->view('user/global_view/alert_procesando');
            $this->load->view('user/global_view/foother');
        }else{
            redirect('Login_ctrl');
        }
    }
    public function buscar_periodo_file(){
        $id_empleado = $this->session->userdata('id_empleado');
        $anio = $this->input->post('anio');

        $queryMes = $this->User_file_model->getMonth($id_empleado, $anio);
        $arrayData = array();
        $x = 0;
        if ($queryMes){
            foreach ($queryMes as $mesTimbre) {
                $arrayData[$x]['mes'] = $mesTimbre->mes;
                $arrayData[$x]['primeraQuincena'] = $this->User_file_model->getPrimerPeriodo($anio,$mesTimbre->mes, $id_empleado);
                $arrayData[$x]['segundaQuincena'] = $this->User_file_model->getSegundoPeriodo($anio,$mesTimbre->mes, $id_empleado);
                $x++;
            }
            if ($arrayData) {
                $result['resultado'] = true;
                $result['archivos'] = $arrayData;
            } else {
                $result['resultado'] = false;
            }
            echo json_encode($result);
        }else{
            $result['resultado'] = false;
            echo json_encode($result);
        }

    }
    public function perfil_user(){
        $id_empleado = $this->session->userdata('id_empleado');
        $data['info'] = $this->User_file_model->getInfoProfile_user($id_empleado);
        $this->load->view('user/global_view/header', $data);
        $this->load->view('user/perfil',$data);
        $this->load->view('user/global_view/foother');
    }
    public function changePasswordUser_file(){

        $password = $this->input->post("password");
        $id_empleado =  $this->session->userdata("id_empleado");

        $cambio = array(
            'password' => $this->bcrypt->hash_password($password)
        );
        $query = $this->User_file_model->changePAssword_user($id_empleado, $cambio);
        if ($query != false) {
            $result['resultado'] = true;
        } else {
            $result['resultado'] = false;
        }
        echo json_encode($result);
    }
    public function download_pdf(){
        $file_name = $_GET["file_name"];
        $exte = ".pdf";
        $filename = $file_name;
        $filePath = './assets/cfdi/timbrados/pdf/'.$file_name.$exte;
        //var_dump($filePath);die();
        if(file_exists($filePath)){
            // Define headers
            header("Cache-Control: public");
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$filename.$exte");
            header("Content-Type: application/zip");
            header("Content-Transfer-Encoding: binary");
            // Read the file
            readfile($filePath);
            exit;
        }else{
            echo 'NO EXISTE EL ARCHIVO PDF TIMBRADO.';
        }
    }
    public function download_xml(){
        $file_name = $_GET["file_name"];

        $exte = ".xml";
        $filename = $file_name;
        $filePath = './assets/cfdi/timbrados/xml/'.$file_name.$exte;
        //var_dump($filePath);die();
        if(file_exists($filePath)){
            // Define headers
            header("Cache-Control: public");
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$filename.$exte");
            header("Content-Type: application/zip");
            header("Content-Transfer-Encoding: binary");
            // Read the file
            readfile($filePath);
            exit;
        }else{
            echo 'NO EXISTE EL ARCHIVO XML TIMBRADO.';
        }
    }
}