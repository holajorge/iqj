
<!DOCTYPE html>
<html lang="en">
<head>
    <title>404 Pagina no existe</title>
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/img/logo/favicon.png');?>"/>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?> "></script>
    <style>
        .ops{
            font-size: 60px;
        }
    </style>
</head>

<body style="background: #ededed;">


<div class="container">
    <div class="row">
        <div class="col-sm-6 col-xs-12 col-sm-offset-3" style="margin-top: -70px;">
            <div class="text-center">
                <h1>Oopss!!</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8 col-xs-12 col-sm-offset-2" style="margin-bottom: 20px;">
            <div class="text-center">
                <img width="530" src="<?php echo base_url('assets/img/Error404.png')?>" alt="">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-8 col-xs-12 col-sm-offset-2">
            <div class="text-center">
                <button type="button"  onclick="error();" class="btn btn-primary btn-lg"> <span class="glyphicon glyphicon-home"></span> Ir al Inicio</button>
            </div>
        </div>
    </div>
    </xsv>
</div>

<script type="text/javascript">

    function error(){

        window.location.href = "<?php echo base_url('Login_ctrl/error');?>";

    }
</script>
</body>
</html>