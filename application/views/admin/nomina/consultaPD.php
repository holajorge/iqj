<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<p style="font-size: large; color: #97310e; text-align: center; margin: 0">Consulta de Empleados por Concepto</p>
		<div class="col-md-2 col-lg-2">
			<form id="prueba">
				<h3 style="font-size: 14px">Seleccione Año</h3>
				<select class="form-control" name="anio" id="anio" onchange="serach_yaer_c(value);">
					<option value="" selected disabled hidden >Año</option>
					<?php foreach ($years as $fecha): ?>
						<option value="<?php echo $fecha->year ?>"> <?php echo $fecha->year ?></option>
					<?php endforeach ?>
				</select>
			</form>
		</div>
		<div class="col-lg-2 col-md-2" id="tipoConsulta" style="display: none">
			<form id="tipoConsulta">
				<h3 style="font-size: 14px">Tipo Consulta</h3>
				<select class="form-control" name="mes" id="mes" onchange="serach_periodo_c(value);">
				</select>
			</form>
		</div>
		<div class="col-lg-3" id="peridosdiv" style="display: none" >

		</div>
		<div class="col-lg-2" id="consultaPDA" style="display: none">
			<input type="hidden" name="id_nomina" id="id_nomina" value="">

				<fieldset>
					<legend style="margin: 0; font-size: 14px">Seleccione la Consulta</legend>
					<label>
						<input type="radio" id="percepcion" name="consulta" value="percepciones" onclick="percepcion()"> Percepciones
					</label>
					<label>
						<input type="radio" id="deduccion" name="consulta" value="deducciones" onclick="deduccion()"> Deducciones
					</label>
					<label>
						<input type="radio" id="aporta" name="consulta" value="aportaciones" onclick="aportacion()"> Aportaciones
					</label>
				</fieldset>

		</div>
		<div class="col-lg-3" id="tipoConsultaPDA">

		</div>
	</div><br><br>
	<!-- Table result employee for concept -->
	<div id="puntadoEmpleados">

	</div>
</div>
