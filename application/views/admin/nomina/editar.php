<!-- <div class="wrapper wrapper-content animated fadeInRight"> -->
<div class="row border-bottom white-bg dashboard-header">
	<div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content">	    
		    	<div class="margin-top"></div>
		    	<!-- **************************************************** -->
		    	<div id="encabezado_nomina_1">
		    		<input type="hidden" id="id_tipo_trabajador" value="<?php echo $empleado[0]->id_tipo_trabajador; ?>">
		    		<h2 class='text-center'> TRABAJADOR <strong>  <?php echo $empleado[0]->trabajador; ?> </strong></h2>

		    		<table class='table'>
		    			<tbody>
		    				<tr>
					       		<td COLSPAN='8' class='text-center'> DATOS DEL EMPLEADO</td>
					        </tr>
					        <tr>
						        <td>  <input type='hidden' id ='id_empleado_en_nomina' value="<?php echo $id_empleado; ?>"> No. de plaza: </td>
						        <td> <?php echo $empleado[0]->no_plaza; ?></td>
						        <td> No. empleado: </td>
						        <td> <?php echo $empleado[0]->no_empleado; ?> </td>
						        <td> Nombre: </td>
						        <td><?php echo $empleado[0]->empleado." ".$empleado[0]->ap_paterno." ".$empleado[0]->ap_materno; ?></td>
						        <td> R.F.C: </td>
						        <td><?php echo $empleado[0]->rfc; ?></td>
					        </tr>
					        <tr>
						        <td> Curp: </td>
						        <td><?php echo $empleado[0]->curp; ?></td>
						        <td> Departamento:  </td>
						        <td><?php echo $empleado[0]->depto; ?></td>
						        <td> Puesto: </td>
						        <td COLSPAN='3'><?php echo $empleado[0]->puesto; ?></td>
					        </tr>
				    	</tbody>
				    </table>
		    	</div>
		    	<!-- **************************************************** -->
		    	<!-- DROPDOWN LISTA DE PERIODOS DE NÓMINA -->
		    	<!-- **************************************************** -->
		    	<div class="row">
			    	<div class="col-md-4 col-sm-4 col-md-offset-4 col-sm-offset-4">
						<div class="dropdown">
						  <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
						    EDIT. PERIODO QUINQUENAL
						    <span class="caret"></span>
						  </button>
						  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1" id="">
						
						    <?php foreach ($periodos as $period): ?>
						    	<!-- SE OBTIENE EL ID DEL PERIODO -->
						    	<?php 
						    		$id_nom = $period->id_nomina; 
						    		$per_quinq = $period->periodo_quinquenal;
						    		$fecha_inicio = $period->periodo_inicio;
						    		$fecha_fin = $period->periodo_fin;
						    	?>
						    	<!-- SE VERIFICA CUAL ES EL PERIDO QUINQUENAL QUE TIENE EL EMPLEADO -->
						    	<?php if ($period->id_nomina == $id_nomina): ?>
						    		<?php $periodo_quinquenal = "PERIODO ".$period->periodo_quinquenal.": DEL ".$period->periodo_inicio." AL ".$period->periodo_fin; ?>
						    		
						    	<?php endif ?>
						    	<!-- SE IMPRIME LA LISTA PARA EDITAR EL PERIODO QUINQUENAL -->
						    	<li>
						    		<input type='hidden' id="input_id_nom<?php echo $id_nom; ?>" value="<?php echo $id_nom; ?>">
								  	<input type='hidden' id="input_pq_quinq<?php echo $id_nom; ?>" value="<?php echo $per_quinq; ?>">
								  	<input type='hidden' id="input_pq_inicio<?php echo $id_nom; ?>" value="<?php echo $fecha_inicio; ?>">
								  	<input type='hidden' id="input_pq_fin<?php echo $id_nom; ?>" value="<?php echo $fecha_fin; ?>">

						    		<a href="" onclick="validar_nomina(event,<?php echo $id_nom; ?>,<?php echo $id_empleado; ?>)">
						    			<strong>
						    				<?php echo $period->periodo_quinquenal; ?> |
						    			</strong>
						    			<?php echo $period->periodo_inicio; ?> |
						    			<?php echo $period->periodo_fin; ?> |
						    		</a>
						    	</li>
						    	<li role='separator' class='divider'></li>
						    	<!-- *********************************************************** -->
						    <?php endforeach ?>
						  </ul>
						</div>
			    	</div>
		    	</div>
		    	<h2 class="text-center">
		    		<input type='hidden' id='id_nomina_editando' value="<?php echo $id_nomina; ?>"> 
		    		<strong id="txt_per_quinq"> <input type='hidden' id='id_per_q_nomina' value="<?php echo $id_nomina; ?>"> <?php echo $periodo_quinquenal; ?> </strong>
		    	</h2>
		    	<!-- **************************************************** -->
				<!-- tablas del detalle de nómina -->
				<!-- **************************************************** -->
				<div id="det_nomina_oculto">
		    	<!-- modal -->
					<!-- Button trigger modal -->
				<button type="button" class="btn btn-primary" onclick="lista_percepciones_edit();">
				  Agregar percepciones
				</button>

	        	<table class="table table-bordered table-striped" id="id_tab_per">
	        		<thead>
	        			<tr>
	        				<th COLSPAN="4" class="text-center success">PERCEPCIONES</th>
	        			</tr>
	                    <tr class="warning">
	                    	<th style="display: none;">ID</th>
	                        <th>CÓDICO</th>
	                        <th>DESCRIPCIÓN</th>
	                        <th>IMPORTE</th>
	                        <th>ELIMINAR</th>
	                    </tr>
	                </thead>
						<tbody id="body_tabla_percepciones">
					  <?php foreach ($percepciones as $percepcion) { ?>
					  	<tr>
					  		<td style="display: none;" ><?php echo $percepcion->id_percepcion; ?></td>
					  		<td><?php echo $percepcion->indicador; ?> </td>
					  		<td><?php echo $percepcion->nombre; ?> </td>
					  		<td> <input type="number" style='text-align: right;' id="id_per_<?php echo $percepcion->id_percepcion; ?>" value="<?php echo $percepcion->importe; ?>" onkeyup='calc_total_percepciones()' onchange='calc_total_percepciones()' name='importe_percepcion' class='importe_percepcion'>  </td>
					  		<td><button type='button' id='borrar_celda_per_edit' class='btn btn-danger btn-sm'> <span class='glyphicon glyphicon-trash'></span> </button> </td>
					  	</tr>
					  <?php } ?>
					</tbody>
					<tfoot>
	                	<tr>
	                        <th COLSPAN="2">TOTAL</th>
	                        <th id="total_percepcion"></th>
	                    </tr>
	                </tfoot>
				</table>

				<!-- *********************************************************************** -->
				<!-- modal -->
					<!-- Button trigger modal -->
				<button type="button" class="btn btn-primary" onclick="lista_deducciones_edit();">
				  Agregar deducciones
				</button>
				<!-- *********************************************************************** -->
				<table class="table table-bordered table-striped" id="id_tab_ded">
	        		<thead>
	        			<tr>
	        				<th COLSPAN="4" class="text-center success">DEDUCCIONES</th>
	        			</tr>
	                    <tr class="warning">
	                    	<th style="display: none;">ID</th>
	                        <th>CÓDIGO</th>
	                        <th>DESCRIPCIÓN</th>
	                        <th>IMPORTE</th>
	                        <th>ELIMINAR</th>
	                    </tr>
	                </thead>
						<tbody id="body_tabla_deducciones">
					  <?php foreach ($deducciones as $deduccion) { ?>
					  	<tr>
					  		<td style="display: none;" ><?php echo $deduccion->id_deduccion; ?></td>
					  		<td><?php echo $deduccion->indicador; ?> </td>
					  		<td><?php echo $deduccion->nombre; ?> </td>
					  		<td>
					  			<?php if ($deduccion->id_deduccion > 1 & $deduccion->id_deduccion <= 7){ ?>
					  				<input type="number" style='text-align: right;' id='id_ded_<?php echo $deduccion->id_deduccion; ?>' value="<?php echo $deduccion->importe; ?>" onkeyup='calc_total_deducciones()' onchange='calc_total_deducciones()' name='importe_deduccion' class='importe_deduccion' disabled>
					  			<?php }else{ ?>
					  				<input type="number" style='text-align: right;' id='id_ded_<?php echo $deduccion->id_deduccion; ?>' value="<?php echo $deduccion->importe; ?>" onkeyup='calc_total_deducciones()' onchange='calc_total_deducciones()' name='importe_deduccion' class='importe_deduccion'>
					  			<?php } ?>
					  		</td>
					  		<td><button type='button' id='borrar_celda_ded_edit' class='btn btn-danger btn-sm'> <span class='glyphicon glyphicon-trash'></span> </button> </td>
					  	</tr>
					  <?php } ?>
					</tbody>
					<tfoot>
	                	<tr>
	                        <th COLSPAN="2">TOTAL</th>
	                        <th id="total_deducciones"></th>
	                    </tr>
	                </tfoot>
				</table>
				<!-- ********************************************************* -->
				<!-- TABLA DE APORTACIONES -->
				<!-- ********************************************************* -->
				<!-- modal -->
					<!-- Button trigger modal -->
				<!-- <?php if (!empty($aportaciones)){ ?> -->
					<div id="mostrar_aportaciones">
				<!-- <?php }else{?>
					<div id="mostrar_aportaciones" style="display: none;">
				<?php } ?> -->
						<button type="button" class="btn btn-primary" onclick="lista_aportaciones_edit();">
						  Agregar aportaciones
						</button>
						<!-- *********************************************************************** -->
						<table class="table table-bordered table-striped" id="id_tab_apor">
		            		<thead>
		            			<tr>
		            				<th COLSPAN="4" class="text-center success">APORTACIONES</th>
		            			</tr>
			                    <tr class="warning">
			                    	<th style="display: none;">ID</th>
			                        <th>CÓDIGO</th>
			                        <th>DESCRIPCIÓN</th>
			                        <th>IMPORTE</th>
			                        <th>ELIMINAR</th>
			                    </tr>
		                    </thead>
		 					<tbody id="body_tabla_aportaciones">
		 						<?php if (!empty($aportaciones)){ ?>
									  <?php foreach ($aportaciones as $aportacion) { ?>
									  	<tr>
									  		<td style="display: none;" ><?php echo $aportacion->id_aportacion; ?></td>
									  		<td><?php echo $aportacion->indicador; ?> </td>
									  		<td><?php echo $aportacion->nombre; ?> </td>
									  		<td>
									  			<?php if ($aportacion->id_aportacion > 0 & $aportacion->id_aportacion <= 8){ ?>
									  				<input type="number" style='text-align: right;' id='id_apor_<?php echo $aportacion->id_aportacion; ?>' value="<?php echo $aportacion->importe; ?>" onkeyup='calc_total_aportaciones()' onchange='calc_total_aportaciones()' name='importe_aportacion' class='importe_aportacion' disabled>
									  			<?php }else{ ?>
									  					<?php if ($aportacion->id_aportacion == 9): ?>
									  						<input type="number" style='text-align: right;' id='id_apor_<?php echo $aportacion->id_aportacion; ?>' value="<?php echo $aportacion->importe; ?>" onkeyup='calc_total_aportaciones();calcular_liquido();' onchange='calc_total_aportaciones();calcular_liquido();' name='importe_aportacion' class='importe_aportacion'>
									  					<?php else: ?>
															<input type="number" style='text-align: right;' id='id_apor_<?php echo $aportacion->id_aportacion; ?>' value="<?php echo $aportacion->importe; ?>" onkeyup='calc_total_aportaciones()' onchange='calc_total_aportaciones()' name='importe_aportacion' class='importe_aportacion'>
									  					<?php endif ?>
									  				 
									  			<?php } ?>
									  		</td>
									  		<td><button type='button' id='borrar_celda_apor_edit' class='btn btn-danger btn-sm'> <span class='glyphicon glyphicon-trash'></span> </button></td>
									  	</tr>
									  <?php } ?>
		 						<?php } ?>
							</tbody>
							<tfoot>
		                    	<tr>
			                        <th COLSPAN="2">TOTAL</th>
			                        <th id="total_aportaciones"></th>
			                    </tr>
		                    </tfoot>
						</table>
						<!-- **************************************************** -->
						<!-- fin tablas detalle de nómina -->
						<!-- **************************************************** -->	
					</div>
				
				
				<!-- **************************************************** -->
				<!-- LÍQUIDO-->
				<!-- **************************************************** -->
				<h3 class="text-right"> <strong id="liquido-nom"> </strong></h3>
				<!-- **************************************************** -->
				<!-- BOTON GUARDAR-->
				<!-- **************************************************** -->
				<button type="button" class="btn btn-primary pull-right" onclick="guardar_datos_nomina();">
				  guardar
				</button>

				</div>
            </div>
        </div>
    </div>
</div>