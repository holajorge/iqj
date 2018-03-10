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
     $("#formExtraCreate").validate({        
      rules: {
        fecha: { required: true, date: true },
        nombre: { required: true, },
        tipoConcepto: { required: true }            
      },        
      messages: {
        fecha: "Fecha es un dato necesario",
        nombre: "Nombre Necesario",
        tipoConcepto: "Debe seleccionar un tipo de concepto"      
      },
      submitHandler: function(){
        $("#crearExtraordinario").modal('hide');  //Se coculta la ventana modal  
        var dataString = $("#formExtraCreate").serialize();
        $.ajax({
            type: "POST",
            url:baseURL + "Nomina_controller/create_conceptoExtra",
            data: dataString,
            success: function(respuesta) {
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
                    //-----------------------------------------------------------------------------
                    var html = "";
                        html += "<option selected disabled hidden>Seleccione Concepto</option>";
                    var tam = obj.extraordinarios.length;                    
                    var x = 1; 
                    for (l in obj.extraordinarios) {
                        var id = obj.extraordinarios[l].id_nomina_e;
                        var nombre = obj.extraordinarios[l].nombre;
                        if (tam == x) {
                                html +=  "<option value='"+ id +"' selected>" + nombre +"</option>" ;  
                        }else{
                                html +=  "<option value='"+ id +"'>" + nombre +"</option>" ;      
                        }                                                                                                 
                        x++;                      
                    }
                    $("#dia").html(html);
                    //-----------------------------------------------------------------------------
                    var html = "";
                    var year = obj.year;    
                    for (l in obj.yearsNominaE) {
                        var id = obj.yearsNominaE[l].id_nomina_e;
                        var anio = obj.yearsNominaE[l].year;
                        if (year == anio) {
                                html +=  "<option value='"+ anio +"' selected>" + anio;
                                html += "</option>";
                        }else{
                                html +=  "<option value='"+ anio +"'>" + anio;
                                html += "</option>";      
                        }                                                                                                                     
                    }
                    $("#anioNomE").html(html);
                    //-----------------------------------------------------------------------------

                }                 
            } 
        });
      }
    });
}

//SE ACTUALIZA EL CAMPO Seleccione uno o Cree uno Nuevo
function updateConpceptoNomE(anio){
    document.getElementById("id_mostrar_datos_nomina").innerHTML = "";
    $.ajax({
        type: "POST",
        url:baseURL + "Nomina_controller/getNominaExSeleccionadoPorAnio",
        data: {anio: anio},
        success: function(respuesta) {
            var obj = JSON.parse(respuesta);
            if (obj.resultado === true) {
                //-----------------------------------------------------------------------------
                var html = "";
                    html += "<option selected disabled hidden>Seleccione Concepto</option>";
                var tam = obj.extraordinarios.length;                    
                for (l in obj.extraordinarios) {
                    var id = obj.extraordinarios[l].id_nomina_e;
                    var nombre = obj.extraordinarios[l].nombre;
                        html +=  "<option value='"+ id +"'>" + nombre +"</option>" ;                                                                                                                          
                }
                $("#dia").html(html);
                //-----------------------------------------------------------------------------                  
            }
        } 
    });
}

