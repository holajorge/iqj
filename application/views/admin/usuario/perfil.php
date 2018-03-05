<div class="row m-b-lg m-t-lg">
    <?php foreach ($info as $infomacion): ?>
    <div class="col-md-6">
        <div class="profile-image">

        </div>
        <div class="profile-info">
            <div class="">
                <div>
                    <h2 class="no-margins text-success">
                        <strong>
                            <?php echo $infomacion->nombre.' '. $infomacion->ap_paterno?>
                        </strong>
                    </h2>
                    <h4>Tipo Trabajador: <strong class=" wy-text-info"><?php echo $infomacion->trabajador ?></strong></h4>
                    <h4>Puesto: <strong  class=" wy-text-info"><?php echo $infomacion->puesto ?></strong></h4>
                    <h4>Departamento: <strong  class=" wy-text-info"><?php echo $infomacion->depto ?></strong></h4>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <table class="table small m-b-xs">
            <tbody>
            <tr>
                <td>
                   No Plaza: <strong class=" wy-text-info"> <?php echo $infomacion->no_plaza; ?></strong>
                </td>
                <td>
                    No Empleado:<strong  class=" wy-text-info"> <?php echo $infomacion->no_empleado; ?></strong>
                </td>
            </tr>
            <tr>
                <td>
                    RFC: <strong  class=" wy-text-info"><?php echo $infomacion->rfc; ?></strong>
                </td>
                <td>
                    CURP: <strong  class=" wy-text-info"><?php echo $infomacion->curp; ?></strong>
                </td>
            </tr>
            <tr>
                <td>
                   Tipo Usuario: <strong  class=" wy-text-info"> <?php echo $infomacion->tipo; ?> </strong>
                </td>
                <td>
                    <button class="btn btn-danger btn-rounded" onclick="showFormChange()"> <span class=" fa fa-edit"></span> Cambiar Contraseña</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <!-- <div class="col-md-3">
        <small>Sales in last 24h</small>
        <h2 class="no-margins">206 480</h2>
        <div id="sparkline1"></div>
    </div> -->
    <?php endforeach ?>
</div>

<div class="container" style="display: none;" id="showCambioPassword">
    
        <div class="text-center">
           <h3>Cambiar su Contraseña</h3>
         </div>
         <div class="col-lg-3 "> 
        </div>
        <div class="col-lg-5" style=" background: rgb(252,255,244);"> 
            <form id="formChangePassUser">
                <div class="form-group">
                      <label for="password" class="control-label">Contraseña Nueva</label>
                      <input type="password" class="form-control" name="password" id="pass">
                </div>
                <div class="form-group">
                      <label for="cpassword" class="control-label">Confirme Contraseña Nueva</label>
                      <input type="password" class="form-control" name="cpassword" id="confirmPassword">
                </div>               
                <div class="form-group">
                    <button type="button" class="btn btn-default" onclick="canselarCambioPassword()">Cancelar</button>
                    <button id="btn_cambiarPassword" type="submit" class="ladda-button btn btn-primary" ata-style="expand-left" onclick="changePassword()">Cambiar</button>
                </div>
            </form>
        </div>    
    
</div>