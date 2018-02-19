$(document).ready(function() {

});

function serach_yaer_c(anio){
	$("#tipoConsulta").css('display', 'block');
	$("#peridosdiv").css('display','none');
	$("#consultaPDA").css('display', 'none');
	$("#tipoConsultaPDA").hide();
	$("#puntadoEmpleados").css('display', 'none');

	if (anio) {
		var html = "";
		html += "<option value='' selected disabled hidden >Tipo</option>";
		html += "<option value='0'>Mes</option>";
		html += "<option value='1'>Quincenal</option>";
		$("#mes").html(html);
	}
}
function serach_periodo_c(tipo){

	var anio = $("#prueba").serialize();
	var html = "";
	var mesess = ['Enero','Febrero', 'Marzo','Abril','Mayo', 'Junio','Julio', 'Agosto', 'Septiembre', 'Octubre','Noviembre','Diciembre'];
	if (tipo == "0") {
		$("#peridosdiv").css('display', 'block');
		$("#consultaPDA").css('display', 'none');
		$("#tipoConsultaPDA").hide();
		$("#puntadoEmpleados").css('display', 'none');

		$.ajax({
			type: "POST",
			url:baseURL + "Reportes_nomina_ctrl/getAllMontPeriodosC",
			data: anio,
			success: function(respuesta) {
				var obj = JSON.parse(respuesta);
				if (obj.resultado === true) {
					var num_fila = 1;
					html += "<h3>Seleccione el Periodo</h3>";
					html += "<select class='form-control' id='periodo' name='periodo' onchange='serach_porMes_c(value);'>";
					html += "<option value='' selected disabled hidden >Seleccione  el Mes</option>";
					for (l in obj.meses) {
						var id = obj.meses[l].id_nomina;
						var mes = obj.meses[l].mes;
						var periodoQ = obj.meses[l].periodo_quinquenal;
						html += "<option value='"+ id +"'>" + mesess[mes-1] +"</option>" ;
						num_fila ++;
					}
					html += "</select>";
					$("#peridosdiv").html(html);

				}
			}
		});
	}else{
		$("#periodo").html("");
		$("#peridosdiv").css('display', 'block');
		$("#consultaPDA").css('display', 'none');
		$("#tipoConsultaPDA").hide();
		$("#puntadoEmpleados").css('display', 'none');
		$.ajax({
			type: "POST",
			url:baseURL + "Reportes_nomina_ctrl/getAllPeriodosAjax",
			data: anio,
			success: function(respuesta) {
				var obj = JSON.parse(respuesta);
				if (obj.resultado === true) {
					var num_fila = 1;
					html += "<h3>Seleccione el Periodo</h3>";
					html += "<select class='form-control ' id='periodoQuinsena' name='tipo' onchange='serach_porQuinsena_c(value);'>";
					html += "<option value='' selected disabled hidden >Seleccione  Periodo Quincenal</option>";
					for (l in obj.periodos) {
						var id = obj.periodos[l].id_nomina;
						var inicio = obj.periodos[l].periodo_inicio;
						var fin = obj.periodos[l].periodo_fin;
						var perQuinquenal = obj.periodos[l].periodo_quinquenal;
						var x = "<strong >"+perQuinquenal +"</strong>";
						html += "<option value='"+ id +"'>"+x+" | "+inicio +" | "+ fin +"</option>" ;
						num_fila ++;
					}
					html += "</select>";
					$("#peridosdiv").html(html);

				}
			}
		});
	}
}
function serach_porMes_c(id) {

	$("#consultaPDA").css('display', 'block');
	$("#tipoConsultaPDA").css('display', 'none');
	$("#puntadoEmpleados").css('display', 'none');
	document.getElementById("id_nomina").value=id;

	document.getElementById("percepcion").checked = false;
	document.getElementById("deduccion").checked = false;
	document.getElementById("aporta").checked = false;
}
function serach_porQuinsena_c(id_nomina){

	$("#consultaPDA").css('display', 'block');
	$("#tipoConsultaPDA").css('display', 'none');
	$("#puntadoEmpleados").css('display', 'none');
	$("#puntadoEmpleados").html("");

	document.getElementById("id_nomina").value=id_nomina;
	var tipo = document.getElementById("mes").value;
	document.getElementById("tipo").value=tipo;
}

