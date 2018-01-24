
   <div class="row  border-bottom white-bg dashboard-header">
	    <div class=" col-sm-8 col-md-8 col-md-offset-2">
			<form role="form" id="form_crearr_empleado">
				<h2>Registro de Empleados</small></h2>
				<hr class="colorgraph">
				<div class="row">	
						<div class="col-sm-4 col-md-4">
								<label for="num_plaza">Num. Plaza</label>
		                        <input type="number" name="no_plaza" id="num_plaza" class="form-control " tabindex="1">		                        
						</div>		
						<div class="col-sm-4 col-md-4">
								<label for="horas">HORAS</label>
		                        <input type="number" name="horas" id="horas" class="form-control " tabindex="2">
						</div>	
						<div class="col-sm-4 col-md-4">
								<label for="nss">NSS</label>
		                        <input type="text" name="nss" id="nss" class="form-control " tabindex="2">
						</div>							
						<div class=" col-sm-6 col-md-6">							
								<label for="nombre">Nombre</label>								
		                        <input type="text" name="nombre" id="nombre" class="form-control" tabindex="3">								
						</div>
						<div class=" col-sm-6 col-md-6">							
								<label for="ape_paterno">Apellido Paterno</label>
								<input type="text" name="ap_paterno" id="ap_paterno" class="form-control " tabindex="4">								
						</div>
						<div class=" col-sm-6 col-md-6">							
								<label for="ape_materno">Apellido Materno</label>
								<input type="text" name="ap_materno" id="ap_materno" class="form-control" tabindex="5">								
						</div>
						<div class=" col-sm-6 col-md-6">							
								<label for="fecha_nacimiento">Fecha de Nacimiento</label>
								<input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" tabindex="6">													
						</div>
						<div class=" col-sm-6 col-md-6">						
								<label for="fecha_ingreso">Fecha de Ingreso</label>
								<input type="date" name="fecha_ingreso" id="fecha_ingreso" class="form-control " tabindex="7">								
						</div>
						<div class=" col-sm-6 col-md-6">							
								<label for="curp">CURP</label>
								<input type="text" onblur="validarInput(this)" name="curp" id="curp" class="form-control" tabindex="8" >											
						</div>
						<div class=" col-sm-6 col-md-6">						
								<label for="rfc">RFC</label>
								<input type="text" name="rfc" onblur="ValidaRfc(this.value)" id="rfc" class="form-control " tabindex="9">
						</div>
						<div class=" col-sm-6 col-md-6 ">						
								<label for="no_empleado">Num. Empleado</label>
		                        <input type="text" name="no_empleado" id="no_empleado" class="form-control" tabindex="10">							
						</div>
						<div class=" col-sm-6 col-md-6">						
								<label for="depto">Departamento</label>
								<select class="form-control " id="depto" name="id_depto" tabindex="11">
									<option value="" selected disabled hidden>Seleccione Departamento</option>
									<?php
				                  		foreach ($deptos as $fila) {
				                 	?>
				                 		<option value="<?php echo $fila->id_depto ?>"> <?php echo $fila->nombre ?></option>
				           			<?php } ?> 
								</select>
						</div>
						<div class=" col-sm-6 col-md-6">
								<label for="puesto">Puesto</label>
								<select class="form-control " id="puesto" name="id_puesto" tabindex="12">
									<option value="" selected disabled hidden>Seleccione Puesto</option>
									<?php
				                  		foreach ($puestos as $fila) {
				                 	?>
				                 		<option value="<?php echo $fila->id_puesto ?>"> <?php echo $fila->nombre ?></option>
				           			<?php } ?> 
								</select>
						</div>
						<div class=" col-sm-6 col-md-6">							
								<label for="tipo_trabajador">Tipo Empleado</label>
								<select class="form-control " id="tipo_trabajador" name="id_tipo_trabajador" tabindex="13">
									<option value="" selected disabled hidden>Seleccione Tipo de Empleado</option>
									<?php
				                  		foreach ($tipo_trabajador as $fila) {
				                 	?>
				                 		<option value="<?php echo $fila->id_tipo_trabajador ?>"> <?php echo $fila->nombre_tipo_trabajador ?></option>
				           			<?php } ?> 
								</select>							
						</div>					
				</div>

				<div class="row">
					<div class=" col-md-3 pull-right">
						<input type="submit" value="Registrar" id="btn_guardar_empleado" class="btn btn-primary btn-block btn-lg" tabindex="14">						
					</div>
				</div>
			</form>
		</div>
	 </div>
	
	

	