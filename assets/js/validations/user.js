$(document).ready(function() {

});

function showFormChange(){

	$("#showCambioPassword").css('display', 'block');
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
		        $.ajax({
		            type: "POST",
		            url:baseURL + "User_ctrl/changePasswordUser",
		            data: {password: pass},
		            success: function(respuesta) {
		              var obj = JSON.parse(respuesta);
		                if (obj.resultado === true) {                      
		                  
		                }
		            } 
		        });
	        }else{
	        	swal("Upps..!", "LAS CONTRASEÑAS NO COICIDEN! :( ", "error");
	        }

      }
    });
}

