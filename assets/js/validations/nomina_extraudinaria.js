$(document).ready(function() {



});

/////////////////////////////////
/*  METODOS PARA ALTA DE NOMINA EXTRORDINARIA POR EMPLEADOS  */
////////////////////////////////
function datosEmpleado(id){

    $("#detalle_tipo").html("");
	var no_plaza=document.getElementById("no_plaza"+id).innerHTML;    
    var horas=document.getElementById("horas"+id).innerHTML;
    var nombre=document.getElementById("nombre_emp"+id).innerHTML;
    var ap_paterno=document.getElementById("ap_paterno"+id).innerHTML;
    var ap_materno=document.getElementById("ap_materno"+id).innerHTML;
    var fecha_nacimiento=document.getElementById("fecha_nacimiento"+id).innerHTML;    
    var fecha_ingreso=document.getElementById("fecha_ingreso"+id).innerHTML;        
    var rfc=document.getElementById("rfc"+id).innerHTML;
    // var no_empleado=document.getElementById("no_empleado"+id).innerHTML;
    var curp=document.getElementById("curp"+id).innerHTML;   
    // var nombre_depto=document.getElementById("nombre_depto"+id).innerHTML;
    // var nombre_puesto=document.getElementById("nombre_puesto"+id).innerHTML;
    var trabajador=document.getElementById("trabajador"+id).innerHTML; 

    document.getElementById("idEditar").innerHTML=id+"";
    document.getElementById("idEditar").value=id;
    // document.getElementById("tipo_Empleado").value=trabajador;                   
    document.getElementById("num_plazaEdit").value=no_plaza;
    document.getElementById("horasEdit").value=horas;
    document.getElementById("nombreEdit").value=nombre;
    document.getElementById("ap_paternoEdit").value=ap_paterno;
    document.getElementById("ap_maternoEdit").value=ap_materno;
    document.getElementById("fecha_nacimientoEdit").value=fecha_nacimiento;
    document.getElementById("fecha_ingresoEdit").value=fecha_ingreso;    
    document.getElementById("rfcEdit").value=rfc;
    document.getElementById("curpEdit").value=curp;

    var html = "";

    html += "<h3 class='text-center'>TIPO TRABAJADOR <strong>  "+ trabajador +" </strong></h3>";
     $("#detalle_tipo").html(html);
    // document.getElementById("no_empleadoEdit").value=no_empleado;   
    // document.getElementById("deptoEdit").value=nombre_depto; 
    // document.getElementById("puestoEdit").value=nombre_puesto; 

    $('#myTabs a[href="#det_nomina"]').tab('show');    
}

function insetaExtaordinaria(){

    $("#dia").html("");
    $("#crearExtraordinario").modal('hide');
     $("#formExtraCreate").validate({        
      rules: {
        fecha: { required: true, date: true },
        nombre: { required: true, },            
      },        
      messages: {
        fecha: "Fecha es un dato necesario",
        nombre: "Nombre Necesario",            
      },
      submitHandler: function(){    
        var dataString = $("#formExtraCreate").serialize();
        $.ajax({
            type: "POST",
            url:baseURL + "Nomina_controller/create_conceptoExtra",
            data: dataString,
            success: function(respuesta) {
                console.log(respuesta);
                var obj = JSON.parse(respuesta);
                if (obj.resultado === true) {
                    //setTimeout(function() {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'slideDown',
                            timeOut: 1200
                        };
                        toastr.success('El concepto de agregó correctamente', 'ACTUALIZANDO DATOS'); 
                    //}, 1300);
                    $('#formExtraCreate')[0].reset();
                    var html = "";
                        html += "<option selected disabled hidden>Seleccione Concepto</option>";
                    var tam = obj.extraordinarios.length;                    
                    var x = 1; 
                    for (l in obj.extraordinarios) {
                        var id = obj.extraordinarios[l].id_concepto_extraordinario;
                        var nombre = obj.extraordinarios[l].nombre;
                        if (tam == x) {
                                html +=  "<option value='"+ id +"' selected>" + nombre +"</option>" ;  
                        }else{
                                html +=  "<option value='"+ id +"'>" + nombre +"</option>" ;      
                        }                                                                                                 
                        x++;                      
                    }
                    $("#dia").html(html);                    
                }
                // $("#crearExtraordinario").modal('hide');                 
            } 
        });
      }
    });
}

