$(document).ready(function() {

    inicalizarDataTable("tabla_lista_empleados");

});
function cancelarRegistro() {
    $("#form_crear_empleado")[0].reset();
}
function saveEmPloye(){
	$("#form_crear_empleado").validate({

        rules: {
            no_plaza: { required: true, number: true},
            nombre: { required: true, maxlength: 60 },
            horas: { required: true },
            nss: {required: true},
            nivel: { required: true },
			//tarjeta: {required: true, number:true, minlength: 15},
            ap_paterno: { required: true},            
            fecha_nacimiento: { required: true, date: true},
            fecha_ingreso: { required: true, date: true},            
            rfc: {required: true},
            curp: {required: true},
            no_empleado: { required: true}, 
            id_depto: { required: true},
            id_puesto: { required: true},     
            id_tipo_trabajador: { required: true},    
            componente: { required: true},
            sindicalizado: {required: true}
        },        
        messages: {
            horas: "Horas Necesarias",
            no_plaza: "Numero Necesario",
            nss: "numero de suguro social necesario",
			//tarjeta: "Numero de Tarjeta necesario",
            nivel: "Debe ingresar el Nivel.",
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
            componente: "Debe seleccionar un Componente",
            sindicalizado: "Si o No"
        },
        submitHandler: function(){    
            var dataString = $("#form_crear_empleado").serialize();

            var l = $("#btn_guardar_empleado").ladda();
            l.ladda('start');
            $.ajax({
                type: "POST",
                url:baseURL + "Empleado_controller/guardar_empleado",
                data: dataString,
                success: function(respuesta) {
                  var obj = JSON.parse(respuesta);
                    if (obj.resultado === true) {                      
                       //Limpiar formulario
                       $("#form_crear_empleado")[0].reset(); 
                       //Mensaje de operación realizada con éxito
                        setTimeout(function() {
                            toastr.options = {
                                closeButton: true,
                                progressBar: true,
                                showMethod: 'slideDown',
                                timeOut: 4000
                            };
                        l.ladda('stop');
                        toastr.success('Los datos se guardaron correctamente', 'GUARDARON DATOS');                        
                    }, 1300);
                    }
                } 
            });
        }
    });
}
function cancelEditEmployee(){
	$("#form_edit_empleado")[0].reset();
}

function saveEditEmploye(){

    $("#form_edit_empleado").validate({

        rules: {
            no_plaza: { required: true, number: true},
            horas: { required: true },
			nss: {required: true},
			//tarjeta: {required: true, number:true, minlength: 15},
            nombre: { required: true },
			nivel: { required: true },
			ap_paterno: { required: true},
            fecha_nacimiento: { required: true, date: true},
            fecha_ingreso: { required: true, date: true},            
            curp: {required: true},
            rfc: {required: true},            
            no_empleado: { required: true},
			id_depto:  { required: true},
			id_puesto:  { required: true},
			id_tipo_trabajador:  { required: true}
		},
        messages: {
            horas: "Horas Necesarias",
            no_plaza: "Numero Necesario",
			nss: "numero de suguro social necesario",
			//tarjeta: "Numero de Tarjeta necesario",
            nombre: "Debe ingresar su Nombre.",
			nivel: "Debe ingresar el Nivel.",
			ap_paterno: "Apellido Necesario.",
            fecha_nacimiento: "Debe ingresar Fecha Nacimiento.",  
            fecha_ingreso: "Debe ingresar Fecha Ingeso.",
            curp: "Debe ingresar CURP.",  
            ap_paterno: "Apellido Necesario",
            rfc: "Debe ingresar RFC.", 
            no_empleado: "ingrese numero Empleado",
            id_depto: "Debe seleccionar Depto.",
            id_puesto: "Debe seleccionar Puesto.",     
            id_tipo_trabajador: "Debe seleccionar Tipo."
        },
        submitHandler: function(){    
            var dataString = $("#form_edit_empleado").serialize();
            var l = $("#btn_save_edit").ladda();
            l.ladda('start');
            $.ajax({
                type: "POST",
                url:baseURL + "empleado_controller/updater_empleado",
                data: dataString,
                success: function(respuesta) {
                  var obj = JSON.parse(respuesta);
                    if (obj.resultado === true) {                      
                       //Limpiar formulario
                       l.ladda('stop');
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

}

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
                  window.location.href = baseURL+"Empleado_controller/lista_deshabilitados";
                }, 2000);
              },
              error: function (xhr, ajaxOptions, thrownError) {
                swal("Error deleting!", "Please try again", "error");
              }
            });
    });
}

