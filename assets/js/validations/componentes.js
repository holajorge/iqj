$(document).ready(function() {

});

function saveComponente(){

	$("#formComponente").validate({

      rules: {
        clave: { required: true},
        nombre: { required: true},            
      },
      messages: {
        clave: "Clave es Necesario",
        nombre: "Nombre es Necesario", 
      },
      submitHandler: function(){ 
        var dataString = $("#formComponente").serialize();
        var l = $("#ladda-btnSaveComponente").ladda();
        l.ladda('start');
        $.ajax({
            type: "POST",
            url:baseURL + "Componente_ctrl/create_componente",
            data: dataString,
            success: function(respuesta) {
              var obj = JSON.parse(respuesta);
                if (obj.resultado === true) {                      
                   //Limpiar formulario
                   $("#formComponente")[0].reset(); 
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

function editComponente(id){

    var clave=document.getElementById("clave"+id).innerHTML;    
    var nombre=document.getElementById("nombre"+id).innerHTML;                         

    document.getElementById("idEditar").innerHTML=id+"";
    document.getElementById("idEditar").value=id;              
    document.getElementById("claveEditar").value=clave;
    document.getElementById("nombreEditar").value=nombre;           
}

function updateComponente(){

	$("#formComponenteEditar").validate({

      rules: {
        clave: { required: true},
        nombre: { required: true},            
      },        
      messages: {
        clave: "Clave es Necesario",
        nombre: "Nombre es Necesario",            
      },
      submitHandler: function(){    
        var dataString = $("#formComponenteEditar").serialize();
        var l = $("#ladda_btn_editComponente").ladda();
        l.ladda('start');
        $.ajax({
            type: "POST",
            url:baseURL + "Componente_ctrl/edit_componente",
            data: dataString,
            success: function(respuesta) {
              var obj = JSON.parse(respuesta);
                if (obj.resultado === true) {                      
                   //Limpiar formulario
                   l.ladda('stop');
                   $("#editarComponente").modal('hide');
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
                      window.location.href = baseURL + "Componente_ctrl/index";
                    }, 1300); 
                }, 1300);
                }
            } 
        });
      }
    });

}