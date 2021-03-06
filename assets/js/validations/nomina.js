$(document).ready(function() {
    
});

var trabajador_eventual = false;
var anio = 2016;
function tab_det_nomina(id){
    trabajador_eventual = false;
    $("#total_percepcion").html("");
    $("#total_deducciones").html("");
    $("#total_aportaciones").html("");
    $("#liquido-nom").html("");
    //$('#body_tabla_percepciones')[0].reset();
    $("#body_tabla_percepciones").empty();
    $("#body_tabla_deducciones").html("");
    $("#body_tabla_aportaciones").html("");
    $("#encabezado_nomina_1").html("");
    $("#dropdown_lista_periodos").html("");
    $("#txt_per_quinq").html("");

    var d = document.getElementById("det_nomina_oculto"); 
        d.setAttribute("style", "display: none;");
    //Se pasa a la siguiente pestaña
    $('#myTabs a[href="#det_nomina"]').tab('show');
    
    // **********************************************************************
    // variables necesarias
    var no_plaza=document.getElementById("no_plaza"+id).innerHTML;    
    var horas=document.getElementById("horas"+id).innerHTML;
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
    var id_tipo_trabajador = document.getElementById("id_tipo_trabajador"+id).value;
    //Creación de la tabla de resultados
    var html = "";
    if (id_tipo_trabajador == 3) {
        trabajador_eventual = true;
    }
    html += "<h2 class='text-center'> TRABAJADOR <strong>  "+ trabajador +" </strong></h2>";
    html += "<table class='table table-bordered'>";
    html += "<tbody>";
    
        var id_empleado = id;

        html += "<tr>";
        html += "<td COLSPAN='8' class='text-center'> DATOS DEL EMPLEADO</td>";
        html += "</tr>";

        html += "<tr>";
        html += "<td>  <input type='hidden' id ='id_empleado_en_nomina' value='"+ id_empleado +"'> No. de plaza: </td>";
        html += "<td>" + " "+ no_plaza +"</td>";
        html += "<td> No. empleado: </td>";
        html += "<td>" + " "+ no_empleado+ "</td>";
        html += "<td> Nombre: </td>";
        html += "<td>" + " "+ nombre +" "+ap_paterno + " " + ap_materno +"</td>";
        html += "<td> R.F.C: </td>";
        html += "<td>" + " "+ rfc+ "</td>";
        html += "</tr>";

        html += "<tr>";
        html += "<td> Curp: </td>";
        html += "<td>" + " "+curp + "</td>";
        html += "<td> Departamento:  </td>";
        html += "<td>" + " "+ nombre_depto + "</td>";
        html += "<td> Puesto: </td>";
        html += "<td COLSPAN='3'>" + nombre_puesto + "</td>";
        html += "</tr>";
        
    html += "</tbody>";
    html += "</table>";
    $("#encabezado_nomina_1").html(html);

    //SE LLAMA A LA FUNCIÓN QUE LISTA LOS PERIODOS QUINQUENALES EN EL DROPDOWN
    listar_periodo_quinquenal();
    // ***********************************************************************    
}
// ***********************************************************************************
// LISTAR PERIODO QUINQUENAL
// ***********************************************************************************
function listar_periodo_quinquenal(){
    $("#dropdown_lista_periodos").html("");
    $.ajax({
            url: baseURL + "Nomina_controller/getAll",
            type: "POST",
            data: { },
            success: function(respuesta) {
            var obj = JSON.parse(respuesta);
                if (obj.resultado === true) {
                    var html = "";
                    for (l in obj.periodo_nomina) {
                        var id_nomina = obj.periodo_nomina[l].id_nomina;
                        var per_quinq = obj.periodo_nomina[l].periodo_quinquenal;
                        var fecha_inicio = obj.periodo_nomina[l].periodo_inicio;
                        var fecha_fin = obj.periodo_nomina[l].periodo_fin;
                        html += "<li>";
                        html +=  "<input type='hidden' class='input_per_quinq_"+ id_nomina +"' value='"+ id_nomina +"'>";
                        html +=  "<input type='hidden' class='input_per_quinq_"+ id_nomina +"' value='"+ per_quinq +"'>";
                        html +=  "<input type='hidden' class='input_per_quinq_"+ id_nomina +"' value='"+ fecha_inicio +"'>";
                        html +=  "<input type='hidden' class='input_per_quinq_"+ id_nomina +"' value='"+ fecha_fin +"'>";
                        html += "<a href='#' onclick='mostrar_tablas_det_nomina(event,"+id_nomina+")'> <strong>"+ per_quinq +"</strong> | " + fecha_inicio +" | " + fecha_fin +"</a>";
                        html += "</li>";
                        html += "<li role='separator' class='divider'></li>";
                    }
                    $("#dropdown_lista_periodos").html(html);                    
                }
        } 
    });
}
// ***********************************************************************************
// MOSTRAR LAS TABLAS OCULTAS DEL DETALLE DE NÓMINA
// ***********************************************************************************
function mostrar_tablas_det_nomina(event,id_nomina){
    event.preventDefault();
    var id_empleado = document.getElementById("id_empleado_en_nomina").value;
    $.ajax({
        url: baseURL + "Nomina_controller/validar_empleado_nomina",
        type: "POST",
        data: {
            id_empleado: id_empleado,
            id_nomina: id_nomina
        },
        success: function(respuesta) {
            var obj = JSON.parse(respuesta);
            if (obj.resultado === true) {
                swal({
                    html:true,
                    title: "",
                    text: "<strong> EL EMPLEADO YA SE HA DADO DE ALTA EN ESTE PERIODO QUINQUENAL </strong>",
                    type: "warning"
                });

                var d = document.getElementById("det_nomina_oculto"); 
                    d.setAttribute("style", "display: none;");
                    $("#txt_per_quinq").html("");
            }else{
                
                var d = document.getElementById("det_nomina_oculto"); 
                    d.setAttribute("style", "display: block;");
                    $("#mostrar_aportaciones").show();
                mostrar_per_quinquenal(id_nomina);
                //SE AGREGAN LOS DATOS DE LA ÚLTIMA NOMINA DEL EMPLEADO
                //SOLO SI EXISTIESEN REGISTROS
                agregarDatosNominaAnterior(); 
            }
        } 
    });

    
}
// ***********************************************************************************
// MOSTRAR EL PERIODO QUINQUENAL DE LA NÓMINA EN LA VISTA DEL HTML
// ***********************************************************************************
function mostrar_per_quinquenal(id_nomina){

    var periodo_q = $(".input_per_quinq_" + id_nomina);
    var valores = periodo_q.toArray();
    var id_per_q = valores[0].value;
    var per_q = valores[1].value;
    var per_q_inicio = valores[2].value;
    var per_q_fin = valores[3].value;
    var html = "";
        html += "<input type='hidden' id='id_per_q_nomina' value='"+ id_per_q +"'>";
        html += "Periodo "+per_q+": del "+ per_q_inicio +" al "+ per_q_fin;
    $("#txt_per_quinq").html(html);

    //se guarda en el DOM el año en que se realiza la nómina
    var arrayDeCadenas = per_q_inicio.split("-");
    var anioNomina = arrayDeCadenas[0];
    document.getElementById('anioNomina').value = anioNomina;
}
// ***********************************************************************************
// PERCEPCIONES
// ***********************************************************************************
function lista_percepciones(){

    var data=verificarConceptosExistentes("id_tab_per");
    $.ajax({
        url: baseURL + "Percepciones_ctrl/lista_percepciones",
        type: "POST",
        data: {

        },
        success: function(respuesta) {
            var obj = JSON.parse(respuesta);
                if (obj.resultado === true) {
                
                    // var html = "";
                    for (l in obj.percepciones) {
                        var id_percepcion = obj.percepciones[l].id_percepcion;
                        var existe = false;
                        for (var i = 0; i < data.length; i++) {
                            if (data[i].id == id_percepcion) {
                                existe = true;
                            } 
                        }
                        if ( !existe) {
                            var table = document.getElementById("id_tab_per");
                            var row = table.insertRow(2);
                            var cell1_id_per = row.insertCell(0);
                            var cell2_codigo = row.insertCell(1);
                            var cell3_desc = row.insertCell(2);
                            var cell4_importe = row.insertCell(3);
                            var cell5_eliminar = row.insertCell(4);
                            cell1_id_per.innerHTML = obj.percepciones[l].id_percepcion;
                            cell1_id_per.setAttribute("style", "display: none;");
                            cell2_codigo.innerHTML = obj.percepciones[l].indicador;
                            cell3_desc.innerHTML = obj.percepciones[l].nombre + "<input type='hidden' id='id_per_form_"+obj.percepciones[l].id_percepcion +"' value='"+obj.percepciones[l].formula+"' >";
                            cell4_importe.innerHTML = "<input type='number' style='text-align: right;' id='id_per_"+id_percepcion+"' onkeyup='calc_total_percepciones()' onchange='calc_total_percepciones()' name='importe_percepcion' class='importe_percepcion'> ";
                            cell5_eliminar.innerHTML = "<button type='button' id='borrar_celda_per' class='btn btn-danger btn-sm'> <span class='glyphicon glyphicon-trash'></span> </button>";
                        }
                    }
                    //SE LLAMA A LA FUNCIÓN QUE CALCULA UTOMÁTICAMENTE LAS DEDUCCIONES
                    calc_deducciones_por_percepcion(sueldoConfianzaMasQuinquenio, sueldoConfianza);
                    calc_total_percepciones();
                    //SE ORDENA LA TABLA DE FORMA ASCENDENTE
                    ordenarTablas("id_tab_per");  
            }
        } 
    });
}

    var sueldoConfianzaMasQuinquenio = 0;
    var sueldoConfianza = 0;
