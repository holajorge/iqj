<?php if ( $this->session->userdata('tipo_usuario') == "admin" ): ?>
    
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <a type="button" class="col-lg-2 btn btn-primary pull-right" href="<?php echo base_url('User_ctrl/create'); ?>" >Registrar Usuario</a>
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                      <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" id="tabla_lista_empleados">
                                <thead>
                                    <tr>
                                        <th>No. Empleado</th>  
                                        <th>Nombre</th>
                                        <th>Apellido</th>                                       
                                        <th>RFC</th>  
                                        <th class="text-center">Acciones</th>                                                                                    
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if ($users != null): ?>
                                    <?php foreach ($users as  $user): ?> 
                                        <tr class="gradeA"> 
                                            <td><label  id="numero<?php echo $user->id_empleadoxusuario ?>"><?php echo  $user->no_empleado ?></label></td> 
                                            <td><label  id="nombre<?php echo $user->id_empleadoxusuario ?>"><?php echo $user->nombre?></label></td>
                                            <td><label  id="ap_paterno<?php echo $user->id_empleadoxusuario ?>"><?php echo $user->ap_paterno?></label></td>                                            
                                            <td><label  id="rfc<?php echo $user->id_empleadoxusuario ?>"><?php echo $user->rfc?></label></td>
                                             <td class="text-center">
                                                <?php if ($user->status == 1): ?>
                                                    <button type="button" class="btn btn-danger btn-rounded" onclick="deshabilitarUser('<?php echo $user->id_empleadoxusuario ?>', '<?php echo $user->nombre ?>', '<?php echo $user->id_empleado ?>')"><span class="fa fa-warning"></span> Deshabilitar</button>                                      
                                                <?php else: ?>
                                                    <button type="button" class="btn btn-success btn-rounded" onclick="habilitarUser('<?php echo $user->id_empleadoxusuario ?>', '<?php echo $user->nombre ?>', '<?php echo $user->id_empleado ?>')"><span class="fa fa-heart"></span> Habilitar </button>
                                                <?php endif ?>
                                                    <!-- <button type="button" class="btn btn-info btn-rounded" onclick="editDepto('<?php echo $user->id_empleadoxusuario ?>')" data-toggle="modal" data-target="#editarUser"><span class="glyphicon glyphicon-edit"></span> Editar</button>                                             -->
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
<?php else: ?>
    <h1>usted mo esta autorizado</h1>
<?php endif ?>

<!-- Modal -->
<div class="modal fade" id="editarPuesto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Editar Puesto</h4>        
      </div>
      <div class="modal-body">
        <form role="form" id="formPuestoEditar">
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
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" tabindex="5" onclick="savePuestoEdit()">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>