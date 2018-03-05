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
            <td> <?php echo $header_pdf[0]->nivel; ?> </td>
            <td class="txt-negrita"> HORAS:  </td> 
            <td><?php echo $header_pdf[0]->horas; ?> </td>
       </tr>
        <tr>
            <td class="txt-negrita"> NSS:  </td> 
            <td> <?php echo $header_pdf[0]->nss; ?> </td>          
       </tr>
    </tbody>
</table>
<!-- ************************************************************************ -->
<!-- Imprimir datos de nómina extraordinaria -->
<!-- ************************************************************************ -->
<?php  $total_percepciones = floatval($dataCFDI['datosNomina']['TotalPercepciones']); ?>
<table class="tabla-color margen-arriba" id="" style="font-size: 15px; margin-top: 80px" width="100%">
    <thead>
        <tr>
            <th COLSPAN="2" class="text-center success" style="font-size: 15px;">NÓMINA EXTRAORDINARIA</th>
        </tr>
        <tr class="warning">                    
            <th style="font-size: 15px;">CONCEPTO</th>            
            <th class="text-center" style="font-size: 15px;" class="text-right">VALOR</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $importeGravado = floatval($dataCFDI['percepciones'][0]['ImporteGravado']);
            $ImporteExento = floatval($dataCFDI['percepciones'][0]['ImporteExento']);
            $totalImpuestosRetenidos = floatval($dataCFDI['totalDeducciones']['TotalImpuestosRetenidos']);
            $totalImporte = $importeGravado + $ImporteExento;
        ?>           
        <tr>
            <td width="50%" > TOTAL IMPORTE </td>
            <td width="50%" class="text-right"> $<?php echo number_format($totalImporte,2); ?> </td>          
        </tr>
        <tr>
            <td> IMPORTE EXENTO </td>
            <td class="text-right"> $<?php echo number_format($ImporteExento,2); ?> </td>          
        </tr>
        <tr>
            <td> IMPORTE GRAVABLE </td>
            <td class="text-right"> $<?php echo number_format($importeGravado,2); ?> </td>          
        </tr>
        <tr>
            <td width="15%" >
                <?php if ($totalImpuestosRetenidos > 0): ?> 
                    ISR
                <?php else: ?>
                    SUBSIDIO
                <?php endif ?>
            </td>
            <td width="70%" class="text-right">
                <?php if ($totalImpuestosRetenidos > 0): ?> 
                    $<?php echo number_format($totalImpuestosRetenidos,2); ?>
                <?php else: ?>
                    $<?php echo number_format($importeCompenzacion,2);  ?> 
                <?php endif ?> 
            </td>          
        </tr>      
    </tbody>
    <tfoot>
    </tfoot>
</table>
<!-- ************************************************************************ -->
<!-- Imprimir Líquido -->
<!-- ************************************************************************ -->

<?php 
    if ($totalImpuestosRetenidos > 0){
        $liquido = $totalImporte - $totalImpuestosRetenidos;  
    }else{
        $liquido = $totalImporte + $importeCompenzacion;
    }
?>
<table width="100%" class="margen-arriba">
    <tr>
        <td width="70%"></td>
        <td width="15%" class="text-left">Total Importe:</td>
        <td width="15%" class="text-right">$<?php echo number_format($totalImporte,2); ?></td>
    </tr>
    <tr>
        <td width="70%"></td>
        <td width="15%" class="text-left">
            <?php if ($totalImpuestosRetenidos > 0): ?>
                ISR
            <?php else: ?>
                Subsidio
            <?php endif ?>
        </td>
        <td width="15%" class="text-right">
            <?php if ($totalImpuestosRetenidos > 0): ?>
                - 
            <?php else: ?>
                + 
            <?php endif ?>
            $<?php echo number_format($importeCompenzacion,2); ?>
        </td>
    </tr>
    <tr>
        <td width="70%"></td>
        <td width="15%" class="text-left">Líquido:</td>
        <td width="15%" class="text-right">$<?php echo number_format($liquido,2); ?></td>
    </tr>
</table>
<!-- ************************************************************************ -->
<!-- ÁREA DE FIRMAS -->
<!-- ************************************************************************ -->
<hr style="width: 200px; margin-bottom: 0; margin-top: 50px;" />
<h5 class="text-center" style="margin-top: 0;">
    <?php
        echo $header_pdf[0]->empleado;
        echo " ";
        echo $header_pdf[0]->ap_paterno;
        echo " ";
        echo $header_pdf[0]->ap_materno;
    ?>
</h5>
<h5 class="text-center">
    RECIBÍ TRANSFERENCIA
</h5>
<h5 class="text-center">
    $<?php echo number_format($liquido,2); ?>
</h5>
<!-- ************************************************************************ -->
<!-- CÓDIGO QR -->
<!-- ************************************************************************ -->
<div>
    <table width="100%">
        <tr>
           <td width="30%">
               <img class="img-QR" src="<?php echo base_url();?>assets/cfdi/timbradosNominaExtraordinaria/xml/<?php echo $nombreArchivoXML.'.png'; ?>" alt="">
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