function calc_total_percepciones(){
    var checkboxes = $(".importe_percepcion");
    // Convertimos el jQuery object a array
    var valores = checkboxes.toArray();
    var total_percepciones = 0;

    //Se declara el indice de la celda 
    var indiceCelda = 2;
    
    sueldoConfianzaMasQuinquenio = 0;
    sueldoConfianza = 0;
    for (var i = 0; i < valores.length; i++) {
        var id  = valores[i].id;
        var id_percepcion = id.split("_");
        var valor = document.getElementById("id_per_"+id_percepcion[2]).value;
        if (valor != "") {
            total_percepciones += parseFloat(valor);

            //**********************************************************************************
            //Calcular las deducciones en base al SUELDO DE CONGIANZA y QUINQUENIO
            var id = document.getElementById("id_tab_per").rows[indiceCelda].cells[0].innerText;
            //var valorAsumar = document.getElementById("id_tab_per").rows[indiceCelda].cells[3].innerText;
            if (id == 1 | id == 7) {
               sueldoConfianzaMasQuinquenio += parseFloat(valor);

               if (id == 1) {
                    sueldoConfianza = parseFloat(valor);
               }  
            }
            //*********************************************************************************
           
        }
        indiceCelda++;
    }
    
    //alert("SUELDO MAS QUINQUENIO " + sueldoConfianzaMasQuinquenio);
    //SE LLAMA A LA FUNCIÓN QUE CALCULA UTOMÁTICAMENTE LAS DEDUCCIONES
    calc_deducciones_por_percepcion(sueldoConfianzaMasQuinquenio, sueldoConfianza);
    $("#total_percepcion").html(total_percepciones.toFixed(2));
    calc_aportaciones_por_percepcion(sueldoConfianzaMasQuinquenio, sueldoConfianza);
    //calcular el total del líquido cada vez que se haga un cambio al input
    calcular_liquido();
    
}

