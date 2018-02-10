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

<div height="90" style="float:left;width: 45%;outline: green solid thin">
    <img src="<?php echo base_url(); ?>assets/img/logo/juventud.png" style="width: 90%" height="80" />
</div>
<div height="80" style="float:left;width: 55%;outline: red solid thin">
    <h5 style="text-align: center;">INSTITUTO QUINTANARROENSE DE LA JUVENTUD</h5>
    <h5 style="text-align: center;">RFC: IQJ1706288Z7</h5>
    <p style="font-size: 11px; margin: 0">Tipo de Comprobante: | - Ingreso</p>
    <p style="font-size: 11px; margin: 0">Lugar de Expedición: 77000</p>
    <p style="font-size: 11px; margin: 0">Regimen Fiscal: 603 - Personas Morales con Fines no Lucrativos</p>
</div>
