$(document).ready(function() {

    inicalizarDataTable("tabla_lista_empleados");
   
    $("#form_crearr_empleado").validate({

        rules: {
            no_plaza: { required: true, maxlength: 5, number: true},
            nombre: { required: true, maxlength: 60, },
            horas: { required: true },
            nss: {required: true},
            ap_paterno: { required: true, maxlength: 30},            
            fecha_nacimiento: { required: true, date: true},
            fecha_ingreso: { required: true, date: true},            
            rfc: {required: true},
            curp: {required: true},
            no_empleado: { required: true, minlength: 2}, 
            id_depto: { required: true},
            id_puesto: { required: true},     
            id_tipo_trabajador: { required: true},         
        },        
        messages: {
            horas: "Horas Necesarias",
            no_plaza: "Numero Necesario",
            nss: "numero de suguro social necesario",
            nombre: "Debe ingresar su Nombre.",  
            ap_paterno: "Apellido Necesario.",            
            fecha_nacimiento: "Debe ingresar Fecha Nacimiento.",  
            fecha_ingreso: "Debe ingresar Fecha Ingeso.",
            curp: "Debe ingresar CURP.",  
            ap_paterno: "Apellido Necesario",
            rfc: "Debe ingresar RFC.", 
            no_empleado: "ingrese numero Empleado",
            id_depto: "Debe seleccionar Depto.",
            id_puesto: "Debe seleccionar Puesto.",     
            id_tipo_trabajador: "Debe seleccionar Tipo.",        
        },
        submitHandler: function(){    
            var dataString = $("#form_crearr_empleado").serialize();
            $.ajax({
                type: "POST",
                url:baseURL + "empleado_controller/guardar_empleado",
                data: dataString,
                success: function(respuesta) {
                  var obj = JSON.parse(respuesta);
                    if (obj.resultado === true) {                      
                       //Limpiar formulario
                       $("#form_crearr_empleado")[0].reset(); 
                       //Mensaje de operación realizada con éxito
                        setTimeout(function() {
                            toastr.options = {
                                closeButton: true,
                                progressBar: true,
                                showMethod: 'slideDown',
                                timeOut: 4000
                            };
                        toastr.success('Los datos se guardaron correctamente', 'GUARDARON DATOS');                        
                    }, 1300);
                    }
                } 
            });
        }
    });

    $("#form_edit_empleado").validate({

        rules: {
            no_plaza: { required: true, maxlength: 5, number: true},
            horas: { required: true },
            nombre: { required: true, maxlength: 60, },            
            ap_paterno: { required: true, maxlength: 30},
            ap_materno: { required: true, maxlength: 30},
            fecha_nacimiento: { required: true, date: true},
            fecha_ingreso: { required: true, date: true},            
            curp: {required: true},
            rfc: {required: true},            
            no_empleado: { required: true, minlength: 2},             
        },        
        messages: {
            horas: "Horas Necesarias",
            no_plaza: "Numero Necesario",
            nombre: "Debe ingresar su Nombre.",  
            ap_paterno: "Apellido Necesario.",
            fecha_nacimiento: "Debe ingresar Fecha Nacimiento.",  
            fecha_ingreso: "Debe ingresar Fecha Ingeso.",
            curp: "Debe ingresar CURP.",  
            ap_paterno: "Apellido Necesario",
            rfc: "Debe ingresar RFC.", 
            no_empleado: "ingrese numero Empleado",
            id_depto: "Debe seleccionar Depto.",
            id_puesto: "Debe seleccionar Puesto.",     
            id_tipo_trabajador: "Debe seleccionar Tipo.",        
        },
        submitHandler: function(){    
            var dataString = $("#form_edit_empleado").serialize();
            $.ajax({
                type: "POST",
                url:baseURL + "empleado_controller/updater_empleado",
                data: dataString,
                success: function(respuesta) {
                  var obj = JSON.parse(respuesta);
                    if (obj.resultado === true) {                      
                       //Limpiar formulario
                       $("#editarEmpleado").modal('hide');
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
                          window.location.href = baseURL + "empleado_controller/lista_empleado";
                        }, 1300);
                    }, 1300);
                    }
                } 
            });
        }
    });
});

function deshabilitarEmpleado(id, nombre, paterno){
  var name = "<p><strong>"+nombre+' '+paterno+"</strong><p>";
  var text = "<h3>¿SEGURO DE DESHABILITAR EMPLEADO?</h3>";
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
            url: baseURL + "Empleado_controller/deshabilitar_Empleado",
            type: "POST",
            data: {id: id},
            dataType: "html",
            success: function () {
              swal("Hecho!", "EMPLEADO CORRECTAMENTE DESHABILITADO!", "success");
              setTimeout(function() {
                window.location.href = baseURL+"Empleado_controller/lista_empleado";
              }, 2000);
            },
            error: function (xhr, ajaxOptions, thrownError) {
              swal("Error deleting!", "Please try again", "error");
            }
        });
    });
}
function habilitarEmpleado(id, nombre, paterno){
    var name = "<p><strong>"+nombre+' '+paterno+"</strong><p>";
    var text = "<h3>¿SEGURO DE HABILITAR EMPLEADO?</h3>";
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
              url: baseURL + "Empleado_controller/habilitar_Empleado",
              type: "POST",
              data: {id: id},
              dataType: "html",
              success: function () {
                swal("Hecho!", "EMPLEADO HABILITADO CORRECTAMENTE!", "success");
                setTimeout(function() {
                  window.location.href = baseURL+"Empleado_controller/lista_empleado";
                }, 2000);
              },
              error: function (xhr, ajaxOptions, thrownError) {
                swal("Error deleting!", "Please try again", "error");
              }
            });
    });
}

