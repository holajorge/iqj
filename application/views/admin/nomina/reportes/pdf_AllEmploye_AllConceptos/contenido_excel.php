<?php $mesRep = array("ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
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
</head>
<body>
	<table  class="tabla-color" id="table2excel" style="display: none;">
		<thead>
			<tr>
				<td colspan="2">
					<img style="vertical-align: top" src="<?php echo base_url(); ?>assets/img/logo/juventud.png" width="150" />
				</td>
				<td colspan="<?php echo(count($nombresPercepcionesEnNomina) + count($nombresDeduccionesEnNomina) + count($nombresAportacionesEnNomina)); ?>">
					GOBIERNO DEL ESTADO DE QUINTANA ROO <br>
                    INSTITUTO QUINTANARROENSE DE LA JUVENTUD <br>
                    DEVENGADO DE NÓMINA POR EMPLEADO Y CONCEPTO <br>
                    <?php if (isset($quincena)): ?>
                    	PERIODO <?php echo $datosNomina[0]->periodo_quinquenal; ?> <br>
                    	DEL <?php echo $datosNomina[0]->periodo_inicio; ?> AL <?php echo $datosNomina[0]->periodo_fin; ?>
                    <?php else: ?>
						<?php echo $mesRep[$mes - 1]; ?> DE
                        <?php  echo $anio; ?>
                    <?php endif ?>
                    <?php if (isset($componente)): ?>
                    	<br>Componente: 
                    	<?php echo $componente; ?>
                    <?php endif ?>
                    
				</td>
			</tr>
			<tr>
				<td colspan="2">DATOS DEL EMPLEADO</td>
				<td colspan="<?php echo(count($nombresPercepcionesEnNomina)); ?>">PERCEPCIONES</td>
				<td colspan="<?php echo(count($nombresDeduccionesEnNomina)); ?>">DEDUCCIONES</td>
				<td colspan="<?php echo(count($nombresAportacionesEnNomina)); ?>">APORTACIONES</td>
			</tr>
			<tr>
				<th> Nombre empleado </th>
				<th> RFC </th>
				<!-- Se imprimen los nombres de los concpetos de las PERCEPCIONES en la tabla -->
				<?php foreach ($nombresPercepcionesEnNomina as $key): ?>
				<th> <?php echo $key->nombre; ?></th>
				<?php endforeach ?>
				<!-- Se imprimen los nombres de los conceptos de las DEDUCCIONES en la tabla -->
				<?php foreach ($nombresDeduccionesEnNomina as $key): ?>
				<th> <?php echo $key->nombre; ?> </th>
				<?php endforeach ?>
				<!-- Se imprimen los nombres de los conceptos de las APORTACIONES en la tabla -->
				<?php foreach ($nombresAportacionesEnNomina as $key): ?>
				<th> <?php echo $key->nombre; ?> </th>
				<?php endforeach ?>
			</tr>
		</thead>
		<tbody>
			
			<?php $j=0; ?>
			<?php foreach ($empleadosEnNomina as $empleado): ?>
				<tr>
					<td> 
						<?php echo $empleado->empleado; ?>
						<?php echo $empleado->ap_paterno; ?>
						<?php echo $empleado->ap_materno; ?>
					</td>
					<td> <?php echo $empleado->rfc; ?> </td>
					<!-- IMPRIMIR LOS CONCEPTOS DE LAS PERCEPCIONES -->
					<?php foreach ($nombresPercepcionesEnNomina as $key): ?>
						<?php 
						$x=0;
						$agregarTdVacio = true;
						for ($i=0; $i < count($percepciones[$j]) ; $i++) { 
						?>
							<?php if ($key->id_percepcion == $percepciones[$j][$x]->id_percepcion): ?>
								<td>
									$<?php echo number_format($percepciones[$j][$x]->importe,2); ?>
									
								</td>
								<?php $agregarTdVacio = false; ?>
							<?php endif ?>	
						<?php 
							$x++;
							}

							if ($agregarTdVacio) {
							 	echo "<td>$0.00</td>";
							 } 
						?>
					<?php endforeach ?>
					<!-- IMPRIMIR LOS CONCEPTOS DE LAS DEDUCCIONES -->
					<?php foreach ($nombresDeduccionesEnNomina as $key): ?>
						<?php 
						$x=0;
						$agregarTdVacio = true;
						for ($i=0; $i < count($deducciones[$j]) ; $i++) { 
						?>
							<?php if ($key->id_deduccion == $deducciones[$j][$x]->id_deduccion): ?>
								<td>
									$<?php echo number_format($deducciones[$j][$x]->importe,2); ?>
								</td>
								<?php $agregarTdVacio = false; ?>
							<?php endif ?>	
						<?php 
							$x++;
							}

							if ($agregarTdVacio) {
							 	echo "<td>$0.00</td>";
							 } 
						?>
					<?php endforeach ?>
					<!-- IMPRIMIR LOS CONCEPTOS DE LAS APORTACIONES -->
					<?php foreach ($nombresAportacionesEnNomina as $key): ?>
						<?php 
						$x=0;
						$agregarTdVacio = true;
						for ($i=0; $i < count($aportaciones[$j]) ; $i++) { 
						?>
							<?php if ($key->id_aportacion == $aportaciones[$j][$x]->id_aportacion): ?>
								<td>
									$<?php echo number_format($aportaciones[$j][$x]->importe,2); ?>
								</td>
								<?php $agregarTdVacio = false; ?>
							<?php endif ?>	
						<?php 
							$x++;
							}

							if ($agregarTdVacio) {
							 	echo "<td>$0.00</td>";
							 } 
						?>
					<?php endforeach ?>

				</tr>
			<?php $j++;?>
			<?php endforeach ?>
			
			
		</tbody>
	</table>
    <script src="<?php echo base_url('assets/js/jquery-3.2.1.min.js'); ?> "></script>
    <script src="<?php echo base_url('assets/js/plugins/jquery2excel/jquery.table2excel.min.js');?>"></script>
    <script type="text/javascript">
        $(function() {
            $("#table2excel").table2excel({
                exclude: ".noExl",
                name: "Excel Document Name",
                filename: "ReporteDeNominaEmpleadosPorConceptos" + new Date().toISOString().replace(/[\-\:\.]/g, ""),
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