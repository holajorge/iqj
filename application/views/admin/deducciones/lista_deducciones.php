<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                  <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" id="tabla_lista_empleados">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nombre</th> 
                                    <th class="text-center">Acciones</th>                                                  
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($deducciones as  $deduccion): ?>                                                                
                                <tr class="gradeA">
                                    <td><label  id="indicador<?php echo $deduccion->id_deduccion ?>"><?php echo  $deduccion->indicador ?></label></td> 
                                    <td><label  id="nombre<?php echo $deduccion->id_deduccion ?>"><?php echo $deduccion->nombre?></label></td>  
                                    <td class="text-center">
                                        <?php if ($deduccion->status == 1): ?>
                                            <button type="button" class="btn btn-danger btn-rounded" onclick="deshabilitarDeduccion('<?php echo $deduccion->id_deduccion ?>', '<?php echo $deduccion->nombre ?>')"><span class="fa fa-warning"></span> Deshabilitar</button>                                      
                                        <?php else: ?>
                                            <button type="button" class="btn btn-success btn-rounded" onclick="habilitarDeduccion('<?php echo $deduccion->id_deduccion ?>', '<?php echo $deduccion->nombre ?>')"><span class="fa fa-heart"></span> Habilitar </button>
                                        <?php endif ?>                                        
                                            <button class="btn btn-info btn-rounded" onclick="editDeduccion('<?php echo $deduccion->id_deduccion ?>')" data-toggle="modal" data-target="#editarDeduccion"><span class="glyphicon  glyphicon-edit"></span> Editar</button>                                                               
                                    </td>                                      
                                </tr>                                
                            <?php endforeach ?>
                            </tbody>                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="editarDeduccion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <form role="form" id="formDeduccionEditar">
        <div class="modal-content">
                <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   <h4 class="modal-title" id="myModalLabel">Editar Deduccion</h4>        
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="idEditar" value="">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="form-group ">
                                <label for="indicador">Código</label>
                                <input type="text" name="indicador" id="indicadorEditar" class="form-control input-lg" tabindex="1">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-9">
                            <div class="form-group">
                                <label for="nombre">Nombre Percepcion</label>
                                <input type="text" name="nombre" id="nombreEditar" class="form-control input-lg" tabindex="2">
                            </div>
                        </div>                                    
                    </div>                            
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <input type="submit" value="Guardar Cambios" class="btn btn-primary" tabindex="3" >
                </div>
        </div>
    </form>
  </div>
</div>