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

</style>
<!-- ************************************************************************ -->
<!-- DATOS DEL EMPLEADO -->
<!-- ************************************************************************ -->
<table  class="table table-striped txt-header-pdf " style="margin-top: 2rem; font-size: 12px;">
    <tbody id="">
       <tr>
            <td width="12%"> No. de plaza: </td> 
            <td width="33%" style="font:bold 12px"> <?php echo $header_pdf[0]->no_plaza; ?> </td>
            <td width="15%"> No. de empleado: </td> 
            <td width="35%" style="font:bold 12px"> <?php echo $header_pdf[0]->no_empleado; ?> </td> 
       </tr>
       <tr>
            <td> Nombre:  </td> 
            <td style="font:bold 12px"> <?php
                echo $header_pdf[0]->empleado;
                echo " ";
                echo $header_pdf[0]->ap_paterno;
                echo " ";
                echo $header_pdf[0]->ap_materno; 
            ?></td>
            <td> RFC: </td> 
            <td style="font:bold 12px"> <?php echo $header_pdf[0]->rfc; ?> </td> 
       </tr>
       <tr>
            <td> CURP:  </td> 
            <td style="font:bold 12px"> <?php echo $header_pdf[0]->curp; ?></td>
            <td> DEPARTAMENTO: </td> 
            <td style="font:bold 12px"> <?php echo $header_pdf[0]->depto; ?> </td> 
       </tr>
       <tr>
            <td> NIVEL:  </td> 
            <td style="font:bold 12px"> <?php echo $header_pdf[0]->nivel; ?></td>
            <td> HORAS: </td> 
            <td style="font:bold 12px"> <?php echo $header_pdf[0]->horas; ?> hrs. </td> 
       </tr>
       <tr>
            <td> NSS:  </td> 
            <td style="font:bold 12px"> <?php echo $header_pdf[0]->nss; ?> </td>
            <td> </td> 
            <td style="font:bold 12px"> </td> 
       </tr>
    </tbody>
</table>
<!-- ************************************************************************ -->
<!-- PERCEPCIONES-->
<!-- ************************************************************************ -->

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
            $totalImporte = $detalles[0]->importeExento + $detalles[0]->importeGravado;
        ?>           
        <tr>
            <td width="50%" > TOTAL IMPORTE </td>
            <td width="50%" class="text-right"> $<?php echo number_format($totalImporte,2); ?> </td>          
        </tr>
        <tr>
            <td> IMPORTE EXENTO </td>
            <td class="text-right"> $<?php echo number_format($detalles[0]->importeExento,2); ?> </td>          
        </tr>
        <tr>
            <td> IMPORTE GRAVABLE </td>
            <td class="text-right"> $<?php echo number_format($detalles[0]->importeGravado,2); ?> </td>          
        </tr>
        <tr>
            <td width="15%" >
                <?php if ($detalles[0]->isrSubsidio == 0): ?>
                    ISR
                <?php else: ?>
                    SUBSIDIO
                <?php endif ?>
            </td>
            <td width="70%" class="text-right"> $<?php echo number_format($detalles[0]->importeIsrSub,2); ?> </td>          
        </tr>      
    </tbody>
    <tfoot>
    </tfoot>
</table>

<!-- ************************************************************************ -->
<!-- Imprimir Líquido -->
<!-- ************************************************************************ -->

<?php 
    if ($detalles[0]->isrSubsidio == 0){
        $liquido = $totalImporte - $detalles[0]->importeIsrSub;  
    }else{
        $liquido = $totalImporte + $detalles[0]->importeIsrSub;
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
            <?php if ($detalles[0]->isrSubsidio == 0): ?>
                Isr
            <?php else: ?>
                Subsidio
            <?php endif ?>
        </td>
        <td width="15%" class="text-right">
            <?php if ($detalles[0]->isrSubsidio == 0): ?>
                - 
            <?php else: ?>
                + 
            <?php endif ?>
            $<?php echo number_format($detalles[0]->importeIsrSub,2); ?>
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
<hr style="width: 200px; margin-bottom: 0; margin-top: 200px;" />
<h5 class="text-center" style="margin-top: 0;">
    <?php echo $detalles[0]->nombre." ".$detalles[0]->ap_paterno." ".$detalles[0]->ap_materno; ?>
</h5>
<h5 class="text-center">
    RECIBÍ TRANSFERENCIA
</h5>
<h5 class="text-center">
    $<?php echo number_format($liquido,2); ?>
</h5>