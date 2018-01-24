$(document).ready(function() {

    $("#formPercepcion").validate({

      rules: {
        indicador: { required: true},
        nombre: { required: true},            
      },        
      messages: {
        indicador: "Indicador Necesario",
        nombre: "Nombre Indicador Necesario",            
      },
      submitHandler: function(){    
        var dataString = $("#formPercepcion").serialize();
        $.ajax({
            type: "POST",
            url:baseURL + "Percepciones_ctrl/create_percepciones",
            data: dataString,
            success: function(respuesta) {
              var obj = JSON.parse(respuesta);
                if (obj.resultado === true) {                      
                   //Limpiar formulario
                   $("#formPercepcion")[0].reset(); 
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

    $("#formPercepcionEditar").validate({

      rules: {
        indicador: { required: true},
        nombre: { required: true},            
      },        
      messages: {
        indicador: "Indicador Necesario",
        nombre: "Nombre Indicador Necesario",            
      },
      submitHandler: function(){    
        var dataString = $("#formPercepcionEditar").serialize();
        $.ajax({
            type: "POST",
            url:baseURL + "Percepciones_ctrl/edit_perception",
            data: dataString,
            success: function(respuesta) {
              var obj = JSON.parse(respuesta);
                if (obj.resultado === true) {                      
                   //Limpiar formulario
                   $("#editarPercepcion").modal('hide');
                   //Mensaje de operación realizada con éxito
                    setTimeout(function() {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'slideDown',
                            timeOut: 1200
                        };
                    toastr.success('Los datos se guardaron correctamente', 'DATOS ACTUALIZADOS');
                    setTimeout(function() {                    
                          window.location.href = baseURL + "Percepciones_ctrl/index";
                        }, 1300);
                }, 1300);
                }
            } 
        });
      }
    });

});

function verificarIndicador(){

  $.ajax({
   type: "POST",
   url: baseURL +"Percepciones_ctrl/searchIndicador",
         data: $("#formPercepcion").serialize(), // serializes the form's elements.,
         success: function(respuesta){
           var obj = JSON.parse(respuesta);
           if (obj.resultado === true) {
                    setTimeout(function() {
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                        showMethod: 'slideDown',
                        timeOut: 4000
                    };
                toastr.warning('Asigne otro numero de indicador', 'INDICADOR YA REGISTRADO');
            }, 1300);
          }
        }
  }); 
}

    function editPercepcion(id){

            var indicador=document.getElementById("indicador"+id).innerHTML;    
            var nombre=document.getElementById("nombre"+id).innerHTML;                         

            document.getElementById("idEditar").innerHTML=id+"";
            document.getElementById("idEditar").value=id;              
            document.getElementById("indicadorEditar").value=indicador;
            document.getElementById("nombreEditar").value=nombre;  
                                       
    }

    function deletePercepcion(id,nombre){
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
                  url: baseURL + "Percepciones_ctrl/deshabilitar_Percepcion",
                  type: "POST",
                  data: {id: id},
                  dataType: "html",
                  success: function () {
                    swal("Hecho!", "PERCEPCIÓN CORRECTAMENTE DESHABILITADA!", "success");
                    setTimeout(function() {
                      window.location.href = baseURL+"Percepciones_ctrl/index";
                    }, 2000);
                  },
                  error: function (xhr, ajaxOptions, thrownError) {
                    swal("Error deleting!", "Please try again", "error");
                  }
                });
        });
    }

    function habilitarPercepcion(id,nombre){
         var name = "<p><strong>"+nombre+"</strong><p>";
        var text = "<h3>¿SEGURO DE HABILITAR PERCEPCIÓN?</h3>";
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
                  url: baseURL + "Percepciones_ctrl/habilitar_Percepcion",
                  type: "POST",
                  data: {id: id},
                  dataType: "html",
                  success: function () {
                    swal("Hecho!", "PERCEPCIÓN HABILITADO CORRECTAMENTE!", "success");
                    setTimeout(function() {
                      window.location.href = baseURL+"Percepciones_ctrl/index";
                    }, 2000);
                  },
                  error: function (xhr, ajaxOptions, thrownError) {
                    swal("Error deleting!", "Please try again", "error");
                  }
                });
        });
    }
