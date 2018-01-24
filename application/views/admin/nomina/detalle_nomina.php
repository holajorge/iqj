<!-- <div class="wrapper wrapper-content animated fadeInRight"> -->
<div class="row border-bottom white-bg dashboard-header">
	<div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
            	<!-- tabs -->
            	<div id="myTabs">

				  <!-- Nav tabs -->
				  <ul class="nav nav-tabs" role="tablist">
				    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Seleccionar empleado</a></li>
				    <li role="presentation"><a href="#det_nomina" aria-controls="det_nomina" role="tab" data-toggle="tab">Detalle de nómina</a></li>
				  </ul>

				  <!-- Tab panes -->
				  <div class="tab-content">

				  	<!-- Pestaña seleccionar empleado -->
				    <div role="tabpanel" class="tab-pane active" id="home">
				    	<div class="margin-top"></div>
			<div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" id="tabla_lista_empleados">
                            <thead>
                                <tr>
                                    <th>NO. PLAZA</th>
                                    <th>RFC</th>
                                    <th>TIPO T</th>
                                    <th>HORAS</th>
                                    <th>NOMBRE</th>
                                    <th>AP. PATERNO</th>
                                    <th>AP. MATERNO</th>
                                    <th>FECHA NACIMIENTO</th>                                    
                                    <th>FECHA DE INGRESO</th>
                                    <th>DEPARTAMENTO</th>
                                    <th>PUESTO</th>                                  
                                    <th>CURP</th>
                                    <th>Nu Empleado</th>
                                    
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if ($empleados != null ):  ?>                                                                                        
                                <?php foreach ($empleados as $empleado): ?>
                                    <tr class="gradeX">
                                        <td><label  id="no_plaza<?php echo $empleado->id_empleado ?>"><?php echo  $empleado->no_plaza ?></label></td>
                                        <td> <input type="hidden" id="id_tipo_trabajador<?php echo $empleado->id_empleado ?>" value="<?php echo $empleado->id_tipo_trabajador ?> "> <label  id="rfc<?php echo $empleado->id_empleado ?>"><?php echo $empleado->rfc?></label></td>
                                        <td><label  id="trabajador<?php echo $empleado->id_empleado ?>"><?php echo $empleado->trabajador?></label></td>
                                        <td><label  id="horas<?php echo $empleado->id_empleado ?>"><?php echo  $empleado->horas ?></label></td>  
                                        <td><label  id="nombre_emp<?php echo $empleado->id_empleado ?>"><?php echo $empleado->nombre_emp?></label></td> 
                                        <td><label  id="ap_paterno<?php echo $empleado->id_empleado ?>"><?php echo  $empleado->ap_paterno ?></label></td> 
                                        <td><label  id="ap_materno<?php echo $empleado->id_empleado ?>"><?php echo $empleado->ap_materno?></label></td> 
                                        <td><label  id="fecha_nacimiento<?php echo $empleado->id_empleado ?>"><?php echo  $empleado->fecha_nacimiento ?></label></td> 
                                        <td><label  id="fecha_ingreso<?php echo $empleado->id_empleado ?>"><?php echo  $empleado->fecha_ingreso ?></label></td> 
                                        <td><label  id="nombre_depto<?php echo $empleado->id_empleado ?>"><?php echo $empleado->nombre_depto?></label></td> 
                                        <td><label  id="nombre_puesto<?php echo $empleado->id_empleado ?>"><?php echo $empleado->nombre_puesto?></label></td>
                                        <td><label  id="curp<?php echo $empleado->id_empleado ?>"><?php echo $empleado->curp?></label></td>
                                        <td><label  id="no_empleado<?php echo $empleado->id_empleado ?>"><?php echo $empleado->no_empleado?></label></td>
                                        <td class="text-center">                               
                                            <button class="btn btn-info" onclick="tab_det_nomina('<?php echo $empleado->id_empleado ?>')"><span class="glyphicon glyphicon-edit"></span> CREAR NÓMINA</button>                                                               
                                        </td>

                                    </tr>
                                <?php endforeach ?>
                            <?php else: ?>    
                            <?php endif ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
					</div>
					<!-- **************************************************** -->
					<!-- Pestaña detalle de nómina -->
					<!-- **************************************************** -->
				    <div role="tabpanel" class="tab-pane" id="det_nomina">
				    	<div class="margin-top"></div>
				    	<!-- **************************************************** -->
				    	<div id="encabezado_nomina_1">
				    		
				    	</div>
				    	<!-- **************************************************** -->
				    	<!-- DROPDOWN LISTA DE PERIODOS DE NÓMINA -->
				    	<!-- **************************************************** -->
				    	<div class="row">
					    	<div class="col-md-4 col-sm-4 col-md-offset-4 col-sm-offset-4">
								<div class="dropdown">
								  <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
								    SELECCIONAR PERIODO QUINQUENAL
								    <span class="caret"></span>
								  </button>
								  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1" id="dropdown_lista_periodos">
								    <!-- área donde se imprime el ajax -->
								  </ul>
								</div>
					    	</div>
				    	</div>
				    	<h2 class="text-center"> <strong id="txt_per_quinq">  </strong></h2>
				    	<!-- **************************************************** -->
						<!-- tablas del detalle de nómina -->
						<!-- **************************************************** -->
						<div style="display: none;" id="det_nomina_oculto">
				    	<!-- modal -->
							<!-- Button trigger modal -->
						<button type="button" class="btn btn-primary" onclick="lista_percepciones();">
						  Agregar percepciones
						</button>

		            	<table class="table table-bordered table-striped" id="id_tab_per">
		            		<thead>
		            			<tr>
		            				<th COLSPAN="4" class="text-center success">PERCEPCIONES</th>
		            			</tr>
			                    <tr class="warning">
			                    	<th style="display: none;">ID</th>
			                        <th>INDICADOR</th>
			                        <th>DESCRIPCIÓN</th>
			                        <th>IMPORTE</th>
			                        <th>ELIMINAR</th>
			                    </tr>
		                    </thead>
		 					<tbody id="body_tabla_percepciones">
							  
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
						<button type="button" class="btn btn-primary" onclick="lista_deducciones();">
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
			                        <th>INDICADOR</th>
			                        <th>DESCRIPCIÓN</th>
			                        <th>IMPORTE</th>
			                        <th>ELIMINAR</th>
			                    </tr>
		                    </thead>
		 					<tbody id="body_tabla_deducciones">
							  
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
						<div id="mostrar_aportaciones">
							<button type="button" class="btn btn-primary" onclick="lista_aportaciones();">
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
				                        <th>INDICADOR</th>
				                        <th>DESCRIPCIÓN</th>
				                        <th>IMPORTE</th>
				                        <th>ELIMINAR</th>
				                    </tr>
			                    </thead>
			 					<tbody id="body_tabla_aportaciones">
								  
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
            	<!-- fin tabs -->
            	
            	
            </div>
        </div>
    </div>
</div>