function calc_deducciones_por_percepcion(sueldoConfianzaMasQuinquenio1, sueldoConfianza1){
    var checkboxes = $(".importe_deduccion");
    // Convertimos el jQuery object a array
    var valores = checkboxes.toArray();

    //Se declara el indice de la celda 
    var indiceCelda = 2;
    
    for (var i = 0; i < valores.length; i++) {
        
            //**********************************************************************************
            //Calcular las deducciones en base al SUELDO DE CONGIANZA y QUINQUENIO
            var id = document.getElementById("id_tab_ded").rows[indiceCelda].cells[0].innerText;
           
            var impuesto = 0;
            switch(parseInt(id)) {
                case 1:
                    //Si el año es mayor que 2017 entonces se calculará el ISR con la formula
                    //de lo contrario el campo ISR quedará abierto con valor de 0.00
                    var anioNominaIsr = document.getElementById('anioNomina').value;
                    if (parseInt(anioNominaIsr) > anio) {
                        var isr = calcularIsr(4);
                        document.getElementById("id_ded_"+id).value = isr.toFixed(2);
                    }else{
                        document.getElementById("id_ded_"+id).value = 0.00;
                    }
                    break;
                case 2:
                    impuesto = (sueldoConfianzaMasQuinquenio1 * 3.375) / 100;
                    document.getElementById("id_ded_"+id).value = impuesto.toFixed(2);
                    break;
                case 3:
                    impuesto = (sueldoConfianzaMasQuinquenio1 * 1.125) / 100;
                    document.getElementById("id_ded_"+id).value = impuesto.toFixed(2);
                    break;
                case 4:
                    impuesto = (sueldoConfianzaMasQuinquenio1 * 6.125) / 100;
                    document.getElementById("id_ded_"+id).value = impuesto.toFixed(2);
                    break;
                case 5:
                    impuesto = (sueldoConfianzaMasQuinquenio1 * 1) / 100;
                    document.getElementById("id_ded_"+id).value = impuesto.toFixed(2);
                    break;
                case 6:
                    impuesto = (sueldoConfianzaMasQuinquenio1 * 2) / 100;
                    document.getElementById("id_ded_"+id).value = impuesto.toFixed(2);
                    break;
                case 7:
                    impuesto = (sueldoConfianza1 * 5) / 100;
                    document.getElementById("id_ded_"+id).value = impuesto.toFixed(2);
                    break;
                default:
                    //code block
            }
            //*********************************************************************************
           
        //}
        indiceCelda++;
    }
    calc_total_deducciones();
}
//***********************************************************************************
// DEDUCCIONES
// ***********************************************************************************
function lista_deducciones(){
    var data=verificarConceptosExistentes("id_tab_ded");
    $.ajax({
        url: baseURL + "Deduciones_ctrl/lista_deducciones",
        type: "POST",
        data: {

        },
        success: function(respuesta) {
            var obj = JSON.parse(respuesta);
                if (obj.resultado === true) {
                    // var html = "";
                    for (l in obj.deducciones) {
                        var id_deduccion = obj.deducciones[l].id_deduccion;
                        var existe = false;
                        for (var i = 0; i < data.length; i++) {
                            if (data[i].id == id_deduccion) {
                                existe = true;
                            } 
                        }
                        if ( !existe) {
                            var table = document.getElementById("id_tab_ded");
                            var row = table.insertRow(2);
                            var cell1_id_ded = row.insertCell(0);
                            var cell2_codigo = row.insertCell(1);
                            var cell3_desc = row.insertCell(2);
                            var cell4_importe = row.insertCell(3);
                            var cell5_eliminar = row.insertCell(4);
                            cell1_id_ded.innerHTML = obj.deducciones[l].id_deduccion;
                            cell1_id_ded.setAttribute("style", "display: none;")
                            cell2_codigo.innerHTML = obj.deducciones[l].indicador;
                            cell3_desc.innerHTML = obj.deducciones[l].nombre;
                            if (id_deduccion >= 1 & id_deduccion <= 7) {
                                //Si el año es mayor a 2017 entonces el campo ISR quedará como disabled
                                //De lo contrario el campo ISR quedará abierto
                                var anioNominaIsr = document.getElementById('anioNomina').value;
                                if (parseInt(anioNominaIsr) > anio) {
                                    cell4_importe.innerHTML = "<input type='number' style='text-align: right;' id='id_ded_"+id_deduccion+"' onkeyup='calc_total_deducciones()' onchange='calc_total_deducciones()' name='importe_deduccion' class='importe_deduccion' disabled> ";  
                                }else{
                                    if (id_deduccion == 1) {
                                        cell4_importe.innerHTML = "<input type='number' style='text-align: right;' id='id_ded_"+id_deduccion+"' onkeyup='calc_total_deducciones()' onchange='calc_total_deducciones()' name='importe_deduccion' class='importe_deduccion'> ";  
                                    }else{
                                        cell4_importe.innerHTML = "<input type='number' style='text-align: right;' id='id_ded_"+id_deduccion+"' onkeyup='calc_total_deducciones()' onchange='calc_total_deducciones()' name='importe_deduccion' class='importe_deduccion' disabled> ";  
                                    }
                                }
                            }else{
                                cell4_importe.innerHTML = "<input type='number' style='text-align: right;' id='id_ded_"+id_deduccion+"' onkeyup='calc_total_deducciones()' onchange='calc_total_deducciones()' name='importe_deduccion' class='importe_deduccion'> ";
                                //html += "<td>" + "<input type='number' id='id_ded_"+id_d+"' onkeyup='calc_total_deducciones()' onchange='calc_total_deducciones()' name='importe_deduccion' class='importe_deduccion'> "+"</td>";
                            }
                            //cell4_importe.innerHTML = "<input type='number' id='id_per_ed"+id_deduccion+"' onkeyup='calc_total_deducciones_edit()' onchange='calc_total_deducciones_edit()' name='importe_deduccion' class='importe_deduccion'> ";
                            cell5_eliminar.innerHTML = "<button type='button' id='borrar_celda_ded' class='btn btn-danger btn-sm'> <span class='glyphicon glyphicon-trash'></span> </button>";
                        }
                    }
                    //SE LLAMA A LA FUNCIÓN QUE CALCULA UTOMÁTICAMENTE LAS DEDUCCIONES
                    calc_deducciones_por_percepcion(sueldoConfianzaMasQuinquenio, sueldoConfianza);
                    //SE LLAMA A LA FUNCIÓN QUE CALCULA UTOMÁTICAMENTE LAS APORTACIONES
                    calc_aportaciones_por_percepcion(sueldoConfianzaMasQuinquenio, sueldoConfianza);
                    //SE ORDENA LA TABLA DE FORMA ASCENDENTE
                    ordenarTablas("id_tab_ded");
            }
        } 
    });
}

