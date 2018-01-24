$(document).ready(function() {
   
    $("#formPuesto").validate({

      rules: {
        nivel: { required: true},
        nombre: { required: true},            
      },        
      messages: {
        nivel: "Nivel Necesario",
        nombre: "Nombre Necesario",            
      },
      submitHandler: function(){    
        var dataString = $("#formPuesto").serialize();
        $.ajax({
            type: "POST",
            url:baseURL + "Puesto_ctrl/create_puesto",
            data: dataString,
            success: function(respuesta) {
              var obj = JSON.parse(respuesta);
                if (obj.resultado === true) {                      
                   //Limpiar formulario
                   $("#formPuesto")[0].reset(); 
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

    $("#formPuestosEditar").validate({

      rules: {
        nivel: { required: true},
        nombre: { required: true},            
      },        
      messages: {
        nivel: "Nivel Necesario",
        nombre:  "Nombre Necesario",             
      },
      submitHandler: function(){    
        var dataString = $("#formPuestosEditar").serialize();
        $.ajax({
            type: "POST",
            url:baseURL + "Puesto_ctrl/edit_puestos",
            data: dataString,
            success: function(respuesta) {
              var obj = JSON.parse(respuesta);
                if (obj.resultado === true) {                      
                   //Limpiar formulario
                   $("#editarPuesto").modal('hide');
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
                      window.location.href = baseURL + "Puesto_ctrl/index";
                    }, 1300);
                }, 1300);
                }
            } 
        });
      }
    });

});

function editPuesto(id){

    var nivel=document.getElementById("nivel"+id).innerHTML;    
    var nombre=document.getElementById("nombre"+id).innerHTML;            

    document.getElementById("idEditar").innerHTML=id+"";
    document.getElementById("idEditar").value=id;              
    document.getElementById("nivelEditar").value=nivel;
    document.getElementById("nombreEditar").value=nombre;                      
}

function savePuestoEdit(){

        $.ajax({
                url: baseURL + "Puesto_ctrl/edit_puestos",
                type: "POST",
                data: $("#formPuestosEditar").serialize(),
                success: function(respuesta) {
                    var obj = JSON.parse(respuesta);
                        if (obj.resultado === true) {
                          $("#editarPuesto").modal('hide');
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

function deshabilitarPuesto(id, nombre){
  var name = "<p><strong>"+nombre+"</strong><p>";
  var text = "<h3>¿SEGURO DE DESHABILITAR?</h3>";
  swal({
      title: text+name,            
       type: "warning",
       html:true,
       showCancelButton: true,
       confirmButtonColor: "#DD6B55",
       confirmButtonText: "SI, DESHABILITAR AHORA!",
       closeOnConfirm: false
     }, function (isConfirm) {
      if (!isConfirm) return;
          $.ajax({
            url: baseURL + "Puesto_ctrl/deshabilitar_Puesto",
            type: "POST",
            data: {id: id},
            dataType: "html",
            success: function () {
              swal("Hecho!", "PUESTO CORRECTAMENTE DESHABILITADA!", "success");
              setTimeout(function() {
                window.location.href = baseURL+"Puesto_ctrl/index";
              }, 2000);
            },
            error: function (xhr, ajaxOptions, thrownError) {
              swal("Error deleting!", "Please try again", "error");
            }
        });
    });
}
function habilitarPuesto(id, nombre){
    var name = "<p><strong>"+nombre+"</strong><p>";
    var text = "<h3>¿SEGURO DE HABILITAR PUESTO?</h3>";
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
              url: baseURL + "Puesto_ctrl/habilitar_Puesto",
              type: "POST",
              data: {id: id},
              dataType: "html",
              success: function () {
                swal("Hecho!", "PUESTO HABILITADO CORRECTAMENTE!", "success");
                setTimeout(function() {
                  window.location.href = baseURL+"Puesto_ctrl/index";
                }, 2000);
              },
              error: function (xhr, ajaxOptions, thrownError) {
                swal("Error deleting!", "Please try again", "error");
              }
            });
    });
}