<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <a type="button" class="col-lg-2 btn btn-primary pull-right" href="<?php echo base_url('Depto_ctrl/create'); ?>">Registrar Depto</a>            
            <div class="ibox float-e-margins">              
                <div class="ibox-content">                    
                  <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" id="tabla_lista_empleados">
                            <thead>
                                <tr>                                    
                                    <th>Nombre</th>  
                                    <th>Direccion</th>                                     
                                    <th class="text-center">Acciones</th>   
                                </tr>
                            </thead>
                            <tbody>
                            <?php if ($deptos != null ): ?>
                                <?php foreach ($deptos as  $depto): ?>
                                    <tr class="gradeA">         
                                        <td><label  id="nombre<?php echo $depto->id_depto ?>"><?php echo  $depto->nombre ?></label></td> 
                                        <td><label  id="direccion<?php echo $depto->id_depto ?>"><?php echo $depto->direccion ?></label></td>                                       
                                        <td class="text-center">
                                            <?php if ($depto->status == 1): ?>
                                                <button type="button" class="btn btn-danger btn-rounded" onclick="deshabilitarDepto('<?php echo $depto->id_depto ?>', '<?php echo $depto->nombre ?>')"><span class="fa fa-warning"></span> Deshabilitar</button>                                      
                                            <?php else: ?>
                                                <button type="button" class="btn btn-success btn-rounded" onclick="habilitarDepto('<?php echo $depto->id_depto ?>', '<?php echo $depto->nombre ?>')"><span class="fa fa-heart"></span> Habilitar </button>
                                            <?php endif ?>                                            
                                            <button class="btn btn-info btn-rounded" onclick="editDepto('<?php echo $depto->id_depto ?>')" data-toggle="modal" data-target="#editarDepto"><span class="glyphicon glyphicon-edit"></span> Editar</button>                                                               
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
<div class="modal fade" id="editarDepto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <form role="form" id="formDeptoEditar">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Editar Repartamento</h4>
      </div>
      <div class="modal-body">
        
            <input type="hidden" name="id" id="idEditar" value="">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group ">
                            <label for="nombre">Nombre Departamento</label>
                            <input type="text" name="nombre" id="nombreEditar" class="form-control input-lg" tabindex="1">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="puesto">Direccion</label>
                            <select class="form-control input-lg" id="direccionEditar" name="direccion">                               
                                <?php foreach ($direcciones as $direccion): ?>                               
                                    <option  value="<?php echo $direccion->id_direccion ?>" <?php echo ($depto->direccion == $direccion->nombre) ? 'selected' : '';?>>
                                            <?php echo $direccion->nombre; ?>
                                    </option>  
                                <?php endforeach ?>                                                                                     
                            </select>
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