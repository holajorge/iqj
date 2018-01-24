<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-4">
            <h2>Seleccione Periodo</h2>
            <select class="form-control input-lg" id="periodo" name="periodo" onchange="serach_periodos(value);">
                <option value="" selected disabled hidden >Seleccione Periodo</option>
                <?php foreach ($periodos as $perido): ?>                   
                    <option  value="<?php echo $perido->id_nomina ?>"> <?php echo $perido->periodo_quinquenal.' | '.$perido->periodo_inicio.' | '.$perido->periodo_fin  ?></option>
                <?php endforeach ?>
            </select>
        </div>
    </div><br>
    <!-- Table result seach periodos -->
    <div id="resultado_periodo">
        <div class="row">                    
        </div>
    </div>    
</div>

