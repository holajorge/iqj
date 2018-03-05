<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <!-- <a type="button" class="col-lg-2 btn btn-primary pull-right" href="<?php echo base_url('User_ctrl/create'); ?>" >Registrar Usuario</a> -->
            <div class="modal-content">
                <form role="form" id="formAltaUserAdmin">
                    <div class="modal-header ">
                        <h4 class="modal-title text-success" id="myModalLabel">Alta Usuario</h4>
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
        </div>
    </div>
</div>
