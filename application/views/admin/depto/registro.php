<div class="row  border-bottom white-bg dashboard-header">
	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			<form role="form" id="formDepto">
				<h2>Registro de Departamento</small></h2>
				<hr class="colorgraph">
				<div class="row">					
					<div class="col-xs-12 col-sm-6 col-md-9">
						<div class="form-group">
							<label for="nombre">Nombre Departamento</label>
	                        <input type="text" name="nombre" id="nombre" class="form-control input-lg" tabindex="1">
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6">
						<div class="form-group">
							<label for="puesto">Direccion</label>
							<select class="form-control input-lg" id="direccion" name="direccion" tabindex="2">
								<option value="" selected disabled hidden>Seleccione Direccion</option>
								<?php foreach ($direcciones as $direccion): ?>									
									<option value="<?php echo $direccion->id_direccion ?>"> <?php echo $direccion->nombre ?></option>
								<?php endforeach ?>								
							</select>
						</div>
					</div>
				</div>				
				<hr class="colorgraph">
				<div class="row">
					<div class="col-xs-12 col-md-4">
						<input type="submit" value="Registrar" class="btn btn-primary btn-block btn-lg" tabindex="3">
					</div>
				</div>
			</form>
		</div>
	 </div>