<div class="row  border-bottom white-bg dashboard-header">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<form role="form" id="formComponente">
			<h2>Registro de Componente</small></h2>
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-sm-4 col-md-6">
					<div class="form-group ">
						<label for="clave">Clave</label>
                        <input type="text" name="clave" id="clave" class="form-control input-lg" tabindex="1" >
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-9">
					<div class="form-group">
						<label for="nombre">Nombre Componente</label>
                        <input type="text" name="nombre" id="nombre" class="form-control input-lg" tabindex="2">
					</div>
				</div>
			</div>
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-lg-4">
					<button id="ladda-btnSaveComponente" type="submit" class="ladda-button btn btn-primary  btn-block btn-lg" tabindex="3" data-style="expand-left" onclick="saveComponente()"><span class="fa fa-save"></span> Registrar</button>
				</div>
			</div>
		</form>
	</div>
</div>