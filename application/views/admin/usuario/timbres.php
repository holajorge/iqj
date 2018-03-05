<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-3">
            <h3>Año</h3>
            <select class="form-control" name="anio" id="anio" onchange="serach_periodos_admin(value);">
                <option value="" selected disabled hidden >Seleccione un Año</option>
                <?php foreach ($years as $fecha): ?>
                    <option value="<?php echo $fecha->year ?>"> <?php echo $fecha->year ?></option>
                <?php endforeach ?>
            </select>
        </div>
    </div><br>
    <!-- Table result seach periodos -->
    <div id="resultado_periodo_admin" style="display: none">
        <div class="row">

        </div>
    </div>
</div>