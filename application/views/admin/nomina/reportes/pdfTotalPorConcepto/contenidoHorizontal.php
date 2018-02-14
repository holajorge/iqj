<?php if (isset($reporteExcel)): ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body>
<?php endif ?>
<style type='text/css'>

.tabla-color tr:nth-child(odd) {
    background-color:#f2f2f2;
}
.tabla-color tr:nth-child(even) {
    background-color:#fbfbfb;
}

.margen-arriba{
    margin-top: 25px;
}

.txt-negrita{
    font:bold 12px;
}

.oculto{
    display: none;
}

</style>
<?php 
    //SE OBTIENE LA FECHA ACTUAL
    $mesRep = array("ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE");
    $D=date("d");
    $M=date("m");
    $Y=date("Y");
    setlocale(LC_TIME, 'spanish');  
    $nombre=strftime("%B",mktime(0, 0, 0, $M+1, 0 ,0)); 
    $mes= strtoupper ($nombre );
    //SE CALCULA DINÁMICAMENTE EL TAMAÑP DE LA TABLA
    $x = count($componentes); //TAMAÑO DEL ARREGLO DE COMPONENTES QUE DEVUELVE LA BASE DE DATOS
    $residuo = $x % 2;
    $divicion = $x / 2;
    $divicionClicoPrimeraTabla = intval($divicion);
    $divicionClicoSegundaTabla = $divicionClicoPrimeraTabla;
    if ($residuo > 0) {
        $divicionClicoPrimeraTabla += 1;
    }
//SE CALCULAN LOS TOTALES DE LAS PERCEPCIONES
    for ($j=0; $j < $x ; $j++) {
        $totalPer = 0;
        for ($i=0; $i < count($totalesPercepciones[$j]); $i++) {
            $totalPer += $totalesPercepciones[$j][$i]['total'];
        }
        $totalesPerc[] = $totalPer;
    }
//SE CALCULAN LOS TOTALES DE LAS DEDUCCIONES
    for ($j=0; $j < $x ; $j++) {
        $totalDed = 0;
        for ($i=0; $i < count($totalesDeducciones[$j]); $i++) {
            $totalDed += $totalesDeducciones[$j][$i]['total'];
        }
        $totalesDeduc[] = $totalDed;
    }
//SE CALCULAN LOS TOTALES DE LAS DEDUCCIONES 
    for ($j=0; $j < $x ; $j++) {
        $totalApor = 0;
        for ($i=0; $i < count($totalesAportaciones[$j]); $i++) {
            $totalApor += $totalesAportaciones[$j][$i]['total'];
        }
        $totalesAporta[] = $totalApor;
    }
