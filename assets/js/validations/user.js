$(document).ready(function() {

    inicalizarDataTable("tabla_lista_empleadosChangePass");

});
function saveAltaUser(){	
  
	$("#formAltaUserAdmin").validate({

      rules: {
        nombre: {required: true},
        apellidos: {required: true},
        rfc:{required: true},
        password: 	{required: true},
        cpassword:  {required: true}
      },
      messages: {
        nombre : "Nombre es necesario",
        apellidos: "Ingrese apellidos",
        rfc: "RFC necesario",
        password: 	"Nuevo password Necesario",
        cpassword:  "Confirmar password Necesario"
      },
      submitHandler: function(){

      		var pass = $("#password").val();
            var confirmar = $("#cpassword").val();
            var re = /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/;
            var dataString = $("#formAltaUserAdmin").serialize();
          if (re.test(pass) ) {
              if (pass == confirmar) {
                var l = $("#ladda_btn_altaUserAdmin").ladda();
                l.ladda('start'); 
                $.ajax({
                  type: "POST",
                  url:baseURL + "User_ctrl/createUserType",
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
            swal("Upps..!", "La Contrasela debe tener como minimo 8 caracteres y maximo de 16, una letra Mayúscula, una minúscula y números :( ", "error");
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
          var re = /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/;
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
                                        timeOut: 4000
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
            swal("Upps..!", "La Contrasela debe tener como minimo 8 caracteres y maximo de 16, una letra Mayúscula, una minúscula y números :( ", "error");
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
function editarUserSystem(id, nombre, apellidos, rfc) {

    document.getElementById("idEditar").value=id;
    document.getElementById("nombreEditar").value=nombre;
    document.getElementById("apellidosEditar").value=apellidos;
    document.getElementById("rfcEditar").value=rfc;

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

            var re = /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/;
            if (re.test(pass) ) {
                if (pass == confirmar) {
                    var l = $("#ladda_btn_editUserAdmin").ladda();
                    l.ladda('start');
                    $.ajax({
                        type: "POST",
                        url:baseURL + "User_ctrl/changePasswordUserSystema",
                        data: {id: id, rfc: rfc, nombre: nombre, apellidos:apellidos, password: pass},
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
                swal("Upps..!", "La Contrasela debe tener como minimo 8 caracteres y maximo de 16, una letra Mayúscula, una minúscula y números :( ", "error");
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
            var re = /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/;
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
                swal("Upps..!", "La Contrasela debe tener como minimo 8 caracteres y maximo de 16, una letra Mayúscula, una minúscula y números :( ", "error");
                return false;
            }
        }
    });
}



