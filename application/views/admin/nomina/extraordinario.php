 <style>
    .class-origen-recurso{
        background-color: #BEDFD6;
        padding: 5px;
        border-radius: 12px;
    }
</style>
 <!-- SE ESPECIFICA SI SE ESTÁ EDITANDO O DANDO DE ALTA LA NÓMINA EXTRAORDINARIA -->
<input type="hidden" id="id_editando_nomE" value="true">
 <!-- --------------------------------------------------------------------------- -->

 <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-2">
            <h2>AÑO</h2>
            <select class="form-control" id="" name="" onchange="obtnerListaNomEporAnio(value)">
                <option value="" selected disabled hidden >Seleccione Año</option>
                <?php foreach ($years as $anio): ?>
                    <option  value="<?php echo $anio->year ?>"> <?php echo $anio->year ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="col-lg-4">
            <h2>Nómina Extraordinaria</h2>
            <select class="form-control" id="periodo" name="periodo" onchange="serach_nominaExtraordinaria(value);">
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5 col-lg-offset-3"> <br>
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
    </div>
    
    <!-- Table result seach periodos -->
    <br>
    <div class="ibox float-e-margins" id="resultadoNominaExtra">
        
    </div>
    <div class="alert alert-danger" role="alert" id="msjNoHayResultadosNomE" style="display: none;">
      <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
      <span class="sr-only">Error:</span>
      NO HAY EMPLEADOS AGREGADOS A ESTA NÓMINA
    </div>
  
</div>

<!-- Modal -->
<div class="modal fade" id="editExtraordinaria" role="dialog">
    <div class="modal-dialog modal-lg">  
      <div class="modal-content">
        <div class="modal-header ">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Editar Nómina Extraordinaria</h3>
        </div>
        <div class="modal-body">
            <div class=" m-b-sm border-bottom">
                <div class="row">
                    <div id="detalle_tipo"></div> 
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="num_plaza">Numero Plaza</label>
                            <input type="number" disabled id="num_plazaEdit" name="num_plaza" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="horasEdit">Horas</label>
                            <input type="number" disabled id="horasEdit" name="horas" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="nombreEdit">Nombre</label>
                            <input type="text" disabled id="nombreEdit" name="nombre" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="ap_paternoEdit">Apellidos</label>                                          
                            <input type="text" disabled id="ap_paternoEdit" name="ap_paterno" class="form-control">                                         
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="date_added">Fecha Nacimiento</label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="fecha_ingresoEdit" disabled type="date" name="fecha_ingreso" class="form-control">
                            </div>
                        </div>
                    </div>      
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="date_modified">Fecha Ingreso</label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input disabled id="fecha_nacimientoEdit" type="date" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="rfcEdit">RFC</label>
                            <input type="text" id="rfcEdit" name="rfc" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label" for="rfcEdit">CURP</label>
                            <input type="text" id="curpEdit" name="rfc" class="form-control" disabled>
                        </div>
                    </div>
                </div>
            </div>
            <h2 id="id_mostrar_datos_nomina" class="text-center"> </h2> 
                <form id="guardaExtraordinario">
                    <input type="hidden" id="idEditar" name="idExtra" >
                    <input type="hidden" id="idEmpleado" name="idEmpleado" >
                    <div class="row">
                        <div class="col-lg-2">
                            <label for="anioNomE">Año</label>
                            <select class="form-control" id="anioNomE" name="anioNomE" onchange="updateConpceptoNomE(value);" tabindex="1" style="width: 70%">  
                            </select>
                        </div>
                        <div class="col-lg-10">
                            <label for="">Seleccione uno o Cree uno Nuevo </label>
                            <select class="form-control inline" id="dia" name="dia" onchange="validarNoDuplicidad(value);" tabindex="1" style="width: 70%">
                        
                            </select>
                            <a class="btn btn-info  pull-right" data-toggle="modal" data-target="#crearExtraordinario"><span class="glyphicon  glyphicon-plus"></span>Nuevo</a>
                        </div>  
                    </div>
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="form-group" id="reloadExtra">
                                <label for="depto">Total Importe</label>
                                <input type="number" class="form-control" name="importe" id="importe" onchange="calcularImporteGravado()" onkeyup="calcularImporteGravado()">
                                <label for="depto" style="color: red;" id="msjErrorTotalImp"></label>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group" id="reloadExtra">
                                <label for="importeExento">Importe Exento</label>
                                <input type="number" class="form-control" name="importeExento" id="importeExento" onchange="calcularImporteGravado()" onkeyup="calcularImporteGravado()">
                                <label for="depto" style="color: red;" id="msjErrorImpExcento"></label>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group" id="reloadExtra">
                                <label for="importeGravado">Importe Gravable</label>
                                <input type="number" class="form-control" name="importeGravado" id="importeGravado" disabled="true">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="radio">
                                <label><input type="radio" id="isrRadio" name="isrSubsidio" value="0">ISR</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" id="subsidioRadio" name="isrSubsidio" value="1">SUBSIDIO</label>
                            </div>
                        </div>  
                        <div class="col-lg-2">
                            <div class="form-group" id="reloadExtra">
                                <label for="impSubsidioIsr"></label>
                                <input type="number" class="form-control " name="impSubsidioIsr" id="impSubsidioIsr" onchange="calcularImporteGravado()" onkeyup="calcularImporteGravado()">
                                <label for="impSubsidioIsr" style="color: red;" id="labelErrorimpSubsidioIsr"></label>
                            </div>
                        </div>
                        <!-- <div class="col-sm-2">  
                            <button id="btnGuardarNominaExtraordinaria" type="submit" style="display: none;" class="btn btn-primary input-lg pull-right" onclick="insetaNominaExtaordinaria()"><span class="glyphicon glyphicon-floppy-saved" ></span> Guardar</button>                                 
                        </div> -->
                    </div>
                       
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <input type="submit"  id="btnGuardarNominaExtraordinaria" value="Guardar Cambios " class="btn btn-primary " tabindex="14" onclick="edit_extraordinaria()">
        </div>
                </form>
      </div>
    
    </div>
  </div>
