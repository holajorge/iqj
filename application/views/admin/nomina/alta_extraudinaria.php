<!-- <div class="wrapper wrapper-content animated fadeInRight"> -->
<div class="row border-bottom white-bg dashboard-header">
	<div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
            	<!-- tabs -->
            	<div id="myTabs">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
					    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Seleccionar Empleado</a></li>
					    <li role="presentation"><a href="#det_nomina" aria-controls="det_nomina" role="tab" data-toggle="tab">Detalle de nómina Extraodinaria</a></li>
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
					                                        <td><label  id="rfc<?php echo $empleado->id_empleado ?>"><?php echo $empleado->rfc?></label></td>
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
					                                            <button class="btn btn-info" onclick="datosEmpleado('<?php echo $empleado->id_empleado ?>')" ><span class="glyphicon glyphicon-edit"></span> CREAR NÓMINA</button>                                                               
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
						<!-- Pestaña detalle de nómina extraudinaria datos por defaul de Empleado -->
						<!-- **************************************************** -->
						<div role="tabpanel" class="tab-pane" id="det_nomina">
					    	<div class="margin-top"></div>
					    	 <div class=" m-b-sm border-bottom">
				                <div class="row">
				                	<div id="detalle_tipo"></div>				                					                
				                    <div class="col-sm-4">
				                        <div class="form-group">
				                            <label class="control-label" for="num_plaza">Numero Plaza</label>
				                            <input type="number" disabled id="num_plazaEdit" name="num_plaza" class="form-control">
				                        </div>
				                    </div>
				                    <div class="col-sm-4">
				                        <div class="form-group">
				                            <label class="control-label" for="horasEdit">Horas</label>
				                            <input type="number" disabled id="horasEdit" name="horas" class="form-control">
				                        </div>
				                    </div>
				                    <div class="col-sm-4">
				                        <div class="form-group">
				                            <label class="control-label" for="nombreEdit">Nombre</label>
				                            <input type="text" disabled id="nombreEdit" name="nombre" class="form-control">
				                        </div>
				                    </div>
				                </div>
				                <div class="row">
				                    <div class="col-sm-4">
				                        <div class="form-group">
				                            <label class="control-label" for="ap_paternoEdit">Apellido Paterno</label>				                            
				                            <input type="text" disabled id="ap_paternoEdit" name="ap_paterno" class="form-control">				                            
				                        </div>
				                    </div>
				                    <div class="col-sm-4">
				                        <div class="form-group">
				                            <label class="control-label" for="ap_maternoEdit">Apellido Materno</label>				                            
				                            <input type="text" disabled id="ap_maternoEdit" name="ap_materno" class="form-control">				                            
				                        </div>
				                    </div>				                    
				                    <div class="col-sm-4">
				                        <div class="form-group">
				                            <label class="control-label" for="date_modified">Fecha Nacimiento</label>
				                            <div class="input-group date">
				                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input disabled id="fecha_nacimientoEdit" type="date" class="form-control">
				                            </div>
				                        </div>
				                    </div>
				                </div>
				               	<div class="row">
				                    <div class="col-sm-4">
				                        <div class="form-group">
				                            <label class="control-label" for="date_added">Fecha Ingreso</label>
				                            <div class="input-group date">
				                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="fecha_ingresoEdit" disabled type="date" name="fecha_ingreso" class="form-control">
				                            </div>
				                        </div>
				                    </div>
				                    <div class="col-sm-4">
				                        <div class="form-group">
				                            <label class="control-label" for="rfcEdit">RFC</label>
				                            <input type="text" id="rfcEdit" name="rfc" class="form-control" disabled>
				                        </div>
				                    </div>
				                    <div class="col-sm-4">
				                        <div class="form-group">
				                            <label class="control-label" for="rfcEdit">CURP</label>
				                            <input type="text" id="curpEdit" name="rfc" class="form-control" disabled>
				                        </div>
				                    </div>
				                </div>
				            </div>
					    	<!-- **************************************************** -->
					    	<!-- VISTA DE NOMINA EXTRAORDINARIA -->
					    	<!-- **************************************************** -->					    	
				    		<h3 class="text-center">Nómina Extraodinaria</h3>				    		
					    	<div class=" m-b-sm border-bottom">
								<form id="guardaExtraordinario">
									<input type="hidden" id="idEditar" name="id" >
					                <div class="row">
					                    <div class="col-sm-4">
					                        <div class="form-group" id="reloadExtra">
					                        	<a class="btn btn-info  input-sm pull-right" data-toggle="modal" data-target="#crearExtraordinario"><span class="glyphicon  glyphicon-plus"></span> Crear Nuevo</a>					                			
					                        	<label for="depto">Seleccione uno o Crea uno Nuevo</label>
					                            <select class="form-control input-lg" id="dia" name="dia" tabindex="1">
													<option selected disabled hidden>Seleccione Concepto</option>
					                            	<?php if ($extraordinarios != null ): ?>
					                            		<?php foreach ($extraordinarios as $concepto): ?>
					                            			<option value="<?php echo $concepto->id_concepto_extraordinario?>"> 
					                            				<?php echo $concepto->nombre ?>				                            				
					                            			</option>
					                            		<?php endforeach ?>
					                            	<?php else: ?>
					                            	<?php endif ?>
					                            </select>
					                        </div>
					                    </div>	
					                    <div class="col-sm-4">
					                        <div class="form-group" id="reloadExtra">
					                        	<label for="depto">Importe</label>
					                            <input type="number" class="form-control input-lg" name="importe">
					                        </div>
					                    </div>	
					                    <div class="col-sm-4">
					                        <div class="form-group" id="reloadExtra">
					                        	<label for="depto">ISR</label>
					                            <input type="number" class="form-control input-lg" name="isr">
					                        </div>
					                    </div>			                    
					                </div>
					                <div class="row">
					                	<div class="col-sm-4">						                		
					                    </div>
					                    <div class="col-sm-6">	
					                		
					                    </div>
					                    <div class="col-sm-2">	
					                		<button type="submit" class="btn btn-primary input-lg pull-right" onclick="insetaNominaExtaordinaria()"><span class="glyphicon glyphicon-floppy-saved" ></span> Guardar</button>			                    	
					                    </div>
					                </div>
								</form>
			            	</div>				
						</div>
					</div>
				</div>
            	<!-- fin tabs -->            	            
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="crearExtraordinario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <form role="form" id="formExtraCreate">
        <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <h4 class="modal-title" id="myModalLabel">Crear consepto Extraordinario</h4>        
            </div>
            <div class="modal-body">                    
                <div class="row">
                    <div class="col-xs-12 col-sm-5 col-md-5">
                        <div class="form-group ">
                            <label for="fecha">FECHA</label>
                            <input type="date" name="fecha" id="fecha" class="form-control input-lg" tabindex="1">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-9">
                        <div class="form-group">
                            <label for="nombre">NOMBRE</label>
                            <input type="text" name="nombre" id="nombre" class="form-control input-lg" tabindex="2">
                        </div>
                    </div>                                    
                </div>                            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <input type="submit" value="Guardar" class="btn btn-primary" tabindex="3" onclick="insetaExtaordinaria()">
            </div>
        </div>
    </form>
  </div>
</div>