function calc_total_deducciones(){
        
    var checkboxes = $(".importe_deduccion");
    // Convertimos el jQuery object a array
    var valores = checkboxes.toArray();
    // alert(valores[2].id);
    var total_deducciones = 0;
    for (var i = 0; i < valores.length; i++) {
        var id  = valores[i].id;
        var id_deduccion = id.split("_");
        var valor = document.getElementById("id_ded_"+id_deduccion[2]).value;
        if (valor != "") {
            if (valor >=0 ) {
                total_deducciones += parseFloat(valor);
            }
        }
    }
    $("#total_deducciones").html(total_deducciones.toFixed(2));
    //calcular el total del líquido cada vez que se haga un cambio al input
    calcular_liquido();
}
//************************************************************************************
//PREPARAR Y VALIDAR DATOS PARA GUARDAR
//************************************************************************************

function guardar_datos_nomina(){
        
    var id_nomina = document.getElementById("id_per_q_nomina").value;
    var id_empleado = document.getElementById("id_empleado_en_nomina").value;
    var data_percepciones = get_data_tabla(".importe_percepcion","tabla_percepciones","id_per_");
    var data_deducciones = get_data_tabla(".importe_deduccion","tabla_deducciones","id_ded_");
    var data_aportaciones = get_data_tabla(".importe_aportacion","tabla_aportaciones","id_apor_");
    
    //SE VERIFICA QUE NO HAYAN CAMPOS VACIOS Y QUE SE HAYAN SELECCIONADO LAS 3 TABLAS
    //if (trabajador_eventual) {
        if ((data_percepciones[data_percepciones.length - 1]["camposvacios"] == true) | (data_deducciones[data_deducciones.length - 1]["camposvacios"] == true) | (data_aportaciones[data_aportaciones.length - 1]["camposVaciosFaltantes"] == true) ) {
            swal({
                title: " ",
                text: "FALTAN CAMPOS POR LLENAR",
                type: "warning"
            });
        }else{
             swal({
            title: "Confirmar",
            text: "¿Desea guardar los datos de la nómina?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Si, Guardar!",
            closeOnConfirm: false
            }, function () {
                guardar_nom_en_db(id_nomina,id_empleado,data_percepciones,data_deducciones,data_aportaciones);
            });
            
        }
    // }else{
    //     if ((data_percepciones[data_percepciones.length - 1]["camposvacios"] == true) | (data_deducciones[data_deducciones.length - 1]["camposvacios"] == true) | (data_aportaciones[data_aportaciones.length - 1]["camposvacios"] == true) ) {
    //         swal({
    //             title: " ",
    //             text: "FALTAN CAMPOS POR LLENAR",
    //             type: "warning"
    //         });
    //     }else{
    //         swal({
    //         title: "Confirmar",
    //         text: "¿Desea guardar los datos de la nómina?",
    //         type: "warning",
    //         showCancelButton: true,
    //         confirmButtonColor: "#DD6B55",
    //         confirmButtonText: "Si, Guardar!",
    //         closeOnConfirm: false
    //         }, function () {
    //             guardar_nom_en_db(id_nomina,id_empleado,data_percepciones,data_deducciones,data_aportaciones);
    //        });
    //     }
    // }   
    
}
//************************************************************************************
//GUADRAR NÓMINA EN BASE DE DATOS
//************************************************************************************
function guardar_nom_en_db(id_nomina,id_empleado,data_percepciones,data_deducciones,data_aportaciones){
    $.ajax({
        url: baseURL + "Nomina_controller/guardar_detalle_nomina",
        type: "POST",
        data: {
            id_nomina: id_nomina,
            id_empleado: id_empleado,
            data_percepciones: data_percepciones,
            data_deducciones: data_deducciones,
            data_aportaciones: data_aportaciones
        },
        success: function(respuesta) {
            var obj = JSON.parse(respuesta);
                if (obj.resultado === true) {
                    // alert(obj.data_per[0].importe);
                    swal("GUARDADO", "LA NÓMINA SE GUARDADO CORRECTAMENTE", "success");
                    setTimeout(function(){
                        window.location.replace(baseURL + "Nomina_controller/detalle_nomina");
                    }, 1500);                    
                }
        } 
    });
}

//************************************************************************************
//DATOS DE LAS DEDUCCIONES PARA GUARDAR EN LA BASE DE DATOS
//************************************************************************************
function get_data_tabla(nombre, tabla, id_input){
    
    var arregloData = $(nombre);
    // Convertimos el jQuery object a array
    var valores = arregloData.toArray();
    // alert(valores[2].id);
    var data = new Array();
    // var indice_celda = 2;
    var camposVacios = false;
    var camposVaciosFaltantes = false;
    for (var i = 0; i < valores.length; i++) {

        var id  = valores[i].id;
        var id_data = id.split("_");
        var valor = document.getElementById(id_input+id_data[2]).value;
        document.getElementById(id_input+id_data[2]).removeAttribute("style");
        if (valor == "" | parseFloat(valor) <= 0) {
            document.getElementById(id_input+id_data[2]).setAttribute("style", "border-color: red;");
            camposVacios = true;
            camposVaciosFaltantes = true;
        }
            data.push({"id":id_data[2],"importe":valor});
    }
    //*************************************************************************
    //SE VALIDA QUE YA SE HAYAN DADO DE ALTA AL MENOS UN CONCEPTO DE 
    //APORTACIONES, DEDUCCIONES Y PRESTACIONES
    //***************************************************************************
    if (valores.length <= 0) {
        camposVacios = true;
    }
    data.push({"camposvacios":camposVacios, "camposVaciosFaltantes":camposVaciosFaltantes});
    return data;
}

//************************************************************************************
//ELIMINAR FILAS DE TABLA
//************************************************************************************
$(document).on('click', '#borrar_celda_per', function (event) {
    event.preventDefault();
    $(this).closest('tr').remove();
    //SE LLAMA A LA FUNCIÓN QUE CALCULA UTOMÁTICAMENTE LAS PERCEPCIONES
    calc_total_percepciones();
    calc_aportaciones_por_percepcion(sueldoConfianzaMasQuinquenio, sueldoConfianza);

});

$(document).on('click', '#borrar_celda_ded', function (event) {
    event.preventDefault();
    $(this).closest('tr').remove();
    //SE LLAMA A LA FUNCIÓN QUE CALCULA UTOMÁTICAMENTE LAS DEDUCCIONES
    calc_deducciones_por_percepcion(sueldoConfianzaMasQuinquenio, sueldoConfianza);
    calc_aportaciones_por_percepcion(sueldoConfianzaMasQuinquenio, sueldoConfianza);
});

