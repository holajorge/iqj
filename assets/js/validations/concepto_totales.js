$(document).ready(function() {

// $("#guardad_conceptos").hide();

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
	var anio = $("#prueba").serialize();
	var html = "";
	var mesess = ['Enero','Febrero', 'Marzo','Abril','Mayo', 'Junio','Julio', 'Agosto', 'Septiembre', 'Octubre','Noviembre','Diciembre'];
	if (tipo == "0") {
		$.ajax({
            type: "POST",
            url:baseURL + "Reportes_nomina_ctrl/getAllMontPeriodosC", 
            data: anio,
            success: function(respuesta) {
              var obj = JSON.parse(respuesta);
                if (obj.resultado === true) { 
                	var num_fila = 1;
                	html += "<h3>Seleccione el Periodo</h3>";
                	html += "<select class='form-control input-lg' id='periodo' name='periodo' onchange='serach_porMes(value);'>";
                	html += "<option value='' selected disabled hidden >Seleccione  el Mes</option>";
	                for (l in obj.meses) {
	                    var id = obj.meses[l].id_nomina;
	                    var mes = obj.meses[l].mes;	
	                    var periodoQ = obj.meses[l].periodo_quinquenal;
					 	html += "<option value='"+ mes +"'>" + mesess[mes-1] +"</option>" ;
	                    num_fila ++; 
	                }
	                html += "</select>";
                    $("#peridosdiv").html(html);  
                }
            } 
        });
	}else{
		$("#periodo").html("");  
		// var anio = $("#prueba").serialize();		
		$.ajax({
            type: "POST",
            url:baseURL + "Reportes_nomina_ctrl/getAllPeriodosAjax",
            data: anio,
            success: function(respuesta) {
              var obj = JSON.parse(respuesta);
                if (obj.resultado === true) { 
                	var num_fila = 1;
                	html += "<h3>Seleccione el Periodo</h3>";
                	html += "<select class='form-control input-lg' id='periodoQuinsena' name='tipo' onchange='serach_porQuinsena(value);'>";
                	html += "<option value='' selected disabled hidden >Seleccione  Periodo Quincenal</option>";
	                for (l in obj.periodos) {
	                    var id = obj.periodos[l].id_nomina;
	                    var inicio = obj.periodos[l].periodo_inicio;
	                    var fin = obj.periodos[l].periodo_fin;
					 	html += "<option value='"+ id +"'>" + inicio +" | "+ fin +"</option>" ;
	                    num_fila ++;                      
	                }
	                html += "</select>";
                    $("#peridosdiv").html(html);  
                }
            } 
        });
	}
}

function serach_porMes(mes){	
	
	document.getElementById("mess").value=mes; 
	var tipo = document.getElementById("mes").value;
	console.log(tipo);
	var anio = document.getElementById("anio").value;
	
	document.getElementById("anioo").value=anio;
	document.getElementById("tipo").value=tipo;

	var html = "";
	var html1 = "";
	var html2 = "";
	$("#table_percepciones").empty();
	$("#table_deducciones").empty();
	$("#table_aportaciones").empty();
	$("#guardad_conceptos").hide();

	// construye conceptos por periodos quincenales
		$.ajax({
            type: "POST",
            url:baseURL + "Reportes_nomina_ctrl/getAllPeriodosPercepcionMes",
            data: {mes:mes},
            success: function(respuesta) {
              var obj = JSON.parse(respuesta);
              
                if (obj.resultado === true) { 
                	var num_fila = 1;
                	html += "<table class='table table-hover' style='background: rgb(252,255,244);'>";
                	html += "<thead>";
                	html += "<tr>";
                	html += "<th>Percepcion</th>";
                	html += "<th>Seleccione</th>";
                	html += "</tr>";
                	html += "<thead>";
                	html += "<tbody>";
	                for (l in obj.percepciones) {
	                	html += "<tr>";
	                	html += "<td>"+ obj.percepciones[l].percepcion +"</td>";
	                	html += "<td class='text-center'><input value='"+obj.percepciones[l].id_percepcion+"' name='percepcion[]'  type='checkbox' /></td>";
	                	html += "</tr>";
	                    
	                    num_fila ++;                      
	                }
	                html += "</tbody>";
	                html += "<table>";
                    $("#table_percepciones").html(html);  

                    var num_fila1 = 1;
                	html1 += "<table class='table table-hover' style='background: rgb(252,255,244);'>";
                	html1 += "<thead>";
                	html1 += "<tr>";
                	html1 += "<th>Deduccion</th>";
                	html1 += "<th>Seleccione</th>";
                	html1 += "</tr>";
                	html1 += "<thead>";
                	html1 += "<tbody>";
	                for (l in obj.deducciones) {
	                	html1 += "<tr>";
	                	html1 += "<td>"+ obj.deducciones[l].deduccion +"</td>";
	                	html1 += "<td class='text-center'><input value='"+obj.deducciones[l].id_deduccion+"' name='deduccion[]' type='checkbox' /></td>";
	                	html1 += "</tr>";
	                    
	                    num_fila1 ++;                      
	                }
	                html1 += "</tbody>";
	                html1 += "<table>";
                    $("#table_deducciones").html(html1);

                    var num_fila2 = 1;
                	html2 += "<table class='table table-hover' style='background: rgb(252,255,244);'>";
                	html2 += "<thead>";
                	html2 += "<tr>";
                	html2 += "<th>Deduccion</th>";
                	html2 += "<th>Seleccione</th>";
                	html2 += "</tr>";
                	html2 += "<thead>";
                	html2 += "<tbody>";
	                for (l in obj.aportaciones) {
	                	html2 += "<tr>";
	                	html2 += "<td>"+ obj.aportaciones[l].aportacion +"</td>";
	                	html2 += "<td class='text-center'><input value='"+obj.aportaciones[l].id_aportacion+"' name='aportacion[]' type='checkbox'  /></td>";
	                	html2 += "</tr>";
	                    
	                    num_fila2 ++;                      
	                }
	                html2 += "</tbody>";
	                html2 += "<table>";
                    $("#table_aportaciones").html(html2);

                    $("#guardad_conceptos").css('display', 'block');
                    // document.getElementById("guardad_conceptos").setAttribut;
                }
            } 
  		});
}

function serach_porQuinsena(id_nomina){

	document.getElementById("id_nomina").value=id_nomina; 
	var tipo = document.getElementById("mes").value;
	console.log(tipo);
	document.getElementById("tipo").value=tipo;
	var html = "";
	var html1 = "";
	var html2 = "";
	$("#table_percepciones").empty();
	$("#table_deducciones").empty();
	$("#table_aportaciones").empty();
	$("#guardad_conceptos").hide();

	// construye conceptos por periodos quincenales
	
		$.ajax({
            type: "POST",
            url:baseURL + "Reportes_nomina_ctrl/getAllPeriodosPercepcion",
            data: {id:id_nomina},
            success: function(respuesta) {
              var obj = JSON.parse(respuesta);
              
                if (obj.resultado === true) { 
                	var num_fila = 1;
                	html += "<table class='table table-hover' style='background: rgb(252,255,244);'>";
                	html += "<thead>";
                	html += "<tr>";
                	html += "<th>Percepcion</th>";
                	html += "<th>Seleccione</th>";
                	html += "</tr>";
                	html += "<thead>";
                	html += "<tbody>";
	                for (l in obj.percepciones) {
	                	html += "<tr>";
	                	html += "<td>"+ obj.percepciones[l].percepcion +"</td>";
	                	html += "<td class='text-center'><input value='"+obj.percepciones[l].id_percepcion+"' name='percepcion[]'  type='checkbox' /></td>";
	                	html += "</tr>";
	                    
	                    num_fila ++;                      
	                }
	                html += "</tbody>";
	                html += "<table>";
                    $("#table_percepciones").html(html);  

                    var num_fila1 = 1;
                	html1 += "<table class='table table-hover' style='background: rgb(252,255,244);'>";
                	html1 += "<thead>";
                	html1 += "<tr>";
                	html1 += "<th>Deduccion</th>";
                	html1 += "<th>Seleccione</th>";
                	html1 += "</tr>";
                	html1 += "<thead>";
                	html1 += "<tbody>";
	                for (l in obj.deducciones) {
	                	html1 += "<tr>";
	                	html1 += "<td>"+ obj.deducciones[l].deduccion +"</td>";
	                	html1 += "<td class='text-center'><input value='"+obj.deducciones[l].id_deduccion+"' name='deduccion[]' type='checkbox' /></td>";
	                	html1 += "</tr>";
	                    
	                    num_fila1 ++;                      
	                }
	                html1 += "</tbody>";
	                html1 += "<table>";
                    $("#table_deducciones").html(html1);

                    var num_fila2 = 1;
                	html2 += "<table class='table table-hover' style='background: rgb(252,255,244);'>";
                	html2 += "<thead>";
                	html2 += "<tr>";
                	html2 += "<th>Deduccion</th>";
                	html2 += "<th>Seleccione</th>";
                	html2 += "</tr>";
                	html2 += "<thead>";
                	html2 += "<tbody>";
	                for (l in obj.aportaciones) {
	                	html2 += "<tr>";
	                	html2 += "<td>"+ obj.aportaciones[l].aportacion +"</td>";
	                	html2 += "<td class='text-center'><input value='"+obj.aportaciones[l].id_aportacion+"' name='aportacion[]' type='checkbox'  /></td>";
	                	html2 += "</tr>";
	                    
	                    num_fila2 ++;                      
	                }
	                html2 += "</tbody>";
	                html2 += "<table>";
                    $("#table_aportaciones").html(html2);

                    $("#guardad_conceptos").css('display', 'block');
                }
            } 
    	});
}