
   <div class="row  border-bottom white-bg dashboard-header">
	    <div class="col-md-offset-1 col-xs-10 col-md-10 ">
			<form role="form" id="form_crear_empleado">
				<h3 class="text-success">Registro de Empleados</h3>
				<hr class="colorgraph">
				<div class="row">
                        <div class="col-sm-2 col-md-2">
                            <label for="num_plaza">Num. Plaza</label>
                            <input type="number" name="no_plaza" id="num_plazaEdit" class="form-control" tabindex="1">
                        </div>
                        <div class="col-sm-2 col-md-2">
                            <label for="horas">HORAS</label>
                            <input type="text" name="horas" id="horasEdit" class="form-control" tabindex="2">
                        </div>
                        <div class="col-sm-4 col-md-3">
                            <label for="tarjeta">No. Tarjeta</label>
                            <input type="number" name="tarjeta" id="tarjetaEdit" class="form-control " tabindex="3">
                        </div>
                        <div class="col-sm-4 col-md-3">
                            <label for="nss">NSS</label>
                            <input type="text" name="nss" id="nssEdit" class="form-control " tabindex="4">
                        </div>
                        <div class="col-sm-4 col-md-2">
                            <label for="nss">NIVEL</label>
                            <input type="number" name="nivel" id="nivelEdit" class="form-control " tabindex="5">
                        </div>
						<div class=" col-sm-6 col-md-4">
								<label for="nombre">Nombre</label>								
		                        <input type="text" name="nombre" id="nombre" class="form-control" tabindex="6">
						</div>
						<div class=" col-sm-6 col-md-3">
								<label for="ape_paterno">Apellido Paterno</label>
								<input type="text" name="ap_paterno" id="ap_paterno" class="form-control " tabindex="7">
						</div>
						<div class=" col-sm-6 col-md-3">
								<label for="ape_materno">Apellido Materno</label>
								<input type="text" name="ap_materno" id="ap_materno" class="form-control" tabindex="8">
						</div>
                        <div class=" col-sm-6 col-md-2 ">
                            <label for="no_empleado">Num. Empleado</label>
                            <input type="number" name="no_empleado" id="no_empleado" class="form-control" tabindex="9">
                        </div>
						<div class=" col-sm-6 col-md-4">
								<label for="curp">CURP</label>
								<input type="text" onblur="validarInput(this)" name="curp" id="curp" class="form-control" tabindex="10" >
						</div>
						<div class=" col-sm-6 col-md-3">
								<label for="rfc">RFC</label>
								<input type="text" name="rfc" onblur="ValidaRfc(this.value)" id="rfc" class="form-control " tabindex="11">
						</div>
                        <div class=" col-sm-6 col-md-5 ">
                            <label for="correo">Correo</label>
                            <input type="email" name="correo" id="correo" class="form-control" tabindex="12">
                        </div>

                        <div class=" col-sm-6 col-md-4">
                            <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" tabindex="13">
                        </div>
                        <div class=" col-sm-6 col-md-3">
                            <label for="fecha_ingreso">Fecha de Ingreso</label>
                            <input type="date" name="fecha_ingreso" id="fecha_ingreso" class="form-control " tabindex="14">
                        </div>
                        <div class=" col-sm-6 col-md-5">
                            <label for="depto">Departamento</label>
                            <select class="form-control " id="depto" name="id_depto" tabindex="15">
                                <option value="" selected disabled hidden>Seleccione Departamento</option>
                                <?php
                                foreach ($deptos as $fila) {
                                    ?>
                                    <option value="<?php echo $fila->id_depto ?>"> <?php echo $fila->nombre ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class=" col-sm-6 col-md-4">
                            <label for="puesto">Puesto</label>
                            <select class="form-control " id="puesto" name="id_puesto" tabindex="16">
                                <option value="" selected disabled hidden>Seleccione Puesto</option>
                                <?php
                                foreach ($puestos as $fila) {
                                    ?>
                                    <option value="<?php echo $fila->id_puesto ?>"> <?php echo $fila->nombre ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class=" col-sm-2 col-md-3">
                            <label for="tipo_trabajador">Sindicalizado</label>
                            <select class="form-control " id="sindicalizado" name="sindicalizado" tabindex="17">
                                <option value="" selected disabled hidden>Seleccione</option>
                                <option value="Si">Si</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <div class=" col-sm-6 col-md-4">
                            <label for="tipo_trabajador">Tipo Empleado</label>
                            <select class="form-control " id="tipo_trabajador" name="id_tipo_trabajador" tabindex="18">
                                <option value="" selected disabled hidden>Seleccione Tipo Empleado</option>
                                <?php
                                foreach ($tipo_trabajador as $fila) {
                                    ?>
                                    <option value="<?php echo $fila->id_tipo_trabajador ?>"> <?php echo $fila->nombre_tipo_trabajador ?></option>
                                <?php } ?>
                            </select>
                        </div>
						<div class=" col-sm-10 col-md-10">
								<label for="tipo_trabajador">Componente</label>
								<select class="form-control " id="compoenete" name="componente" tabindex="19">
									<option value="" selected disabled hidden>Seleccione un Componente</option>
									<?php
				                  		foreach ($componentes as $componente) {
				                 	?>
				                 		<option value="<?php echo $componente->id_componente ?>"> <?php echo $componente->nombre ?></option>
				           			<?php } ?> 
								</select>							
						</div>
                </div>
				<br>
                <div class="row">
                    <div class="col-md-8"></div>
                    <div class="col-md-2">
                        <button id="btn_guardar_empleado" type="button" class=" inline btn btn-default btn-block btn-lg" data-style="expand-left"  onclick="cancelarRegistro()"><span class="fa fa-times"></span> Cancelar</button>
                    </div>
                    <div class="col-md-2">
                        <button id="btn_guardar_empleado" type="submit" class=" ladda-button btn btn-primary btn-block btn-lg" data-style="expand-left" tabindex="20" onclick="saveEmPloye()"><span class="fa fa-save"></span> Guardar</button>
                    </div>
                </div>
			</form>
		</div>
	 </div>
	
	

