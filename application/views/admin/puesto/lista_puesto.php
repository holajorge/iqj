<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <a type="button" class="col-lg-2 btn btn-primary pull-right" href="<?php echo base_url('Puesto_ctrl/create'); ?>" >Registrar Puesto</a>
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                  <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" id="tabla_lista_empleados">
                            <thead>
                                <tr>
                                    <th>Nivel</th>
                                    <th>Nombre</th>   
                                    <th class="text-center">Acciones</th>                                                                                    
                                </tr>
                            </thead>
                            <tbody>
                            <?php if ($puestos !=  null): ?>
                                <?php foreach ($puestos as  $puesto): ?>                                                                
                                    <tr class="gradeA"> 
                                        <td><label  id="nivel<?php echo $puesto->id_puesto ?>"><?php echo  $puesto->nivel ?></label></td> 
                                        <td><label  id="nombre<?php echo $puesto->id_puesto ?>"><?php echo $puesto->nombre?></label></td>
                                         <td class="text-center">
                                            <?php if ($puesto->status == 1): ?>
                                                <button type="button" class="btn btn-danger btn-rounded" onclick="deshabilitarPuesto('<?php echo $puesto->id_puesto ?>','<?php echo $puesto->nombre ?>')"><span class="fa fa-warning"></span> Deshabilitar</button>                                      
                                            <?php else: ?>
                                                <button type="button" class="btn btn-success btn-rounded" onclick="habilitarPuesto('<?php echo $puesto->id_puesto ?>', '<?php echo $puesto->nombre ?>')"><span class="fa fa-heart"></span> Habilitar </button>
                                            <?php endif ?>                                            
                                            <button class="btn btn-info  btn-rounded" onclick="editPuesto('<?php echo $puesto->id_puesto ?>')" data-toggle="modal" data-target="#editarPuesto"><span class="glyphicon  glyphicon-edit"></span> Editar</button>                                                               
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
<div class="modal fade" id="editarPuesto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <form role="form" id="formPuestosEditar">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Editar Puesto</h4>        
      </div>
      <div class="modal-body">        
            <input type="hidden" name="id" id="idEditar" value="">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <div class="form-group ">
                            <label for="nivelEditar">Nivel</label>
                            <input type="text" name="nivel" id="nivelEditar" class="form-control input-lg" tabindex="1">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-9">
                        <div class="form-group">
                            <label for="nombreEditar">Nombre</label>
                            <input type="text" name="nombre" id="nombreEditar" class="form-control input-lg" tabindex="2">
                        </div>
                    </div>
                </div>                        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary" tabindex="5">Guardar Cambios</button>
      </div>
    </div>
  </form>
  </div>
</div>