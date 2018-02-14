$(document).ready(function() {



});

function asignarUser(id){

	var rfc=document.getElementById("rfc"+id).innerHTML;  
	var nombre=document.getElementById("nombre"+id).innerHTML;
	var apelldio=document.getElementById("ap_paterno"+id).innerHTML;  
	
	document.getElementById("idEditar").innerHTML=id+"";
  document.getElementById("idEditar").value=id;              
  document.getElementById("rfcEdit").value=rfc;
  document.getElementById("nombreEdit").value=nombre;
  document.getElementById("apellidoEdit").value=apelldio;

}

function saveAltaUser(){	

	$("#formAltaUser").validate({

      rules: {
      	id_usuario: {required: true},
        password: 	{required: true},
        cpassword:  {required: true},           
      },
      messages: {
      	id_usuario: "Seleccione un Tipo de Usuario",
        password: 	"Nuevo password Necesario",
        cpassword:  "Confirmar passowrd Necesario",
      },
      submitHandler: function(){

      		var id_empleado = $("#idEditar").val();
      		var id_usuario = $("#tipo").val();      		
      		var pass = $("#password").val();
			    var confirmar = $("#cpassword").val();
          var re = /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/;
          if (re.test(pass) ) {
              console.log("si es admitido");
          }else{
            swal("Upps..!", "La Contrasela debe tener como minimo 8 caracteres y maximo de 16, una letra Mayúscula, una minúscula y números :( ", "error");
              return false;
          }
	      	if (pass == confirmar) {
	      		var l = $("#ladda_btn_altaUser").ladda();
        		l.ladda('start'); 
		        $.ajax({
		            type: "POST",
		            url:baseURL + "User_ctrl/createUserType",
		            data: {id_empleado:id_empleado, id_usuario: id_usuario, password: pass},
		            success: function(respuesta) {
		              var obj = JSON.parse(respuesta);
		                if (obj.resultado === true) { 	

		                	  $("#formAltaUser")[0].reset();   		                
			                  $("#AltaUser").modal('hide'); 
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
                          setTimeout(function() {                    
                            window.location.href = baseURL + "User_ctrl/create";
                          }, 1300);               
			                }, 1300);			                		               
		                }
		            } 
		        });
	        }else{
	        	swal("Upps..!", "LAS CONTRASEÑAS NO COICIDEN! :( ", "error");
	        }
      }
    });
}

function showFormChange(){
	$("#showCambioPassword").css('display', 'block');
}
function cancelAltaUser(){
	$("#formAltaUser")[0].reset();	
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
			                }, 1300);
		                }
		            } 
		        });
	        }else{
	        	swal("Upps..!", "LAS CONTRASEÑAS NO COICIDEN! :( ", "error");
	        }
      }
    });
}
function deshabilitarUser(id, nombre, id_empleado){

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
            data: {id: id, id_empleado: id_empleado},
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
function habilitarUser(id,nombre,id_empleado){
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
              data: {id: id, id_empleado: id_empleado},
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