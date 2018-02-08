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
</style>

<table class="tabla-color" id="miTabla" style="font-size: 12px;" width="100%">
    <thead>
        <tr class="warning" >
            <th class="text-center ">PLAZA </th>
            <th class="text-center ">RFC</th>
            <th >NOMBRE</th>
            <th >APELLIDOS</th>
            <th class=" text-right">PERCEPCIONES</th>
            <th class=" text-right">DEDUCCIONES</th>
            <th class=" text-right">APORTACIONES</th>
            <th class=" text-right">LÍQUIDO</th>
            <th class="text-center ">CURP</th>
            <th class="text-center ">PUESTO</th>            
        </tr>
    </thead>
    <tbody>      
        <?php  $totalP = 0;
               $totalD = 0;
               $totalA = 0;
               $totalL = 0;
        ?>         
        <?php foreach ($listaPeriodoTotales as $listaTotal){ ?>  
         <tr >  
            <?php                
                $sumaPercepciones = floatval($listaTotal->totalPercepciones);
                $sumaDeducciones = floatval($listaTotal->totalDeducciones);
                $liquido = $sumaPercepciones - $sumaDeducciones;
                $subsidioAlEmpleo = $listaTotal->subsidioAlEmpleo;
                if ($subsidioAlEmpleo != null) {
                    $liquido += floatval($subsidioAlEmpleo);
                }
            ?> 
            <td class="text-left"><?php echo $listaTotal->no_plaza?></td>
            <td class="text-left" width="10%"><?php echo $listaTotal->rfc?></td>
            <td width="10%"><?php echo $listaTotal->nombre_emp?></td>
            <td width="10%"><?php echo $listaTotal->ap_paterno.' '.$listaTotal->ap_materno?></td>
            <td class="text-right" width="10%">$<?php echo number_format($listaTotal->totalPercepciones,2)?></td>
            <td class="text-right" width="10%">$<?php echo number_format($listaTotal->totalDeducciones,2)?></td>
            <td class="text-right" width="10%">$<?php echo number_format($listaTotal->totalAportaciones,2)?></td>
            <td class="text-right" width="10%">$<?php echo number_format($liquido,2) ?></td>
            <td class="text-right" width="15%"><?php echo $listaTotal->curp?></td>
            <td class="text-right"><?php echo $listaTotal->puesto?></td>       
         </tr>     
             <?php 
                $totalP += $listaTotal->totalPercepciones;
                $totalD += $listaTotal->totalDeducciones;
                $totalA += $listaTotal->totalAportaciones;
                $totalL += $liquido;
             ?>
        <?php } ?>       
    </tbody>
    <tfoot>
        <tr>
            <th></th>    
            <th></th>            
            <th class="text-right" COLSPAN="2">TOTALES</th>
            <th class="text-right"> $<?php echo number_format($totalP,2); ?> </th>
            <th class="text-right"> $<?php echo number_format($totalD,2); ?> </th>
            <th class="text-right"> $<?php echo number_format($totalA,2); ?> </th>
            <th class="text-right"> $<?php echo number_format($totalL,2); ?> </th>
        </tr>
    </tfoot>
</table>