function insetaNominaExtaordinaria(){
        $("#guardaExtraordinario").validate({

          rules: {
            dia: {required: true},
            importe: { required: true, number: true },
            isrSubsidio: {required: true},
            impSubsidioIsr: { required: true, number: true },
            importeExento: { required: true, number: true },

          },        
          messages: {
            dia: "Seleccione un elemento",
            importe: "Cantidad de importe necesario",
            isrSubsidio: "Debe seleccionar una opción",
            impSubsidioIsr: "Debe agregar un valor numérico en el campo",
            importeExento: "Debe agregar un valor numérico en el campo",
          },
          submitHandler: function(){
            document.getElementById("btnGuardarNominaExtraordinaria").disabled = true; 
            document.getElementById("importeGravado").disabled = false;   
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
                    document.getElementById("btnGuardarNominaExtraordinaria").disabled = false;
                    document.getElementById("importeGravado").disabled = true;
                },error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                    document.getElementById("importeGravado").disabled = true;
                    document.getElementById("btnGuardarNominaExtraordinaria").disabled = false;
                } 
            });
          }
        });


}
/////////////////////////////////////////
/* METODOS PARA LA NOMINA EXTRAORDINARIA POR PERIODOS */
////////////////////////////////////////
function serach_nominaExtraordinaria(id){
    $("#id-origen-r").css('display','none');
    $("#resultadoNominaExtra").html("");
    $("#msjNoHayResultadosNomE").hide();
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
                            html += "<td><label id='no_plaza"+obj.empleado[l].id_empleado+"'>" + obj.empleado[l].no_plaza + "</label></td>";
                            html += "<td><label id='horas"+obj.empleado[l].id_empleado+"'>" + obj.empleado[l].horas +"</label></td>";
                            html += "<td><label id='nombre"+obj.empleado[l].id_empleado+"'>" + obj.empleado[l].nombre_emp +"</label></td>";
                            html += "<td><label id='ap_paterno"+obj.empleado[l].id_empleado+"'>" + obj.empleado[l].ap_paterno + " " + obj.empleado[l].ap_materno+"</label></td>";
                            html += "<td><label id='fecha_nacimiento"+obj.empleado[l].id_empleado+"'>" + obj.empleado[l].fecha_nacimiento +"</label></td>";
                            html += "<td><label id='fecha_ingreso"+obj.empleado[l].id_empleado+"'>" + obj.empleado[l].fecha_ingreso +"</label></td>";                       
                            html += "<td><label id='rfc"+obj.empleado[l].id_empleado+"'>" + obj.empleado[l].rfc + "</label></td>";
                            html += "<td><label id='curp"+obj.empleado[l].id_empleado+"'>" + obj.empleado[l].curp + "</label></td>";
                            html += "<td>";
                                if(obj.usertype == 'root' ) {
                                    html += "<button type='button' class='btn btn-primary' onclick='editEmpleExtraordinaria("+obj.empleado[l].id_empleado+", "+obj.empleado[l].importe+", "+obj.empleado[l].isr+",  "+obj.empleado[l].subsidio+" , "+obj.empleado[l].id_concepto_extraordinario+", "+obj.empleado[l].id_extraordinario+")'  data-toggle='modal' data-target='#editExtraordinaria' ><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></button>";
                                }
                            html += "<button type='button' class='btn btn-success' onclick='printDetalleExtraudinaria("+ obj.empleado[l].id_empleado +","+ obj.empleado[l].id_concepto_extraordinario +")' ><span class='glyphicon glyphicon-print' aria-hidden='true'></span></button>";
                            html += "</td>";
                        html += "</tr>";
                    html += "</thead>";
                    html += "<tbody>";
                var num_fila = 1;
                for (l in obj.empleado) {
                    html += "<tr>";
                        html += "<td><label id='no_plaza"+obj.empleado[l].id_empleado+"'>" + obj.empleado[l].no_plaza + "</label></td>";
                        html += "<td><label id='horas"+obj.empleado[l].id_empleado+"'>" + obj.empleado[l].horas +"</label></td>";
                        html += "<td><label id='nombre"+obj.empleado[l].id_empleado+"'>" + obj.empleado[l].nombre_emp +"</label></td>";
                        html += "<td><label id='ap_paterno"+obj.empleado[l].id_empleado+"'>" + obj.empleado[l].ap_paterno + " " + obj.empleado[l].ap_materno+"</label></td>";
                        html += "<td><label id='fecha_nacimiento"+obj.empleado[l].id_empleado+"'>" + obj.empleado[l].fecha_nacimiento +"</label></td>";
                        html += "<td><label id='fecha_ingreso"+obj.empleado[l].id_empleado+"'>" + obj.empleado[l].fecha_ingreso +"</label></td>";                       
                        html += "<td><label id='rfc"+obj.empleado[l].id_empleado+"'>" + obj.empleado[l].rfc + "</label></td>";
                        html += "<td><label id='curp"+obj.empleado[l].id_empleado+"'>" + obj.empleado[l].curp + "</label></td>";
                        html += "<td>";
                        html += "<button type='button' class='btn btn-primary' onclick='editEmpleExtraordinaria("+obj.empleado[l].id_extraordinario+","+obj.empleado[l].id_empleado+","+obj.empleado[l].id_nomina_e+", "+obj.empleado[l].importeExento+", "+obj.empleado[l].importeGravado+","+obj.empleado[l].isrSubsidio+","+obj.empleado[l].importeIsrSub+","+obj.empleado[l].yearNomE+")'  data-toggle='modal' data-target='#editExtraordinaria' ><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></button>";
                        html += "<button type='button' class='btn btn-success' onclick='printDetalleExtraudinaria("+ obj.empleado[l].id_empleado +","+ obj.empleado[l].id_nomina_e +")' ><span class='glyphicon glyphicon-print' aria-hidden='true'></span></button>";
                        if(obj.empleado[l].file_name) {
                            html += "<label class='text-success'>Empleado Timbrado</label>";
                        }else{
                            html += "<button style='margin:1px 1px' class='btn btn-success' onclick='confirmarTimbradoNomE("+obj.empleado[l].id_empleado+","+obj.empleado[l].id_nomina_e+")'><span class='fa fa-bullhorn' aria-hidden='true'></span></button>";
                        }
                        html += "</td>";
                        html += "<td>";
                            if(obj.empleado[l].file_name) {
                                html += "<a style='margin:1px 1px; color: white; ' class='btn btn-primary' href='" + baseURL + "Nomina_controller/timbradopdfNomE?id_emp=" + obj.empleado[l].id_empleado + "&id_nom=" + obj.empleado[l].id_nomina_e + "'><span class='fa fa-file-pdf-o' aria-hidden='true'></span></a>";
                                html += "<a style='margin:1px 1px;color: white; ' class='btn btn-primary' href='" + baseURL + "Nomina_controller/timbradoxmlNomE?id_emp=" + obj.empleado[l].id_empleado + "&id_nom=" + obj.empleado[l].id_nomina_e + "'><span class='fa fa-file-excel-o' aria-hidden='true'></span></a>";
                            }else{
                                html += "<label style='color: #97310e'>primero tiene que Timbrar</label>";
                                
                            }
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
            }else{
                $("#msjNoHayResultadosNomE").show();
            }
        } 
    });
}

