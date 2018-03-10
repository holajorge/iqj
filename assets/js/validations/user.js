$(document).ready(function() {
    inicalizarDataTable("tabla_lista_empleadosChangePass");
});
function eventualoempleado(eventualoempleado){

    if(eventualoempleado == "si"){
        $("#formAltaUserAdmin")[0].reset();
        $("#eventualForm").css('display', 'none');
        $.ajax({
            type: "GET",
            url:baseURL + "User_ctrl/getInfoEmploye",
            success: function(respuesta) {
                var obj = JSON.parse(respuesta);
                if (obj.resultado === true) {
                    var html = "";
                    html += "<h4 class='text-success'>ALTA USUARIO REGISTRADO</h4>";
                    html += "<table class='table table-bordered table-striped' id='miTablaEmpleadoAltaRoot'>";
                        html += "<thead>";
                        html += "<tr>";
                            html += "<th class='text-center'>NO. PLAZA </th>";
                            html += "<th>RFC</th>";
                            html += "<th>NOMBRE</th>";
                            html += "<th>APELLIDOS</th>";
                            html += "<th class='text-center'>ACCIONES</th>";
                        html += "</tr>";
                    html += "</thead>";
                    html += "<tbody>";
                    var num_fila = 1;
                    for (l in obj.informacionEmpleado) {
                        html += "<tr>";
                            html += "<td class='text-center'><label  id='no_plaza'>" + obj.informacionEmpleado[l].no_plaza + "</td>";
                            html += "<td><label  id='rfc'> " + obj.informacionEmpleado[l].rfc +"</label></td>";
                            html += "<td><label  id='nombre'>" + obj.informacionEmpleado[l].nombre +"</label></td>";
                            html += "<td><label  id='apellidos'>" + obj.informacionEmpleado[l].ap_paterno +' '+ obj.informacionEmpleado[l].ap_materno +"</label></td>";
                            html += "<td class='text-center'>";
                                html += "<button class='btn btn-info' data-backdrop='static'  data-keyboard='false'  data-toggle='modal' data-target='#modalEmploye' onclick='altaUserRegister(\"" + obj.informacionEmpleado[l].id_empleado + "\",\"" + obj.informacionEmpleado[l].no_plaza + "\", \"" + obj.informacionEmpleado[l].rfc + "\", \"" + obj.informacionEmpleado[l].nombre + "\", \"" + obj.informacionEmpleado[l].ap_paterno + "\", \"" + obj.informacionEmpleado[l].ap_materno + "\") '> <span class='glyphicon glyphicon-upload'></span>Alta User</button>";
                            html += "</td>";
                        html += "</tr>";
                        num_fila ++;
                    }
                    html += "</tbody>";
                    html += "</table>";
                    $("#empleadoForm").css('display', 'block');
                    $("#empleadoForm").html(html);
                    inicalizarDataTable("miTablaEmpleadoAltaRoot");
                }
            }
        });
    }else{
        $("#empleadoForm").css('display', 'none');
        $("#eventualForm").css('display', 'block');
    }
}
function altaUserRegister(id_empleado,numero, rfc, nombre, paterno, materno) {

    document.getElementById("idE").value=id_empleado;
    document.getElementById("num_plazaE").value=numero;
    document.getElementById("rfcE").value=rfc;
    document.getElementById("nombreE").value=nombre;
    document.getElementById("apellidosE").value=paterno + ' ' + materno;

    $("#form_alta_empleado_registrado").validate({
        rules: {
            usuario:{required: true},
            password: 	{required: true},
            cpassword:  {required: true}
        },
        messages: {
            usuario: "Seleccione el tipo de usuario",
            password: 	"Nuevo password Necesario",
            cpassword:  "Confirmar password Necesario"
        },
        submitHandler: function(){
            var pass = $("#passwordd").val();
            var confirmar = $("#confirmPasswordd").val();
            var re = /^(?=\w*[A-Z])([a-zA-ZÁáÀàÉéÈèÍíÌìÓóÒòÚúÙùÑñüÜ0-9!@#\$%\^&\*\?_~\/]){8,16}$/;
            var dataString = $("#form_alta_empleado_registrado").serialize();
            if (re.test(pass) ) {
                if (pass == confirmar) {
                    var l = $("#btn_save_altaUser").ladda();
                    l.ladda('start');
                    $.ajax({
                        type: "POST",
                        url:baseURL + "User_ctrl/createUsuarioRegistrado",
                        data: dataString,
                        success: function(respuesta) {
                            var obj = JSON.parse(respuesta);
                            if (obj.resultado === true) {
                                $("#form_alta_empleado_registrado")[0].reset();
                                $("#modalEmploye").modal('hide');
                                //Mensaje de operación realizada con éxito
                                setTimeout(function() {
                                    toastr.options = {
                                        closeButton: true,
                                        progressBar: true,
                                        showMethod: 'slideDown',
                                        timeOut: 4000
                                    };
                                    l.ladda('stop');
                                    toastr.success('Usuario Creado Correctamente', 'DATOS GUARDADOS');
                                }, 1300);
                            }
                        }
                    });
                }else{
                    swal("Upps..!", "LAS CONTRASEÑAS NO COICIDEN! :( ", "error");
                }
            }else{
                swal("Upps..!", "La Contraseña debe tener como minimo 8 caracteres y maximo de 16, minimo una letra Mayúscula, minimo una minúscula y números ", "error");
                return false;
            }
        }
    });

}
function saveAltaUser(){	
  
	$("#formAltaUserAdmin").validate({
      rules: {
        nombre: {required: true},
        apellidos: {required: true},
        rfc:{required: true},
        usuario:{required: true},
        password: 	{required: true},
        cpassword:  {required: true}
      },
      messages: {
        nombre : "Nombre es necesario",
        apellidos: "Ingrese apellidos",
        usuario: "Seleccione el tipo de usuario",
        rfc: "RFC necesario",
        password: 	"Nuevo password Necesario",
        cpassword:  "Confirmar password Necesario"
      },
      submitHandler: function(){
      		var pass = $("#password").val();
            var confirmar = $("#cpassword").val();
            var re = /^(?=\w*[A-Z])([a-zA-ZÁáÀàÉéÈèÍíÌìÓóÒòÚúÙùÑñüÜ0-9!@#\$%\^&\*\?_~\/]){8,16}$/;
            var dataString = $("#formAltaUserAdmin").serialize();
          if (re.test(pass) ) {
              if (pass == confirmar) {
                var l = $("#ladda_btn_altaUserAdmin").ladda();
                l.ladda('start'); 
                $.ajax({
                  type: "POST",
                  url:baseURL + "User_ctrl/createUserNoRegistrado",
                  data: dataString,
                  success: function(respuesta) {
                    var obj = JSON.parse(respuesta);
                      if (obj.resultado === true) {
                          $("#formAltaUserAdmin")[0].reset();
                           //Mensaje de operación realizada con éxito
                            setTimeout(function() {
                                toastr.options = {
                                    closeButton: true,
                                    progressBar: true,
                                    showMethod: 'slideDown',
                                    timeOut: 4000
                                };
                            l.ladda('stop');
                            toastr.success('Usuario Creado Correctamente', 'DATOS GUARDADOS');
                        }, 1300);                                        
                      }
                  } 
                });
              }else{
                swal("Upps..!", "LAS CONTRASEÑAS NO COICIDEN! :( ", "error");
              }
          }else{
              swal("Upps..!", "La Contraseña debe tener como minimo 8 caracteres y maximo de 16, minimo una letra Mayúscula, minimo una minúscula y números ", "error");
              return false;
          }	      	
      }
    });
}
function ValidaRfcSystem(rfcStr) {

    var strCorrecta;
    strCorrecta = rfcStr;
    if (rfcStr.length == 12 ){
        var valid = '^(([A-Z]|[a-z]){3})([0-9]{6})((([A-Z]|[a-z]|[0-9]){3}))';
    }else{
        var valid = '^(([A-Z]|[a-z]|\s){1})(([A-Z]|[a-z]){3})([0-9]{6})((([A-Z]|[a-z]|[0-9]){3}))';
    }
    if (rfcStr.length > 13 ){
        var valid = '^(([A-Z]|[a-z]){3})([0-9]{6})((([A-Z]|[a-z]|[0-9]){3}))';
    }else{
        var valid = '^(([A-Z]|[a-z]|\s){1})(([A-Z]|[a-z]){3})([0-9]{6})((([A-Z]|[a-z]|[0-9]){3}))';
    }
    var validRfc=new RegExp(valid);
    var matchArray=strCorrecta.match(validRfc);

    if (matchArray==null) {
        sweetAlert("RFC NO VALIDA","VULVA A INTENTAR","error");
        $("#ladda_btn_altaUser").attr("disabled", true);
        return false;
    }
    else
    {
        $("#ladda_btn_altaUser").attr("disabled", false);
        // alert('Cadena correcta:' + strCorrecta);
        // sweetAlert("CAMPO SOLOA","VULVA A INTENTAR","error");
        return true;
    }
}
function showFormChange(){
	$("#showCambioPassword").css('display', 'block');
}
function cancelAltaUser(){
	$("#formAltaUser")[0].reset();
}
function cancelAltaUserAdmin(){
    $("#formAltaUserAdmin")[0].reset();
}
function cancelEditPasswordEmploye(){
    $("#form_edit_empleadoChangePAssword")[0].reset();
}
function cancelEditUSerAdmin(){
    $("#formUserSystemaEditar")[0].reset();
}
function canselarCambioPassword(){
	$("#formChangePassUser")[0].reset();
	$("#showCambioPassword").css('display', 'none');
}
function cancelEditEmpleadoRegistrado() {
    $("#formUserEmpleadosEditar")[0].reset();
}
function changePassword(){	
	$("#formChangePassUser").validate({
      rules: {
        password: { required: true},
        cpassword: { required: true},            
      },  
      messages: {
        password: "Nuevo password Necesario",
        cpassword: "Confirmar passowrd Necesario"           
      },
      submitHandler: function(){
      		var pass = $("#pass").val();
            var confirmar = $("#confirmPassword").val();
            var re = /^(?=\w*[A-Z])([a-zA-ZÁáÀàÉéÈèÍíÌìÓóÒòÚúÙùÑñüÜ0-9!@#\$%\^&\*\?_~\/]){8,16}$/;
          if (re.test(pass) ) {
              if (pass == confirmar) {     
                  var l = $("#btn_cambiarPassword").ladda();
                  l.ladda('start');       
                  $.ajax({
                      type: "POST",
                      url:baseURL + "User_ctrl/changePasswordUser",
                      data: {password: pass},
                      success: function(respuesta) {
                        var obj = JSON.parse(respuesta);
                          if (obj.resultado === true) {                      
                            l.ladda('stop'); 
                              $("#formChangePassUser")[0].reset();
                              $("#showCambioPassword").modal('hide');
                               //Mensaje de operación realizada con éxito
                                setTimeout(function() {
                                    toastr.options = {
                                        closeButton: true,
                                        progressBar: true,
                                        showMethod: 'slideDown',
                                        timeOut: 1200
                                    };
                                l.ladda('stop');
                                toastr.success('Su Contraseña fue Cambiada Corectamente', 'DATOS GUARDADOS');   
                                $("#showCambioPassword").css('display', 'none');                
                            }, 1300);
                          }
                      } 
                  });
              }else{
                swal("Upps..!", "LAS CONTRASEÑAS NO COICIDEN! :( ", "error");
              }
          }else{
              swal("Upps..!", "La Contraseña debe tener como minimo 8 caracteres y maximo de 16, minimo una letra Mayúscula, minimo una minúscula y números ", "error");
              return false;
          }	      	
      }
    });
}
function deshabilitarUser(id, nombre){

  var name = "<p><strong>"+nombre+"</strong><p>";
  var text = "<h3>¿SEGURO DE DESHABILITAR USUARIO?</h3>";
  swal({
      title: text+name,            
       type: "warning",
       showCancelButton: true,
       html: true,
       confirmButtonColor: "#DD6B55",
       confirmButtonText: "SI, DESHABILITAR AHORA!",
       closeOnConfirm: false
     }, function (isConfirm) {
      if (!isConfirm) return;
          $.ajax({
            url: baseURL + "User_ctrl/deshabilitar_user",
            type: "POST",
            data: {id: id},
            dataType: "html",
            success: function () {
              swal("Hecho!", "USUARIO CORRECTAMENTE DESHABILITADA!", "success");
              setTimeout(function() {
                window.location.href = baseURL+"User_ctrl/lista";
              }, 2000);
            },
            error: function (xhr, ajaxOptions, thrownError) {
              swal("Error deleting!", "Please try again", "error");
            }
        });
    });
}
function habilitarUser(id,nombre){
    var name = "<p><strong>"+nombre+"</strong><p>";
    var text = "<h3>¿SEGURO DE HABILITAR USUARIO?</h3>";
    swal({
        title: text+name,            
         type: "warning",
         html:true,
         showCancelButton: true,
         confirmButtonColor: "#DD6B55",
         confirmButtonText: "SI, HABILITAR AHORA!",
         closeOnConfirm: false
       }, function (isConfirm) {
        if (!isConfirm) return;
            $.ajax({
              url: baseURL + "User_ctrl/habilitar_User",
              type: "POST",
              data: {id: id},
              dataType: "html",
              success: function () {
                swal("Hecho!", "USUARIO HABILITADO CORRECTAMENTE!", "success");
                setTimeout(function() {
                  window.location.href = baseURL+"User_ctrl/lista";
                }, 2000);
              },
              error: function (xhr, ajaxOptions, thrownError) {
                swal("ERROR DETECTADO!", "INTENTE DE NUEVO", "error");
              }
            });
    });
}
function deshabilitarUserEmpleado(id){
    //var name = "<p><strong>"+nombre+"</strong><p>";
    var text = "<h3>¿SEGURO DE DESHABILITAR USUARIO?</h3>";
    swal({
        title: text,
        type: "warning",
        showCancelButton: true,
        html: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "SI, DESHABILITAR AHORA!",
        closeOnConfirm: false
    }, function (isConfirm) {
        if (!isConfirm) return;
        $.ajax({
            url: baseURL + "User_ctrl/deshabilitar_userEmpleado",
            type: "POST",
            data: {id: id},
            dataType: "html",
            success: function () {
                swal("Hecho!", "USUARIO CORRECTAMENTE DESHABILITADA!", "success");
                setTimeout(function() {
                    window.location.href = baseURL+"User_ctrl/lista";
                }, 2000);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                swal("Error detectado!", "porfavor intenta de nuevo", "error");
            }
        });
    });
}
function habilitarUserEmpleado(id){
    //var name = "<p><strong>"+nombre+"</strong><p>";
    var text = "<h3>¿SEGURO DE HABILITAR USUARIO?</h3>";
    swal({
        title: text+name,
        type: "warning",
        html:true,
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "SI, HABILITAR AHORA!",
        closeOnConfirm: false
    }, function (isConfirm) {
        if (!isConfirm) return;
        $.ajax({
            url: baseURL + "User_ctrl/habilitar_UserEmpleado",
            type: "POST",
            data: {id: id},
            dataType: "html",
            success: function () {
                swal("Hecho!", "USUARIO HABILITADO CORRECTAMENTE!", "success");
                setTimeout(function() {
                    window.location.href = baseURL+"User_ctrl/lista";
                }, 2000);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                swal("ERROR DETECTADO!", "INTENTE DE NUEVO", "error");
            }
        });
    });
}

function editarUserSystem(id, nombre, apellidos, rfc, usuario) {

    document.getElementById("idEditar").value=id;
    document.getElementById("nombreEditar").value=nombre;
    document.getElementById("apellidosEditar").value=apellidos;
    document.getElementById("rfcEditar").value=rfc;
    $.ajax({
        type: "GET",
        url:baseURL + "User_ctrl/obtirneRolesUsers",
        success: function(respuesta) {
            var obj = JSON.parse(respuesta);
            if (obj.resultado === true) {
                var html = "";
                html += "<div class='form-group'>";
                html += "<label for='tipo'>Tipo de Usuario</label>";
                html +=  "<select class='form-control' id='tipoUserIndependiente' name='usuario' tabindex='4'>";
                html +=  "<option value='' selected disabled hidden>Seleccione</option>";
                var num_fila = 1;
                for (l in obj.usuarios) {
                    if (obj.usuarios[l].tipo_usuario == usuario) {
                        html +=  "<option value='"+ obj.usuarios[l].id_usuario +"' selected>" + obj.usuarios[l].tipo_usuario +"</option>" ;
                    }else{
                        html +=  "<option value='"+ obj.usuarios[l].id_usuario +"'>" + obj.usuarios[l].tipo_usuario +"</option>" ;
                    }
                    num_fila ++;
                }
                html +=  "</select>";
                html += "</div>";
                $("#selectTipoUserIndependiente").html(html);
            }
        }
    });
    $("#formUserSystemaEditar").validate({
        rules: {
            password: { required: true},
            cpassword: { required: true}
        },
        messages: {
            password: "Nuevo password Necesario",
            cpassword: "Confirmar passowrd Necesario"
        },
        submitHandler: function(){
            var pass = $("#password").val();
            var confirmar = $("#cpassword").val();
            var nombre = $("#nombreEditar").val();
            var apellidos = $("#apellidosEditar").val();
            var rfc = $("#rfcEditar").val();
            var usuario = $("#tipoUserIndependiente").val();

            var re = /^(?=\w*[A-Z])([a-zA-ZÁáÀàÉéÈèÍíÌìÓóÒòÚúÙùÑñüÜ0-9!@#\$%\^&\*\?_~\/]){8,16}$/;
            if (re.test(pass) ) {
                if (pass == confirmar) {
                    var l = $("#ladda_btn_editUserAdmin").ladda();
                    l.ladda('start');
                    $.ajax({
                        type: "POST",
                        url:baseURL + "User_ctrl/changePasswordUserSystema",
                        data: {id: id, rfc: rfc, nombre: nombre, apellidos:apellidos, password: pass, usuario: usuario},
                        success: function(respuesta) {
                            var obj = JSON.parse(respuesta);
                            if (obj.resultado === true) {
                                l.ladda('stop');
                                $("#formUserSystemaEditar")[0].reset();
                                $("#editarUserSystem").modal('hide');
                                //Mensaje de operación realizada con éxito
                                setTimeout(function() {
                                    toastr.options = {
                                        closeButton: true,
                                        progressBar: true,
                                        showMethod: 'slideDown',
                                        timeOut: 1200
                                    };
                                    l.ladda('stop');
                                    toastr.success('Su Contraseña fue Cambiada Corectamente', 'DATOS GUARDADOS');
                                    setTimeout(function() {
                                        window.location.href = baseURL + "User_ctrl/lista";
                                    }, 1300);
                                }, 1300);
                            }
                        }
                    });
                }else{
                    swal("Upps..!", "LAS CONTRASEÑAS NO COICIDEN! :( ", "error");
                }
            }else{
                swal("Upps..!", "La Contraseña debe tener como minimo 8 caracteres y maximo de 16, minimo una letra Mayúscula, minimo una minúscula y números ", "error");
                return false;
            }
        }
    });
}
function editarUserEmpleado(id) {

    var nombre=document.getElementById("nombree"+id).innerHTML;
    var rfc=document.getElementById("rfc"+id).innerHTML;
    var apellidos=document.getElementById("apellidos"+id).innerHTML;
    var usuario=document.getElementById("usuario"+id).innerHTML;

    document.getElementById("idEditarEm").innerHTML=id+"";
    document.getElementById("idEditarEm").value=id;
    document.getElementById("nombreEditarEm").value=nombre;
    document.getElementById("apellidosEditarEm").value=apellidos;
    document.getElementById("rfcEditarEm").value=rfc;

    $.ajax({
        type: "GET",
        url:baseURL + "User_ctrl/obtirneRolesUsers",
        success: function(respuesta) {
            var obj = JSON.parse(respuesta);
            if (obj.resultado === true) {
                var html = "";
                    html += "<div class='form-group'>";
                    html += "<label for='tipo'>Tipo de Usuario</label>";
                    html +=  "<select class='form-control' id='tipoUser' name='usuario' tabindex='4'>";
                    html +=  "<option value='' selected disabled hidden>Seleccione</option>";
                    var num_fila = 1;
                    for (l in obj.usuarios) {
                        if (obj.usuarios[l].tipo_usuario == usuario) {
                            html +=  "<option value='"+ obj.usuarios[l].id_usuario +"' selected>" + obj.usuarios[l].tipo_usuario +"</option>" ;
                        }else{
                            html +=  "<option value='"+ obj.usuarios[l].id_usuario +"'>" + obj.usuarios[l].tipo_usuario +"</option>" ;
                        }
                        num_fila ++;
                    }
                    html +=  "</select>";
                    html += "</div>";
                $("#selectTipoUser").html(html);
            }
        }
    });

    $("#formUserEmpleadosEditar").validate({
        rules: {
            password: { required: true},
            cpassword: { required: true}
        },
        messages: {
            password: "Nuevo password Necesario",
            cpassword: "Confirmar passowrd Necesario"
        },
        submitHandler: function(){
            var pass = $("#passwordEmpleadoEdit").val();
            var confirmar = $("#cpasswordEmpleadoEdit").val();

            var re = /^(?=\w*[A-Z])([a-zA-ZÁáÀàÉéÈèÍíÌìÓóÒòÚúÙùÑñüÜ0-9!@#\$%\^&\*\?_~\/]){8,16}$/;
            if (re.test(pass) ) {
                if (pass == confirmar) {
                    var l = $("#ladda_btn_saveEditEmpleado").ladda();
                    var dataString = $("#formUserEmpleadosEditar").serialize();
                    l.ladda('start');
                    $.ajax({
                        type: "POST",
                        url:baseURL + "User_ctrl/editar_usuario_empleado",
                        data: dataString,
                        success: function(respuesta) {
                            var obj = JSON.parse(respuesta);
                            if (obj.resultado === true) {
                                l.ladda('stop');
                                $("#formUserEmpleadosEditar")[0].reset();
                                $("#editarUserEmpleadosModal").modal('hide');
                                //Mensaje de operación realizada con éxito
                                setTimeout(function() {
                                    toastr.options = {
                                        closeButton: true,
                                        progressBar: true,
                                        showMethod: 'slideDown',
                                        timeOut: 1200
                                    };
                                    l.ladda('stop');
                                    toastr.success('Los Datos Se actualizaron correctamente', 'DATOS GUARDADOS');
                                    setTimeout(function() {
                                        window.location.href = baseURL + "User_ctrl/lista";
                                    }, 1300);
                                }, 1300);
                            }
                        }
                    });
                }else{
                    swal("Upps..!", "LAS CONTRASEÑAS NO COICIDEN! :( ", "error");
                }
            }else{
                swal("Upps..!", "La Contraseña debe tener como minimo 8 caracteres y maximo de 16, minimo una letra Mayúscula, minimo una minúscula y números ", "error");
                return false;
            }
        }
    });

}

function serach_periodos_admin(anio){
    $("#resultado_periodo_admin").html("");
    var mesess = ['Enero','Febrero', 'Marzo','Abril','Mayo', 'Junio','Julio', 'Agosto', 'Septiembre', 'Octubre','Noviembre','Diciembre'];
    $.ajax({
        url: baseURL + "Files_employee/buscar_periodo_file",
        type: "POST",
        data: {anio: anio},
        success: function(respuesta) {
            console.log(respuesta);
            var obj = JSON.parse(respuesta);
            if (obj.resultado === true) {
                var html = "";
                html += "<p style='text-align: center; color: #4cae4c; font-size: 16px; font-family: Aria; margin: 0'>" +"RECIBOS DE NÓMINA DEÑ AÑO " + ' ' + "<strong style='color: red'>"+ anio +"</strong></p>";
                html += "<table class='table table-bordered table-striped' id='miTablaAdmin'>";
                html += "<thead>";
                html += "<tr >";
                html += "<th style='text-align: center'>MES</th>";
                html += "<th style='text-align: center'>Primera Quincena</th>";
                html += "<th style='text-align: center'>Segunda Quincena</th>";
                html += "<th style='text-align: center'>EXTRAORDINARIA</th>";
                html += "</tr>";
                html += "</thead>";
                html += "<tbody>";
                var num_fila = 1;
                for (l in obj.archivos) {
                    var mes = obj.archivos[l]['mes'];
                    var quincena1 = obj.archivos[l]['primeraQuincena'] == false;
                    var quincena2 = obj.archivos[l]['segundaQuincena'] == false;
                    //var file_name = obj.archivos[l]['segundaQuincena'][0].file_name;
                    //console.log(file_name);
                    console.log(quincena1);
                    console.log(quincena2);
                    html += "<tr class='text-center'>";
                    html += "<td>" +  mesess[mes-1] +"</td>";
                    html += "<td>";
                    if(quincena1){
                        html += "<p style='color: darkblue; text-align: center'>ESTA NÓMINA NO SE HA TIMBRADO AUN </p>";
                    }else{
                        html += "<a style='margin: 1px 1px' class='btn btn-success'  href=' "+baseURL +"Files_employee/download_pdf?file_name="+obj.archivos[l]['primeraQuincena'][0].file_name+"' > <span class='fa fa-file-pdf-o' aria-hidden='true'></span> PDF</a>";
                        html += "<a style='margin: 1px 1px' class='btn btn-info'  href=' "+baseURL +"Files_employee/download_xml?file_name="+obj.archivos[l]['primeraQuincena'][0].file_name+"'>  <span class='fa fa-file-excel-o' aria-hidden='true'></span> XML</a>";
                    }
                    html += "</td>";
                    html += "<td>";
                    if(quincena2){
                        html += "<p style='color: darkblue; text-align: center'>ESTA NÓMINA NO SE HA TIMBRADO AUN </p>";
                    }else{
                        html += "<a style='margin: 1px 1px' class='btn btn-success'  href=' "+baseURL +"Files_employee/download_pdf?file_name="+obj.archivos[l]['segundaQuincena'][0].file_name+"' > <span class='fa fa-file-pdf-o' aria-hidden='true'></span> PDF</a>";
                        html += "<a style='margin: 1px 1px' class='btn btn-info'  href=' "+baseURL +"Files_employee/download_xml?file_name="+obj.archivos[l]['segundaQuincena'][0].file_name+"'>  <span class='fa fa-file-excel-o' aria-hidden='true'></span> XML</a>";
                    }
                    html += "</td>";
                    html += "<td>";
                    html += "<p style='color: firebrick'> EN CONSTRUCCIÓN <span class='fa fa-life-bouy'></span> </p>";
                    html += "</td>";
                    html += "</tr>";
                    num_fila ++;
                }
                html += "</tbody>";
                html += "</table>";
                $("#resultado_periodo_admin").css('display', 'block');
                $("#resultado_periodo_admin").html(html);
                inicalizarDataTable("miTablaAdmin");
            }else{
                var html1 = "";
                html1 += "<p style='text-align: center; color: red; font-size: 16px; font-family: Aria'>" +"NO HAY RECIBOS EN ESTE AÑO" + ' ' + anio +"</p>";
                $("#resultado_periodo_admin").css('display', 'block');
                $("#resultado_periodo_admin").html(html1);
            }
        }
    });
}
function editEmpleadoChangePass(id_empleado, numero, nombre, paterno, materno, rfc){
    document.getElementById("idEditarEmpleado").value=id_empleado;
    document.getElementById("num_plazaEditEmpleado").value=numero;
    document.getElementById("nombreEditEmpleado").value=nombre;
    document.getElementById("apellidosEditEmpleado").value=paterno + ' ' + materno;
    document.getElementById("rfcEditEmpleado").value=rfc;
}
function saveChangePasswordEmploye() {
    var id_employe = $("#idEditarEmpleado").val();

    $("#form_edit_empleadoChangePAssword").validate({
        rules: {
            password: 	{required: true},
            cpassword:  {required: true}
        },
        messages: {
            password: 	"Nuevo password Necesario",
            cpassword:  "Confirmar password Necesario"
        },
        submitHandler: function(){

            var pass = $("#passs").val();
            var confirmar = $("#confirmPasswordd").val();
            var re = /^(?=\w*[A-Z])([a-zA-ZÁáÀàÉéÈèÍíÌìÓóÒòÚúÙùÑñüÜ0-9!@#\$%\^&\*\?_~\/]){8,16}$/;
            var dataString = $("#form_edit_empleadoChangePAssword").serialize();
            if (re.test(pass) ) {
                if (pass == confirmar) {
                    var l = $("#btn_save_changePassword").ladda();
                    l.ladda('start');
                    $.ajax({
                        type: "POST",
                        url:baseURL + "User_ctrl/recovery_password_employe",
                        data: dataString,
                        success: function(respuesta) {
                            var obj = JSON.parse(respuesta);
                            if (obj.resultado === true) {
                                $("#form_edit_empleadoChangePAssword")[0].reset();
                                $("#editarEmpleadoChangePassword").modal('hide');
                                //Mensaje de operación realizada con éxito
                                setTimeout(function() {
                                    toastr.options = {
                                        closeButton: true,
                                        progressBar: true,
                                        showMethod: 'slideDown',
                                        timeOut: 4000
                                    };
                                    l.ladda('stop');
                                    toastr.success('La contraseña del Empleado esta correctamente Actualizada', 'DATOS GUARDADOS');
                                }, 1300);
                            }
                        }
                    });
                }else{
                    swal("Upps..!", "LAS CONTRASEÑAS NO COICIDEN! :( ", "error");
                }
            }else{
                swal("Upps..!", "La Contraseña debe tener como minimo 8 caracteres y maximo de 16, minimo una letra Mayúscula, minimo una minúscula y números ", "error");
                return false;
            }
        }
    });
}
function tipoUsuarios(tipo) {
    if(tipo == "si"){
        $("#usaurioIndependiente").css('display', 'none');
        $("#UsuariosTablaEmpleados").css('display', 'block');
        $.ajax({
            type: "GET",
            url:baseURL + "User_ctrl/getUsuariosEmpleados",
            success: function(respuesta) {
                var obj = JSON.parse(respuesta);
                if (obj.resultado === true) {
                    var html = "";
                    html += "<p class='text-success inline' style='font-size: 16px;'>Usuarios / Empleados </p>";
                    html += "<div class='ibox-content'>";
                    html += "<div class='table-responsive'>";
                        html += "<table class='table table-bordered table-striped' id='miTablaEmpleadoSystemLista'>";
                            html += "<thead>";
                            html += "<tr>";
                                html += "<th class='text-center'>NO. PLAZA </th>";
                                html += "<th>RFC</th>";
                                html += "<th>NOMBRE</th>";
                                html += "<th>APELLIDOS</th>";
                                html += "<th>USUARIO</th>";
                                html += "<th class='text-center'>ACCIONES</th>";
                            html += "</tr>";
                            html += "</thead>";
                            html += "<tbody>";
                            var num_fila = 1;
                            for (l in obj.infoEmpleadosUsuarios) {
                                html += "<tr>";
                                    html += "<td class='text-center'><label  id='no_plaza"+obj.infoEmpleadosUsuarios[l].id_empleadoxusuario +"'>" + obj.infoEmpleadosUsuarios[l].no_plaza + "</td>";
                                    html += "<td><label  id='rfc"+obj.infoEmpleadosUsuarios[l].id_empleadoxusuario +"'>" + obj.infoEmpleadosUsuarios[l].rfc +"</label></td>";
                                    html += "<td><label  id='nombree"+obj.infoEmpleadosUsuarios[l].id_empleadoxusuario +"'>" + obj.infoEmpleadosUsuarios[l].nombre +"</label></td>";
                                    html += "<td><label  id='apellidos"+obj.infoEmpleadosUsuarios[l].id_empleadoxusuario +"'>" + obj.infoEmpleadosUsuarios[l].ap_paterno +" "+ obj.infoEmpleadosUsuarios[l].ap_materno +"</label></td>";
                                    html += "<td><label  id='usuario"+obj.infoEmpleadosUsuarios[l].id_empleadoxusuario +"'>" + obj.infoEmpleadosUsuarios[l].usuario +"</label></td>";
                                    html += "<td class='text-center'>";
                                        if (obj.infoEmpleadosUsuarios[l].status == 1){
                                        html += "<button type='button' class='btn btn-danger btn-rounded' onclick='deshabilitarUserEmpleado(" + obj.infoEmpleadosUsuarios[l].id_empleadoxusuario +")'><span class='fa fa-warning'></span> Deshabilitar</button>";
                                        }else{
                                        html += "<button type='button' class='btn btn-success btn-rounded' onclick='habilitarUserEmpleado(" + obj.infoEmpleadosUsuarios[l].id_empleadoxusuario +")'><span class='fa fa-heart'></span> Habilitar </button>";
                                        }
                                        html += "<button type='button' class='btn btn-info btn-rounded' onclick='editarUserEmpleado(" + obj.infoEmpleadosUsuarios[l].id_empleadoxusuario +")' data-backdrop='static'  data-keyboard='false' data-toggle='modal' data-target='#editarUserEmpleadosModal'><span class='fa fa-edit'></span> Editar </button>";
                                    html += "</td>";
                                html += "</tr>";
                                num_fila ++;
                            }
                            html += "</tbody>";
                        html += "</table>";
                        html += "</div>";
                        html += "</div>";
                    $("#UsuariosTablaEmpleados").html(html);
                    inicalizarDataTable("miTablaEmpleadoSystemLista");
                }
            }
        });
    }else{
        $("#UsuariosTablaEmpleados").css('display', 'none');
        $("#usaurioIndependiente").css('display', 'block');
    }
}