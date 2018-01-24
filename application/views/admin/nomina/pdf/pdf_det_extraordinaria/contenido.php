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
            <td > No. de plaza: </td> 
            <td style="font:bold 12px"> <?php echo $header_pdf[0]->no_plaza; ?> </td>
            <td> No. de empleado: </td> 
            <td style="font:bold 12px"> <?php echo $header_pdf[0]->no_empleado; ?> </td> 
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

<table class="tabla-color margen-arriba" id="" style="font-size: 12px; margin-top: 80px" width="100%">
    <thead>
        <tr>
            <th COLSPAN="3" class="text-center success" style="font-size: 15px;">NÓMINA EXTRAORDINARIA</th>
        </tr>
        <tr class="warning">                    
            <th class="text-center" style="font-size: 15px;">CODIGO</th>            
            <th class="text-center" style="font-size: 15px;">IMPORTE</th>
            <th class="text-center" style="font-size: 15px;">ISR</th>
        </tr>
    </thead>
    <tbody>
        <?php $total_extraordinaria = 0; ?>
        <?php $menosIsr = 0; ?>
        <?php foreach ($detalles as $fila){ ?>            
            <tr>
                <td width="15%" > <?php echo $fila->no_plaza; ?> </td>
                <td width="65%" class="text-right"> $<?php echo number_format($fila->importe,2); ?> </td>
                <td width="20%" class="text-right"> $<?php echo number_format($fila->isr,2); ?></td> 
                
            </tr>
         <?php $menosIsr += $fila->isr; ?>           
        <?php $total_extraordinaria += $fila->importe; ?>        
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
         <th>TOTAL</th>
         <th class="text-right"> $<?php echo number_format($total_extraordinaria,2); ?> </th>
        </tr>
        <th></th>
    </tfoot>
</table>

<!-- ************************************************************************ -->
<!-- Imprimir Líquido -->
<!-- ************************************************************************ -->

<?php $liquido = $total_extraordinaria - $menosIsr ?>
<h5 class="text-right"> <strong> Líquido: $<?php echo number_format($liquido,2); ?> </strong></h5>
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