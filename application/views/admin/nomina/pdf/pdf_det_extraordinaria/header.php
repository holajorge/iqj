<body>
    <?php
    $D=date("d");
    $M=date("m");
    $Y=date("Y");
    setlocale(LC_TIME, 'spanish');  
    $nombre=strftime("%B",mktime(0, 0, 0, $M+1, 0 ,0)); 
    $mes= strtoupper ($nombre );
    ?>

     <table width="100%" style="margin: 0;">
        <tr>
            <td rowspan="2" width="200">
                <img style="vertical-align: top" src="<?php echo base_url(); ?>assets/img/logo/juventud.png" width="150" />
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
            <td class="text-center"> <h5>REPORTE DE NÓMINA EXTRAORDINARIA</h5> </td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td class="text-center" style="font:bold 12px "Trebuchet MS"; "> <strong><?php echo $header_pdf[0]->concepto_extranombre; ?></strong> </td>
        </tr>
        <tr>
            <td></td>
            <td class="text-center" style="font:bold 12px "Trebuchet MS"; "> <h5> DEL <?php echo $header_pdf[0]->fecha; ?> </h5> </td>
        </tr>
    </table> 


    