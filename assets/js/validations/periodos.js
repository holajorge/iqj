$(document).ready(function() {
     $(".modal-wide").on("show.bs.modal", function() {
      var height = $(window).height() - 200;
      $(this).find(".modal-body").css("max-height", height);
    });

     $( document ).ajaxStart(function() {
        $('#myModalStatusBar').modal({backdrop: 'static', keyboard: false});
    });

     $( document ).ajaxStop(function() {
      $('#myModalStatusBar').modal('hide')
    });

     $("#inputRecursoPropioOculto").hide();
});

function serach_periodos(id){
    var opciones = document.getElementsByName("rb-origen-recurso");
    for(var i=0; i<opciones.length; i++) {    
      if(opciones[i].checked) {
        opciones[i].checked =false;
      }
    }
    $("#showBtnPrint").css('display', 'none');
    $("#id-origen-r").css('display','none');  
	$("#resultado_periodo").html("");
	$.ajax({
            url: baseURL + "Nomina_controller/buscar_periodo",
            type: "POST",
            data: {id: id},
            success: function(respuesta) {
                var obj = JSON.parse(respuesta);
                    if (obj.resultado === true) {                                         
                    $("#showBtnPrint").css('display', 'block');
                    $("#id-origen-r").css('display','block');    
                    // **********************************************************************
                    //Creación de la tabla de resultados
                    var html = "";
                    html += "<table class='table table-bordered table-striped' id='miTabla'>";
                    html += "<thead>";
                    html += "<tr>";                    
                    html += "<th>NO. PLAZA </th>";
                    html += "<th>RFC</th>";
                    html += "<th>NOMBRE</th>";
                    html += "<th>APELLIDOS</th>";
                    html += "<th>PERCEPCIONES</th>";
                    html += "<th>DEDUCCIONES</th>";
                    html += "<th>APORTACIONES</th>";
                    html += "<th>LÍQUIDO</th>";
                    html += "<th>CURP</th>";
                    html += "<th>PUESTO</th>";
                    html += "<th>ACCIONES</th>";
                    html += "<th>DESCARGAR</th>";
					html += "</tr>";
                    html += "</thead>";
                    html += "<tbody>";
                    var num_fila = 1;
                        for (l in obj.empleado) {
                            var sumaPercepciones = parseFloat(obj.empleado[l].totalPercepciones);
                            var sumaDeducciones = parseFloat(obj.empleado[l].totalDeducciones);
                            var liquido = sumaPercepciones - sumaDeducciones;
                            var subsidioAlEmpleo = obj.empleado[l].subsidioAlEmpleo;
                            if (subsidioAlEmpleo != null) {
                                liquido += parseFloat(subsidioAlEmpleo);
                            }
                            html += "<tr>";
                            html += "<td>" + obj.empleado[l].no_plaza + "</td>";
                            html += "<td>" + obj.empleado[l].rfc +"</td>";
                            html += "<td>" + obj.empleado[l].nombre_emp +"</td>";
                            html += "<td>" + obj.empleado[l].ap_paterno + " " + obj.empleado[l].ap_materno+"</td>";
                            html += "<td class='text-right'>" + fNumber.go(parseFloat(obj.empleado[l].totalPercepciones), "$") +"</td>";
                            html += "<td class='text-right'>" + fNumber.go(parseFloat(obj.empleado[l].totalDeducciones), "$") +"</td>";
                            html += "<td class='text-right'>" + fNumber.go(parseFloat(obj.empleado[l].totalAportaciones), "$") +"</td>";
                            html += "<td class='text-right'>" + fNumber.go(parseFloat(liquido), "$"); +"</td>";
                            html += "<td>" + obj.empleado[l].curp + "</td>";
                            html += "<td>" + obj.empleado[l].puesto + "</td>";                        
                            html += "<td>";
                            html += "<button style='margin:1px 1px' type='button' class='btn btn-primary' onclick='printDetalle("+ obj.empleado[l].id_empleado +","+ obj.empleado[l].id_nomina +")' ><span class='glyphicon glyphicon-print' aria-hidden='true'></span></button>";
                            html += "<a style='margin:1px 1px' class='btn btn-success' href='"+baseURL +"nomina_controller/editar?id_emp="+ obj.empleado[l].id_empleado +"&id_nom="+obj.empleado[l].id_nomina+"' target='_blank'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a>";
				   /*nuevo*/html += "<button style='margin:1px 1px' class='btn btn-danger' onclick='confirmDeleteNomO("+obj.empleado[l].id_empleado+","+obj.empleado[l].id_nomina+")'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button>";
                            if(obj.empleado[l].filename) {
								html += "<label class='text-success'>Empleado Timbrado</label>";
							}else{
								html += "<button style='margin:1px 1px' class='btn btn-success' onclick='confirmarTimbrado("+obj.empleado[l].id_empleado+","+obj.empleado[l].id_nomina+")'><span class='fa fa-bullhorn' aria-hidden='true'></span></button>";
							}
                            html += "</td>";
							html += "<td>";
                            if(obj.empleado[l].filename) {
								html += "<a style='margin:1px 1px; color: white; ' class='btn btn-primary' href='" + baseURL + "Nomina_controller/timbradopdf?id_emp=" + obj.empleado[l].id_empleado + "&id_nom=" + obj.empleado[l].id_nomina + "'><span class='fa fa-file-pdf-o' aria-hidden='true'></span></a>";
								html += "<a style='margin:1px 1px;color: white; ' class='btn btn-primary' href='" + baseURL + "Nomina_controller/timbradoxml?id_emp=" + obj.empleado[l].id_empleado + "&id_nom=" + obj.empleado[l].id_nomina + "'><span class='fa fa-file-excel-o' aria-hidden='true'></span></a>";
							}else{
                            	html += "<label style='color: #97310e'>primero tiene que Timbrar</label>";
                            	
							}
							html += "</td>";
                            html += "</tr>";
                            num_fila ++;
                        }
                    html += "</tbody>";
                    html += "</table>";
                    $("#resultado_periodo").html(html);

                    inicalizarDataTable("miTabla");

                    // ***********************************************************************
            }
        } 
    });
}

