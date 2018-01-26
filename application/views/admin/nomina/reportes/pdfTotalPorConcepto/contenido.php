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
<?php $totalPer = 0; ?>
<?php if (!empty($totalesPercepciones)): ?>
    <table class="tabla-color" id="" style="font-size: 12px;" width="100%">
    <thead>
        <tr>
            <th COLSPAN="3" class="text-center success">PERCEPCIONES</th>
        </tr>
        <tr class="warning">
            <th width="15%">CÓDIGO</th>                    
            <th width="70%">DESCRIPCIÓN</th>
            <th class="text-right" width="20%">TOTAL</th>
        </tr>
    </thead>
    <tbody>
        <?php for ($i=0; $i < count($totalesPercepciones); $i++) { ?>
           <tr>
                <td > <?php echo $totalesPercepciones[$i]['indicador']; ?> </td>
                <td > <?php echo $totalesPercepciones[$i]['concepto']; ?> </td>
                <td class="text-right"> $<?php echo number_format($totalesPercepciones[$i]['total'],2); ?></td>
            </tr>
            <?php $totalPer += $totalesPercepciones[$i]['total']; ?>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
         <th class="text-right" COLSPAN="2">TOTAL</th>
         <th class="text-right"> $ <?php echo number_format($totalPer,2); ?> </th>
        </tr>
    </tfoot>
</table>
<?php endif ?>

<!-- ************************************************************************************ -->
<!-- DEDUCCIONES -->
<!-- ************************************************************************************ -->
<?php $totalDed = 0; ?>
<?php if (!empty($totalesDeducciones)): ?>
    <table class="tabla-color margen-arriba" id="" style="font-size: 12px;" width="100%">
        <thead>
            <tr>
                <th COLSPAN="3" class="text-center success">DEDUCCIONES</th>
            </tr>
            <tr class="warning">
                <th width="15%">CÓDIGO</th>                    
                <th width="70%">DESCRIPCIÓN</th>
                <th class="text-right" width="20%">TOTAL</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i=0; $i < count($totalesDeducciones); $i++) { ?>
               <tr>
                    <td > <?php echo $totalesDeducciones[$i]['indicador']; ?> </td>
                    <td > <?php echo $totalesDeducciones[$i]['concepto']; ?> </td>
                    <td class="text-right"> $<?php echo number_format($totalesDeducciones[$i]['total'],2); ?> 
                    </td>
                </tr>
                <?php $totalDed += $totalesDeducciones[$i]['total']; ?>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
             <th class="text-right" COLSPAN="2">TOTAL</th>
             <th class="text-right"> $ <?php echo number_format($totalDed,2); ?> </th>
            </tr>
        </tfoot>
    </table>
<?php endif ?>
<!-- ************************************************************************************ -->
<!-- DEDUCCIONES -->
<!-- ************************************************************************************ -->
<?php $totalApor = 0; ?>
<?php if (!empty($totalesAportaciones)): ?>
    <table class="tabla-color margen-arriba" id="" style="font-size: 12px;" width="100%">
        <thead>
            <tr>
                <th COLSPAN="3" class="text-center success">APORTACIONES</th>
            </tr>
            <tr class="warning">
                <th width="15%">CÓDIGO</th>                    
                <th width="70%">DESCRIPCIÓN</th>
                <th class="text-right" width="20%">TOTAL</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i=0; $i < count($totalesAportaciones); $i++) { ?>
               <tr>
                    <td > <?php echo $totalesAportaciones[$i]['indicador']; ?> </td>
                    <td > <?php echo $totalesAportaciones[$i]['concepto']; ?> </td>
                    <td class="text-right"> $<?php echo number_format($totalesAportaciones[$i]['total'],2); ?> 
                    </td>
                </tr>
                <?php $totalApor += $totalesAportaciones[$i]['total']; ?>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
             <th class="text-right" COLSPAN="2">TOTAL</th>
             <th class="text-right"> $ <?php echo number_format($totalApor,2); ?> </th>
            </tr>
        </tfoot>
    </table>
<?php endif ?>