</div>


<!-- Modal AGREGAR NUEVO CONCEPTO DE NÓMINA EXTRAORDINARIA -->
<div class="modal fade" id="crearExtraordinario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <form role="form" id="formExtraCreate">
        <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <h4 class="modal-title" id="myModalLabel">Crear consepto Extraordinario</h4>        
            </div>
            <div class="modal-body">                    
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-5">
                        <div class="form-group ">
                            <label for="fecha">FECHA</label>
                            <input type="date" name="fecha" id="fecha" class="form-control" tabindex="1">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="nombre">NOMBRE</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" tabindex="2">
                        </div>
                    </div>
                 </div>
                 <div class="row">   
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="">TIPO DE CONCEPTO </label>
                            <select class="form-control" id="tipoConcepto" name="tipoConcepto" onchange="" tabindex="3">
                                <option selected disabled hidden>Seleccione Concepto</option>
                                <?php if ($tipoConceptoExtraordinario != null ): ?>
                                    <?php foreach ($tipoConceptoExtraordinario as $concepto): ?>
                                        <option value="<?php echo $concepto->id_concepto_extraordinario?>">
                                            Indicador: <?php echo $concepto->indicador ?> -
                                            Código del SAT: <?php echo $concepto->codigoSat ?> -
                                            <?php echo $concepto->nombre ?>
                                        </option>
                                    <?php endforeach ?>
                                <?php else: ?>
                                <?php endif ?>
                            </select>
                        </div>
                    </div>                                    
                </div>                            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <input type="submit" value="Guardar" class="btn btn-primary" tabindex="3" onclick="insetaExtaordinaria()">
            </div>
        </div>
    </form>
  </div>
</div>
