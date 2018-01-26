$(document).ready(function() {

$("#guardad_conceptos").hide();
var checked = false;
var checkedDed = false;
var checkedApor = false;

});

function serach_yaer(anio){	
	$("#mes").html("");
	$("#periodo").html("");
	$("#table_percepciones").empty();  
	$("#table_deducciones").empty();
	$("#table_aportaciones").empty();
	$("#guardad_conceptos").hide(); 
	if (anio) {
		var html = "";
		html += "<option value='' selected disabled hidden >Seleccione un Tipo</option>";
	 	html += "<option value='0'>Mes</option>";
	 	html += "<option value='1'>Quincenal</option>";
	 	$("#mes").html(html);
	}
}
function serach_periodo(tipo){
	$("#table_percepciones").empty();  
	 $("#table_deducciones").empty();
	 $("#table_aportaciones").empty();
	 $("#guardad_conceptos").hide();
	var html = ""; 
	if (tipo == "0") {
		html += "<option value='' selected disabled hidden >Seleccione  MES</option>";
	 	html += "<option>Enero</option>";
	 	html += "<option>Febrero</option>";
	 	html += "<option>Abril</option>";
	 	html += "<option>Marzo</option>";
	 	html += "<option>Junio</option>";
	 	html += "<option>Julio</option>";
	 	html += "<option>Agosto</option>";
	 	html += "<option>Septiembre</option>";
	 	html += "<option>Octubre</option>";
	 	html += "<option>Nobiembre</option>";
	 	html += "<option>Diciembre</option>";
	 	$("#periodo").html(html);
	}else{
		var anio = $("#prueba").serialize();
		
		$.ajax({
            type: "POST",
            url:baseURL + "Reportes_nomina_ctrl/getAllPeriodosAjax",
            data: anio,
            success: function(respuesta) {
              var obj = JSON.parse(respuesta);
                if (obj.resultado === true) { 
                	var num_fila = 1;
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
                    $("#periodo").html(html);  
                }
            } 
        });
	}
}
function serach_conseptos(id_nomina){
	checked = false;
	checkedDed = false;
	checkedApor = false;
	var idNomina = document.getElementById("id_nomina").value=id_nomina; 
	var tipo = $("#tipoConsulta").serialize();

	console.log(tipo);

	console.log(idNomina);
	var html = ""; 
	var html1 = ""; 
	var html2 = ""; 
	 $("#table_percepciones").empty();  
	 $("#table_deducciones").empty();
	 $("#table_aportaciones").empty();
	 $("#guardad_conceptos").hide();

	$.ajax({
            type: "POST",
            url:baseURL + "Reportes_nomina_ctrl/getAllPeriodosPercepcion",
            data: {id:id_nomina},
            success: function(respuesta) {
              var obj = JSON.parse(respuesta);
              
                if (obj.resultado === true) { 
                	var num_fila = 1;
                	html += "<button type='button' onclick='seleccionarTodoPer()' class='btn btn-success btn-xs pull-right'>Seleccionar todo <span class='glyphicon glyphicon-ok' aria-hidden='true'></span></button>";
                	html += "<table class='table table-hover' style='background: rgb(252,255,244);'>";
                	html += "<thead>";
                	html += "<tr>";
                	html += "<th>Código</th>";
                	html += "<th>Percepción</th>";
                	html += "<th>Seleccione";
                	html += "";
                	html += "</th>";
                	html += "</tr>";
                	html += "<thead>";
                	html += "<tbody>";
	                for (l in obj.percepciones) {
	                	html += "<tr>";
	                	html += "<td>"+ obj.percepciones[l].indicador +"</td>";
	                	html += "<td>"+ obj.percepciones[l].percepcion +"</td>";
	                	html += "<td class='text-center'><input class='percepcion' value='"+obj.percepciones[l].id_percepcion+"' name='percepcion[]'  type='checkbox' /></td>";
	                	html += "</tr>";
	                    
	                    num_fila ++;                      
	                }
	                html += "</tbody>";
	                html += "<table>";
                    $("#table_percepciones").html(html);  

                    var num_fila1 = 1;
                    html1 += "<button type='button' onclick='seleccionarTodoDed()' class='btn btn-success btn-xs pull-right'>Seleccionar todo <span class='glyphicon glyphicon-ok' aria-hidden='true'></span></button>";
                	html1 += "<table class='table table-hover' style='background: rgb(252,255,244);'>";
                	html1 += "<thead>";
                	html1 += "<tr>";
                	html1 += "<th>Código</th>";
                	html1 += "<th>Deducción</th>";
                	html1 += "<th>Seleccione</th>";
                	html1 += "</tr>";
                	html1 += "<thead>";
                	html1 += "<tbody>";
	                for (l in obj.deducciones) {
	                	html1 += "<tr>";
	                	html1 += "<td>"+ obj.deducciones[l].indicador +"</td>";
	                	html1 += "<td>"+ obj.deducciones[l].deduccion +"</td>";
	                	html1 += "<td class='text-center'><input class='deduccion' value='"+obj.deducciones[l].id_deduccion+"' name='deduccion[]' type='checkbox' /></td>";
	                	html1 += "</tr>";
	                    
	                    num_fila1 ++;                      
	                }
	                html1 += "</tbody>";
	                html1 += "<table>";
                    $("#table_deducciones").html(html1);

                    var num_fila2 = 1;
                    html2 += "<button type='button' onclick='seleccionarTodoApor()' class='btn btn-success btn-xs pull-right'>Seleccionar todo <span class='glyphicon glyphicon-ok' aria-hidden='true'></span></button>";
                	html2 += "<table class='table table-hover' style='background: rgb(252,255,244);'>";
                	html2 += "<thead>";
                	html2 += "<tr>";
                	html2 += "<th>Código</th>";
                	html2 += "<th>Aportación</th>";
                	html2 += "<th>Seleccione</th>";
                	html2 += "</tr>";
                	html2 += "<thead>";
                	html2 += "<tbody>";
	                for (l in obj.aportaciones) {
	                	html2 += "<tr>";
	                	html2 += "<td>"+ obj.aportaciones[l].indicador +"</td>";
	                	html2 += "<td>"+ obj.aportaciones[l].aportacion +"</td>";
	                	html2 += "<td class='text-center'><input class='aportacion' value='"+obj.aportaciones[l].id_aportacion+"' name='aportacion[]' type='checkbox'  /></td>";
	                	html2 += "</tr>";
	                    
	                    num_fila2 ++;                      
	                }
	                html2 += "</tbody>";
	                html2 += "<table>";
                    $("#table_aportaciones").html(html2);

                    $("#guardad_conceptos").show();
                }
            } 
        });

}

function seleccionarTodoPer(){
	var checkboxes = $(".percepcion");
	if (!checked) {
		for (var i = 0; i < checkboxes.length; i++) {
			checkboxes[i].checked = true;
		}
		checked = true;
	}else{
		for (var i = 0; i < checkboxes.length; i++) {
			checkboxes[i].checked = false;
		}
		checked = false;
	}
	
}

function seleccionarTodoDed(){
	var checkboxes = $(".deduccion");
	if (!checkedDed) {
		for (var i = 0; i < checkboxes.length; i++) {
			checkboxes[i].checked = true;
		}
		checkedDed = true;
	}else{
		for (var i = 0; i < checkboxes.length; i++) {
			checkboxes[i].checked = false;
		}
		checkedDed = false;
	}
	
}

function seleccionarTodoApor(){
	var checkboxes = $(".aportacion");
	if (!checkedApor) {
		for (var i = 0; i < checkboxes.length; i++) {
			checkboxes[i].checked = true;
		}
		checkedApor = true;
	}else{
		for (var i = 0; i < checkboxes.length; i++) {
			checkboxes[i].checked = false;
		}
		checkedApor = false;
	}
	
}

function btnImprimirReporte(){

}

