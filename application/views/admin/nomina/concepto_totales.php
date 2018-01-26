 <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-4">
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
        <div class="col-lg-4">
            <form id="tipoConsulta">
                <h3>Seleccione Tipo Consulta</h3>
                <select class="form-control input-lg" name="mes" id="mes" onchange="serach_periodo(value);">                
                </select>
            </form>
        </div>
        <div class="col-lg-4" id="peridosdiv">
            <!-- <h3>Seleccione el Periodo</h3> -->
            <!-- <select class="form-control input-lg" id="periodo" name="periodo" onchange="serach_conseptos(value);">
                
            </select> -->
        </div>
                
    </div><br><br>
    <!-- Table result seach periodos -->
    <div class="row">
        <form id="formTotalConcepts" action="<?php echo base_url('Reportes_nomina_ctrl/reporteNominaPorConcepto');?>">
            <input type="hidden" name="id_nomina" id="id_nomina">
            <input type="hidden" name="tipo" id="tipo">
            <input type="hidden" name="anio" id="anioo">
            <input type="hidden" name="mess" id="mess">
            <div class="col-lg-4"  id="table_percepciones" >
                
            </div>
            <div class="col-lg-4"  id="table_deducciones" >
                
            </div>
            <div class="col-lg-4"  id="table_aportaciones" >
                
            </div>
        </form>
    </div>
    <div class="row">
        <div class="col-lg-12"  >
            <button style="display: none" id="guardad_conceptos" class="btn btn-primary pull-right btn-lg" type="submit">GUARDAR</button>
        </div>
    </div>

</div>