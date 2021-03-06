<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <a type="button" class="col-lg-2 btn btn-primary pull-right" href="<?php echo base_url('Empleado_controller/create'); ?>" >Registrar Empleado</a> 
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" id="tabla_lista_empleados">
                            <thead>
                                <tr>
                                    <th>NO. PLAZA</th>
                                    <th>HORAS</th>
                                    <th>NSS</th>
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
                                        <td><label  id="horas<?php echo $empleado->id_empleado ?>"><?php echo  $empleado->horas ?></label></td>  
                                        <td><label  id="nss<?php echo $empleado->id_empleado ?>"><?php echo  $empleado->nss ?></label></td>  
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
                                            <button type="button" class="btn btn-success btn-rounded" onclick="habilitarEmpleado('<?php echo $empleado->id_empleado ?>','<?php echo $empleado->nombre_emp?>','<?php echo $empleado->ap_paterno?>' )"><span class="fa fa-heart"></span> Habilitar </button>                                                                                        
                                            <button  type="button" class="btn btn-info btn-rounded" onclick="editEmpleado('<?php echo $empleado->id_empleado ?>','<?php echo $empleado->nombre_depto?>','<?php echo $empleado->nombre_puesto?>','<?php echo $empleado->trabajador?>','<?php echo $empleado->componente?>')" data-toggle="modal" data-target="#editarEmpleado"><span class="glyphicon glyphicon-edit"></span> Editar</button>                                                               
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

<div class="modal fade" id="editarEmpleado" role="dialog">
    <div class="modal-dialog modal-lg">
     <form role="form" id="form_edit_empleado">     
      <div class="modal-content">
        <div class="modal-header ">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Editar Empleado</h3>
        </div>
        <div class="modal-body">        
                <input type="hidden" name="id" id="idEditar" value="">
                <div class="row">
                        <div class="col-sm-4 col-md-4">
                                <label for="num_plaza">Num. Plaza</label>
                                <input type="number" name="no_plaza" id="num_plazaEdit" class="form-control input-lg" tabindex="1">                             
                        </div>
                        <div class="col-sm-4 col-md-4">
                                <label for="horas">HORAS</label>
                                <input type="text" name="horas" id="horasEdit" class="form-control input-lg" tabindex="2">
                        </div> 
                        <div class="col-sm-4 col-md-4">
                                <label for="nss">NSS</label>
                                <input type="text" name="nss" id="nssEdit" class="form-control input-lg" tabindex="2">
                        </div>
                        <div class=" col-sm-6 col-md-6">
                                <label for="nombre">Nombre</label>                              
                                <input type="text" name="nombre" id="nombreEdit" class="form-control input-lg" tabindex="3">                                
                        </div>
                        <div class=" col-sm-6 col-md-6">
                                <label for="ape_paterno">Apellido Paterno</label>
                                <input type="text" name="ap_paterno" id="ap_paternoEdit" class="form-control input-lg" tabindex="4">                                
                        </div>
                        <div class=" col-sm-6 col-md-6">
                                <label for="ape_materno">Apellido Materno</label>
                                <input type="text" name="ap_materno" id="ap_maternoEdit" class="form-control input-lg" tabindex="5">                                
                        </div>
                        <div class=" col-sm-6 col-md-6">
                                <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                                <input type="date" name="fecha_nacimiento" id="fecha_nacimientoEdit" class="form-control input-lg" tabindex="6">                                                    
                        </div>
                        <div class=" col-sm-6 col-md-6">
                                <label for="fecha_ingreso">Fecha de Ingreso</label>
                                <input type="date" name="fecha_ingreso" id="fecha_ingresoEdit" class="form-control input-lg" tabindex="7">                              
                        </div>
                        <div class=" col-sm-6 col-md-6">
                                <label for="curp">CURP</label>
                                <input type="text" onblur="validarCrpEdit(this)" name="curp" id="curpEdit" class="form-control input-lg" tabindex="8" >                                           
                        </div>
                        <div class=" col-sm-6 col-md-6">
                                <label for="rfc">RFC</label>
                                <input type="text" name="rfc" onblur="ValidaRfcEdit(this.value)" id="rfcEdit" class="form-control input-lg" tabindex="9">
                        </div>
                        <div class=" col-sm-6 col-md-6 ">
                                <label for="no_empleado">Num. Empleado</label>
                                <input type="text" name="no_empleado" id="no_empleadoEdit" class="form-control input-lg" tabindex="10">                         
                        </div>
                        <div class=" col-sm-6 col-md-6">
                            <label for="deptoEdit">Departamento</label>
                            <select class="form-control input-lg" name="depto" tabindex="11" id="deptoID">                                                                    
                            </select>
                        </div>
                        <div class=" col-sm-6 col-md-6">
                            <label for="puesto">Puesto</label>
                            <select class="form-control input-lg" name="puesto" tabindex="12" id="puestoID">                                
                            </select>
                        </div>
                        <div class=" col-sm-6 col-md-6">
                            <label for="tipo_trabajador">Tipo Empleado</label>
                            <select class="form-control input-lg" name="tipo_trabajador" tabindex="13" id="trabajadorID">                                                                
                            </select>
                        </div> 
                        <div class=" col-sm-6 col-md-6">
                            <label for="componenteEmpleado">Componente</label>
                            <select class="form-control input-lg" name="componente" tabindex="14" id="componenteID">                                                                    
                            </select>
                        </div>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" id="btn_save_edit" class="ladda-button btn btn-primary" data-style="expand-left" tabindex="15" onclick="saveEditEmploye()">Guardar Cambios</button>
        </div>
      </div>
    </form>
    </div>
  </div>


