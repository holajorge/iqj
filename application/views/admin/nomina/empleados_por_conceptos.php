 <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-2">
            <form id="prueba">
                <h3>Seleccione Año</h3>
                <select class="form-control input-lg" name="anio" id="anio" onchange="serach_yaer(value);">
                    <option value="" selected disabled hidden >Selec. un Año</option>
                    <?php foreach ($years as $fecha): ?>
                        <option value="<?php echo $fecha->year ?>"> <?php echo $fecha->year ?></option>
                    <?php endforeach ?>
                </select>
            </form>
        </div>
        <div class="col-lg-2">
            <form id="tipoConsulta">
                <h3>Tipo Consulta</h3>
                <select class="form-control input-lg" name="mes" id="mes" onchange="serach_periodo(value,false);">                
                </select>
            </form>
        </div>
        <div class="col-lg-3" id="peridosdiv">
      
        </div>
        <div class="col-lg-3">
            <form id="prueba">
                <h3>Componente (Opcional)</h3>
                <select class="form-control input-lg" name="componente" id="componente" onchange="selecccionar_componente(value);">
                    <option value="0" >Ninguno</option>
                    <?php foreach ($componentes as $componente): ?>
                        <option value="<?php echo $componente->id_componente ?>"> <?php echo $componente->nombre ?></option>
                    <?php endforeach ?>
                </select>
            </form>
        </div>
        <div class="col-lg-2">
            <form id="">
                <h3>Reporte Excel</h3>
                <button id="" onclick="generarReporteSabana()" class="btn btn-primary btn-lg" type="button"><span class="glyphicon glyphicon-cloud-download"></span></button>
            </form>
        </div>
                
    </div><br><br>
    <!-- Table result seach periodos -->
    <div class="row">
        <form id="formReporteEmpConceptos" method="POST" action="<?php echo base_url('Reportes_nomina_ctrl/reporteEmpleadosPorConcepto');?>" target="_blank">
            <input type="hidden" name="reporteExcel" id="id_reporteExcel" value="0">
            <input type="hidden" name="id_nomina" id="id_nomina">
            <input type="hidden" name="tipo" id="tipo">
            <input type="hidden" name="anio" id="anioo">
            <input type="hidden" name="mess" id="mess">
            <input type="hidden" name="inputComponente" id="inputComponente" value="0">
        </form>
    </div>

</div>