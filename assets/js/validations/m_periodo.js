$(document).ready(function() {
   
    $("#formPeriodo").validate({

      rules: {
        inicio: { required: true, date: true},
        fin: { required: true, date:true}, 
        quinquenio: { required: true, number: true},                   
      },        
      messages: {
        inicio: "Defina Fecha de Inicio",
        fin:  "Defina Fecha de Termino",      
        quinquenio:  "Dato Necesario",            
      },
      submitHandler: function(){    
        var dataString = $("#formPeriodo").serialize();
        $.ajax({
            type: "POST",
            url:baseURL + "Periodo_controller/create_periodo",
            data: dataString,
            success: function(respuesta) {
              var obj = JSON.parse(respuesta);
                if (obj.resultado === true) {                      
                   //Limpiar formulario
                   $("#formPeriodo")[0].reset(); 
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

    $("#formPeriodoEditar").validate({

      rules: {
        inicio: { required: true, date: true},
        fin: { required: true, date:true}, 
        quinquenio: { required: true, number: true},                   
      },        
      messages: {
        inicio: "Defina Fecha de Inicio",
        fin:  "Defina Fecha de Termino",      
        quinquenio:  "Dato Necesario",            
      },
      submitHandler: function(){    
        var dataString = $("#formPeriodoEditar").serialize();
        $.ajax({
            type: "POST",
            url:baseURL + "Periodo_controller/edit_periodo",
            data: dataString,
            success: function(respuesta) {
              var obj = JSON.parse(respuesta);
                if (obj.resultado === true) {                      
                   //Limpiar formulario
                   $("#editarPeriodo").modal('hide');
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
                      window.location.href = baseURL + "Periodo_controller/index";
                    }, 1300);
                }, 1300);
                }
            } 
        });
      }
    });

});

function editPeriodo(id){

    console.log(id);
    var periodo_inicio=document.getElementById("periodo_inicio"+id).innerHTML;    
    var periodo_fin=document.getElementById("periodo_fin"+id).innerHTML;            
    var periodo_quinquenal=document.getElementById("periodo_quinquenal"+id).innerHTML;    

    document.getElementById("idEditar").innerHTML=id+"";
    document.getElementById("idEditar").value=id;              
    document.getElementById("periodo_inicioEditar").value=periodo_inicio;
    document.getElementById("periodo_finEditar").value=periodo_fin;   
    document.getElementById("periodo_quinquenalEditar").value=periodo_quinquenal;                    
}