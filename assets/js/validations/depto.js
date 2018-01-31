$(document).ready(function() {


});

function addDepto(){

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
        var l = $("#ladda_btn_addDepto").ladda();
        l.ladda('start');
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
                    l.ladda('stop');
                    toastr.success('Los datos se guardaron correctamente', 'DATOS GUARDADOS');
                }, 1300);
                }
            } 
        });
      }
    });
}
// llenar el select para direcciones
function editDepto(id, direccion){
   
  var nombre=document.getElementById("nombre"+id).innerHTML;    

  document.getElementById("idEditar").innerHTML=id+"";
  document.getElementById("idEditar").value=id;              
  document.getElementById("nombreEditar").value=nombre;

   $.ajax({
      type: "GET",
      url: baseURL +"Depto_ctrl/getAdrress",        
       success: function(respuesta){
         var obj = JSON.parse(respuesta);
         if (obj.resultado == true) {
            var html = "";
            var num_fila = 1;
              for (l in obj.direcciones) {              
                  if (obj.direcciones[l].nombre == direccion) {
                      html +=  "<option value='"+ obj.direcciones[l].id_direccion +"' selected>" + obj.direcciones[l].nombre +"</option>" ;  
                  }else{
                      html +=  "<option value='"+ obj.direcciones[l].id_direccion +"'>" + obj.direcciones[l].nombre +"</option>" ; 
                  }
                 num_fila ++; 
              }
              $("#direccionEditarID").html(html); 

          }
        }
   });

}

function saveEditDepto(){

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
        var l = $("#ladda_btn_editDepto").ladda();
        l.ladda('start');
        $.ajax({
            type: "POST",
            url:baseURL + "Depto_ctrl/edit_depto",
            data: dataString,
            success: function(respuesta) {
              var obj = JSON.parse(respuesta);
                if (obj.resultado === true) {                      
                   //Limpiar formulario
                   l.ladda('stop');
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
}

// function saveDeptoEdit(){

//     $.ajax({
//         url: baseURL + "Depto_ctrl/edit_depto",
//         type: "POST",
//         data: $("#formDeptoEditar").serialize(),
//         success: function(respuesta) {
//             var obj = JSON.parse(respuesta);
//                if (obj.resultado === true) {
//                  $('#editarDepto').modal('hide');
//                  setTimeout(function() {
//                  toastr.options = {
//                  closeButton: true,
//                  progressBar: true,
//                  showMethod: 'slideDown',
//                  timeOut: 4000
//                  };
//                  toastr.success('Los datos se guardaron correctamente', 'DATOS ACTUALIZADOS');
//                }, 1300);
//             }
//         } 
//     });
// }

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