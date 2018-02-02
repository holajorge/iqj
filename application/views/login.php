<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/img/logo/favicon.png');?>"/>

    <title>IQJ NÓMINA | LOGIN</title>

    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.css');?>" rel="stylesheet">

    <link href="<?php echo base_url('assets/css/animate.css'); ?> " rel="stylesheet">
    <style>
        @import url("<?php echo base_url('assets/css/style.css'); ?> ");
        @import url("<?php echo base_url('assets/css/estilos/style1.css'); ?> ");
    </style>

</head>
<body class="gray-bg">

  <div class="middle-box text-center loginscreen animated fadeInDown" >
              
      <div>
          <img  class="logo-name" src="<?php echo base_url('assets/img/logo/juventud.png'); ?>" width="300" height="110" >
      </div>
      <h3>Bienvenido</h3> 
      <p>Iniciar Sesión</p>
      <form class="m-t" role="form" action="<?php echo base_url()?>login_ctrl/autentificarUser" method="POST">
          <div class="form-group">                    
              <input type="text" name="rfc" id="rfc" class="form-control" placeholder="" required="">
          </div>
          <div class="form-group">                
              <input type="password" name="password" id="nombre" class="form-control" placeholder="" required="">
          </div>
          <button type="submit" class="btn btn-primary block full-width m-b"><span class="glyphicon glyphicon-log-in"></span> Login</button>                                
      </form>
      <p class="error"> <?php echo $error ?> </p>
      <h4 class="m-t"> SISTEMAS DE NOMINAS IQJ &copy; 2018 </h4>
      <a  data-toggle="modal" data-target="#acercade">Acerca de</a>
    
  </div>

      <!-- Modal -->
  <div class="modal fade" id="acercade" role="dialog">
      <div class="modal-dialog modal-lg">
       <form role="form" id="form_edit_empleado">     
        <div class="modal-content">
          <div class="modal-header ">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h3 class="modal-title">Acerca del Sistema de Nominas de IQJ</h3>
          </div>
          <div class="modal-body">        
                  <input type="hidden" name="id" id="idEditar" value="">
                  <div class="row">
                       Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                       tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                       quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                       consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                       cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                       proident, sunt in culpa qui officia deserunt mollit anim id est laborum.                                                                                
                  </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>           
          </div>
        </div>
      </form>
      </div>
    </div>
  </div>
      <!-- Mainly scripts -->
  <script src="<?php echo base_url('assets/js/jquery-2.1.1.js'); ?> "></script>
  <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?> "></script>

</body>

</html>
