<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" id="tabla_lista_empleadosChangePass">
                            <thead>
                            <tr>
                                <th>NO. PLAZA</th>
                                <th>NOMBRE</th>
                                <th>AP. PATERNO</th>
                                <th>AP. MATERNO</th>
                                <th>FECHA NACIMIENTO</th>
                                <th>INGRESO</th>
                                <th>DEPARTAMENTO</th>
                                <th>PUESTO</th>
                                <th>RFC</th>
                                <th>CURP</th>
                                <th>Nu Empleado</th>
                                <th>TIPO T</th>
                                <th>Componente</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if ($empleados != null ):  ?>
                                <?php foreach ($empleados as $empleado): ?>
                                    <tr class="gradeX" >
                                        <td><label  id="no_plaza<?php echo $empleado->id_empleado ?>"><?php echo  $empleado->no_plaza ?></label></td>
                                        <td><label  id="nombre_emp<?php echo $empleado->id_empleado ?>"><?php echo $empleado->nombre_emp?></label></td>
                                        <td><label  id="ap_paterno<?php echo $empleado->id_empleado ?>"><?php echo  $empleado->ap_paterno ?></label></td>
                                        <td><label  id="ap_materno<?php echo $empleado->id_empleado ?>"><?php echo $empleado->ap_materno?></label></td>
                                        <td><label  id="fecha_nacimiento<?php echo $empleado->id_empleado ?>"><?php echo  $empleado->fecha_nacimiento ?></label></td>
                                        <td><label  id="fecha_ingreso<?php echo $empleado->id_empleado ?>"><?php echo  $empleado->fecha_ingreso ?></label></td>
                                        <td><label  id="nombre_depto"> <?php echo $empleado->nombre_depto?> </label></td>
                                        <td><label  id="nombre_puesto"> <?php echo $empleado->nombre_puesto?> </label></td>
                                        <td><label  id="rfc<?php echo $empleado->id_empleado ?>"><?php echo $empleado->rfc?></label></td>
                                        <td><label  id="curp<?php echo $empleado->id_empleado ?>"><?php echo $empleado->curp?></label></td>
                                        <td><label  id="no_empleado<?php echo $empleado->id_empleado ?>"><?php echo $empleado->no_empleado?></label></td>
                                        <td><label  id="trabajador"> <?php echo $empleado->trabajador?></label></td>
                                        <td><label  id="componente"> <?php echo $empleado->componente?></label></td>
                                        <td class="text-center">
                                            <button  type="button" class="btn btn-info btn-rounded" data-backdrop="static"  data-keyboard="false" onclick="editEmpleadoChangePass('<?php echo $empleado->id_empleado ?>','<?php echo $empleado->no_plaza?>','<?php echo $empleado->nombre_emp?>','<?php echo $empleado->ap_paterno?>','<?php echo $empleado->ap_materno?>','<?php echo $empleado->rfc?>')" data-toggle="modal" data-target="#editarEmpleadoChangePassword"><span class="glyphicon glyphicon-edit"></span> Editar</button>
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

<div class="modal fade" id="editarEmpleadoChangePassword" role="dialog">
    <div class="modal-dialog modal-lg">
        <form role="form" id="form_edit_empleadoChangePAssword">
            <div class="modal-content">
                <div class="modal-header ">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title text-success">EDITAR PASSWORD EMPLEADO</h3>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_empleado" id="idEditarEmpleado" value="">
                    <div class="row">
                        <div class="col-sm-3 col-md-3 col-lg-2">
                            <label for="num_plaza">Num. Plaza</label>
                            <input disabled type="number" name="no_plaza" id="num_plazaEditEmpleado" class="form-control" tabindex="1">
                        </div>
                        <div class=" col-sm-4 col-md-4 col-lg-4">
                            <label for="nombre">Nombre</label>
                            <input disabled type="text" name="nombre" id="nombreEditEmpleado" class="form-control" tabindex="2">
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-6">
                            <label for="apellidos">Apellidos</label>
                            <input disabled type="text" name="apellidos" id="apellidosEditEmpleado" class="form-control" tabindex="3">
                        </div>
                        <div class=" col-sm-6 col-md-3">
                            <label for="rfc">RFC</label>
                            <input disabled type="text" name="rfc" id="rfcEditEmpleado" class="form-control" tabindex="5">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-offset-1 col-lg-10">
                            <legend>
                                <p class="text-center text-danger" style="color: #4cae4c; font-size: 15px">ASIGNAR UNA CONTRASEÑA NUEVA AL EMPLEADO</p>
                                <div class="col-sm-6 col-md-6" style=" margin-top: 10px" >
                                    <p style="font-size: 16px" for="passwordd">Contraseña Nueva</p>
                                    <input type="password" name="password" id="passs" class="form-control">
                                </div>
                                <div class=" col-sm-6 col-md-6" style=" margin-top: 10px">
                                    <p style="font-size: 16px" for="cpasswordd" >Confirme Contraseña Nueva</p>
                                    <input type="password"  name="cpassword" id="confirmPasswordd" class="form-control">
                                </div>
                            </legend>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="cancelEditPasswordEmploye()">Cancelar</button>
                    <button type="submit" id="btn_save_changePassword" class="ladda-button btn btn-primary" data-style="expand-left" tabindex="15" onclick="saveChangePasswordEmploye()">Guardar Cambios</button>
                </div>
            </div>
        </form>
    </div>
</div>