function insetaNominaExtaordinaria(){

    $("#guardaExtraordinario").validate({

      rules: {
        dia: {required: true},
        importe: { required: true, number: true },

      },        
      messages: {
        dia: "Seleccione un elemento",
        importe: "Cantidad de importe necesario",

      },
      submitHandler: function(){    
        var dataString = $("#guardaExtraordinario").serialize();
        $.ajax({
            type: "POST",
            url:baseURL + "Nomina_controller/createNominaExtraordinaria",
            data: dataString,
            success: function(respuesta) {
                var obj = JSON.parse(respuesta);
                if (obj.resultado === true) {
                    swal("GUARDADO", "LA NÓMINA EXTRAORDINARIA SE GUARDADO CORRECTAMENTE", "success");
                    setTimeout(function(){
                        window.location.replace(baseURL + "Nomina_controller/create_extraordinaria");
                    }, 1500);                    
                }
            } 
        });
      }
    });
}
/////////////////////////////////////////
/* METODOS PARA LA NOMINA EXTRAORDINARIA POR PERIODOS */
////////////////////////////////////////
function serach_nominaExtraordinaria(id){
    $("#resultadoNominaExtra").html("");
    $.ajax({
            url: baseURL + "Nomina_controller/buscar_diasExtraordinarios",
            type: "POST",
            data: {id: id},
            success: function(respuesta) {
                var obj = JSON.parse(respuesta);
                    console.log(obj);
                    if (obj.resultado === true) {                                                                
                    // **********************************************************************
                    //Creación de la tabla de resultados para seleccionar empleado  con nomina extraordinaria
                    var html = ""; 
                    // html += "<div class='ibox-content'>";  
                    html += "<div class='table-responsive'>";
                    html += "<table class='table table-striped table-bordered table-hover dataTables-example' id='tabla_extraordinario'>";
                        html += "<thead>";
                            html += "<tr>";   
                                html += "<th>SELECCIONAR </th>";                 
                                html += "<th>NO. PLAZA </th>";
                                html += "<th>HORAS</th>";
                                html += "<th>NOMBRE</th>";
                                html += "<th>APELLIDOS</th>";
                                html += "<th>FECHA NACIMIENTO</th>";
                                html += "<th>FECHA INGRESO</th>";                    
                                html += "<th>RFC</th>";
                                html += "<th>CURP</th>";
                                html += "<th>ACCIONES</th>";              
                            html += "</tr>";
                        html += "</thead>";
                        html += "<tbody>";
                    var num_fila = 1;
                    for (l in obj.empleado) {
                       console.log(obj.empleado[l].id_concepto_extraordinario);
                       console.log(obj.empleado[l].id_empleado);
                        html += "<tr>";
                            html += "<td class='text-center'><input type='checkbox' class='i-checks' name='input[]'></td>";
                            html += "<td><label id='no_plaza"+obj.empleado[l].id_empleado+"'>" + obj.empleado[l].no_plaza + "</label></td>";
                            html += "<td><label id='horas"+obj.empleado[l].id_empleado+"'>" + obj.empleado[l].horas +"</label></td>";
                            html += "<td><label id='nombre"+obj.empleado[l].id_empleado+"'>" + obj.empleado[l].nombre_emp +"</label></td>";
                            html += "<td><label id='ap_paterno"+obj.empleado[l].id_empleado+"'>" + obj.empleado[l].ap_paterno + " " + obj.empleado[l].ap_materno+"</label></td>";
                            html += "<td><label id='fecha_nacimiento"+obj.empleado[l].id_empleado+"'>" + obj.empleado[l].fecha_nacimiento +"</label></td>";
                            html += "<td><label id='fecha_ingreso"+obj.empleado[l].id_empleado+"'>" + obj.empleado[l].fecha_ingreso +"</label></td>";                       
                            html += "<td><label id='rfc"+obj.empleado[l].id_empleado+"'>" + obj.empleado[l].rfc + "</label></td>";
                            html += "<td><label id='curp"+obj.empleado[l].id_empleado+"'>" + obj.empleado[l].curp + "</label></td>";
                            html += "<td>";
                            html += "<button type='button' class='btn btn-primary' onclick='editEmpleExtraordinaria("+obj.empleado[l].id_empleado+", "+obj.empleado[l].importe+", "+obj.empleado[l].isr+",  "+obj.empleado[l].subsidio+" , "+obj.empleado[l].id_concepto_extraordinario+", "+obj.empleado[l].id_extraordinario+")'  data-toggle='modal' data-target='#editExtraordinaria' ><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></button>";
                            html += "<button type='button' class='btn btn-success' onclick='printDetalleExtraudinaria("+ obj.empleado[l].id_empleado +","+ obj.empleado[l].id_concepto_extraordinario +")' ><span class='glyphicon glyphicon-print' aria-hidden='true'></span></button>";
                             html += "</td>";
                        html += "</tr>";
                        num_fila ++;
                    }
                    html += "</tbody>";
                    html += "</table>";
                    html += "</div>";
                    // html += "</div>";
                    $("#resultadoNominaExtra").html(html);
                    inicalizarDataTable('tabla_extraordinario');
                    // ***********************************************************************
            }
        } 
    });
}