$(document).on('click', '#borrar_celda_apor', function (event) {
    event.preventDefault();
    $(this).closest('tr').remove();
    //SE LLAMA A LA FUNCIÓN QUE CALCULA UTOMÁTICAMENTE LAS APORTACIONES
    calc_aportaciones_por_percepcion(sueldoConfianzaMasQuinquenio, sueldoConfianza);
    calcular_liquido();
});

//************************************************************************************
//APORTACIONES
//************************************************************************************
function lista_aportaciones(){
        var data=verificarConceptosExistentes("id_tab_apor");
        var idSubsidioSalario = 9;
    $.ajax({
        url: baseURL + "Aportaciones_ctrl/lista_aportaciones",
        type: "POST",
        data: {

        },
        success: function(respuesta) {
            var obj = JSON.parse(respuesta);
                if (obj.resultado === true) {
                
                    // var html = "";
                    for (l in obj.aportaciones) {
                        var id_aportacion = obj.aportaciones[l].id_aportacion;
                        var existe = false;
                        for (var i = 0; i < data.length; i++) {
                            if (data[i].id == id_aportacion) {
                                existe = true;
                            } 
                        }
                        if ( !existe) {
                            var table = document.getElementById("id_tab_apor");
                            var row = table.insertRow(2);
                            var cell1_id_ded = row.insertCell(0);
                            var cell2_codigo = row.insertCell(1);
                            var cell3_desc = row.insertCell(2);
                            var cell4_importe = row.insertCell(3);
                            var cell5_eliminar = row.insertCell(4);
                            cell1_id_ded.innerHTML = obj.aportaciones[l].id_aportacion;
                            cell1_id_ded.setAttribute("style", "display: none;")
                            cell2_codigo.innerHTML = obj.aportaciones[l].indicador;
                            cell3_desc.innerHTML = obj.aportaciones[l].nombre;
                            if (id_aportacion > 0 & id_aportacion <= 9) {
                                var anioNominaIsr = document.getElementById('anioNomina').value;
                                if (parseInt(anioNominaIsr) > anio) {
                                    cell4_importe.innerHTML = "<input style='text-align: right;' type='number' id='id_apor_"+id_aportacion+"' onkeyup='calc_total_aportaciones()' onchange='calc_total_aportaciones()' name='importe_aportacion' class='importe_aportacion' disabled> ";
                                }else{
                                    if (id_aportacion == 9) {
                                        cell4_importe.innerHTML = "<input style='text-align: right;' type='number' id='id_apor_"+id_aportacion+"' onkeyup='calc_total_aportaciones()' onchange='calc_total_aportaciones()' name='importe_aportacion' class='importe_aportacion'> ";
                                    }else{
                                        cell4_importe.innerHTML = "<input style='text-align: right;' type='number' id='id_apor_"+id_aportacion+"' onkeyup='calc_total_aportaciones()' onchange='calc_total_aportaciones()' name='importe_aportacion' class='importe_aportacion' disabled> ";
                                    }
                                }
                            }else{
                               //  if (id_aportacion == idSubsidioSalario) {
                               //      var subsidioEmp = document.getElementById("id_subsidioAlEmpleo").value;
                               //      cell4_importe.innerHTML = "<input style='text-align: right;' value='"+parseFloat(subsidioEmp).toFixed(2)+"' type='number' id='id_apor_"+id_aportacion+"' onkeyup='calc_total_aportaciones();calcular_liquido();' onchange='calc_total_aportaciones();calcular_liquido();' name='importe_aportacion' class='importe_aportacion'> ";
                               // }else{    
                                   cell4_importe.innerHTML = "<input style='text-align: right;' type='number' id='id_apor_"+id_aportacion+"' onkeyup='calc_total_aportaciones()' onchange='calc_total_aportaciones()' name='importe_aportacion' class='importe_aportacion'> ";
                                //}
                            }
                            cell5_eliminar.innerHTML = "<button type='button' id='borrar_celda_apor' class='btn btn-danger btn-sm'> <span class='glyphicon glyphicon-trash'></span> </button>";
                        }
                    }
                     calc_aportaciones_por_percepcion(sueldoConfianzaMasQuinquenio, sueldoConfianza);
                     //SE CALCULA EL LIQUIDO PARA SABER SI HAY O NO SUBSIODIO AL EMPLEO
                     calcular_liquido();
                     //SE ORDENA LA TABLA DE FORMA ASCENDENTE
                    ordenarTablas("id_tab_apor");

            }
        } 
    });
}
//************************************************************************************
//CALCULAR APORTACIONES POR PERCEPCION
//************************************************************************************
function calc_aportaciones_por_percepcion(sueldoConfianzaMasQuinquenio1, sueldoConfianza1){
    var checkboxes = $(".importe_aportacion");
    // Convertimos el jQuery object a array
    var valores = checkboxes.toArray();

    //Se declara el indice de la celda 
    var indiceCelda = 2;
    
    for (var i = 0; i < valores.length; i++) {
        
            //**********************************************************************************
            //Calcular las deducciones en base al SUELDO DE CONGIANZA y QUINQUENIO
            var id = document.getElementById("id_tab_apor").rows[indiceCelda].cells[0].innerText;
           
            var impuesto = 0;
            switch(parseInt(id)) {
                case 1:
                    impuesto = (sueldoConfianza1 * 5) / 100;
                    document.getElementById("id_apor_"+id).value = impuesto.toFixed(2);
                    break;
                case 2:
                    impuesto = (sueldoConfianzaMasQuinquenio1 * 5) / 100;
                    document.getElementById("id_apor_"+id).value = impuesto.toFixed(2);
                    break;
                case 3:
                    impuesto = (sueldoConfianzaMasQuinquenio1 * 5.175) / 100;
                    document.getElementById("id_apor_"+id).value = impuesto.toFixed(2);
                    break;
                case 4:
                    impuesto = (sueldoConfianza1 * 1.875) / 100;
                    document.getElementById("id_apor_"+id).value = impuesto.toFixed(2);
                    break;
                case 5:
                    impuesto = (sueldoConfianza1 * 8.095) / 100;
                    document.getElementById("id_apor_"+id).value = impuesto.toFixed(2);
                    break;
                case 6:
                    var ahor_sol_emp = 0;
                    try {
                        ahor_sol_emp = document.getElementById("id_ded_5").value
                    }
                    catch(err) {
                        //alert(err.message); 
                    }
                    impuesto = (ahor_sol_emp * 3.25);
                    document.getElementById("id_apor_"+id).value = impuesto.toFixed(2);
                    break;
                case 7:
                    var ahor_sol_emp = 0;
                    try {
                        ahor_sol_emp = document.getElementById("id_ded_6").value
                    }
                    catch(err) {
                        //alert(err.message); 
                    }
                    impuesto = (ahor_sol_emp * 3.25);
                    document.getElementById("id_apor_"+id).value = impuesto.toFixed(2);
                    break;
                case 8:
                    var total_percepciones = document.getElementById("total_percepcion").innerText;
                    if (total_percepciones != "") {
                        impuesto = (parseFloat(total_percepciones) * 3) / 100;
                        document.getElementById("id_apor_"+id).value = impuesto.toFixed(2);
                    }else{
                        document.getElementById("id_apor_"+id).value = 0.00;
                    }
                    
                    break;
                case 9:
                    var subsidioEmp = document.getElementById("id_subsidioAlEmpleo").value;
                    document.getElementById("id_apor_"+id).value = parseFloat(subsidioEmp).toFixed(2);
                    break;
                default:
                    //code block
            }
            //*********************************************************************************
           
        //}
        indiceCelda++;
    }
    calc_total_aportaciones();
}

