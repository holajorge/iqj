
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <!-- SELECT PARA ESCOJER SI ES EMPLEADO REGISTRADO O UNO NUEVO --->
                <div class="row">
                    <div class="col-xs-12 col-sm-3 col-md-3">
                        <div class="form-group ">
                            <label for="tipo">¿Usuarios Empleados?</label>
                            <select class="form-control " id="tipo" name="usuario" tabindex="4" onchange="tipoUsuarios(value)">
                                <option value="" selected disabled hidden>Seleccione</option>
                                <option value="si">Si</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 pull-right" style="margin-top: 15px">
                        <a type="button" class="col-lg-8 btn btn-primary pull-right" href="<?php echo base_url('User_ctrl/create'); ?>" >Registrar Usuario</a>
                    </div>
                </div>
                <div class="ibox float-e-margins" id="usaurioIndependiente" style="display: none">
                    <p class="text-success inline" style="font-size: 16px;">Usuarios / Lista Independientes</p>
                    <div class="ibox-content">
                      <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" id="tabla_lista_empleados">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Apellidos</th>
                                        <th>RFC</th>  
                                        <th>USUARIO</th>
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
                                            <td><label  id="rfc<?php echo $user->id_usuarioxsistema ?>"><?php echo $user->usuario?></label></td>
                                             <td class="text-center">
                                                <?php if ($user->status == 1): ?>
                                                    <button type="button" class="btn btn-danger btn-rounded" onclick="deshabilitarUser('<?php echo $user->id_usuarioxsistema ?>', '<?php echo $user->nombre ?>')"><span class="fa fa-warning"></span> Deshabilitar</button>
                                                <?php else: ?>
                                                    <button type="button" class="btn btn-success btn-rounded" onclick="habilitarUser('<?php echo $user->id_usuarioxsistema ?>', '<?php echo $user->nombre ?>')"><span class="fa fa-heart"></span> Habilitar </button>
                                                <?php endif ?>
                                                 <button type="button" class="btn btn-info btn-rounded" onclick="editarUserSystem('<?php echo $user->id_usuarioxsistema ?>', '<?php echo $user->nombre ?>','<?php echo $user->apellidos ?>','<?php echo $user->rfc ?>','<?php echo $user->usuario ?>')" data-backdrop="static"  data-keyboard="false" data-toggle="modal" data-target="#editarUserSystem"><span class="fa fa-edit"></span> Editar </button>
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
                <div class="ibox float-e-margins" id="UsuariosTablaEmpleados" style="display: none"></div>
            </div>
        </div>
    </div>
<!-- Modal  USUARIO INDEPENDIENTE-->
<div class="modal fade bs-example-modal-lg"  id="editarUserSystem" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-success" id="myModalLabel">EDITAR USUARIO INDEPENDIENTE</h4>
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
                            <div class="col-xs-12 col-sm-3 col-md-3" id="selectTipoUserIndependiente">
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
</div>
<!-- Madal del empleado Registrado -->
<div class="modal fade bs-example-modal-lg"  id="editarUserEmpleadosModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-success" id="myModalLabel">EDITAR USUARIO EMPLEADO</h4>
            </div>
            <form role="form" id="formUserEmpleadosEditar">
                <div class="modal-body">
                    <input type="hidden" name="id" id="idEditarEm" value="">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="form-group ">
                                <label for="nombreEdit">NOMBRE</label>
                                <input disabled  type="text" name="nombre" id="nombreEditarEm" class="form-control " tabindex="1">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-5">
                            <div class="form-group ">
                                <label for="apellidosEdit">APELLIDOS</label>
                                <input disabled type="text" name="apellidos" id="apellidosEditarEm" class="form-control " tabindex="2">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-3">
                            <div class="form-group">
                                <label for="nombre">RFC</label>
                                <input disabled type="text" name="rfc" id="rfcEditarEm" class="form-control " tabindex="3" onblur="ValidaRfcSystem(this.value)">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-3" id="selectTipoUser">
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="form-group">
                                <label for="password">PASSWORD</label>
                                <input type="password" name="password" id="passwordEmpleadoEdit" class="form-control " tabindex="5">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="form-group">
                                <label for="cpassword">CONFIRMAR PASSWORD</label>
                                <input type="password" name="cpassword" id="cpasswordEmpleadoEdit" class="form-control " tabindex="6">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="cancelEditEmpleadoRegistrado()">Cancelar</button>
                    <button type="submit" id="ladda_btn_saveEditEmpleado" class="ladda-button btn btn-primary" data-style="expand-left" tabindex="7" >Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>