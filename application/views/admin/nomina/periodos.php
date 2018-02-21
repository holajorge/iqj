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
        <div class="col-lg-8" > <br><br><br>
            <button style="display: none;" id="showBtnPrint" class="btn btn-primary btn-lg pull-right"  onclick="imprimirList()"><span class='glyphicon glyphicon-print' aria-hidden='true'></span> IMPRIMIR LISTA</button>
        </div>
    </div><br>
    <!-- Table result seach periodos -->
    <div id="resultado_periodo">
        <div class="row">                    
        </div>
    </div>   
</div>

<!-- Modal -->
<div class="modal fade" id="modalTimbrado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">TIMBRADO DE NÓMINA</h4>
      </div>
      <div class="modal-body">
        <form id="formTimbrarNomina" method="GET" action="<?php echo base_url('Nomina_controller/timbrarNomina');?>" target="_blank">
            <input type="hidden" id="id_emp" name="id_emp">
            <input type="hidden" id="id_nom" name="id_nom">
            <h3>Origen del recurso</h3>
            <select class="form-control input-lg" name="origenRecurso" id="componente">
                <option value="IP" >IP - Ingresos Propios</option>
                <option value="IF" >IF - Ingresos Federales</option>
                <option value="IM"> IM - Ingresos Mixtos</option>
            </select>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">CANCELAR</button>
        <button type="button" class="btn btn-primary" onclick="generarTimbreNomina()">TIMBRAR</button>
      </div>
    </div>
  </div>
</div>