?>
<table class="tabla-color <?php if(isset($reporteExcel)){ echo "oculto";} ?>" id="table2excel" style="font-size: 12px;" width="100%" >
    <thead>
        <!-- En caso de que sea un reporte en EXCEL
        Se imprime un header en la tabla para mostrar la información del reporte -->
        <?php if (isset($reporteExcel)): ?>
            <?php
                $col1y3 = intval(($x/3));
                $res =  ($x + 2) % 3;
                $celdaCentro = intval(($x/3)) + $res;
            ?>
            <tr>
                <td colspan="<?php echo ($col1y3); ?>" class="text-center">
                    <img style="vertical-align: top" src="<?php echo base_url(); ?>assets/img/logo/juventud.png" width="150" />
                </td>
                <td colspan="<?php echo (($celdaCentro)); ?>" class="text-center">
                    GOBIERNO DEL ESTADO DE QUINTANA ROO <br>
                    INSTITUTO QUINTANARROENSE DE LA JUVENTUD <br>
                    DEVENGADO DE NÓMINA POR CONCEPTO <br>
                    <?php if (isset($headerExcel['header_pdf'])): ?>
                        <?php echo "PERIODO ".$headerExcel['header_pdf'][0]->periodo_quinquenal; ?>
                         DEL <?php echo $headerExcel['header_pdf'][0]->periodo_inicio; ?> AL <?php echo $headerExcel['header_pdf'][0]->periodo_fin; ?>
                        <br>
                        <?php echo $headerExcel['header_pdf_comp']; ?>
                    <?php endif ?>
                    <?php if (isset($headerExcel['header_pdf1'])): ?>
                        <?php  $mesReporte = $headerExcel['header_pdf1']['mes']; ?>
                        <?php echo $mesRep[$mesReporte - 1]; ?> DE
                        <?php  echo $headerExcel['header_pdf1']['anio']; ?>
                    <?php endif ?>
                </td>
                <td colspan="<?php echo ($col1y3); ?>" class="text-center">
                    <?php echo $D." DE ".$mes." DE ".$Y; ?>
                </td>
            </tr>
            <tr>
                <td colspan="<?php echo ($x+2); ?>"></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td colspan="<?php echo ($x); ?>">COMPONENTES</td>
            </tr>
        <?php endif ?>
        <!-- Se imprime las celdas de encabezado de los componentes -->
        <tr class="warning">
            <th COLSPAN="2" class="text-center">CONCEPTOS</th>
            <?php for ($i=0; $i < $x ; $i++) { ?>
                <th class="text-center"><?php echo $componentes[$i]->clave; ?>-</th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
        <!-- PERCEPCIONES -->
        <!-- //------------------------------------------------------------------------------------- -->
        <tr>
            <th COLSPAN="2" class="text-center">PERCEPCIONES</th>
            <?php for ($i=0; $i < $x ; $i++) { ?>
                <th class="text-center">PERCEPCIONES</th>
            <?php } ?>
        </tr>
        <tr>
            <th class="text-center">CÓDIGO</th>
            <th class="text-center">DESCRIPCIÓN</th>
            <?php for ($i=0; $i < $x ; $i++) { ?>
               <th class="text-center">IMPORTE</th>
            <?php } ?>
        </tr>
        <?php for ($j=0; $j < count($totalesPercepciones[0]); $j++) { ?> 
        <tr>
            <td>
                <?php echo $totalesPercepciones[0][$j]['indicador']; ?>
            </td>
            <td>
                <?php echo $totalesPercepciones[0][$j]['concepto']; ?>
            </td>
            <?php for ($i=0; $i < $x; $i++) { ?>
            <td class="text-right">$<?php echo number_format($totalesPercepciones[$i][$j]['total'],2); ?></td>
            <?php } ?>
        </tr>
        <?php } ?>
        <tr>
            <th COLSPAN="2">
                TOTAL
            </th>
            <?php for ($i=0; $i < $x; $i++) { ?>
            <th class="text-right">$<?php echo number_format($totalesPerc[$i],2); ?></th>
            <?php } ?>
        </tr>
        <tr>
            <td colspan="<?php echo ($x+2); ?>">.</td>
        </tr>
        <!-- DEDUCCIONES -->
        <!-- //------------------------------------------------------------------------------------- -->
        <tr>
            <th COLSPAN="2" class="text-center">DEDUCCIONES</th>
            <?php for ($i=0; $i < $x ; $i++) { ?>
                <th class="text-center">DEDUCCIONES</th>
            <?php } ?>
        </tr>
        <tr>
            <th class="text-center">CÓDIGO</th>
            <th class="text-center">DESCRIPCIÓN</th>
            <?php for ($i=0; $i < $x ; $i++) { ?>
               <th class="text-center">IMPORTE</th>
            <?php } ?>
        </tr>
        <?php for ($j=0; $j < count($totalesDeducciones[0]); $j++) { ?> 
        <tr>
            <td>
                <?php echo $totalesDeducciones[0][$j]['indicador']; ?>
            </td>
            <td>
                <?php echo $totalesDeducciones[0][$j]['concepto']; ?>
            </td>
            <?php for ($i=0; $i < $x; $i++) { ?>
            <td class="text-right">$<?php echo number_format($totalesDeducciones[$i][$j]['total'],2); ?></td>
            <?php } ?>
        </tr>
        <?php } ?>
        <tr>
            <th COLSPAN="2">
                TOTAL
            </th>
            <?php for ($i=0; $i < $x; $i++) { ?>
            <th class="text-right">$<?php echo number_format($totalesDeduc[$i],2); ?></th>
            <?php } ?>
        </tr>
        <tr>
            <td colspan="<?php echo ($x+2); ?>">.</td>
        </tr>
        <!-- APORTACIONES -->
        <!-- //------------------------------------------------------------------------------------- -->
        <tr>
            <th COLSPAN="2" class="text-center">APORTACIONES</th>
            <?php for ($i=0; $i < $x ; $i++) { ?>
                <th class="text-center">APORTACIONES</th>
            <?php } ?>
        </tr>
        <tr>
            <th class="text-center">CÓDIGO</th>
            <th class="text-center">DESCRIPCIÓN</th>
            <?php for ($i=0; $i < $x ; $i++) { ?>
               <th class="text-center">IMPORTE</th>
            <?php } ?>
        </tr>
        <?php for ($j=0; $j < count($totalesAportaciones[0]); $j++) { ?> 
        <tr>
            <td>
                <?php echo $totalesAportaciones[0][$j]['indicador']; ?>
            </td>
            <td>
                <?php echo $totalesAportaciones[0][$j]['concepto']; ?>
            </td>
            <?php for ($i=0; $i < $x; $i++) { ?>
            <td class="text-right">$<?php echo number_format($totalesAportaciones[$i][$j]['total'],2); ?></td>
            <?php } ?>
        </tr>
        <?php } ?>
        <tr>
            <th COLSPAN="2">
                TOTAL
            </th>
            <?php for ($i=0; $i < $x; $i++) { ?>
            <th class="text-right">$<?php echo number_format($totalesAporta[$i],2); ?></th>
            <?php } ?>
        </tr>
    </tbody>
</table>

<?php if (isset($reporteExcel)): ?>
    <script src="<?php echo base_url('assets/js/jquery-3.2.1.min.js'); ?> "></script>
    <script src="<?php echo base_url('assets/js/plugins/jquery2excel/jquery.table2excel.min.js');?>"></script>
    <script type="text/javascript">
        $(function() {
            $("#table2excel").table2excel({
                exclude: ".noExl",
                name: "Excel Document Name",
                filename: "ReporteDeNomina" + new Date().toISOString().replace(/[\-\:\.]/g, ""),
                fileext: ".xls",
                exclude_img: false,
                exclude_links: true,
                exclude_inputs: true
            });
        });
        $(function() {
              window.close();  
        });
    </script>
    </body>
</html>
<?php endif ?>


