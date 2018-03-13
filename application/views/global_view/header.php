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
                          <img alt="image" width="163" class="img-circle img-responsive" style="ime-mode: center" src="<?php echo base_url('assets/img/logo/chido.png')?>" />
                          </span>
                          <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> 
                                <span class="block m-t-xs"> 
                                   <strong class="font-bold text-center"><?php echo $this->session->userdata('nombre').' '.$this->session->userdata('apellidos'); ?></strong>
                                </span> 
                                <span class="text-muted text-xs block">Administrar Perfil <b class="caret"></b>
                                </span> 
                            </span> 
                          </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs" >
                            <li><a href="<?php echo base_url('User_ctrl/perfil'); ?>">Perfil</a></li>
                            <?php if ( $this->session->userdata('id_empleado') ): ?>
                            <li><a href="<?php echo base_url('User_ctrl/timbres'); ?>">Mis Timbres</a></li>
                            <?php endif ?>
                            <li class="divider"></li>
                            <li><a href="<?php echo base_url();?>login_ctrl/cerrar_sesion">Logout</a></li>
                        </ul>
                      </div>
                      <div class="logo-element">IQJ</div>
                    </li>
                    <li <?php  if (isset($active)) {    if ($active == "nomina") {  echo "class='active'";  }  }  ?> >
                        <a href="#"><i class="fa fa-dollar"></i> <span class="nav-label">Nómina</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li <?php  if (isset($active1)) {  if ($active1 == "periodos") { echo "class='active'"; }}?>>
                                <a href="<?php echo base_url('Nomina_controller/periodos'); ?> ">Ordinaria</a>
                            </li>
                            <li <?php  if (isset($active1)) {  if ($active1 == "extraordinario") { echo "class='active'"; }}?>>
                                <a href="<?php echo base_url('Nomina_controller/extraordinario'); ?> ">Extraordinaria</a>
                            </li>
                            <?php if ( $this->session->userdata('tipo_usuario') == "root" ): ?>
                            <li <?php  if (isset($active1)) {  if ($active1 == "alta_nomina") { echo "class='active'"; }}?>>
                              <a href="<?php echo base_url('Nomina_controller/detalle_nomina'); ?> ">Alta Ordinaria</a>
                            </li>
                            <li <?php  if (isset($active1)) { if ($active1 == "alta_nomina_extradinaria") { echo "class='active'";  }   }    ?>   >                                             
                              <a href="<?php echo base_url('Nomina_controller/create_extraordinaria'); ?> ">Alta Extraodinaria</a>
                            </li>
                            <?php endif ?>
                        </ul>
                    </li>
                    <?php if ( $this->session->userdata('tipo_usuario') == "root" ): ?>
                        <li <?php  if (isset($active)) {    if ($active == "periodo") {  echo "class='active'";   }}  ?> >
                            <a href="#"><i class="fa fa-sort-amount-asc"></i> <span class="nav-label">Periodos</span> <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li <?php if (isset($active1)) {  if ($active1 == "lista_periodos") { echo "class='active'";}  }  ?> >
                                  <a href="<?php echo base_url('Periodo_controller/index'); ?>">Lista de Periodos</a>
                                </li>
                                <li <?php  if (isset($active1)) { if ($active1 == "alta_periodo") { echo "class='active'";  }   }    ?>   >
                                  <a href="<?php echo base_url('Periodo_controller/create'); ?> ">Alta de Periodo</a>
                                </li>
                            </ul>
                        </li>
                        <li <?php  if (isset($active)) {     if ($active == "percepcion") {  echo "class='active'";   }}  ?> >
                            <a href="#"><i class="fa fa-table"></i> <span class="nav-label">Percepciones</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li <?php  if (isset($active)) {   if ($active1 == "lista_percepciones") {  echo "class='active'";  }  }  ?> ><a href="<?php echo base_url('Percepciones_ctrl/index'); ?>">Lista de percepciones</a></li>
                                <li <?php  if (isset($active)) {   if ($active1 == "percepciones") {  echo "class='active'";  }  }  ?> ><a href="<?php echo base_url('Percepciones_ctrl/create'); ?> ">Alta de Percepciones</a></li>
                            </ul>
                        </li>
                        <li <?php  if (isset($active)) {     if ($active == "deduccion") {  echo "class='active'";   }}  ?> >
                            <a href="#"><i class="fa fa-table"></i> <span class="nav-label">Deducciones</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li <?php  if (isset($active)) {   if ($active1 == "lista_deducciones") {  echo "class='active'";  }  }  ?>><a href="<?php echo base_url('Deduciones_ctrl/index'); ?>" >Lista de Deducciones</a></li>
                                <li <?php  if (isset($active1)) {   if ($active1 == "registro") {  echo "class='active'";  }  }  ?>><a href="<?php echo base_url('Deduciones_ctrl/create'); ?>" >Alta Deducción</a></li>
                            </ul>
                        </li>
                        <li <?php  if (isset($active)) {     if ($active == "aportacion") {  echo "class='active'";   }}  ?>>
                            <a href="#"><i class="fa fa-credit-card"></i> <span class="nav-label">Aportaciones</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li <?php  if (isset($active)) {   if ($active1 == "lista_aportaciones") {  echo "class='active'";  }  }  ?>><a href="<?php echo base_url('Aportaciones_ctrl/index'); ?>">Lista de Aportaciones</a></li>
                                <li <?php  if (isset($active)) {   if ($active1 == "alta_aportaciones") {  echo "class='active'";  }  }  ?>><a href="<?php echo base_url('Aportaciones_ctrl/create'); ?>">Alta Aportacion</a></li>
                            </ul>
                        </li>
                        <li <?php  if (isset($active)) {     if ($active == "componente") {  echo "class='active'";   }}  ?>>
                            <a href="#"><i class="fa fa-gears"></i> <span class="nav-label">Componentes</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li <?php  if (isset($active)) {   if ($active1 == "lista_componentes") {  echo "class='active'";  }  }  ?>>
                                    <a href="<?php echo base_url('Componente_ctrl/index'); ?>">Lista de Componentes</a>
                                </li>
                                <li <?php  if (isset($active)) {   if ($active1 == "alta_componente") {  echo "class='active'";  }  }  ?>>
                                    <a href="<?php echo base_url('Componente_ctrl/create'); ?>">Alta Componente</a>
                                </li>
                            </ul>
                        </li>
                        <li <?php  if (isset($active)) {     if ($active == "empleado") {  echo "class='active'";   }}  ?> >
                            <a href="#"><i class="fa fa-group"></i> <span class="nav-label">Empleados</span> <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li <?php if (isset($active1)) {  if ($active1 == "lista_empleado") { echo "class='active'";}  }  ?> >
                                  <a href="<?php echo base_url('Empleado_controller/lista_empleado'); ?>">Lista de empleados</a>
                                </li>
                                <li <?php if (isset($active1)) {  if ($active1 == "lista_TipoEmpleado") { echo "class='active'";}  }  ?> >
                                  <a href="<?php echo base_url('TipoEmpleado_ctrl/index'); ?>">Lista de Tipo Empleados</a>
                                </li>
                                <li <?php if (isset($active1)) {  if ($active1 == "lista_deshabilitados") { echo "class='active'";}  }  ?> >
                                  <a href="<?php echo base_url('Empleado_controller/lista_deshabilitados'); ?>">Deshabilitados</a>
                                </li>
                                <li <?php  if (isset($active1)) { if ($active1 == "alta_empleado") { echo "class='active'";  }   }    ?>   >
                                  <a href="<?php echo base_url('Empleado_controller/create'); ?> ">Alta de Empleados</a>
                                </li>
                                <li <?php  if (isset($active1)) { if ($active1 == "alta_tipo") { echo "class='active'";  }   }    ?>   >
                                  <a href="<?php echo base_url('TipoEmpleado_ctrl/create'); ?> ">Alta de Tipo Empleado</a>
                                </li>
                            </ul>
                        </li>
                        <li <?php  if (isset($active)) {     if ($active == "puesto") {  echo "class='active'";   }}  ?> >
                            <a href="#"><i class="fa fa-slideshare"></i> <span class="nav-label">Puestos</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li <?php  if (isset($active)) {   if ($active1 == "lista_puestos") {  echo "class='active'";  }  }  ?>><a href="<?php echo base_url('Puesto_ctrl/index'); ?>">Lista de Puestos</a></li>
                                <li <?php  if (isset($active1)) {   if ($active1 == "registro") {  echo "class='active'";  }  }  ?>><a href="<?php echo base_url('Puesto_ctrl/create'); ?>">Alta Puesto</a></li>
                            </ul>
                        </li>
                        <li <?php  if (isset($active)) {     if ($active == "depto") {  echo "class='active'";   }}  ?>>
                            <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Departamentos</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li <?php  if (isset($active)) {   if ($active1 == "lista_departamentos") {  echo "class='active'";  }  }  ?>><a href="<?php echo base_url('Depto_ctrl/index'); ?>">Lista de Departamentos</a></li>
                                <li <?php  if (isset($active)) {   if ($active1 == "registro") {  echo "class='active'";  }  }  ?>><a href="<?php echo base_url('Depto_ctrl/create'); ?>">Alta Departamento</a></li>
                            </ul>
                        </li>
                        <li <?php  if (isset($active)) {     if ($active == "direccion") {  echo "class='active'";   }}  ?>>
                            <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Direcciones</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li <?php  if (isset($active)) {   if ($active1 == "lista_direcciones") {  echo "class='active'";  }  }  ?>><a href="<?php echo base_url('Direcciones_ctrl/index'); ?>">Lista de Direcciones</a></li>
                                <li <?php  if (isset($active)) {   if ($active1 == "registro") {  echo "class='active'";  }  }  ?>><a href="<?php echo base_url('Direcciones_ctrl/create'); ?>">Alta Direcciones</a></li>
                            </ul>
                        </li>
                        <li <?php  if (isset($active)) {     if ($active == "usuarios") {  echo "class='active'";   }}  ?>>
                            <a href="#"><i class="fa fa-user"></i> <span class="nav-label">Usuarios</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li <?php  if (isset($active)) {   if ($active1 == "lista_usuarios") {  echo "class='active'";  }  }  ?>><a href="<?php echo base_url('User_ctrl/lista'); ?>">Lista de Usuarios</a></li>
                                <li <?php  if (isset($active)) {   if ($active1 == "lista_empleados") {  echo "class='active'";  }  }  ?>><a href="<?php echo base_url('User_ctrl/list_employee_change_password'); ?>">Lista de Empleados</a></li>
                                <li <?php  if (isset($active)) {   if ($active1 == "registro") {  echo "class='active'";  }  }  ?>><a href="<?php echo base_url('User_ctrl/create'); ?>">Alta Usuario</a></li>
                            </ul>
                        </li>
					<?php else: ?>
                    <?php endif ?>
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
					<li class="dropdown">
						<button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Consultas <span class="caret"></span></button>
						<ul class="dropdown-menu">
                            <li><a href="<?php echo base_url('Reportes_nomina_ctrl/empleados_conceptos');?>" class="btn btn-default" type="button" role="button" >Sábana Empleados por Conceptos</a></li>
							<li><a href="<?php echo base_url('Reportes_nomina_ctrl/consultaspd');?>" class="btn btn-default" type="button" role="button" >Empleados en Conceptos</a></li>
							<li><a href="<?php echo base_url('Reportes_nomina_ctrl/index');?>" class="btn btn-default" type="button" role="button" >Conceptos Totales</a></li>
						</ul>
					</li>
                    <li>
                        <span class="m-r-sm text-muted welcome-message">Panel de control</span>
                    </li>
                    <li>
                        <a  href="<?php echo base_url();?>login_ctrl/cerrar_sesion">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                </ul>                 
            </nav>
          </div>
         <!--  <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2><?php echo $active?></h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>Tables</a>
                        </li>
                        <li class="active">
                            <strong>Data Tables</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
          </div> -->

                