//************************************************************************************
//CALCULAR APORTACIONES
//************************************************************************************
function calc_total_aportaciones(){
    var inputAportaciones = $(".importe_aportacion");
    // Convertimos el jQuery object a array
    var valores = inputAportaciones.toArray();
    // alert(valores[2].id);
    var total_aportaciones = 0;
    for (var i = 0; i < valores.length; i++) {
        var id  = valores[i].id;
        var id_aportacion = id.split("_");
        var valor = document.getElementById("id_apor_"+id_aportacion[2]).value;
        if (valor != "") {
            total_aportaciones += parseFloat(valor);
        }
    }
    $("#total_aportaciones").html(total_aportaciones.toFixed(2));
    //calcular liquido;
    calcular_liquido();
}

//************************************************************************************
//CALCULAR LIQUIDO
//************************************************************************************

function calcular_liquido(){
    console.log("calculando subsidio al empleo");
    var total_percepciones = document.getElementById("total_percepcion").innerHTML;
    var total_deducciones = document.getElementById("total_deducciones").innerHTML;
    if (total_percepciones == "") {
        total_percepciones = 0;
    }
    if (total_deducciones == "") {
        total_deducciones = 0;
    }
    var liquido = parseFloat(total_percepciones) - parseFloat(total_deducciones);
    try {
        var subsidioSalario = document.getElementById("id_apor_9").value;
        if (subsidioSalario == "") {
            subsidioSalario = 0;
        }
        var html = "LÍQUIDO: $"+liquido.toFixed(2);
        var subsidio = parseFloat(subsidioSalario);
        var total = parseFloat(subsidio + liquido);
            html += "<br> SUBSIDIO AL SALARIO: $" + subsidio.toFixed(2);
            html += "<br> TOTAL: $" + total.toFixed(2);
        $("#liquido-nom").html(html);
        }
    catch(err) {
        $("#liquido-nom").html("LÍQUIDO: $"+liquido.toFixed(2));
    }
}
//************************************************************************************
//SE AGREGAN LOS DATOS DE LA ÚLTIMA NÓMINA EN CASO DE EXISTIR
//************************************************************************************
function agregarDatosNominaAnterior(){
    var id_empleado = document.getElementById("id_empleado_en_nomina").value;

        $.ajax({
        url: baseURL + "Nomina_controller/datosDeNomina",
        type: "POST",
        data: {
            id_empleado: id_empleado
        },
        success: function(respuesta) {
                try{
                    var obj = JSON.parse(respuesta);
                if (obj.resultado === true) {

                    //--------------listar percepciones--------------------------------------------------------------
                    var html = "";
                    for (l in obj.data.percepciones) {
                        html += "<tr>";
                        html += "<td style='display: none;'>" + obj.data.percepciones[l].id_percepcion;
                        html += "</td>";
                        html += "<td>" + obj.data.percepciones[l].indicador + "</td>";
                        html += "<td>" + obj.data.percepciones[l].nombre + "<input type='hidden' id='id_per_form_"+obj.data.percepciones[l].id_percepcion +"' value='"+obj.data.percepciones[l].formula+"' >" + "</td>";
                        html += "<td>" + "<input type='number' style='text-align: right;' value='"+ obj.data.percepciones[l].importe+"' id='id_per_"+obj.data.percepciones[l].id_percepcion+"' onkeyup='calc_total_percepciones()' onchange='calc_total_percepciones()' name='importe_percepcion' class='importe_percepcion'> " +"</td>";
                        html += "<td>" + "<button type='button' id='borrar_celda_per' class='btn btn-danger btn-sm'> <span class='glyphicon glyphicon-trash'></span> </button>" +"</td>";
                        html += "</tr>";
                    }
                    $("#body_tabla_percepciones").html(html);
                    //SE LLAMA A LA FUNCIÓN QUE CALCULA UTOMÁTICAMENTE LAS DEDUCCIONES
                    calc_deducciones_por_percepcion(sueldoConfianzaMasQuinquenio, sueldoConfianza);
                    calc_total_percepciones();
                    //SE ORDENA LA TABLA DE FORMA ASCENDENTE
                    ordenarTablas("id_tab_per");
                    //-----------------------listar deducciones--------------------------------------------------
                    html = "";
                    for (l in obj.data.deducciones) {
                            var id_d = obj.data.deducciones[l].id_deduccion;
                            if ((trabajador_eventual == true) & (id_d >= 1 & id_d <= 7)) {

                            }else{
                            html += "<tr>";
                            html += "<td style='display:none;'>" + obj.data.deducciones[l].id_deduccion + "</td>";                           
                            html += "<td>" + obj.data.deducciones[l].indicador + "</td>";
                            html += "<td>" + obj.data.deducciones[l].nombre +"</td>";
                            //html += "<td>" + "<input type='checkbox' name='check_ded[]' value='"+ num_fila +"'>" +"</td>";
                            if (id_d >= 1 & id_d <= 7) {
                                //Si el año es mayor a 2017 entonces el campo ISR quedará como disabled
                                //De lo contrario el campo ISR quedará abierto
                                var anioNominaIsr = document.getElementById('anioNomina').value;
                                if (parseInt(anioNominaIsr) > anio) {
                                    html += "<td>" + "<input type='number' style='text-align: right;' value='"+obj.data.deducciones[l].importe+"' id='id_ded_"+id_d+"' onkeyup='calc_total_deducciones()' onchange='calc_total_deducciones()' name='importe_deduccion' class='importe_deduccion' disabled> "+"</td>"; 
                                }else{
                                    if (id_d == 1) {
                                        html += "<td>" + "<input type='number' style='text-align: right;' value='0.00' id='id_ded_"+id_d+"' onkeyup='calc_total_deducciones()' onchange='calc_total_deducciones()' name='importe_deduccion' class='importe_deduccion'> "+"</td>"; 
                                    }else{
                                        html += "<td>" + "<input type='number' style='text-align: right;' value='"+obj.data.deducciones[l].importe+"' id='id_ded_"+id_d+"' onkeyup='calc_total_deducciones()' onchange='calc_total_deducciones()' name='importe_deduccion' class='importe_deduccion' disabled> "+"</td>"; 
                                    }
                                }
                            }else{
                                html += "<td>" + "<input type='number' style='text-align: right;' value='"+obj.data.deducciones[l].importe+"' id='id_ded_"+id_d+"' onkeyup='calc_total_deducciones()' onchange='calc_total_deducciones()' name='importe_deduccion' class='importe_deduccion'> "+"</td>";
                            }
                            html += "<td>" +"<button type='button' id='borrar_celda_ded' class='btn btn-danger btn-sm'> <span class='glyphicon glyphicon-trash'></span> </button>"+ "</td>";
                            html += "</tr>"; 
                        }
                    }
                    $("#body_tabla_deducciones").html(html);
                    //SE LLAMA A LA FUNCIÓN QUE CALCULA UTOMÁTICAMENTE LAS DEDUCCIONES
                    calc_deducciones_por_percepcion(sueldoConfianzaMasQuinquenio, sueldoConfianza);
                    //SE LLAMA A LA FUNCIÓN QUE CALCULA UTOMÁTICAMENTE LAS APORTACIONES
                    calc_aportaciones_por_percepcion(sueldoConfianzaMasQuinquenio, sueldoConfianza);
                    //SE ORDENA LA TABLA DE FORMA ASCENDENTE
                    ordenarTablas("id_tab_ded");

                    //-----------------------listar aportaciones------------------------------------------------
                    calcularIsr(4);
                    html = "";
                    for (l in obj.data.aportaciones) {
                        var id_apor = obj.data.aportaciones[l].id_aportacion;
                        html += "<tr>";
                        html += "<td style='display:none;'>" + obj.data.aportaciones[l].id_aportacion + "</td>";
                        html += "<td>" + obj.data.aportaciones[l].indicador + "</td>";
                        html += "<td>" + obj.data.aportaciones[l].nombre +"</td>";
                        if (id_apor > 0 & id_apor <= 9) {
                            var anioNominaIsr = document.getElementById('anioNomina').value;
                            if (parseInt(anioNominaIsr) > anio) {
                                html += "<td>" +"<input type='number' style='text-align: right;' id='id_apor_"+id_apor+"' onkeyup='calc_total_aportaciones()' onchange='calc_total_aportaciones()' name='importe_aportacion' class='importe_aportacion' disabled> " + "</td>"; 
                            }else{
                                if (id_apor == 9) {
                                    html += "<td>" +"<input type='number' style='text-align: right;' id='id_apor_"+id_apor+"' onkeyup='calc_total_aportaciones()' onchange='calc_total_aportaciones()' name='importe_aportacion' class='importe_aportacion'> " + "</td>"; 
                                }else{
                                    html += "<td>" +"<input type='number' style='text-align: right;' id='id_apor_"+id_apor+"' onkeyup='calc_total_aportaciones()' onchange='calc_total_aportaciones()' name='importe_aportacion' class='importe_aportacion' disabled> " + "</td>"; 
                                }
                            }
                        }else{
                            // if (id_apor == idSubsidioSalario) {
                            //     html += "<td>" +"<input type='number' style='text-align: right;' id='id_apor_"+id_apor+"' onkeyup='calc_total_aportaciones();calcular_liquido();' onchange='calc_total_aportaciones();calcular_liquido();' name='importe_aportacion' class='importe_aportacion'> "+ "</td>";
                            // }else{
                                html += "<td>" +"<input type='number' style='text-align: right;' id='id_apor_"+id_apor+"' onkeyup='calc_total_aportaciones()' onchange='calc_total_aportaciones()' name='importe_aportacion' class='importe_aportacion'> "+ "</td>";
                            // }
                        }
                        html += "<td>" +"<button type='button' id='borrar_celda_apor' class='btn btn-danger btn-sm'> <span class='glyphicon glyphicon-trash'></span> </button>"+ "</td>";
                        html += "</tr>";
                     }
                    $("#body_tabla_aportaciones").html(html);
                    calc_aportaciones_por_percepcion(sueldoConfianzaMasQuinquenio, sueldoConfianza);
                    //SE ORDENA LA TABLA DE FORMA ASCENDENTE
                    ordenarTablas("id_tab_apor");
                    calcular_liquido();
                }
                }catch(err){
                    console.log(err);
                }
            } 
        });

}

