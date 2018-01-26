<body>
    <?php
    $mesRep = array("ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE");
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
            <td class="text-center"> <h5 class="txt-negrita">DEVENGADO DE NÓMINA POR CONCEPTO</h5> </td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td class="text-center"> <h5><strong class="txt-negrita">
             
                 <?php if (isset($header_pdf)): ?>
                     <?php echo "PERIODO ".$header_pdf[0]->periodo_quinquenal; ?>
                 <?php endif ?>
                 <?php if (isset($header_pdf1)): ?>
                    <?php  $mesReporte = $header_pdf1['mes']; ?>
                    <?php echo $mesRep[$mesReporte - 1]; ?>
                    <?php  echo $header_pdf1['anio']; ?>
                 <?php endif ?>
             </strong></h5> </td>
        </tr>
        <tr>
            <td></td>
            <td class="text-center txt-negrita"> 
            <h5> 
                <?php if (isset($header_pdf)): ?>
                   DEL <?php echo $header_pdf[0]->periodo_inicio; ?> AL <?php echo $header_pdf[0]->periodo_fin; ?>  
                <?php endif ?>
            </h5> 
            </td>
        </tr>
    </table> 


    