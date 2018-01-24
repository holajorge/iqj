 <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-4">
            <h2>Nómina Extraordinaria</h2>
            <select class="form-control input-lg" id="periodo" name="periodo" onchange="serach_nominaExtraordinaria(value);">
                <option value="" selected disabled hidden >Seleccione nomina Extraordinaria</option>
                <?php foreach ($extraordinarios as $extraordinario): ?>
                    <option  value="<?php echo $extraordinario->id_concepto_extraordinario ?>"> <?php echo $extraordinario->nombre ?></option>
                <?php endforeach ?>
            </select>
        </div>
    </div><br>
    <!-- Table result seach periodos -->
    <div class="ibox float-e-margins" id="resultadoNominaExtra">
        
    </div>
  
</div>

<!-- Modal -->
<div class="modal fade" id="editExtraordinaria" role="dialog">
    <div class="modal-dialog modal-lg">
     <form role="form" id="form_edit_extraordinaria">     
      <div class="modal-content">
        <div class="modal-header ">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Editar Nómina Extraordinaria</h3>
        </div>
        <div class="modal-body">
            <input type="hidden" name="id" id="idEditar" value="">
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
            <h3 class="text-center">Nómina Extraodinaria</h3>                           
            <div class=" m-b-sm ">
                <input type="hidden" id="idEditarExtra" name="idExtra" >
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group" id="reloadExtra">
                            <!-- <a class="btn btn-info  input-sm pull-right" data-toggle="modal" data-target="#crearExtraordinario"><span class="glyphicon  glyphicon-plus"></span> Crear Nuevo</a>   -->                                           
                            <label for="depto">Seleccionar Concepto Extraordinaria</label>
                            <select class="form-control input-lg" id="dia" name="dia" tabindex="1">                                
                                
                            </select>
                        </div>
                    </div>  
                    <div class="col-sm-4">
                        <div class="form-group" id="reloadExtra">
                            <label for="depto">Importe</label>
                            <input type="number" class="form-control input-lg" id="importeEdit" name="importe">
                        </div>
                    </div>  
                    <div class="col-sm-4">
                        <div class="form-group" id="reloadExtra">
                            <label for="depto">ISR</label>
                            <input type="number" class="form-control input-lg" id="isrEdit" name="isr">
                        </div>
                    </div>                              
                </div>
                <div class="row">
                    <div class="col-sm-4">                                              
                    </div>
                    <div class="col-sm-6">                                              
                    </div>                                       
                </div>                                
            </div>       
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <input type="submit" value="Guardar Cambios " class="btn btn-primary " tabindex="14" onclick="edit_extraordinaria()">
        </div>
      </div>
    </form>
    </div>
  </div>
</div>