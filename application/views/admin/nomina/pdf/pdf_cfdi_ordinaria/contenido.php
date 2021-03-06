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

.img-QR{
    width: 120px;
    height: 120px;
}

.txt-center{
    text-align: center;
}
.txt-right{
    text-align: right;
    margin-right: 10px;
}
.txt-table-info-cfdi{
    border-width: 1px;
}
.txt-table-info-cfdi td{
    font-size: 10px;
}

</style>
<!-- ************************************************************************ -->
<!-- DATOS DEL INSTITUTO-->
<!-- ************************************************************************ -->
<table class="table" id="id_tab_per" style="margin-top: 2rem; font-size: 10px;">
    <tbody>
       <tr>
            <td width="15%" style="color:#3498DB; font:bold 10px"> Forma de pago: </td> 
            <td width="35%"> 99 - Por definir </td>
            <td width="15%" style="color:#3498DB; font:bold 10px"> Folio: </td> 
            <td width="35%" class="txt-negrita"> <?php echo $folioN; ?> </td> 
       </tr>
       <tr>
            <td style="color:#3498DB; font:bold 10px"> Método de pago:  </td> 
            <td> PUE - Pago en una sola exhibición </td>
            <td style="color:#3498DB; font:bold 10px"> Fecha: </td> 
            <td> 
                <?php 
                    $porciones = explode("T", $fecha_expedicion);
                    echo $porciones[0]." ".$porciones[1];
                ?>
            </td> 
       </tr>
       <tr>
            <td style="color:#3498DB; font:bold 10px"> Moneda:  </td> 
            <td> MXN - Peso Mexicano </td>
       </tr>
    </tbody>
</table>
<!-- ************************************************************************ -->
<!-- DATOS DEL EMPLEADO-->
<!-- ************************************************************************ -->
<table class="table" id="id_tab_per" style="margin-top: 2rem; font-size: 10px;">
    <tbody>
        <tr>
            <th style="color: #3498DB;" COLSPAN="3" class="success">Datos del Empleado</th>
        </tr>
       <tr>
            <td  width="15%" class="txt-negrita"> No. Plaza: </td> 
            <td  width="35%"> <?php echo $header_pdf[0]->no_plaza; ?> </td>
            <td  width="15%" class="txt-negrita"> No. Empleado: </td> 
            <td  width="35%" > <?php echo $header_pdf[0]->no_empleado; ?> </td> 
       </tr>
       <tr>
            <td class="txt-negrita"> Nombre:  </td> 
            <td> <?php
                echo $header_pdf[0]->empleado;
                echo " ";
                echo $header_pdf[0]->ap_paterno;
                echo " ";
                echo $header_pdf[0]->ap_materno; 
            ?></td>
            <td class="txt-negrita"> RFC: </td> 
            <td> <?php echo $header_pdf[0]->rfc; ?> </td> 
       </tr>
       <tr>
            <td class="txt-negrita"> CURP:  </td> 
            <td><?php echo $header_pdf[0]->curp; ?> </td>
            <td class="txt-negrita"> DEPARTAMENTO:  </td> 
            <td > <?php echo $header_pdf[0]->depto; ?> </td>
       </tr>
       <tr>
            <td class="txt-negrita"> NIVEL:  </td> 
            <td> <?php echo $header_pdf[0]->nivelEmpleado; ?> </td>
            <td class="txt-negrita"> HORAS:  </td> 
            <td><?php echo $header_pdf[0]->horas; ?> </td>
       </tr>
        <tr>
            <td class="txt-negrita"> NSS:  </td> 
            <td> <?php echo $header_pdf[0]->nss; ?> </td>          
       </tr>
    </tbody>
</table>


