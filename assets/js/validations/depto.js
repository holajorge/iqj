$(document).ready(function() {

    $("#formDepto").validate({

      rules: {
        nombre: { required: true},
        direccion: { required: true},            
      },        
      messages: {
        nombre: "Nombre Necesario",
        direccion: "Seleccione una Direccion",            
      },
      submitHandler: function(){    
        var dataString = $("#formDepto").serialize();
        $.ajax({
            type: "POST",
            url:baseURL + "Depto_ctrl/create_depto",
            data: dataString,
            success: function(respuesta) {
              var obj = JSON.parse(respuesta);
                if (obj.resultado === true) {                      
                   //Limpiar formulario
                   $("#formDepto")[0].reset(); 
                   //Mensaje de operación realizada con éxito
                    setTimeout(function() {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'slideDown',
                            timeOut: 4000
                        };
                    toastr.success('Los datos se guardaron correctamente', 'DATOS GUARDADOS');
                }, 1300);
                }
            } 
        });
      }
    });

    $("#formDeptoEditar").validate({

      rules: {
        nombre: { required: true},
        direccion: { required: true},            
      },        
      messages: {
        nombre: "Nombre Necesario",
        direccion: "Seleccione una Direccion",            
      },
      submitHandler: function(){    
        var dataString = $("#formDeptoEditar").serialize();
        $.ajax({
            type: "POST",
            url:baseURL + "Depto_ctrl/edit_depto",
            data: dataString,
            success: function(respuesta) {
              var obj = JSON.parse(respuesta);
                if (obj.resultado === true) {                      
                   //Limpiar formulario
                   $("#editarDepto").modal('hide');
                   //Mensaje de operación realizada con éxito
                    setTimeout(function() {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'slideDown',
                            timeOut: 1200
                        };
                    toastr.success('Los datos se guardaron correctamente', 'ACTUALIZANDO DATOS');
                    setTimeout(function() {                    
                      window.location.href = baseURL + "Depto_ctrl/index";
                    }, 1300);
                }, 1300);
                }
            } 
        });
      }
    });
});
function saveDepto(){
    event.preventDefault();
    $.ajax({
            url: baseURL + "Depto_ctrl/create_depto",
            type: "POST",
            data: $("#formDepto").serialize(),
            success: function(respuesta) {
                var obj = JSON.parse(respuesta);
                    if (obj.resultado === true) {
                      
                       //Limpiar formulario
                       $("#formDepto")[0].reset(); 
                       //Mensaje de operación realizada con éxito
                        setTimeout(function() {
                            toastr.options = {
                                closeButton: true,
                                progressBar: true,
                                showMethod: 'slideDown',
                                timeOut: 4000
                            };
                        toastr.success('Los datos se guardaron correctamente', 'DATOS GUARDADOS');
                    }, 1300);
            }
        } 
    });
}
function editDepto(id){

    var nombre=document.getElementById("nombre"+id).innerHTML;    

    document.getElementById("idEditar").innerHTML=id+"";
    document.getElementById("idEditar").value=id;              
    document.getElementById("nombreEditar").value=nombre;
}
function saveDeptoEdit(){

    $.ajax({
        url: baseURL + "Depto_ctrl/edit_depto",
        type: "POST",
        data: $("#formDeptoEditar").serialize(),
        success: function(respuesta) {
            var obj = JSON.parse(respuesta);
               if (obj.resultado === true) {
                 $('#editarDepto').modal('hide');
                 setTimeout(function() {
                 toastr.options = {
                 closeButton: true,
                 progressBar: true,
                 showMethod: 'slideDown',
                 timeOut: 4000
                 };
                 toastr.success('Los datos se guardaron correctamente', 'DATOS ACTUALIZADOS');
               }, 1300);
            }
        } 
    });
}
function deshabilitarDepto(id, nombre){
  var name = "<p><strong>"+nombre+"</strong><p>";
  var text = "<h3>¿SEGURO DE DESHABILITAR?</h3>";
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
            url: baseURL + "Depto_ctrl/deshabilitar_Depto",
            type: "POST",
            data: {id: id},
            dataType: "html",
            success: function () {
              swal("Hecho!", "DEPARTAMENTO CORRECTAMENTE DESHABILITADA!", "success");
              setTimeout(function() {
                window.location.href = baseURL+"Depto_ctrl/index";
              }, 2000);
            },
            error: function (xhr, ajaxOptions, thrownError) {
              swal("Error deleting!", "Please try again", "error");
            }
        });
    });
}
function habilitarDepto(id, nombre){
  var name = "<p><strong>"+nombre+"</strong><p>";
  var text = "<h3>¿SEGURO DE HABILITAR?</h3>";
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
            url: baseURL + "Depto_ctrl/habilitar_Depto",
            type: "POST",
            data: {id: id},
            dataType: "html",
            success: function () {
              swal("Hecho!", "DEPARTAMENTO HABILITADO CORRECTAMENTE!", "success");
              setTimeout(function() {
                window.location.href = baseURL+"Depto_ctrl/index";
              }, 2000);
            },
            error: function (xhr, ajaxOptions, thrownError) {
              swal("Error deleting!", "Please try again", "error");
            }
          });
  });
}