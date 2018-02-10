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

</style>
<!-- ************************************************************************ -->
<!-- DATOS DEL INSTITUTO-->
<!-- ************************************************************************ -->
<table class="table" id="id_tab_per" style="margin-top: 2rem; font-size: 10px;">
    <tbody>
       <tr>
            <td width="15%" style="color:#3498DB; font:bold 10px"> Forma de pago: </td> 
            <td width="35%"> 99 - por definir </td>
            <td width="15%" style="color:#3498DB; font:bold 10px"> Folio: </td> 
            <td width="35%" class="txt-negrita"> RFC - 95 </td> 
       </tr>
       <tr>
            <td style="color:#3498DB; font:bold 10px"> Método de pago:  </td> 
            <td> PPD - Pago en parcialidades o diferido </td>
            <td style="color:#3498DB; font:bold 10px"> Fecha: </td> 
            <td> 11/1/2018 12:04:39 </td> 
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
            <th style="color: #3498DB;" COLSPAN="3" class="success">Datos del Cliente</th>
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
            <td class="txt-negrita"> HOLAS:  </td> 
            <td><?php echo $header_pdf[0]->horas; ?> </td>
       </tr>
        <tr>
            <td class="txt-negrita"> NSS:  </td> 
            <td> <?php echo $header_pdf[0]->nss; ?> </td>          
       </tr>
    </tbody>
</table>

<!-- ************************************************************************ -->
<!-- PERCEPCIONES-->
<!-- ************************************************************************ -->
<?php  $total_percepciones = floatval($dataCFDI['datosNomina']['TotalPercepciones']); ?>
<table class="tabla-color" id="" style="font-size: 10px;" width="100%">
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
                <td class="text-right"> $<?php echo number_format(floatval($dataCFDI['percepciones'][$i]['ImporteGravado']),2); ?> 
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
<!-- ************************************************************************ -->
<!-- DEDUCCIONES -->
<!-- ************************************************************************ -->
<?php $total_deduccion = floatval($dataCFDI['datosNomina']['TotalDeducciones']); ?>
<table class="tabla-color margen-arriba" id="" style="font-size: 10px;" width="100%">
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
<hr style="width: 200px; margin-bottom: 0; margin-top: 50px;" />
<h5 class="text-center" style="margin-top: 0;">
    <?php echo $deducciones[0]->empleado." ".$deducciones[0]->ap_paterno." ".$deducciones[0]->ap_materno; ?>
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
<div class="img-QR">
    <img src="<?php echo base_url(); ?>assets/cfdi/timbrados/ejemplo_cfdi33_nomina12_prueba_11.png" alt="">
</div>
<!-- ************************************************************************ -->
<!-- CELLO DIGITAL DEL CFDI -->
<!-- ************************************************************************ -->
<?php
    $cadena = $dataCFDI['selloDigitalCFDI'];
    $tamañoCadena = strlen($cadena);
    $ciclos = $tamañoCadena / 140; //140 = cantidad de caracteres q se mostrará en una linea
    $residuo = $tamañoCadena % 140;
    $ciclosX = intval($ciclos);

    if ($residuo > 0) {
        $ciclosX += 1;
    }
 ?>
<table class="tabla-color margen-arriba" style="float:left; margin:10px 0 0 0; word-wrap: break-word; width:100%;font-size: 20px">
    <tbody>
        <tr>
            <th>Sello digital del CFDI</th>
        </tr>
        <tr>
            <td>
            <?php echo $dataCFDI['selloDigitalCFDI']; ?>
            </td>
        </tr>
    </tbody>
</table>
<!-- ************************************************************************ -->
<!-- CELLO DEL SAT -->
<!-- ************************************************************************ -->
<table class="tabla-color margen-arriba" style="font-size: 12px;" width="100%">
    <tbody>
        <tr>
            <th>Sello del SAT</th>
        </tr>
        <tr>
            <td style="overflow-wrap: break-word;">
            <?php echo $dataCFDI['selloDelSAT']; ?>
            </td>
        </tr>
        
    </tbody>
</table>
<!-- ************************************************************************ -->
<!-- CELLO DEL SAT -->
<!-- ************************************************************************ -->
<table class="tabla-color margen-arriba" style="font-size: 12px;" width="100%">
    <tbody>
        <tr>
            <th>Cadena original del complemento del certificado digital del SAT</th>
        </tr>
        <tr>
            <td style="overflow-wrap: break-word;">
            <?php echo $dataCFDI['cadenaOriginalComplemtoSAT']; ?>
            </td>
        </tr>
        
    </tbody>
</table>
