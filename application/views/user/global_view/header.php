<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/img/logo/favicon.png');?>"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>IQJ NÓMINA | DASHBOARD</title>

    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:700|Nunito" rel="stylesheet">
    <style>
        tr {
                font-family: 'Raleway', sans-serif;
        }
        td{
            font-family: 'Nunito', sans-serif;
        }
    </style>
    <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/plugins/iCheck/custom.css'); ?>" rel="stylesheet"> 
    <!-- sweetAlert -->
    <link href="<?php echo base_url('assets/css/plugins/sweetalert/sweetalert.css');?>" rel="stylesheet">
     <!-- Toastr style -->
    <link href="<?php echo base_url('assets/css/plugins/toastr/toastr.min.css'); ?> " rel="stylesheet">
    <!-- Gritter -->
    <link href="<?php echo base_url('assets/js/plugins/gritter/jquery.gritter.css'); ?> " rel="stylesheet">
    
    <link href="<?php echo base_url('assets/css/plugins/ladda/ladda-themeless.min.css'); ?> " rel="stylesheet">
    <link href="<?php echo base_url('assets/css/animate.css'); ?> " rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style.css'); ?> " rel="styesheet">
    <link href="<?php echo base_url('assets/css/plugins/dataTables/datatables.min.css'); ?>" rel="stylesheet">   
    

    
    <script>
      var baseURL = "<?php echo base_url(); ?>"
    </script>
    <style>
        @import url("<?php echo base_url('assets/css/style.css'); ?> ");
        @import url("<?php echo base_url('assets/css/estilos/style1.css'); ?> ");
    </style>
    

</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                      <div class="dropdown profile-element"> <span>
                          <img alt="image" width="140" class="img-circle" style="ime-mode: center" src="<?php echo base_url('assets/img/logo/original.png')?>" />
                          </span>
                          <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> 
                                <span class="block m-t-xs"> 
                                   <strong class="font-bold text-center"><?php echo  $this->session->userdata('nombre').' '.$this->session->userdata('apellidos'); ?></strong>
                                </span> 
                                <span class="text-muted text-xs block"> ADMINISTRAR PERFIL <b class="caret"></b>
                                </span> 
                            </span> 
                          </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs" >
                            <li><a href="<?php echo base_url('Files_employee/perfil_user'); ?>">Perfil</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo base_url();?>login_ctrl/cerrar_sesion">Cerrar Sesion</a></li>
                        </ul>
                      </div>
                      <div class="logo-element">IQJ</div>
                    </li>
                    <li <?php  if (isset($active)) {     if ($active == "archivos") {  echo "class='active'";   }}  ?> >
                        <a href="#"><i class="fa fa-table"></i> <span class="nav-label">Periodos</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li <?php  if (isset($active)) {   if ($active1 == "lista_periodos") {  echo "class='active'";  }  }  ?> ><a href="<?php echo base_url('Files_employee'); ?>">Comprobantes</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
          <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <a  href="<?php echo base_url();?>login_ctrl/cerrar_sesion">
                            <i class="fa fa-sign-out"></i> Cerrar Sesion
                        </a>
                    </li>
                </ul>                 
            </nav>
          </div>


                