// ***********************************************************************************
// VERIFICAR CUALES CONCEPTOS YA ESTÁN EN LAS TABLAS
// ***********************************************************************************
function verificarConceptosExistentes(nombre_tab){
    var nFilas = $("#"+nombre_tab+" tr").length;
    var data = new Array();
    //Se declara el indice de la celda 
    var indiceCelda = 2;
    for (var i = 0; i < nFilas - 3; i++) {
        var id = document.getElementById(nombre_tab).rows[indiceCelda].cells[0].innerText;
        data.push({"id":id});
        indiceCelda++;
    }
    return data;
}
// ***********************************************************************************
//INICIALIZAR TABLAS CON EL PIUGIN TABLE SORT PARA QUE SE ACOMODEN EN FORMA ASCENDENTE
// ***********************************************************************************
function ordenarTablas(nameTable){
      var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById(nameTable);
  switching = true;
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.getElementsByTagName("TR");
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 2; i < (rows.length - 2); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[0];
      y = rows[i + 1].getElementsByTagName("TD")[0];
      //check if the two rows should switch place:
      if (parseInt(x.innerHTML.toLowerCase()) >  parseInt(y.innerHTML.toLowerCase())) {
        //if so, mark as a switch and break the loop:
        shouldSwitch= true;
        break;
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}
// ***********************************************************************************
//SE CALCULAR EL ISR
// ***********************************************************************************
function calcularIsr(num_formula){
    var totalPerIsr = obtenerDatosParaFormula(".importe_percepcion","id_per_",num_formula);
    var iGravable = totalPerIsr[0]['total'];
    var diferencia = 0;
    var tasa = 0;
    var coutaFija = 0;
    var x = 0;
    var y = 0;
    if ((iGravable >= (x = 0.01)) & (iGravable <= (y = 285.45))) {
        diferencia = iGravable - x;
        tasa = 1.92;
        coutaFija = 0;
    } else if ((iGravable >= (x = 285.46)) & (iGravable <= (y = 2422.80))) {
        diferencia = iGravable - x;
        tasa = 6.40;
        coutaFija = 5.55;
    } else if ((iGravable >= (x = 2422.81)) & (iGravable <= (y = 4257.90))) {
        diferencia = iGravable - x;
        tasa = 10.88;
        coutaFija = 142.20;
    } else if ((iGravable >= (x = 4257.91)) & (iGravable <= (y = 4949.55))) {
        diferencia = iGravable - x;
        tasa = 16.00;
        coutaFija = 341.85;
    } else if ((iGravable >= (x = 4949.56)) & (iGravable <= (y = 5925.90))) {
        diferencia = iGravable - x;
        tasa = 17.92;
        coutaFija = 452.55;
    } else if ((iGravable >= (x = 5925.91)) & (iGravable <= (y = 11951.85))) {
        diferencia = iGravable - x;
        tasa = 21.36;
        coutaFija = 627.60;
    } else if ((iGravable >= (x = 11951.86)) & (iGravable <= (y = 18837.75))) {
        diferencia = iGravable - x;
        tasa = 23.52;
        coutaFija = 1914.75;
    } else if ((iGravable >= (x = 18837.76)) & (iGravable <= (y = 35964.30))) {
        diferencia = iGravable - x;
        tasa = 30.00;
        coutaFija = 3534.30;
    } else if ((iGravable >= (x = 35964.31)) & (iGravable <= (y = 47952.30))) {
        diferencia = iGravable - x;
        tasa = 32.00;
        coutaFija = 8672.25;
    } else if ((iGravable >= (x = 47952.31)) & (iGravable <= (y = 143856.90))) {
        diferencia = iGravable - x;
        tasa = 34.00;
        coutaFija = 12508.35;
    } else if ((iGravable >= (x = 143856.91))) {
        diferencia = iGravable - x;
        tasa = 35.00;
        coutaFija = 45115.95;
    }

    var impuestoMarginal = (diferencia * tasa) / 100;
    var impuestoPrevio = impuestoMarginal + coutaFija;
    var subsidioAlEmpleo = calcularIsrSubsidio(iGravable);
    var impuestoARetener = (impuestoPrevio - subsidioAlEmpleo);
    if (impuestoARetener < 0) {
        var imp = (impuestoARetener * -1);
        document.getElementById("id_subsidioAlEmpleo").value = imp;
    }else{
        document.getElementById("id_subsidioAlEmpleo").value = 0;
    }
    return impuestoARetener;
}

// ***********************************************************************************
//SE CALCULAR EL SUBSIDIO AL ISR
// ***********************************************************************************
function calcularIsrSubsidio(ingresoGravable){
    var iGravable = ingresoGravable;
    var x = 0;
    var y = 0;
    var subsidio = 0;
    if ((iGravable >= (x = 0.01)) & (iGravable <= (y = 872.85))) {
        subsidio = 200.85;
    } else if ((iGravable >= (x = 872.86)) & (iGravable <= (y = 1309.20))) {
        subsidio = 200.70;
    } else if ((iGravable >= (x = 1309.21)) & (iGravable <= (y = 1713.60))) {
        subsidio = 200.70;
    } else if ((iGravable >= (x = 1713.61)) & (iGravable <= (y = 1745.70))) {
        subsidio = 193.80;
    } else if ((iGravable >= (x = 1745.71)) & (iGravable <= (y = 2193.75))) {
        subsidio = 188.70;
    } else if ((iGravable >= (x = 2193.76)) & (iGravable <= (y = 2327.55))) {
        subsidio = 174.75;
    } else if ((iGravable >= (x = 2327.56)) & (iGravable <= (y = 2632.65))) {
        subsidio = 160.35;
    } else if ((iGravable >= (x = 2632.66)) & (iGravable <= (y = 3071.40))) {
        subsidio = 145.35;
    } else if ((iGravable >= (x = 3071.41)) & (iGravable <= (y = 3510.15))) {
        subsidio = 125.10;
    } else if ((iGravable >= (x = 3510.16)) & (iGravable <= (y = 3642.60))) {
        subsidio = 107.40;
    } else if ((iGravable >= (x = 3,642.61))) {
        subsidio = 0;
    }

    return subsidio;
}

//************************************************************************************
//SE OBTIENEN LOS DATOS NECESARIOS PARA REALIZAR LOS CALCULOS DE LAS FORMULAS
//************************************************************************************
function obtenerDatosParaFormula(nombre,id_input,num_formula){
    var arregloData = $(nombre);
    // Convertimos el jQuery object a array
    var valores = arregloData.toArray();
    var data = new Array();
    var suma_total = 0;
    for (var i = 0; i < valores.length; i++) {
        var id  = valores[i].id;
        var id_data = id.split("_");
        var formula = document.getElementById(id_input+"form_"+id_data[2]).value;
        if (formula.length > 0) {
            var formulaSplit =  formula.split("-");
            var n_formula = formulaSplit[parseInt(num_formula)-1];
            if (n_formula == 1) {
                var valor = document.getElementById(id_input+id_data[2]).value;
                if (valor != "") {
                    suma_total += parseFloat(valor);
                }               
            }            
        }   
    }
    data.push({"total":suma_total});
    return data;
}