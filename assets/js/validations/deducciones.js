$(document).ready(function() {

    $("#formDeduciones").validate({

      rules: {
        indicador: { required: true},
        nombre: { required: true},            
      },        
      messages: {
        indicador: "Indicador Necesario",
        nombre: "Nombre Indicador Necesario",            
      },
      submitHandler: function(){    
        var dataString = $("#formDeduciones").serialize();
        $.ajax({
            type: "POST",
            url:baseURL + "Deduciones_ctrl/create_deducciones",
            data: dataString,
            success: function(respuesta) {
              var obj = JSON.parse(respuesta);
                if (obj.resultado === true) {                      
                   //Limpiar formulario
                   $("#formDeduciones")[0].reset(); 
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

    $("#formDeduccionEditar").validate({

      rules: {
        indicador: { required: true},
        nombre: { required: true},            
      },        
      messages: {
        indicador: "Indicador Necesario",
        nombre: "Nombre Indicador Necesario",            
      },
      submitHandler: function(){    
        var dataString = $("#formDeduccionEditar").serialize();
        $.ajax({
            type: "POST",
            url:baseURL + "Deduciones_ctrl/edit_deduccion",
            data: dataString,
            success: function(respuesta) {
              var obj = JSON.parse(respuesta);
                if (obj.resultado === true) {                      
                   //Limpiar formulario
                   $("#editarDeduccion").modal('hide');
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
                      window.location.href = baseURL + "Deduciones_ctrl/index";
                    }, 1300); 
                }, 1300);
                }
            } 
        });
      }
    });
});

function editDeduccion(id){

    var indicador=document.getElementById("indicador"+id).innerHTML;    
    var nombre=document.getElementById("nombre"+id).innerHTML;                         

    document.getElementById("idEditar").innerHTML=id+"";
    document.getElementById("idEditar").value=id;              
    document.getElementById("indicadorEditar").value=indicador;
    document.getElementById("nombreEditar").value=nombre;           
}

function deshabilitarDeduccion(id,nombre){
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
            url: baseURL + "Deduciones_ctrl/deshabilitar_Deduccion",
            type: "POST",
            data: {id: id},
            dataType: "html",
            success: function () {
              swal("Hecho!", "DEDUCCIÓN CORRECTAMENTE DESHABILITADA!", "success");
              setTimeout(function() {
                window.location.href = baseURL+"Deduciones_ctrl/index";
              }, 2000);
            },
            error: function (xhr, ajaxOptions, thrownError) {
              swal("Error deleting!", "Please try again", "error");
            }
        });
    });
}
function habilitarDeduccion(id, nombre){
    var name = "<p><strong>"+nombre+"</strong><p>";
    var text = "<h3>¿SEGURO DE HABILITAR DEDUCCIÓN?</h3>";
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
              url: baseURL + "Deduciones_ctrl/habilitar_Deduccion",
              type: "POST",
              data: {id: id},
              dataType: "html",
              success: function () {
                swal("Hecho!", "DEDUCCIÓN HABILITADO CORRECTAMENTE!", "success");
                setTimeout(function() {
                  window.location.href = baseURL+"Deduciones_ctrl/index";
                }, 2000);
              },
              error: function (xhr, ajaxOptions, thrownError) {
                swal("Error deleting!", "Please try again", "error");
              }
            });
    });
}