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
    font:bold 10px;
}

</style>
<!-- ************************************************************************ -->
<!-- DATOS DEL EMPLEADO-->
<!-- ************************************************************************ -->
<table class="table" id="id_tab_per" style="margin-top: 2rem; font-size: 12px;">
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
<table class="table" id="id_tab_per" style="margin-top: 2rem; font-size: 12px;">
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
<!-- <table id="id_tab_perr" style="margin-top: 2rem; font-size: 12px;">
    <tbody>
        <tr>
            <th style="color: #3498DB;" COLSPAN="3" class="success">Datos del Cliente</th>
        </tr>
       <tr>
            <td style="background: red; font: bold 12px; width: 53.1%"> No. de plaza: </td> 
            <td style="background: green; width: 45%"> <?php echo $header_pdf[0]->no_plaza; ?> </td>          
       </tr>
       <tr>
            <td style="width: 53.1%" class="txt-negrita"> No. de empleado: </td> 
            <td style="width: 45%"> <?php echo $header_pdf[0]->no_empleado; ?> </td>
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
            <td > <?php echo $header_pdf[0]->rfc; ?> </td> 
       </tr>
       <tr>
            <td class="txt-negrita"> CURP:  </td> 
            <td> <?php echo $header_pdf[0]->curp; ?></td>
            <td class="txt-negrita"> DEPARTAMENTO: </td> 
            <td > <?php echo $header_pdf[0]->depto; ?> </td> 
       </tr>
       <tr>
            <td class="txt-negrita"> NIVEL:  </td> 
            <td> <?php echo $header_pdf[0]->nivel; ?></td>
            <td class="txt-negrita"> HORAS: </td> 
            <td> <?php echo $header_pdf[0]->horas; ?> hrs. </td> 
       </tr>
       <tr>
            <td  class="txt-negrita"> NSS:  </td> 
            <td> <?php echo $header_pdf[0]->nss; ?></td>
            <td> </td> 
            <td> </td> 
       </tr> 
    </tbody>
</table> -->
<!-- ************************************************************************ -->
<!-- PERCEPCIONES-->
<!-- ************************************************************************ -->
<table class="tabla-color" id="" style="font-size: 12px;" width="100%">
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
        <?php $total_percepciones = 0; ?>
        <?php foreach ($percepciones as $fila){ ?>
            
            <tr>
                <td > <?php echo $fila->indicador; ?> </td>
                <td > <?php echo $fila->nombre; ?> </td>
                <td class="text-right"> $<?php echo number_format($fila->importe,2); ?> 
                </td>
            </tr>
        <?php $total_percepciones += $fila->importe; ?>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
         <th class="text-right" COLSPAN="2">TOTAL</th>
         <th class="text-right"> $<?php echo number_format($total_percepciones,2); ?> </th>
        </tr>
    </tfoot>
</table>
<!-- ************************************************************************ -->
<!-- DEDUCCIONES -->
<!-- ************************************************************************ -->
<table class="tabla-color margen-arriba" id="" style="font-size: 12px;" width="100%">
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
    <tbody id="">
            <?php $total_deduccion = 0; ?>
            <?php foreach ($deducciones as $fila){ ?>
            <tr>
                <td > <?php echo $fila->indicador; ?> </td>
                <td > <?php echo $fila->nombre; ?> </td>
                <td class="text-right"> $<?php echo number_format($fila->importe,2); ?> </td>
            </tr>
            <?php $total_deduccion += $fila->importe; ?>
            <?php } ?>
        
    </tbody>
    <tfoot>
        <tr>
         <th class="text-right" COLSPAN="2">TOTAL</th>
         <th class="text-right"> $<?php echo number_format($total_deduccion,2); ?></th>
        </tr>
    </tfoot>
</table>
<!-- ************************************************************************ -->
<!-- APORTACIONES -->
<!-- ************************************************************************ -->
<?php $subsidioSalario = 0; ?>
<?php if ( !empty($aportaciones) ) { ?>
<table class="tabla-color margen-arriba" id="" style="font-size: 12px;" width="100%">
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