function editEmpleExtraordinaria(id, importe, isr, subsidio, nombreExtraa, id_extraordinario){

    console.log(nombreExtraa);
     $("#dia").html("");

    var no_plaza=document.getElementById("no_plaza"+id).innerHTML;  
    var horas=document.getElementById("horas"+id).innerHTML;
    var nombre=document.getElementById("nombre"+id).innerHTML;
    var ap_paterno=document.getElementById("ap_paterno"+id).innerHTML;
    // var ap_materno=document.getElementById("ap_materno"+id).innerHTML;
    var fecha_nacimiento=document.getElementById("fecha_nacimiento"+id).innerHTML;    
    var fecha_ingreso=document.getElementById("fecha_ingreso"+id).innerHTML;        
    var rfc=document.getElementById("rfc"+id).innerHTML;
    var curp=document.getElementById("curp"+id).innerHTML; 

    document.getElementById("idEditar").innerHTML=id+"";
    document.getElementById("idEditar").value=id;
    document.getElementById("num_plazaEdit").value=no_plaza;
    document.getElementById("nombreEdit").value=nombre;
    document.getElementById("horasEdit").value=horas;
    document.getElementById("ap_paternoEdit").value=ap_paterno;
    // document.getElementById("ap_maternoEdit").value=ap_materno;
    document.getElementById("fecha_nacimientoEdit").value=fecha_nacimiento;
    document.getElementById("fecha_ingresoEdit").value=fecha_ingreso;    
    document.getElementById("rfcEdit").value=rfc;
    document.getElementById("curpEdit").value=curp;

    document.getElementById("importeEdit").value=importe;
    document.getElementById("isrEdit").value=isr;
    document.getElementById("idEditarExtra").value=id_extraordinario;
	document.getElementById("subsidio").value=subsidio;

    $.ajax({
            type: "POST",
            url:baseURL + "Nomina_controller/getConceptosExtraordinarios",
            success: function(respuesta) {
                var obj = JSON.parse(respuesta);
                if (obj.resultado === true) {
                    
                    var html = ""; 
                    var num_fila = 1;
                    for (l in obj.conseptoExtra) {
                  
                        if (obj.conseptoExtra[l].id_concepto_extraordinario == nombreExtraa) {
                            html +=  "<option value='"+ obj.conseptoExtra[l].id_concepto_extraordinario +"' selected>" + obj.conseptoExtra[l].nombre +"</option>" ;  
                        }else{
                            html +=  "<option value='"+ obj.conseptoExtra[l].id_concepto_extraordinario +"'>" + obj.conseptoExtra[l].nombre +"</option>" ;      
                        }
                       num_fila ++;                     
                    }     
                    $("#dia").html(html);            
                }
            } 
        });
}

function edit_extraordinaria(){
     
     $("#form_edit_extraordinaria").validate({

        rules: {
            dia: {required: true},
            importe: { required: true, number: true }
        },        
        messages: {
            dia: "Seleccione un consepto",
            importe: "Cantidad de importe necesario"
        },
        submitHandler: function(){    
           var dataString = $("#form_edit_extraordinaria").serialize();
            $.ajax({
                type: "POST",
                url:baseURL + "Nomina_controller/editNominaExtraordinaria",
                data: dataString,
                success: function(respuesta) {
                    var obj = JSON.parse(respuesta);
                    if (obj.resultado === true) {
                        swal("ACTUALIZADO", "LA NÓMINA EXTRAORDINARIA SE ACTUALIZO CORRECTAMENTE", "success");
                        setTimeout(function(){
                            window.location.replace(baseURL + "Nomina_controller/extraordinario");
                        }, 1500);                    
                    }
                } 
            });
        }
     });
}

function printDetalleExtraudinaria(id_empleado, id_concepto_extraordinario){
    window.open(baseURL + "Nomina_controller/pdf_por_empleadoExtraordinario?id_emp="+ id_empleado +"&id_nom="+id_concepto_extraordinario);
}
//****************************************************************************************************************
//SE VALIDA QUE NO SE DUPLIQUEN LOS EMPLEADOS EN LA MISMA NÓMNIA EXTRAORDINARIA
//****************************************************************************************************************
function validarNoDuplicidad(idNomExtraordinaria){
    var id_empleado = document.getElementById("idEditar").value;
    $.ajax({
        type: "POST",
        url:baseURL + "Nomina_controller/validarEmpEnNominaEx",
        data: {id_empleado: id_empleado,
                id_nom_ex: idNomExtraordinaria},
        success: function(respuesta) {
            var obj = JSON.parse(respuesta);
            if (obj.resultado === true) {
                swal({
                    html:true,
                    title: "",
                    text: "<strong> EL EMPLEADO YA SE HA DADO DE ALTA EN ESTA NÓMINA </strong>",
                    type: "warning"
                });
                $('#dia').get(0).selectedIndex = 0;                   
            }
        } 
    });

}
