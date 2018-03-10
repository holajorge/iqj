<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <!-- SELECT PARA ESCOJER SI ES EMPLEADO REGISTRADO O UNO NUEVO --->
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-5">
                    <div class="form-group ">
                        <label for="tipo">¿EL NUEVO USUARIO EXISTE EN LA TABLA DE EMPLEADOS?</label>
                        <select class="form-control " id="tipo" name="usuario" tabindex="4" onchange="eventualoempleado(value)">
                            <option value="" selected disabled hidden>Seleccione</option>
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- FORMULARIO DE USUARIO NO REGISTRADO --->
            <div class="modal-content" id="eventualForm" style="display: none;">
                <form role="form" id="formAltaUserAdmin">
                    <div class="modal-header ">
                        <h4 class="modal-title text-success" id="myModalLabel">ALTA NUEVO USUARIO</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                <div class="form-group ">
                                    <label for="nombreEdit">NOMBRE</label>
                                    <input  type="text" name="nombre" id="nombreEdit" class="form-control " tabindex="1">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-5">
                                <div class="form-group ">
                                    <label for="apellidosEdit">APELLIDOS</label>
                                    <input  type="text" name="apellidos" id="apellidosEdit" class="form-control " tabindex="2">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-3">
                                <div class="form-group">
                                    <label for="nombre">RFC</label>
                                    <input  type="text" name="rfc" id="rfcEdit" class="form-control " tabindex="3" onblur="ValidaRfcSystem(this.value)">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                <div class="form-group ">
                                    <label for="tipo">TIPO USUARIO</label>
                                    <select class="form-control " id="tipo" name="usuario" tabindex="4">
                                        <option value="" selected disabled hidden>Seleccione</option>
                                        <?php foreach ($tipos as $tipo): ?>
                                            <option value="<?php echo $tipo->id_usuario ?>"> <?php echo ($tipo->tipo_usuario ==  "root") ? 'Root' : "Administrador (no edita)" ?></option>
                                        <?php endforeach ?>
                                    </select>
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
                        <button type="button" class="btn btn-default" data-dismiss="modal"  onclick="cancelAltaUserAdmin()">Cancelar</button>
                        <button id="ladda_btn_altaUserAdmin" type="submit" class="ladda-button btn btn-primary" data-style="expand-left"  tabindex="7" onclick="saveAltaUser()">Guardar</button>
                    </div>
                </form>
            </div>
            <!-- SE MUESTRA LA TABLA DE EMPLEADO REGISTRADO --->
            <div id="empleadoForm"  style="display: none;">

            </div>
        </div>
    </div>
</div>
<!-- MODAL DE ASIGNACION DE TIPO DE USUARIO Y CONTRASEÑA DE USUARIO REGISTRADO --->
<div class="modal fade" id="modalEmploye" role="dialog">
    <div class="modal-dialog modal-lg">
        <form role="form" id="form_alta_empleado_registrado">
            <div class="modal-content">
                <div class="modal-header ">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title text-success">ASIGNAR USUARIO</h3>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_empleado" id="idE" value="">
                    <div class="row">
                        <div class="col-sm-3 col-md-3 col-lg-2">
                            <label for="num_plaza">Num. Plaza</label>
                            <input disabled type="number" name="no_plaza" id="num_plazaE" class="form-control" tabindex="1">
                        </div>
                        <div class=" col-sm-4 col-md-4 col-lg-4">
                            <label for="nombre">Nombre</label>
                            <input disabled type="text" name="nombre" id="nombreE" class="form-control" tabindex="2">
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-6">
                            <label for="apellidos">Apellidos</label>
                            <input disabled type="text" name="apellidos" id="apellidosE" class="form-control" tabindex="3">
                        </div>
                        <div class=" col-sm-6 col-md-3">
                            <label for="rfc">RFC</label>
                            <input disabled type="text" name="rfc" id="rfcE" class="form-control" tabindex="5">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <p class="text-center text-danger" style="color: #4cae4c;">ASIGNAR UNA CONTRASEÑA DE ACCESO AL USUARIO</p>
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="form-group ">
                                <P for="tipo">TIPO USUARIO</P>
                                <select class="form-control " id="tipo" name="usuario" tabindex="4">
                                    <option value="" selected disabled hidden>Seleccione</option>
                                    <?php foreach ($tipos as $tipo): ?>
                                        <option value="<?php echo $tipo->id_usuario ?>"> <?php echo ($tipo->tipo_usuario ==  "root") ? 'Root' : "Administrador (no edita)" ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4" >
                            <p  for="passwordd">Contraseña Nueva</p>
                            <input type="password" name="password" id="passwordd" class="form-control">
                        </div>
                        <div class=" col-sm-4 col-md-4">
                            <p for="cpasswordd" >Confirme Contraseña Nueva</p>
                            <input type="password"  name="cpassword" id="confirmPasswordd" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="cancelEditPasswordEmploye()">Cancelar</button>
                    <button type="submit" id="btn_save_altaUser" class="ladda-button btn btn-primary" data-style="expand-left" tabindex="15">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>