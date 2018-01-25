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

<!-- ************************************************************************************ -->
<!-- PERCEPCIONES -->
<!-- ************************************************************************************ -->
<table class="tabla-color" id="" style="font-size: 12px;" width="100%">
    <thead>
        <tr>
            <th COLSPAN="2" class="text-center success">PERCEPCIONES</th>
        </tr>
        <tr class="warning">                    
            <th width="80%">DESCRIPCIÓN</th>
            <th class="text-right" width="20%">TOTAL</th>
        </tr>
    </thead>
    <tbody>
        <?php $totalPer = 0; ?>
        <?php for ($i=0; $i < count($totalesPercepciones); $i++) { ?>
           <tr>
                <td > <?php echo $totalesPercepciones[$i]['concepto']; ?> </td>
                <td class="text-right"> $<?php echo number_format($totalesPercepciones[$i]['total'],2); ?> 
                </td>
            </tr>
            <?php $totalPer += $totalesPercepciones[$i]['total']; ?>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
         <th class="text-right">TOTAL</th>
         <th class="text-right"> $ <?php echo number_format($totalPer,2); ?> </th>
        </tr>
    </tfoot>
</table>
<!-- ************************************************************************************ -->
<!-- DEDUCCIONES -->
<!-- ************************************************************************************ -->
<table class="tabla-color margen-arriba" id="" style="font-size: 12px;" width="100%">
    <thead>
        <tr>
            <th COLSPAN="2" class="text-center success">DEDUCCIONES</th>
        </tr>
        <tr class="warning">                    
            <th width="80%">DESCRIPCIÓN</th>
            <th class="text-right" width="20%">TOTAL</th>
        </tr>
    </thead>
    <tbody>
        <?php $totalDed = 0; ?>
        <?php for ($i=0; $i < count($totalesDeducciones); $i++) { ?>
           <tr>
                <td > <?php echo $totalesDeducciones[$i]['concepto']; ?> </td>
                <td class="text-right"> $<?php echo number_format($totalesDeducciones[$i]['total'],2); ?> 
                </td>
            </tr>
            <?php $totalDed += $totalesDeducciones[$i]['total']; ?>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
         <th class="text-right">TOTAL</th>
         <th class="text-right"> $ <?php echo number_format($totalDed,2); ?> </th>
        </tr>
    </tfoot>
</table>
<!-- ************************************************************************************ -->
<!-- DEDUCCIONES -->
<!-- ************************************************************************************ -->
<table class="tabla-color margen-arriba" id="" style="font-size: 12px;" width="100%">
    <thead>
        <tr>
            <th COLSPAN="2" class="text-center success">APORTACIONES</th>
        </tr>
        <tr class="warning">                    
            <th width="80%">DESCRIPCIÓN</th>
            <th class="text-right" width="20%">TOTAL</th>
        </tr>
    </thead>
    <tbody>
        <?php $totalApor = 0; ?>
        <?php for ($i=0; $i < count($totalesAportaciones); $i++) { ?>
           <tr>
                <td > <?php echo $totalesAportaciones[$i]['concepto']; ?> </td>
                <td class="text-right"> $<?php echo number_format($totalesAportaciones[$i]['total'],2); ?> 
                </td>
            </tr>
            <?php $totalApor += $totalesAportaciones[$i]['total']; ?>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
         <th class="text-right">TOTAL</th>
         <th class="text-right"> $ <?php echo number_format($totalApor,2); ?> </th>
        </tr>
    </tfoot>
</table>

<h5 class="text-right txt-negrita">
    <?php $total = $totalPer + $totalDed + $totalApor ?>
   TOTAL $<?php echo number_format(($total),2); ?>  
</h5>
