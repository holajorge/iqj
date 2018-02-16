<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <a type="button" class="col-lg-2 btn btn-primary pull-right" href="<?php echo base_url('Periodo_controller/create'); ?>" >Registrar Periodo</a> 
            <div class="ibox float-e-margins">
                <div class="ibox-content">                   
                  <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" id="tabla_lista_empleados">
                            <thead>
                                <tr>                                    
                                    <th class="text-center">P Inicio</th>
                                    <th class="text-center">P Fin</th>
                                    <th class="text-center">Nom Periodo</th>
                                    <th class="text-center">Acciones</th>   
                                </tr>
                            </thead>
                            <tbody>
                            <?php if ($periodos != null): ?>                                                            
                                <?php foreach ($periodos as  $periodo): ?>
                                    <tr class="gradeA">
                                        <td><label  id="periodo_inicio<?php echo $periodo->id_nomina ?>"><?php echo  $periodo->periodo_inicio ?></label></td> 
                                        <td><label  id="periodo_fin<?php echo $periodo->id_nomina ?>"><?php echo $periodo->periodo_fin?></label></td>  
                                        <td><label  id="periodo_quinquenal<?php echo $periodo->id_nomina ?>"><?php echo $periodo->periodo_quinquenal?></label></td>  
                                        <td class="text-center">
                                            <button class="btn btn-info btn-rounded" onclick="editPeriodo('<?php echo $periodo->id_nomina ?>')" data-toggle="modal" data-target="#editarPeriodo"><span class="glyphicon glyphicon-edit"></span> Editar</button>
                                        </td>                                    
                                    </tr>                                
                                <?php endforeach ?>
                            <?php else: ?>
                            <?php endif ?>                            
                            </tbody>                            
                        </table>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editarPeriodo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <form role="form" id="formPeriodoEditar">
        <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Editar Periodo</h4>        
              </div>
              <div class="modal-body">        
                <input type="hidden" name="id" id="idEditar" value="">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <div class="form-group ">
                            <label for="periodo_inicioEditar">Periodo Inicio</label>                            
                            <input type="date" name="inicio" id="periodo_inicioEditar" class="form-control input-lg" tabindex="1">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-9">
                        <div class="form-group">
                            <label for="periodo_finEditar">Periodo Fin</label>
                            <input type="date" name="fin" id="periodo_finEditar" class="form-control input-lg" tabindex="2">
                        </div>
                    </div> 
                    <div class="col-xs-12 col-sm-6 col-md-9">
                        <div class="form-group">
                            <label for="periodo_quinquenalEditar">Periodo Quinquenal</label>
                            <input type="number" name="quinquenio" id="periodo_quinquenalEditar" class="form-control input-lg" tabindex="2">
                        </div>
                    </div>                                     
                </div>                       
              </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <input type="submit" class="btn btn-primary" value="Guardar Cambios" tabindex="3">
            </div>      
        </div>
    </form>  
</div>