function percepcion(){
	$("#tipoConsultaPDA").css('display', 'block');
	$("#puntadoEmpleados").html("");
	var percepcion = document.getElementById("percepcion").value;
	$.ajax({
		type: "GET",
		url:baseURL + "Reportes_nomina_ctrl/getAllPerecepcionAjax",
		success: function(respuesta) {
			var obj = JSON.parse(respuesta);
			if (obj.resultado === true) {
				var num_fila = 1;
				var html = "";
				html += "<h3 style='font-size: 14px;'>Seleccione Percepcion</h3>";
				html += "<select class='form-control' name='percepcion' id='percepcion' onchange='listaEmpleados(value)'>";
				html += 	"<option value='' selected disabled hidden >Percepcion</option>";
				for (l in obj.percepciones) {
					var id = obj.percepciones[l].id_percepcion;
					html += "<option value='"+ id +"'> "+obj.percepciones[l].nombre; +" </option>" ;
					num_fila ++;
				}
				html += "</select>";
				$("#tipoConsultaPDA").html(html);
			}
		}
	});
}
function deduccion() {
	$("#puntadoEmpleados").html("");
	$("#tipoConsultaPDA").css('display', 'block');
	var deduccion = document.getElementById("deduccion").value;
	$.ajax({
		type: "GET",
		url:baseURL + "Reportes_nomina_ctrl/getAllDeduccionAjax",
		success: function(respuesta) {
			var obj = JSON.parse(respuesta);
			if (obj.resultado === true) {
				var num_fila = 1;
				var html = "";
				html += "<h3 style='font-size: 14px;'>Seleccione Deducciones</h3>";
				html += "<select class='form-control' name='deduccion' id='deduccion' onchange='listaEmpleadosDeuccion(value)'>";
				html += 	"<option value='' selected disabled hidden >Deducciones</option>";
				for (l in obj.deducciones) {
					var id = obj.deducciones[l].id_deduccion;
					html += "<option value='"+ id +"'> "+obj.deducciones[l].nombre; +" </option>" ;
					num_fila ++;
				}
				html += "</select>";
				$("#tipoConsultaPDA").html(html);

			}
		}
	});

}
function aportacion() {
	$("#puntadoEmpleados").html("");
	$("#tipoConsultaPDA").css('display', 'block');
	var aportacion = document.getElementById("aporta").value;
	$.ajax({
		type: "GET",
		url:baseURL + "Reportes_nomina_ctrl/getAllAportacionesAjax",
		success: function(respuesta) {
			var obj = JSON.parse(respuesta);
			if (obj.resultado === true) {
				var num_fila = 1;
				var html = "";
				html += "<h3 style='font-size: 14px;'>Seleccione Aportaciones</h3>";
				html += "<select class='form-control' name='aportacion' id='aportacion' onchange='listaEmpleadosAportacion(value)'>";
				html += 	"<option value='' selected disabled hidden >Aportaciones</option>";
				for (l in obj.aportaciones) {
					var id = obj.aportaciones[l].id_aportacion;
					html += "<option value='"+ id +"'> "+obj.aportaciones[l].nombre; +" </option>" ;
					num_fila ++;
				}
				html += "</select>";
				$("#tipoConsultaPDA").html(html);

			}
		}
	});
}