function editEmpleExtraordinaria(id_extraordinario, id_empleado, id_nomina_e, importeExento, importeGravado, isrSubsidio,importeIsrSub, yearNomE){
    $("#guardaExtraordinario")[0].reset();
     $("#dia").html("");
    var importeExentoNE = parseFloat(importeExento);
    var importeGravadoNE = parseFloat(importeGravado);
    var totalImporte = importeExentoNE + importeGravadoNE;
    var no_plaza=document.getElementById("no_plaza"+id_empleado).innerHTML;  
    var horas=document.getElementById("horas"+id_empleado).innerHTML;
    var nombre=document.getElementById("nombre"+id_empleado).innerHTML;
    var ap_paterno=document.getElementById("ap_paterno"+id_empleado).innerHTML;
    // var ap_materno=document.getElementById("ap_materno"+id).innerHTML;
    var fecha_nacimiento=document.getElementById("fecha_nacimiento"+id_empleado).innerHTML;    
    var fecha_ingreso=document.getElementById("fecha_ingreso"+id_empleado).innerHTML;        
    var rfc=document.getElementById("rfc"+id_empleado).innerHTML;
    var curp=document.getElementById("curp"+id_empleado).innerHTML; 

    document.getElementById("idEditar").innerHTML=id_extraordinario+"";
    document.getElementById("idEditar").value=id_extraordinario;
    document.getElementById("idEmpleado").value=id_empleado;
    document.getElementById("num_plazaEdit").value=no_plaza;
    document.getElementById("nombreEdit").value=nombre;
    document.getElementById("horasEdit").value=horas;
    document.getElementById("ap_paternoEdit").value=ap_paterno;
    // document.getElementById("ap_maternoEdit").value=ap_materno;
    document.getElementById("fecha_nacimientoEdit").value=fecha_nacimiento;
    document.getElementById("fecha_ingresoEdit").value=fecha_ingreso;    
    document.getElementById("rfcEdit").value=rfc;
    document.getElementById("curpEdit").value=curp;

    document.getElementById("importe").value=totalImporte;
    document.getElementById("importeExento").value=importeExentoNE;
    document.getElementById("importeGravado").value=importeGravadoNE;
	document.getElementById("impSubsidioIsr").value=importeIsrSub;

    if (parseInt(isrSubsidio) == 0 ) {
        document.getElementById("isrRadio").checked = true;
    }else{
        document.getElementById("subsidioRadio").checked = true;
    }

    $.ajax({
            type: "POST",
            url:baseURL + "Nomina_controller/getDataEditNomE",
            data: {anio: yearNomE},
            success: function(respuesta) {
                var obj = JSON.parse(respuesta);
                if (obj.resultado === true) {
                    //----------------------------------------------------------------------------------------------------------------------------------
                    var html = ""; 
                    var num_fila = 1;
                    for (l in obj.extraordinarios) {
                  
                        if (obj.extraordinarios[l].id_nomina_e == id_nomina_e) {
                            html +=  "<option value='"+ obj.extraordinarios[l].id_nomina_e +"' selected>" + obj.extraordinarios[l].nombre +"</option>" ;  
                        }else{
                            html +=  "<option value='"+ obj.extraordinarios[l].id_nomina_e +"'>" + obj.extraordinarios[l].nombre +"</option>" ;      
                        }
                       num_fila ++;                     
                    }     
                    $("#dia").html(html);
                    //-----------------------------------------------------------------------------------------------------------------------------------
                    var html = ""; 
                    var num_fila = 1;
                    for (l in obj.yearsNomE) {
                  
                        if (obj.yearsNomE[l].year == yearNomE) {
                            html +=  "<option value='"+ obj.yearsNomE[l].year +"' selected>" + obj.yearsNomE[l].year +"</option>" ;  
                        }else{
                            html +=  "<option value='"+ obj.yearsNomE[l].year +"'>" + obj.yearsNomE[l].year +"</option>" ;      
                        }
                       num_fila ++;                     
                    }     
                    $("#anioNomE").html(html);
                    //--------------------------------------------------------------------------------------------------------------------------------------           
                }
            } 
        });
}

