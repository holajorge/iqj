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
            <h3>Seleccione Tipo Consulta</h3>
            <select class="form-control input-lg" name="mes" id="mes" onchange="serach_periodo(value);">                
            </select>
        </div>
        <div class="col-lg-4">
            <h3>Seleccione el Periodo</h3>
            <select class="form-control input-lg" id="periodo" name="periodo" onchange="serach_conseptos(value);">
                
            </select>
        </div>
    </div><br>
    <!-- Table result seach periodos -->
    <div class="ibox float-e-margins" id="resultadoNominaExtra">
        
    </div>
  
</div>