<table width="100%">
    <tr>
        <td width="50%">
            <!-- ************************************************************************ -->
            <!-- PERCEPCIONES-->
            <!-- ************************************************************************ -->
            <?php  $total_percepciones = floatval($dataCFDI['datosNomina']['TotalPercepciones']); ?>
            <table class="tabla-color" id="" style="font-size: 10px; float:left;" width="95%">
                <thead>
                    <tr>
                        <th COLSPAN="3" class="text-center success">PERCEPCIONES</th>
                    </tr>
                    <tr class="warning">                    
                        <th width="15%">CÓDIGO</th>
                        <th width="70%">DESCRIPCIÓN</th>
                        <th class="text-right" width="15%">IMPORTE</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i=0; $i < count($dataCFDI['percepciones']); $i++) { ?>
                        <tr>
                            <td > <?php echo $dataCFDI['percepciones'][$i]['Clave']; ?> </td>
                            <td > <?php echo $dataCFDI['percepciones'][$i]['Concepto']; ?> </td>
                            <?php $importePercepcion = floatval($dataCFDI['percepciones'][$i]['ImporteGravado']) + floatval($dataCFDI['percepciones'][$i]['ImporteExento']);  ?>
                            <td class="text-right"> $<?php echo number_format($importePercepcion,2); ?> 
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                     <th class="text-right" COLSPAN="2">TOTAL</th>
                     <th class="text-right"> $<?php echo number_format(floatval($dataCFDI['datosNomina']['TotalPercepciones']),2); ?> </th>
                    </tr>
                </tfoot>
            </table>
        </td>
        <td width="50%">
            <!-- ************************************************************************ -->
            <!-- DEDUCCIONES -->
            <!-- ************************************************************************ -->
            <?php $total_deduccion = floatval($dataCFDI['datosNomina']['TotalDeducciones']); ?>
            <table class="tabla-color" id="" style="font-size: 10px; float:left;" width="100%">
                <thead>
                    <tr>
                        <th COLSPAN="3" class="text-center success">DEDUCCIONES</th>
                    </tr>
                    <tr class="warning">                    
                        <th width="15%">CÓDIGO</th>
                        <th width="70%">DESCRIPCIÓN</th>
                        <th class="text-right" width="15%">IMPORTE</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i=0; $i < count($dataCFDI['deducciones']); $i++) { ?>
                        <tr>
                            <td > <?php echo $dataCFDI['deducciones'][$i]['Clave']; ?> </td>
                            <td > <?php echo $dataCFDI['deducciones'][$i]['Concepto']; ?> </td>
                            <td class="text-right"> $<?php echo number_format(floatval($dataCFDI['deducciones'][$i]['Importe']),2); ?> 
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                     <th class="text-right" COLSPAN="2">TOTAL</th>
                     <th class="text-right"> $<?php echo number_format(floatval($dataCFDI['datosNomina']['TotalDeducciones']),2); ?> </th>
                    </tr>
                </tfoot>
            </table>
        </td>
    </tr>
</table>
<!-- ************************************************************************ -->
<!-- APORTACIONES -->
<!-- ************************************************************************ -->
<?php $subsidioSalario = 0; ?>
<?php if ( !empty($aportaciones) ) { ?>
<table class="tabla-color margen-arriba" id="" style="font-size: 10px;" width="100%">
    <thead>
        <tr>
            <th COLSPAN="3" class="text-center success">APORTACIONES</th>
        </tr>
        <tr class="warning">                    
            <th>CÓDIGO</th>
            <th>DESCRIPCIÓN</th>
            <th class="text-right">IMPORTE</th>
        </tr>
    </thead>
    <tbody id="">
            <?php $total_aportaciones = 0; ?>
            <?php foreach ($aportaciones as $fila){ ?>
            <tr class="success">
                <td width="15%"> 
                    <?php echo $fila->indicador; ?>
                    <?php if ((int)$fila->id_aportacion == 9): ?>
                        <?php $subsidioSalario = $fila->importe; ?>
                    <?php endif ?>
                </td>
                <td width="70%"> <?php echo $fila->nombre; ?> </td>
                <td width="15%" class="text-right"> $<?php echo number_format($fila->importe,2); ?> </td>
            </tr>
            <?php $total_aportaciones += $fila->importe; ?>
            <?php } ?>
        
    </tbody>
    <tfoot>
        <tr>
         <th class="text-right" COLSPAN="2">TOTAL</th>
         <th class="text-right"> $<?php echo number_format($total_aportaciones,2); ?></th>
        </tr>
    </tfoot>
</table>
<?php } ?>
<!-- ************************************************************************ -->
<!-- Imprimir Líquido -->
<!-- ************************************************************************ -->
<?php $liquido = $total_percepciones - $total_deduccion; ?>
<h5 class="text-right"> 
    <strong> Líquido: $<?php echo number_format($liquido,2); ?> </strong> <br>
    <?php if ($subsidioSalario > 0): ?>
        Subsidio al salario: $<?php echo number_format($subsidioSalario,2); ?><br>
        Total: $<?php echo number_format(($subsidioSalario + $liquido),2); ?>
    <?php endif ?>
</h5>
<!-- ************************************************************************ -->
<!-- ÁREA DE FIRMAS -->
<!-- ************************************************************************ -->
<hr style="width: 200px; margin-bottom: 0; margin-top: 40px;" />
<h5 class="text-center" style="margin-top: 0;">
    <?php echo $header_pdf[0]->empleado." ".$header_pdf[0]->ap_paterno." ".$header_pdf[0]->ap_materno; ?>
</h5>
<h5 class="text-center">
    RECIBÍ TRANSFERENCIA
</h5>
<h5 class="text-center">
    $<?php echo number_format(($subsidioSalario + $liquido),2); ?>  
</h5>
<!-- ************************************************************************ -->
<!-- CÓDIGO QR -->
<!-- ************************************************************************ -->
<div>
    <table width="100%">
        <tr>
           <td width="30%">
               <img class="img-QR" src="<?php echo base_url();?>assets/cfdi/timbrados/xml/<?php echo $nombreArchivoXML.'.png'; ?>" alt="">
           </td> 
            <td width="70%">
                <table width="100%" class="tabla-color txt-table-info-cfdi">
                    <tr> 
                        <td colspan="3" class="txt-center">
                          <h6> <p style="font-weight:bold;">Este documento es una representación impresa de un CFDI</p></h6> 
                        </td>
                    </tr>
                    <tr>
                        <td class="txt-right" width="48%">
                            Serie del Certificado del Emisor: <br>
                            Folio Fiscal:<br>
                            No. de Serie del Certificado del SAT:<br>
                            Fecha y Hora de Certificación:<br>
                        </td>
                        <td width="4%"> </td>
                        <td width="48%">
                            <?php echo $dataCFDI['representacion_impresa_certificado_no']; ?><br>
                            <?php echo $dataCFDI['folioFiscalUuid']; ?><br>
                            <?php echo $dataCFDI['representacion_impresa_certificadoSAT']; ?><br>
                            <?php echo $dataCFDI['representacion_impresa_fecha_timbrado']; ?><br>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    
    
</div>
<!-- ************************************************************************ -->
<!-- CELLO DIGITAL DEL CFDI -->
<!-- ************************************************************************ -->
<p style="background-color:#f2f2f2; font-size: 10px; font-weight:bold; margin-bottom: 0">
    Sello digital del CFDI
</p>
<p style="overflow-wrap: break-word; font-size: 9px; margin-top: 0">
    <?php echo $dataCFDI['selloDigitalCFDI']; ?>
</p>
<!-- ************************************************************************ -->
<!-- CELLO DEL SAT -->
<!-- ************************************************************************ -->
<p style="background-color:#f2f2f2; font-size: 10px; font-weight:bold; margin-bottom: 0">
    Sello del SAT
</p>
<p style="overflow-wrap: break-word; font-size: 9px; margin-top: 0">
    <?php echo $dataCFDI['selloDelSAT']; ?>
</p>
<!-- ************************************************************************ -->
<!-- CELLO DEL SAT -->
<!-- ************************************************************************ -->
<p style="background-color:#f2f2f2; font-size: 10px; font-weight:bold; margin-bottom: 0">
    Cadena original del complemento del certificado digital del SAT
</p>
<p style="overflow-wrap: break-word; font-size: 9px; margin-top: 0">
    <?php echo $dataCFDI['cadenaOriginalComplemtoSAT']; ?>
</p>