function editEmpleado(id, depto, puesto, trabajdor, componente, nivel , sindicalizado){
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
	var tarjeta=document.getElementById("tarjeta"+id).innerHTML;
	var correo=document.getElementById("correo"+id).innerHTML;
    console.log("hola sindicalizado");
	console.log(sindicalizado);
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
	document.getElementById("tarjetaEdit").value=tarjeta;
	document.getElementById("nivelEdit").value=nivel;
	document.getElementById("correoEdit").value=correo;

    var html = "";
    var html1 = "";
    var html2 = "";
    var html3 = "";
    var html4 = ""; //sindicalizado
    $.ajax({
        type: "GET",
        url:baseURL + "Empleado_controller/getSelected",
        success: function(respuesta) {
          var obj = JSON.parse(respuesta);

            if(sindicalizado === "Si"){
                html4 += "<option value='Si' selected>Si</option>";
                html4 += "<option value='No'>No</option>";
                $("#SindicalizadoID").html(html4);
            }else{
                html4 += "<option value='No' selected>No</option>";
                html4 += "<option value='Si'>Si</option>";
                $("#SindicalizadoID").html(html4);
            }
            if (obj.resultado === true) {                      
                              
                var num_fila = 1;
                for (l in obj.deptos) {
              
                    if (obj.deptos[l].nombre == depto) {
                        html +=  "<option value='"+ obj.deptos[l].id_depto +"' selected>" + obj.deptos[l].nombre +"</option>" ;  
                    }else{
                        html +=  "<option value='"+ obj.deptos[l].id_depto +"'>" + obj.deptos[l].nombre +"</option>" ;      
                    }
                   num_fila ++; 
                }     
                $("#deptoID").html(html); 

                var num_fila1 = 1;
                for (l in obj.puestos) {
              
                    if (obj.puestos[l].nombre == puesto) {
                        html1 +=  "<option value='"+ obj.puestos[l].id_puesto +"' selected>" + obj.puestos[l].nombre +"</option>" ;  
                    }else{
                        html1 +=  "<option value='"+ obj.puestos[l].id_puesto +"'>" + obj.puestos[l].nombre +"</option>" ;      
                    }
                   num_fila1 ++; 
                }     
                $("#puestoID").html(html1);

                var num_fila2 = 1;
                for (l in obj.tipo_trabajador) {
              
                    if (obj.tipo_trabajador[l].nombre_tipo_trabajador == trabajdor) {
                        html2 +=  "<option value='"+ obj.tipo_trabajador[l].id_tipo_trabajador +"' selected>" + obj.tipo_trabajador[l].nombre_tipo_trabajador +"</option>" ;  
                    }else{
                        html2 +=  "<option value='"+ obj.tipo_trabajador[l].id_tipo_trabajador +"'>" + obj.tipo_trabajador[l].nombre_tipo_trabajador +"</option>" ;      
                    }
                   num_fila2 ++; 
                }     
                $("#trabajadorID").html(html2);  

                var num_fila3 = 1;
                for (l in obj.componentes) {
              
                    if (obj.componentes[l].nombre == componente) {
                        html3 +=  "<option value='"+ obj.componentes[l].id_componente +"' selected>" + obj.componentes[l].nombre +"</option>" ;  
                    }else{
                        html3 +=  "<option value='"+ obj.componentes[l].id_componente +"'>" + obj.componentes[l].nombre +"</option>" ;      
                    }
                   num_fila3 ++; 
                }     
                $("#componenteID").html(html3);
            }
        } 
    });
}

////////////SECCION DE VALIDAR CURP Y RFC EMPLEADO ///////////////
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
         $("#btn_guardar_empleado").attr("disabled", false); 

    } else {        
        sweetAlert("CURP NO VALIDO","VULVA A INTENTAR","error");   
        $("#btn_guardar_empleado").attr("disabled", true); 
        return false;  
        console.log("no es validto");       
    }           
}
function ValidaRfc(rfcStr) {
  console.log("entro en la validacion del rfc");
    $.ajax({
        type: "POST",
        url: baseURL +"Empleado_controller/searchRFC",
        data: {rfc: rfcStr}, 
         success: function(respuesta){
           var obj = JSON.parse(respuesta);
           if (obj.resultado == true) {
                sweetAlert("YA EXISTE RFC","VULVA A INTENTAR CON  OTRO","error");                
                $("#btn_guardar_empleado").attr("disabled", true);                                    
            }else{
                $("#btn_guardar_empleado").attr("disabled", false);  
            }  
            if (rfcStr.length < 13) {                       
                $("#btn_guardar_empleado").attr("disabled", true);                        
                return false;                      
            }  
             if (rfcStr.length > 13) {                       
                $("#btn_guardar_empleado").attr("disabled", true);                        
                return false;                      
            }                   
        }
     });

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
    console.log(matchArray);
    if (matchArray==null) {
        sweetAlert("RFC NO VALIDA","VULVA A INTENTAR","error");  
        $("#btn_guardar_empleado").attr("disabled", true);         
        return false;
    }
    else
    {
        $("#btn_guardar_empleado").attr("disabled", false);
       // alert('Cadena correcta:' + strCorrecta);
       // sweetAlert("CAMPO SOLOA","VULVA A INTENTAR","error");  
        return true;
    }
}

////////////SECCION DE EN LA EDICION DEL EMPLEADO ///////////////
function curpValidaEdit(curp) {
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
function validarCrpEdit(input) {
    var curp = input.value.toUpperCase(),        
        valido = "No válido";
        
    if (curpValidaEdit(curp)) { // ⬅️ Acá se comprueba
        valido = "Válido";       
        console.log("si es validto");
         $("#btn_save_edit").attr("disabled", false); 

    } else {        
        sweetAlert("CURP NO VALIDO","VULVA A INTENTAR","error");     
        $("#btn_save_edit").attr("disabled", true); 
        return false;  
        console.log("no es validto");       
    }           
}
function ValidaRfcEdit(rfcStr) {

    $.ajax({
        type: "POST",
        url: baseURL +"Empleado_controller/searchRFC",
        data: {rfc: rfcStr}, 
         success: function(respuesta){
           var obj = JSON.parse(respuesta);
           if (obj.resultado === true) {
                // sweetAlert("YA EXISTE RFC","VULVA A INTENTAR","error");                                 
                // return false;
            }else{
                $("#btn_save_edit").attr("disabled", false);  
            } 
            if (rfcStr.length < 13) {                       
                $("#btn_save_edit").attr("disabled", true);                        
                return false;                      
            }  
             if (rfcStr.length > 13) {                       
                $("#btn_save_edit").attr("disabled", true);                        
                return false;                      
            }                  
        }
     });

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
        return false;
    }
    else
    {
         $("#btn_save_edit").attr("disabled", false); 
       // alert('Cadena correcta:' + strCorrecta);
       // sweetAlert("CAMPO SOLOA","VULVA A INTENTAR","error");  
        return true;
    }
}
