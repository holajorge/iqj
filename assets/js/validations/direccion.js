$(document).ready(function() {

    $("#formDireccion").validate({

      rules: {
        nombre: { required: true},            
      },        
      messages: {
        nombre: "Nombre Dirección Necesario",         
                  
      },
      submitHandler: function(){    
        var dataString = $("#formDireccion").serialize();
        $.ajax({
            type: "POST",
            url:baseURL + "Direcciones_ctrl/create_direccion",
            data: dataString,
            success: function(respuesta) {
              var obj = JSON.parse(respuesta);
                if (obj.resultado === true) {                      
                   //Limpiar formulario
                   $("#formDireccion")[0].reset(); 
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

    $("#formDireccionEdit").validate({

      rules: {
        nombre: { required: true},
      },
      messages: {
        nombre: "Nombre Dirección Necesario",          
      },
      submitHandler: function(){    
        var dataString = $("#formDireccionEdit").serialize();
        $.ajax({
            type: "POST",
            url:baseURL + "Direcciones_ctrl/edit_direccion",
            data: dataString,
            success: function(respuesta) {
              var obj = JSON.parse(respuesta);
                if (obj.resultado === true) {
                   //Limpiar formulario
                   $("#editarDireccion").modal('hide');
                   //Mensaje de operación realizada con éxito
                    setTimeout(function(){
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'slideDown',
                            timeOut: 1200
                        };
                    toastr.success('Los datos se guardaron correctamente', 'ACTUALIZANDO DATOS');
                    setTimeout(function() {
                      window.location.href = baseURL + "Direcciones_ctrl/index";
                    }, 1300);
                }, 1300);
                }
            }
        });
      }
    });
});

function editDireccion(id){

    var nombre=document.getElementById("nombre"+id).innerHTML;    

    document.getElementById("idEditar").innerHTML=id+"";
    document.getElementById("idEditar").value=id;              
    document.getElementById("nombreEditar").value=nombre;
}

function deshabilitarDireccion(id, nombre){
  var name = "<p><strong>"+nombre+"</strong><p>";
  var text = "<h3>¿SEGURO DE DESHABILITAR?</h3>";
  swal({
      title: text+name+"",
       type: "warning",
       html: true,
       showCancelButton: true,
       confirmButtonColor: "#DD6B55",
       confirmButtonText: "SI, DESHABILITAR AHORA!",
       closeOnConfirm: false
     }, function (isConfirm) {
      if (!isConfirm) return;
          $.ajax({
            url: baseURL + "Direcciones_ctrl/deshabilitar_Direccion",
            type: "POST",
            data: {id: id},
            dataType: "html",
            success: function () {
              swal("Hecho!", "DEPARTAMENTO CORRECTAMENTE DESHABILITADA!", "success");
              setTimeout(function() {
                window.location.href = baseURL+"Direcciones_ctrl/index";
              }, 2000);
            },
            error: function (xhr, ajaxOptions, thrownError) {
              swal("Error deleting!", "Please try again", "error");
            }
        });
    });
}
function habilitarDireccion(id,nombre){
  var name = "<p><strong>"+nombre+"</strong><p>";
  var text = "<h3>¿SEGURO DE HABILITAR DIRECCIÓN?</h3>";
    swal({
        title: text+name+"",            
         type: "warning",
         html: true,
         showCancelButton: true,
         confirmButtonColor: "#DD6B55",
         confirmButtonText: "SI, HABILITAR AHORA!",
         closeOnConfirm: false
       }, function (isConfirm) {
        if (!isConfirm) return;
            $.ajax({
              url: baseURL + "Direcciones_ctrl/habilitar_Direccion",
              type: "POST",
              data: {id: id},
              dataType: "html",
              success: function () {
                swal("Hecho!", "DIRECCIÓN HABILITADO CORRECTAMENTE!", "success");
                setTimeout(function() {
                  window.location.href = baseURL+"Direcciones_ctrl/index";
                }, 2000);
              },
              error: function (xhr, ajaxOptions, thrownError) {
                swal("Error deleting!", "Please try again", "error");
              }
            });
    });
}

