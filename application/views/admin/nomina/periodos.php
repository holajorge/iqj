<style>
    .class-origen-recurso{
        background-color: #BEDFD6;
        padding: 5px;
        border-radius: 12px;
    }
</style>
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
        <div class="col-lg-5"> <br><br><br>
            <div class="class-origen-recurso" id="id-origen-r" style="display: none;">
                <label style="text-align: justify;">SELECCIONE EL ORIGEN DEL RECURSO PARA EL TIMBRADO DE LA NÓMINA</label> 
                <label class="radio-inline">
                  <input type="radio" name="rb-origen-recurso" value="IP">IP - INGRESO PROPIO
                </label>
                <label class="radio-inline">
                  <input type="radio" name="rb-origen-recurso" value="IF">IF - INGRESO FEDERAL
                </label>
            </div>
        </div>
        <div class="col-lg-3" > <br><br><br>
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
        <form id="formTimbrarNomina" method="GET" action="<?php echo base_url('Nomina_controller/verificaExisteTimbre');?>" target="_blank">
            <input type="hidden" id="id_emp" name="id_emp">
            <input type="hidden" id="id_nom" name="id_nom">
            <h3>Origen del recurso</h3>
            <select class="form-control input-lg" name="origenRecurso" id="componente" onchange="validarOrigenRecurso(value);">
                <option value="IP" >IP - Ingresos Propios</option>
                <option value="IF" >IF - Ingresos Federales</option>
                <option value="IM"> IM - Ingresos Mixtos</option>
            </select>
            <div id="inputRecursoPropioOculto">
                <div class="form-group">
                  <label for="montoRecursoPropio">Monto Recurso Propio</label>
                  <input type="number" class="form-control" id="montoRecursoPropio" name="montoRecursoPropio">
                </div>
                <p style="text-align: justify;">
                    Cuando se señale que el origen del recurso es por <strong>ingresos mixtos</strong>, se debe registrar únicamente el importe bruto de los ingresos propios, incluyendo el total de ingresos gravados y exentos. 
                </p>
                <p style="text-align: justify;">
                   El valor de este dato debe ser menor que la suma de los campos TotalPercepciones y TotalOtrosPagos (Líquido). 
                </p>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">CANCELAR</button>
        <button type="button" class="btn btn-primary" onclick="generarTimbreNomina()">TIMBRAR</button>
      </div>
    </div>
  </div>
</div>