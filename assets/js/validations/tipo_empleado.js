$(document).ready(function() {

    $("#formTipoEmple").validate({

      rules: {
        nombre: { required: true},            
      },        
      messages: {
        nombre: "Tipo de Empleado Necesario",
                  
      },
      submitHandler: function(){    
        var dataString = $("#formTipoEmple").serialize();
        $.ajax({
            type: "POST",
            url:baseURL + "TipoEmpleado_ctrl/create_tipoEmpleado",
            data: dataString,
            success: function(respuesta) {
              var obj = JSON.parse(respuesta);
                if (obj.resultado === true) {                      
                   //Limpiar formulario
                   $("#formTipoEmple")[0].reset(); 
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

    $("#formTipoEmpleadoEditar").validate({

      nombre: {
        nombre: { required: true},
      },
      messages: {
        nombre: "Tipo de Empleado Necesario",          
      },
      submitHandler: function(){    
        var dataString = $("#formTipoEmpleadoEditar").serialize();
        $.ajax({
            type: "POST",
            url:baseURL + "TipoEmpleado_ctrl/edit_tipoEmpleado",
            data: dataString,
            success: function(respuesta) {
              var obj = JSON.parse(respuesta);
                if (obj.resultado === true) {
                   //Limpiar formulario
                   $("#editarTipoEmpleado").modal('hide');
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
                      window.location.href = baseURL + "TipoEmpleado_ctrl/index";
                    }, 1300);
                }, 1300);
                }
            }
        });
      }
    });
});

function editTipoEmpleado(id){

    var nombre=document.getElementById("nombre"+id).innerHTML;    

    document.getElementById("idEditar").innerHTML=id+"";
    document.getElementById("idEditar").value=id;              
    document.getElementById("nombreEditar").value=nombre;
}

function deshabilitarEmpleadoTipo(id, nombre){
  var name = "<p><strong>"+nombre+"</strong><p>";
  var text = "<h3>¿SEGURO DE DESHABILITAR?</h3>";
  swal({
      title: text+name,            
       type: "warning",
       showCancelButton: true,
       html:true,
       confirmButtonColor: "#DD6B55",
       confirmButtonText: "SI, DESHABILITAR AHORA!",
       closeOnConfirm: false
     }, function (isConfirm) {
      if (!isConfirm) return;
          $.ajax({
            url: baseURL + "TipoEmpleado_ctrl/deshabilitar_EmpleadoTipo",
            type: "POST",
            data: {id: id},
            dataType: "html",
            success: function () {
              swal("Hecho!", "TIPO EMPLEADO CORRECTAMENTE DESHABILITADO!", "success");
              setTimeout(function() {
                window.location.href = baseURL+"TipoEmpleado_ctrl/index";
              }, 2000);
            },
            error: function (xhr, ajaxOptions, thrownError) {
              swal("Error deleting!", "Please try again", "error");
            }
        });
    });
}
function habilitarEmpleadoTipo(id, nombre){
    var name = "<p><strong>"+nombre+"</strong><p>";
    var text = "<h3>¿EGURO DE HABILITAR TIPO EMPLEADO?</h3>";
    swal({
        title: text+name,            
         type: "warning",
         showCancelButton: true,
         html:true,
         confirmButtonColor: "#DD6B55",
         confirmButtonText: "SI, HABILITAR AHORA!",
         closeOnConfirm: false
       }, function (isConfirm) {
        if (!isConfirm) return;
            $.ajax({
              url: baseURL + "TipoEmpleado_ctrl/habilitar_EmpleadoTipo",
              type: "POST",
              data: {id: id},
              dataType: "html",
              success: function () {
                swal("Hecho!", "TIPO EMPLEADO HABILITADO CORRECTAMENTE!", "success");
                setTimeout(function() {
                  window.location.href = baseURL+"TipoEmpleado_ctrl/index";
                }, 2000);
              },
              error: function (xhr, ajaxOptions, thrownError) {
                swal("Error deleting!", "Please try again", "error");
              }
            });
    });
}