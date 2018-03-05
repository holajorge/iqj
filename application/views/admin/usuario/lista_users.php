
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
                                        <th>Nombre</th>
                                        <th>Apellidos</th>
                                        <th>RFC</th>  
                                        <th class="text-center">Acciones</th>                                                                                    
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if ($users != null): ?>
                                    <?php foreach ($users as  $user): ?> 
                                        <tr class="gradeA"> 

                                            <td><label  id="nombre<?php echo $user->id_usuarioxsistema ?>"><?php echo $user->nombre?></label></td>
                                            <td><label  id="ap_paterno<?php echo $user->id_usuarioxsistema ?>"><?php echo $user->apellidos?></label></td>
                                            <td><label  id="rfc<?php echo $user->id_usuarioxsistema ?>"><?php echo $user->rfc?></label></td>
                                             <td class="text-center">
                                                <?php if ($user->status == 1): ?>
                                                    <button type="button" class="btn btn-danger btn-rounded" onclick="deshabilitarUser('<?php echo $user->id_usuarioxsistema ?>', '<?php echo $user->nombre ?>')"><span class="fa fa-warning"></span> Deshabilitar</button>
                                                <?php else: ?>
                                                    <button type="button" class="btn btn-success btn-rounded" onclick="habilitarUser('<?php echo $user->id_usuarioxsistema ?>', '<?php echo $user->nombre ?>')"><span class="fa fa-heart"></span> Habilitar </button>
                                                <?php endif ?>
                                                 <button type="button" class="btn btn-info btn-rounded" onclick="editarUserSystem('<?php echo $user->id_usuarioxsistema ?>', '<?php echo $user->nombre ?>','<?php echo $user->apellidos ?>','<?php echo $user->rfc ?>')" data-backdrop="static"  data-keyboard="false" data-toggle="modal" data-target="#editarUserSystem"><span class="fa fa-edit"></span> Editar </button>
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
<div class="modal fade bs-example-modal-lg"  id="editarUserSystem" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-success" id="myModalLabel">Editar Usuario Adminstrador</h4>
            </div>
            <form role="form" id="formUserSystemaEditar">
                <div class="modal-body">
                        <input type="hidden" name="id" id="idEditar" value="">
                        <div class="row">
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                <div class="form-group ">
                                    <label for="nombreEdit">NOMBRE</label>
                                    <input  type="text" name="nombre" id="nombreEditar" class="form-control " tabindex="1">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-5">
                                <div class="form-group ">
                                    <label for="apellidosEdit">APELLIDOS</label>
                                    <input  type="text" name="apellidos" id="apellidosEditar" class="form-control " tabindex="2">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-3">
                                <div class="form-group">
                                    <label for="nombre">RFC</label>
                                    <input type="text" name="rfc" id="rfcEditar" class="form-control " tabindex="3" onblur="ValidaRfcSystem(this.value)">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label for="password">PASSWORD</label>
                                    <input type="password" name="password" id="password" class="form-control " tabindex="5">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label for="cpassword">CONFIRMAR PASSWORD</label>
                                    <input type="password" name="cpassword" id="cpassword" class="form-control " tabindex="6">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="cancelEditUSerAdmin()">Cancelar</button>
                    <button type="submit" id="ladda_btn_editUserAdmin" class="ladda-button btn btn-primary" data-style="expand-left" tabindex="7" >Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div
