   <div class="row  border-bottom white-bg dashboard-header">
	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			<form role="form" id="formPercepcion">
				<h2>Registro de Percepción</small></h2>
				<hr class="colorgraph">
				<div class="row">
					<div class="col-sm-4 col-md-4">
						<div class="form-group ">
							<label for="indicador">Código</label>
	                        <input type="text" name="indicador" id="indicador" class="form-control input-lg" tabindex="1">	                        
						</div>
					</div>
					<div class="col-sm-6 col-md-9">
						<div class="form-group">
							<label for="nombre">Nombre Percepción</label>
	                        <input type="text" name="nombre" id="nombre" class="form-control input-lg" tabindex="2">	                        
						</div>
					</div>					
				</div>
				<hr class="colorgraph">
				<div class="row">
					<div class="col-xs-12 col-md-4">
						<button id="ladda_btn_savePercepcion" type="submit" class="ladda-button btn btn-primary btn-block btn-lg" data-style="expand-left" tabindex="4" onclick="savePercepcion()"><span class="fa fa-save"></span> Registrar</button>
					</div>
				</div>
			</form>
		</div>
	 </div>