function edit_extraordinaria(){
    $("#guardaExtraordinario").validate({

      rules: {
        dia: {required: true},
        importe: { required: true, number: true },
        isrSubsidio: {required: true},
        impSubsidioIsr: { required: true, number: true },
        importeExento: { required: true, number: true },

      },        
      messages: {
        dia: "Seleccione un elemento",
        importe: "Cantidad de importe necesario",
        isrSubsidio: "Debe seleccionar una opción",
        impSubsidioIsr: "Debe agregar un valor numérico en el campo",
        importeExento: "Debe agregar un valor numérico en el campo",
      },
      submitHandler: function(){
        document.getElementById("btnGuardarNominaExtraordinaria").disabled = true; 
        document.getElementById("importeGravado").disabled = false;   
        var dataString = $("#guardaExtraordinario").serialize();
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
            },error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
            document.getElementById("importeGravado").disabled = true;
            document.getElementById("btnGuardarNominaExtraordinaria").disabled = false;
            } 
        });
      }
    });
}

function printDetalleExtraudinaria(id_empleado, id_nomina_e){
    window.open(baseURL + "Nomina_controller/pdf_por_empleadoExtraordinario?id_emp="+ id_empleado +"&id_nom="+id_nomina_e);
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
                    text: "<strong> EL EMPLEADO YA SE HA DADO DE ALTA EN ESTA NÓMINA EXTRAORDINARIA </strong>",
                    type: "warning"
                });
                $('#dia').get(0).selectedIndex = 0;                   
            }else{
                document.getElementById("id_mostrar_datos_nomina").innerHTML = obj.infoNomE[0]['fecha'] + " " + obj.infoNomE[0]['nombre'];
            }
        } 
    });

}
//****************************************************************************************************************
//SE HACE UNA BÚSQUEDA POR AÑO DE LA LISTA DE NOMINAS ESTRAORDINARIAS
//****************************************************************************************************************
function obtnerListaNomEporAnio(anio_nomina){
    $("#resultadoNominaExtra").html("");
    $.ajax({
        type: "POST",
        url:baseURL + "Nomina_controller/listNomEporAnio",
        data: {anio_nomina: anio_nomina},
        success: function(respuesta) {
            var obj = JSON.parse(respuesta);
            if (obj.resultado === true) {
                var html = "";
                    html += "<option selected disabled hidden >Seleccione nomina Extraordinaria</option>"; 
                for (l in obj.periodosNomE) {
                    html +=  "<option value='"+ obj.periodosNomE[l].id_nomina_e +"'>" + obj.periodosNomE[l].nombre +"</option>" ;                 
                }     
                $("#periodo").html(html);                 
            }else{
                //document.getElementById("id_mostrar_datos_nomina").innerHTML = obj.infoNomE[0]['fecha'] + " " + obj.infoNomE[0]['nombre'];
            }
        } 
    });
}