function printDetalle(id_empleado, id_nomina){

	window.open(baseURL + "Nomina_controller/pdf_por_empleado?id_emp="+ id_empleado +"&id_nom="+id_nomina);

}

var fNumber = {
    sepMil: ",", // separador para los miles
    sepDec: '.', // separador para los decimales
    formatear:function (num){
    num +='';
    var splitStr = num.split('.');
    var splitLeft = splitStr[0];
    var splitRight = splitStr.length > 1 ? this.sepDec + splitStr[1] : '';
    var regx = /(\d+)(\d{3})/;
    while (regx.test(splitLeft)) {
    splitLeft = splitLeft.replace(regx, '$1' + this.sepMil + '$2');
    }
    //se hace un parseo a flotante de los números decimal para redondearlos a 2 dígitos
    var valor = parseFloat(splitRight).toFixed(2);
    //el valor regresado es 0.xx, por lo tanto, se elimina el "0." para obtener el decimal puro 
    var splitDecimal = valor.split('.');
    var imprimirDecimal = splitDecimal[1];
    if (splitDecimal.length == 1) {
        imprimirDecimal = "00";
    }
    return this.simbol + splitLeft +"." + imprimirDecimal;
    // return this.simbol + splitLeft + splitRight;
    },
    go:function(num, simbol){
    this.simbol = simbol ||'';
    return this.formatear(num);
    }
}

function imprimirList(){

    var id = document.getElementById("periodo").value;
    window.open(baseURL + "Nomina_controller/print_list_employee?id="+id);

}
/*nuevo*/
function confirmDeleteNomO(id_empleado,id_nomina){
    swal({
        title: "Confirmar",
        text: "¿Esta seguro de que desea ELIMINAR esta nómina?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Si, ELIMINAR!",
        closeOnConfirm: true
        }, function () {
            $.ajax({
                type: "POST",
                url:baseURL + "Periodo_controller/eliminarNominaDeEmpleado",
                data: {id_empleado: id_empleado,
                        id_nomina: id_nomina},
                success: function(respuesta) {
                    var obj = JSON.parse(respuesta);
                    if (obj.resultado === true) {
                        setTimeout(function() {
                            toastr.options = {
                                closeButton: true,
                                progressBar: true,
                                showMethod: 'slideDown',
                                timeOut: 1200
                            };
                            toastr.success('La nómina se eliminó correctamente', 'NÓMINA ELIMINADA');
                            setTimeout(function() {                    
                                  serach_periodos(id_nomina);
                                }, 1300);
                        }, 1300);              
                    }else{
                        alert("Error al eliminar nómina");
                    }
                } 
            });
    });
}
function confirmarTimbrado($id_empleado,$id_nomina){
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
                    window.open(baseURL+"nomina_controller/verificaExisteTimbre?id_emp="+$id_empleado+"&id_nom="+$id_nomina+"&origenR="+origenRecurso, '_blank');
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
/*//SE ABRE EL MODAL PARA TIMBRAR LA NÓMINA
function timbrarNomina(id_empleado,id_nomina){
    $("#inputRecursoPropioOculto").hide();
    $("#formTimbrarNomina")[0].reset();
    document.getElementById("id_emp").value = id_empleado;
    document.getElementById("id_nom").value = id_nomina;
    $('#modalTimbrado').modal('show');
}
//SE REALIZA EL TIMBRADO DE LA NOMINA
function generarTimbreNomina(){
    $("#formTimbrarNomina").submit();
    $('#modalTimbrado').modal('hide');
}

function validarOrigenRecurso(origenRecurso){
    console.log("validando origen recursos");
    if (origenRecurso == "IM") {
        $("#inputRecursoPropioOculto").show();
    }else{
        $("#inputRecursoPropioOculto").hide();
    }
}*/

	
