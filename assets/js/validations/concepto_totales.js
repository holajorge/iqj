$(document).ready(function() {


});

function serach_yaer(anio){	
	
	$("#mes").html("");
	$("#periodo").html(""); 
	if (anio) {
		var html = "";
		html += "<option value='' selected disabled hidden >Seleccione un Tipo</option>";
	 	html += "<option value='mes'>Mes</option>";
	 	html += "<option value='quincena'>Quincenal</option>";
	 	$("#mes").html(html);
	}
}
function serach_periodo(tipo){
	var html = ""; 
	if (tipo == "mes") {
		html += "<option value='' selected disabled hidden >Seleccione  MES</option>";
	 	html += "<option>Enero</option>";
	 	html += "<option>Febrero</option>";
	 	$("#periodo").html(html);
	}else{
		var anio = $("#prueba").serialize();
		console.log(anio);
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
					 	html += "<option value='"+ id +"'>" + inicio +" | "+ fin +"</option>" ;
	                    num_fila ++;                      
	                }
                    $("#periodo").html(html);  
                }
            } 
        });
	}
}
function serach_conseptos(){

	



}