<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <!-- <a type="button" class="col-lg-2 btn btn-primary pull-right" href="<?php echo base_url('User_ctrl/create'); ?>" >Registrar Usuario</a> -->
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                  <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" id="tabla_lista_empleados">
                            <thead>
                                <tr>
                                    <th>Numero</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Trabajador</th>
                                    <th>Departamento</th>
                                    <th>Puesto</th>
                                    <th>RFC</th>
                                    <th class="text-center">Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if ($empleados != null): ?>
                                <?php foreach ($empleados as  $user): ?>
                                    <tr class="gradeA">
                                        <td><label  id="nEmpleado"><?php echo  $user->no_empleado ?></label></td>
                                        <td><label  id="nombre<?php echo $user->id_empleado ?>" ><?php echo  $user->nombre ?></label></td>
                                        <td><label  id="ap_paterno<?php echo $user->id_empleado ?>"><?php echo $user->ap_paterno?></label></td>
                                        <td><label  id="trabajador"><?php echo $user->trabajador?></label></td>
                                        <td><label  id="depto"><?php echo $user->depto?></label></td>
                                        <td><label  id="puesto"><?php echo $user->puesto?></label></td>
                                        <td><label  id="rfc<?php echo $user->id_empleado ?>"><?php echo $user->rfc?></label></td>
                                        <td class="text-center">
                                            <button class="btn btn-info" data-backdrop="static" data-keyboard="false" onclick="asignarUser('<?php echo $user->id_empleado ?>')" data-toggle="modal" data-target="#AltaUser"><span class="fa fa-user"></span> ALTA</button>                                                               
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
<div class="modal fade" id="AltaUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form role="form" id="formAltaUser">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Alta Usuario</h4>        
                </div>
                <div class="modal-body">        
                    <input type="hidden" name="id" id="idEditar" value="">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-6">
                            <div class="form-group ">
                                <label for="nombreEdit">NOMBRE</label>
                                <input disabled type="text" name="nombre" id="nombreEdit" class="form-control " tabindex="2">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-6">
                            <div class="form-group ">
                                <label for="apellidoEdit">APELLIDO</label>
                                <input disabled type="text" name="apellido" id="apellidoEdit" class="form-control " tabindex="2">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-6">
                            <div class="form-group">
                                <label for="nombre">RFC</label>
                                <input disabled type="text" name="rfc" id="rfcEdit" class="form-control " tabindex="2">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-6">
                            <div class="form-group ">
                                <label for="tipo">TIPO USUARIO</label>
                                <select class="form-control " id="tipo" name="id_usuario" tabindex="1">
                                    <option value="" selected disabled hidden>Seleccione Tipo Usuario</option>
                                    <?php foreach ($tipos as $tipo): ?>
                                        <option value="<?php echo $tipo->id_usuario ?>"> <?php echo $tipo->tipo_usuario ?></option>
                                    <?php endforeach ?>                             
                                </select>
                            </div>
                        </div>                        
                        <div class="col-xs-12 col-sm-4 col-md-6">
                            <div class="form-group">
                                <label for="password">PASSWORD</label>
                                <input type="password" name="password" id="password" class="form-control " tabindex="3">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-6">
                            <div class="form-group">
                                <label for="cpassword">CONFIRMAR PASSWORD</label>
                                <input type="password" name="cpassword" id="cpassword" class="form-control " tabindex="4">
                            </div>
                        </div>
                    </div>                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"  onclick="cancelAltaUser()">Cancelar</button>
                    <button id="ladda_btn_altaUser" type="submit" class="ladda-button btn btn-primary" data-style="expand-left"  tabindex="5" onclick="saveAltaUser()">Guardar</button>
                </div>
            </form>
        </div>     
    </div>
</div>