function listaEmpleados(indicador) {

	var anio = document.getElementById("anio").value;
	var id_nomina = document.getElementById("id_nomina").value;
	$.ajax({
		type: "POST",
		url:baseURL + "Reportes_nomina_ctrl/getAllEmpleadosConsultaAjax",
		data: {anio: anio, indicador: indicador,id_nomina:id_nomina },
		success: function(respuesta) {
			var obj = JSON.parse(respuesta);
			console.log(obj);
			if (obj.resultado === true) {
				var num_fila = 1;
				var html = "";
					html += "<table class='table table-hover' id='puntadoEmployee'>";
						html += "<thead>";
							html +=	"<tr>";
							html +=		"<th>NOMBRE</th>";
							html +=		"<th>Apellido Paterno</th>";
							html +=		"<th>Apellido Materno</th>";
							html +=		"<th>RFC</th>";
						html +=		"</tr>";
						html += "</thead>";
						html += "<tbody>";
						for (l in obj.employees) {
							var nombre = obj.employees[l].nombre;
							html += "<tr>";
								html += "<td><label id='nombre'>" + obj.employees[l].nombre + "</label></td>";
								html += "<td><label id='ap_paterno'>" + obj.employees[l].ap_paterno +"</label></td>";
								html += "<td><label id='ap_materno'>" + obj.employees[l].ap_materno +"</label></td>";
								html += "<td><label id='rfc'>" + obj.employees[l].rfc + "</label></td>";
							html += "</tr>";
							num_fila ++;
						}
						html += "</tbody>";
					html += "</table>";
					$("#puntadoEmpleados").css('display', 'block');
					$("#puntadoEmpleados").html(html);
				inicalizarDataTable('puntadoEmployee');
			}else {
				var html = "";
				html += "<p STYLE='color: red'>NO HAY EMPLEADOS EN ESTA CONSULTA</p>";
				$("#puntadoEmpleados").css('display', 'block');
				$("#puntadoEmpleados").html(html);
			}
		}
	});
}
function listaEmpleadosDeuccion(indicador) {

	var anio = document.getElementById("anio").value;
	var id_nomina = document.getElementById("id_nomina").value;
	$.ajax({
		type: "POST",
		url:baseURL + "Reportes_nomina_ctrl/getAllEmpleadosConsultaDeduccionAjax",
		data: {anio: anio, indicador: indicador,id_nomina:id_nomina },
		success: function(respuesta) {
			var obj = JSON.parse(respuesta);
			console.log(obj);
			if (obj.resultado === true) {
				var num_fila = 1;
				var html = "";
				html += "<table class='table table-hover' id='puntadoEmployee'>";
				html += "<thead>";
				html +=	"<tr>";
				html +=		"<th>NOMBRE</th>";
				html +=		"<th>Apellido Paterno</th>";
				html +=		"<th>Apellido Materno</th>";
				html +=		"<th>RFC</th>";
				html +=		"</tr>";
				html += "</thead>";
				html += "<tbody>";
				for (l in obj.employees) {
					var nombre = obj.employees[l].nombre;
					html += "<tr>";
					html += "<td><label id='nombre'>" + obj.employees[l].nombre + "</label></td>";
					html += "<td><label id='ap_paterno'>" + obj.employees[l].ap_paterno +"</label></td>";
					html += "<td><label id='ap_materno'>" + obj.employees[l].ap_materno +"</label></td>";
					html += "<td><label id='rfc'>" + obj.employees[l].rfc + "</label></td>";
					html += "</tr>";
					num_fila ++;
				}
				html += "</tbody>";
				html += "</table>";
				$("#puntadoEmpleados").css('display', 'block');
				$("#puntadoEmpleados").html(html);
				inicalizarDataTable('puntadoEmployee');

			}else {
				var html = "";
				html += "<p STYLE='color: red'>NO HAY EMPLEADOS EN ESTA CONSULTA</p>";
				$("#puntadoEmpleados").css('display', 'block');
				$("#puntadoEmpleados").html(html);
			}
		}
	});
}
function listaEmpleadosAportacion(indicador) {

	var anio = document.getElementById("anio").value;
	var id_nomina = document.getElementById("id_nomina").value;
	$.ajax({
		type: "POST",
		url:baseURL + "Reportes_nomina_ctrl/getAllEmpleadosConsultaAportacionAjax",
		data: {anio: anio, indicador: indicador,id_nomina:id_nomina },
		success: function(respuesta) {
			var obj = JSON.parse(respuesta);
			console.log(obj);
			if (obj.resultado === true) {
				var num_fila = 1;
				var html = "";
				html += "<table class='table table-hover' id='puntadoEmployee'>";
				html += "<thead>";
				html +=	"<tr>";
				html +=		"<th>NOMBRE</th>";
				html +=		"<th>Apellido Paterno</th>";
				html +=		"<th>Apellido Materno</th>";
				html +=		"<th>RFC</th>";
				html +=		"</tr>";
				html += "</thead>";
				html += "<tbody>";
				for (l in obj.employees) {
					var nombre = obj.employees[l].nombre;
					html += "<tr>";
					html += "<td><label id='nombre'>" + obj.employees[l].nombre + "</label></td>";
					html += "<td><label id='ap_paterno'>" + obj.employees[l].ap_paterno +"</label></td>";
					html += "<td><label id='ap_materno'>" + obj.employees[l].ap_materno +"</label></td>";
					html += "<td><label id='rfc'>" + obj.employees[l].rfc + "</label></td>";
					html += "</tr>";
					num_fila ++;
				}
				html += "</tbody>";
				html += "</table>";
				$("#puntadoEmpleados").css('display', 'block');
				$("#puntadoEmpleados").html(html);
				inicalizarDataTable('puntadoEmployee');

			}else {
				var html = "";
				html += "<p STYLE='color: red'>NO HAY EMPLEADOS EN ESTA CONSULTA</p>";
				$("#puntadoEmpleados").css('display', 'block');
				$("#puntadoEmpleados").html(html);
			}
		}
	});
}