//****************************************************************************************************************
//SE HACE UNA BÚSQUEDA POR AÑO DE LA LISTA DE NOMINAS ESTRAORDINARIAS
//****************************************************************************************************************
function calcularImporteGravado(){
    document.getElementById("msjErrorImpExcento").innerHTML = "";
    document.getElementById("msjErrorTotalImp").innerHTML = "";
    document.getElementById("labelErrorimpSubsidioIsr").innerHTML = "";
    var totalImporte = document.getElementById("importe").value;
    var importeExento = document.getElementById("importeExento").value;
    var importeGravado = document.getElementById("importeGravado").value;
    var impSubsidioIsr = document.getElementById("impSubsidioIsr").value;
    var error = false;
    if (totalImporte ==  "") {
        totalImporte = 0;
    }else if (totalImporte < 0) {
        document.getElementById("msjErrorTotalImp").innerHTML = "No se permiten números negativos";
        error = true;
    }else if (totalImporte == 0) {
        document.getElementById("msjErrorTotalImp").innerHTML = "El importe debe ser mayor que 0 (cero)";
        error = true;
    }

    if (importeGravado ==  "") {
        importeGravado = 0;
    }

    if (importeExento ==  "") {
        importeExento = 0;
    }

    if (impSubsidioIsr == "") {
        impSubsidioIsr = 0;
    }else if (parseFloat(impSubsidioIsr) < 0){
        document.getElementById("labelErrorimpSubsidioIsr").innerHTML = "No se permiten números negativos";
        error = true;
    }else if (parseFloat(impSubsidioIsr) > parseFloat(importeGravado)) {
        document.getElementById("labelErrorimpSubsidioIsr").innerHTML = "El valor no puede ser mayor al importe Gravado";
        error = true;
    }

    if (parseFloat(importeExento) < 0) {
        document.getElementById("importeGravado").value = 0;
        document.getElementById("msjErrorImpExcento").innerHTML = "No se permiten números negativos";
        error = true;
    }else if ( parseFloat(importeExento) > parseFloat(totalImporte)) {
        document.getElementById("importeGravado").value = 0;
        document.getElementById("msjErrorImpExcento").innerHTML = "El importe exento no puede ser mayor al Total Importe";
        error = true;
    }else{
        document.getElementById("importeGravado").value = parseFloat(totalImporte) - parseFloat(importeExento);
    }
    if (error) {
        $("#btnGuardarNominaExtraordinaria").hide();
    }else{
        $("#btnGuardarNominaExtraordinaria").show();
    }

}
//***************************************************************************************************
//ÁRE DE TIMBRADO
//***************************************************************************************************
function confirmarTimbradoNomE($id_empleado,$id_nomina_e){
    var opciones = document.getElementsByName("rb-origen-recurso");
    var seleccionado = false;
    var origenRecurso = "";
    for(var i=0; i<opciones.length; i++) {    
      if(opciones[i].checked) {
        origenRecurso = opciones[i].value;
        seleccionado = true;
        break;
      }
    }
    
    //PRIMERO SE VALIDA QUE HAYA INTERNET, DE LO CONTRARIO SE MUESTRA UN MENSAJE
    if (navigator.onLine) {
        //SE VERIFICA QUE SE HAYA SELECCIONADO EL ORIGEN DEL RECURSO
        if(seleccionado) {
            swal({
                title: "Confirmar",
                text: "¿Esta seguro de que desea timbrar esta nómina?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Si, Timbrar!",
                closeOnConfirm: true
                }, function () {
                    window.open(baseURL+"nomina_controller/verificaExisteTimbreNomE?id_emp="+$id_empleado+"&id_nom="+$id_nomina_e+"&origenR="+origenRecurso, '_blank');
            });
        }else{
            swal({
                html:true,
                title: "",
                text: "<strong> DEBE SELECCIONAR EL ORIGEN DEL RECURSO PARA EL TIMBRADO DE LA NÓMINA </strong>",
                type: "warning"
            });
        }
    }else{
        swal({
            html:true,
            title: "ERROR",
            text: "<strong> NO HAY CONEXIÓN A INTERNET, VERIFIQUE SU CONEXIÓN </strong>",
            type: "warning"
        });
    }
    
}