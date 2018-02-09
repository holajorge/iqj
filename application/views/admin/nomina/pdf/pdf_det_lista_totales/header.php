<body>
    <?php
    $fecha = $header_pdf[0]->periodo_fin;
    $porciones = explode("-", $fecha);
    $D=$porciones[2];
    $M=$porciones[1];
    $Y=$porciones[0];
    setlocale(LC_TIME, 'spanish');  
    $nombre=strftime("%B",mktime(0, 0, 0, $M+1, 0 ,0)); 
    $mes= strtoupper ($nombre );
    ?>
     <table width="100%" style="margin: 0;">
        <tr>
            <td rowspan="2" width="380">
                <img style="vertical-align: top" src="<?php echo base_url(); ?>assets/img/logo/juventud.png" width="250" />
            </td>
            <td class="text-center">
                <h5>GOBIERNO DEL ESTADO DE QUINTANA ROO</h5>
            </td>
            <td style="text-align: right;">
                <?php echo $D." ".$mes." ".$Y; ?>
            </td>
        </tr>
        <tr>
            <td class="text-center"> <h5>INSTITUTO QUINTANARROENSE DE LA JUVENTUD</h5> </td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td class="text-center"> <h5>REPORTE LISTA DE EMPLEADOS EN NOMINA ORDINARIA</h5> </td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td class="text-center"> <h5>DETALLE DE PERIODO <strong class="txt-negrita"> <?php echo $header_pdf[0]->periodo_quinquenal; ?></strong></h5> </td>
        </tr>
        <tr>
            <td></td>
            <td class="text-center txt-negrita"> <h5> DEL <?php echo $header_pdf[0]->periodo_inicio; ?> AL <?php echo $header_pdf[0]->periodo_fin; ?> </h5> </td>
        </tr>
    </table> 


    