 <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-3">
            <form id="prueba">
                <h3>Seleccione Año</h3>
                <select class="form-control input-lg" name="anio" id="anio" onchange="serach_yaer(value);">
                    <option value="" selected disabled hidden >Seleccione un Año</option>
                    <?php foreach ($years as $fecha): ?>
                        <option value="<?php echo $fecha->year ?>"> <?php echo $fecha->year ?></option>
                    <?php endforeach ?>
                </select>
            </form>
        </div>
        <div class="col-lg-3">
            <form id="tipoConsulta">
                <h3>Seleccione Tipo Consulta</h3>
                <select class="form-control input-lg" name="mes" id="mes" onchange="serach_periodo(value,false);">                
                </select>
            </form>
        </div>
        <div class="col-lg-3" id="peridosdiv">
            <!-- <h3>Seleccione el Periodo</h3> -->
            <!-- <select class="form-control input-lg" id="periodo" name="periodo" onchange="serach_conseptos(value);">
                
            </select> -->
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
  
            <div class="col-lg-12"  id="guardad_conceptos">
                <button class="btn btn-primary pull-right btn-lg" id="btnPrintExcel" onclick="print_excel_o_pdf(true)"> Excel </button>
            </div>
        </form>
    </div>
    <div class="row">
        <div class="col-lg-12"  >
            <button style="display: none" id="guardad_conceptos" class="btn btn-primary pull-right btn-lg" type="submit">GUARDAR</button>
        </div>
    </div>

</div>