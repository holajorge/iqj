<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <a type="button" class="col-lg-2 btn btn-primary pull-right" href="<?php echo base_url('TipoEmpleado_ctrl/create'); ?>">Registrar Tipo Empleado</a>            
            <div class="ibox float-e-margins">              
                <div class="ibox-content">                    
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" id="tabla_lista_empleados">
                            <thead>
                                <tr>                                    
                                    <th>Tipo de Trabajador</th>                                                                         
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if ($tipos != null ): ?>
                                <?php foreach ($tipos as  $tipoEmpleado): ?>
                                    <tr class="gradeA">
                                        <td><label  id="nombre<?php echo $tipoEmpleado->id_tipo_trabajador ?>"><?php echo  $tipoEmpleado->nombre_tipo_trabajador ?></label></td>                                                                             
                                        <td class="text-center">
                                            <?php if ($tipoEmpleado->status == 1): ?>
                                            <button type="button" class="btn btn-danger btn-rounded" onclick="deshabilitarEmpleadoTipo('<?php echo $tipoEmpleado->id_tipo_trabajador?>', '<?php echo $tipoEmpleado->nombre_tipo_trabajador?>')"><span class="fa fa-warning"></span> Deshabilitar</button>                                      
                                            <?php else: ?>
                                                <button type="button" class="btn btn-success btn-rounded" onclick="habilitarEmpleadoTipo('<?php echo $tipoEmpleado->id_tipo_trabajador ?>', '<?php echo $tipoEmpleado->nombre_tipo_trabajador?>')"><span class="fa fa-heart"></span> Habilitar </button>
                                            <?php endif ?>                                        
                                            <button class="btn btn-info" onclick="editTipoEmpleado('<?php echo $tipoEmpleado->id_tipo_trabajador ?>')" data-toggle="modal" data-target="#editarTipoEmpleado"><span class="glyphicon glyphicon-edit"></span> Editar</button>                                                               
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
<div class="modal fade" id="editarTipoEmpleado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <form role="form" id="formTipoEmpleadoEditar">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Editar Trabajador</h4>
      </div>
        <div class="modal-body">
            <input type="hidden" name="id" id="idEditar" value="">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="nombre">Tipo Trabajador</label>
                        <input type="text" name="nombre" id="nombreEditar" class="form-control input-lg" tabindex="1">
                    </div>
                </div>
            </div>                       
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <input type="submit" value="Guardar Cambios" class="btn btn-primary custom-close" tabindex="3">
      </div>
    </div>
 </form>
  </div>
</div>