function editEmpleado(id){

    var no_plaza=document.getElementById("no_plaza"+id).innerHTML;    
    var horas=document.getElementById("horas"+id).innerHTML;
    var nss=document.getElementById("nss"+id).innerHTML;
    var nombre=document.getElementById("nombre_emp"+id).innerHTML;
    var ap_paterno=document.getElementById("ap_paterno"+id).innerHTML;
    var ap_materno=document.getElementById("ap_materno"+id).innerHTML;
    var fecha_nacimiento=document.getElementById("fecha_nacimiento"+id).innerHTML;
    var fecha_ingreso=document.getElementById("fecha_ingreso"+id).innerHTML;        
    var rfc=document.getElementById("rfc"+id).innerHTML;
    var no_empleado=document.getElementById("no_empleado"+id).innerHTML;
    var curp=document.getElementById("curp"+id).innerHTML;   
    var nombre_depto=document.getElementById("nombre_depto"+id).innerHTML;
    var nombre_puesto=document.getElementById("nombre_puesto"+id).innerHTML;
    var trabajador=document.getElementById("trabajador"+id).innerHTML; 

    document.getElementById("idEditar").innerHTML=id+"";
    document.getElementById("idEditar").value=id;              
    document.getElementById("num_plazaEdit").value=no_plaza;
    document.getElementById("horasEdit").value=horas;
    document.getElementById("nssEdit").value=nss;
    document.getElementById("nombreEdit").value=nombre;
    document.getElementById("ap_paternoEdit").value=ap_paterno;
    document.getElementById("ap_maternoEdit").value=ap_materno;
    document.getElementById("fecha_nacimientoEdit").value=fecha_nacimiento;
    document.getElementById("fecha_ingresoEdit").value=fecha_ingreso;    
    document.getElementById("rfcEdit").value=rfc;
    document.getElementById("curpEdit").value=curp;
    document.getElementById("no_empleadoEdit").value=no_empleado;   
    document.getElementById("deptoEdit").value=nombre_depto; 
    document.getElementById("puestoEdit").value=nombre_puesto; 
    document.getElementById("tipo_trabajadorEdit").value=trabajador; 

}

//Función para validar una CURP
function curpValida(curp) {
    var re = /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/,
        validado = curp.match(re);
    
    if (!validado)  //Coincide con el formato general?
        return false;
    
    //Validar que coincida el dígito verificador
    function digitoVerificador(curp17) {
        //Fuente https://consultas.curp.gob.mx/CurpSP/
        var diccionario  = "0123456789ABCDEFGHIJKLMNÑOPQRSTUVWXYZ",
            lngSuma      = 0.0,
            lngDigito    = 0.0;
        for(var i=0; i<17; i++)
            lngSuma = lngSuma + diccionario.indexOf(curp17.charAt(i)) * (18 - i);
        lngDigito = 10 - lngSuma % 10;
        if (lngDigito == 10) return 0;
        return lngDigito;
    }
      
    if (validado[2] != digitoVerificador(validado[1])) 
        return false;
            
        return true; //Validado
}

//Handler para el evento cuando cambia el input
//Lleva la CURP a mayúsculas para validarlo
function validarInput(input) {
    var curp = input.value.toUpperCase(),        
        valido = "No válido";
        
    if (curpValida(curp)) { // ⬅️ Acá se comprueba
        valido = "Válido";       
        console.log("si es validto");

    } else {        
        sweetAlert("CURP NO VALIDO","VULVA A INTENTAR","error");   
        $( "#curpEdit" ).focus();  
        return false;  
        console.log("no es validto");       
    }       
       
}

function ValidaRfc(rfcStr) {
    var strCorrecta;
    strCorrecta = rfcStr;   
    if (rfcStr.length == 12 ){
        var valid = '^(([A-Z]|[a-z]){3})([0-9]{6})((([A-Z]|[a-z]|[0-9]){3}))';
        }else{
        var valid = '^(([A-Z]|[a-z]|\s){1})(([A-Z]|[a-z]){3})([0-9]{6})((([A-Z]|[a-z]|[0-9]){3}))';
    }
    if (rfcStr.length > 13 ){
        var valid = '^(([A-Z]|[a-z]){3})([0-9]{6})((([A-Z]|[a-z]|[0-9]){3}))';
        }else{
        var valid = '^(([A-Z]|[a-z]|\s){1})(([A-Z]|[a-z]){3})([0-9]{6})((([A-Z]|[a-z]|[0-9]){3}))';
    }
    var validRfc=new RegExp(valid);
    var matchArray=strCorrecta.match(validRfc);
    if (matchArray==null) {
        sweetAlert("RFC NO VALIDA","VULVA A INTENTAR","error");  
        $( "#rfcEdit" ).focus();
        return false;
    }
    else
    {
       // alert('Cadena correcta:' + strCorrecta);
       // sweetAlert("CAMPO SOLOA","VULVA A INTENTAR","error");  
        return true;
    }
    
}
