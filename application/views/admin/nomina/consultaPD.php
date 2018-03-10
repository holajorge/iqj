<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<p style="font-size: 16px; color: #97310e; text-align: center; margin: 0">CONSULTA DE EMPLEADOS POR CONCEPTO Y COMPLEMENTO </p>
		<div class="col-md-2 col-lg-2"  style="width: 11%;">
			<form id="prueba">
				<h3 style="font-size: 14px">Año</h3>
				<select style='font-size: small' class="form-control" name="anio" id="anio" onchange="serach_yaer_c(value);">
					<option style='font-size: small' value="" selected disabled hidden >Año</option>
					<?php foreach ($years as $fecha): ?>
						<option style='font-size: small' value="<?php echo $fecha->year ?>"> <?php echo $fecha->year ?></option>
					<?php endforeach ?>
				</select>
			</form>
		</div>
		<div class="col-lg-2 col-md-2" id="tipoConsulta" style="display: none; width: 11%;">
			<form id="tipoConsulta">
				<h3 style="font-size: 14px">Consulta</h3>
				<select class="form-control" name="mes" id="mes" onchange="serach_periodo_c(value);"  style='font-size: x-small'>
				</select>
			</form>
		</div>
		<div class="col-lg-3" id="peridosdiv" style="display: none; " >

		</div>
		<div class="col-lg-2" id="consultaPDA" style="display: none">
			<input type="hidden" name="id_nomina" id="id_nomina" value="">
			<fieldset>
				<legend style="margin: 0; font-size: 14px">Seleccione la Consulta</legend>
				<label style="font-size: x-small">
					<input type="radio" id="percepcion" name="consulta" value="percepciones" onclick="percepcion()"> Percepciones
				</label>
				<label style="font-size: x-small">
					<input type="radio" id="deduccion" name="consulta" value="deducciones" onclick="deduccion()"> Deducciones
				</label>
				<label style="font-size: x-small">
					<input type="radio" id="aporta" name="consulta" value="aportaciones" onclick="aportacion()"> Aportaciones
				</label>
			</fieldset>
		</div>
		<div class="col-lg-2" id="componentesDIV" style="display: none">
			<h3 style="font-size: 14px">Componente</h3>
			<select class="form-control" id="ID_Componente" name="componente" onchange="searchConcepto(value)">
				<option value="" selected disabled hidden >Componente</option>
                <option value=""> TODO </option>
				<?php foreach ($componentes as $componente): ?>
					<option value="<?php echo $componente->id_componente ?>"> <?php echo $componente->nombre ?></option>
				<?php endforeach ?>
			</select>
		</div>
		<div class="col-lg-2" id="tipoConsultaPDA">

		</div>
		<div class="col-lg-12">
			<div class="row">
				<div class="col-lg-8" id="nombreComponenteShow" style="display: none">
					<label style="color: mediumblue;">Componente Seleccionado: </label>
					<label id="showNameComponente"></label>
				</div>
				<div class="col-lg-4" id="NombreConceptoShow" style="display: none">
					<label style="color: mediumblue;">Percepcion Seleccionado: </label>
					<label id="PerceptionMostrar"></label>
				</div>
			</div>
		</div>

	</div><br><br>

	<!-- Table result employee for concept -->

	<div id="puntadoEmpleados">

	</div>
</div>
