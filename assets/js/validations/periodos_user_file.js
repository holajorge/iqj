$(document).ready(function() {

});

function serach_periodos_user(anio){
    $("#resultado_periodo").html("");
    var mesess = ['Enero','Febrero', 'Marzo','Abril','Mayo', 'Junio','Julio', 'Agosto', 'Septiembre', 'Octubre','Noviembre','Diciembre'];
    $.ajax({
        url: baseURL + "Files_employee/buscar_periodo_file",
        type: "POST",
        data: {anio: anio},
        success: function(respuesta) {
            var obj = JSON.parse(respuesta);
            if (obj.resultado === true) {
                var html = "";
                html += "<p style='text-align: center; color: #4cae4c; font-size: 16px; font-family: Aria; margin: 0'>" +"RECIBOS DE NÓMINA DEÑ AÑO " + ' ' + "<strong style='color: red'>"+ anio +"</strong></p>";
                html += "<table class='table table-bordered table-striped' id='miTabla'>";
                html += "<thead>";
                    html += "<tr >";
                        html += "<th style='text-align: center'>MES</th>";
                        html += "<th style='text-align: center'>Primera Quincena</th>";
                        html += "<th style='text-align: center'>Segunda Quincena</th>";
                        html += "<th style='text-align: center'>EXTRAORDINARIA</th>";
                    html += "</tr>";
                html += "</thead>";
                html += "<tbody>";
                var num_fila = 1;
                var num_fila1 = 0;
                for (l in obj.archivos) {
                    var mes = obj.archivos[l]['mes'];
                    var quincena1 = obj.archivos[l]['primeraQuincena'] == false;
                    var quincena2 = obj.archivos[l]['segundaQuincena'] == false;
                    //var file_name = obj.archivos[l]['segundaQuincena'][0].file_name;
                    //console.log(file_name);
                    console.log(quincena1);
                    console.log(quincena2);
                    html += "<tr class='text-center'>";
                        html += "<td>" +  mesess[mes-1] +"</td>";
                        html += "<td>";
                            if(quincena1){
                                html += "<p style='color: darkblue; text-align: center'>ESTA NÓMINA NO SE HA TIMBRADO AUN </p>";
                            }else{
                                html += "<a style='margin: 1px 1px' class='btn btn-success'  href=' "+baseURL +"Files_employee/download_pdf?file_name="+obj.archivos[l]['primeraQuincena'][0].file_name+"' > <span class='fa fa-file-pdf-o' aria-hidden='true'></span> PDF</a>";
                                html += "<a style='margin: 1px 1px' class='btn btn-info'  href=' "+baseURL +"Files_employee/download_xml?file_name="+obj.archivos[l]['primeraQuincena'][0].file_name+"'>  <span class='fa fa-file-excel-o' aria-hidden='true'></span> XML</a>";
                            }
                        html += "</td>";
                        html += "<td>";
                            if(quincena2){
                                html += "<p style='color: darkblue; text-align: center'>ESTA NÓMINA NO SE HA TIMBRADO AUN </p>";
                            }else{
                                html += "<a style='margin: 1px 1px' class='btn btn-success'  href=' "+baseURL +"Files_employee/download_pdf?file_name="+obj.archivos[l]['segundaQuincena'][0].file_name+"' > <span class='fa fa-file-pdf-o' aria-hidden='true'></span> PDF</a>";
                                html += "<a style='margin: 1px 1px' class='btn btn-info'  href=' "+baseURL +"Files_employee/download_xml?file_name="+obj.archivos[l]['segundaQuincena'][0].file_name+"'>  <span class='fa fa-file-excel-o' aria-hidden='true'></span> XML</a>";
                            }
                        html += "</td>";
                    html += "<td>";
                        html += "<p style='color: firebrick'> EN CONSTRUCCIÓN <span class='fa fa-life-bouy'></span> </p>";
                    html += "</td>";
                    html += "</tr>";
                    num_fila ++;
                }
                html += "</tbody>";
                html += "</table>";
                $("#resultado_periodo").css('display', 'block');
                $("#resultado_periodo").html(html);
                inicalizarDataTable("miTabla");
            }else{
                var html1 = "";
                html1 += "<p style='text-align: center; color: red; font-size: 16px; font-family: Aria'>" +"NO HAY RECIBOS EN ESTE AÑO" + ' ' + anio +"</p>";
                $("#resultado_periodo").css('display', 'block');
                $("#resultado_periodo").html(html1);
            }
        }
    });
}

function showFormChange(){
    $("#showCambioPasswordUser").css('display', 'block');
}
function canselarCambioPassword(){
    $("#formChangePassUser")[0].reset();
    $("#showCambioPasswordUser").css('display', 'none');
}
function changePassword(){
    $("#formChangePassUser").validate({
        rules: {
            password: { required: true},
            cpassword: { required: true},
        },
        messages: {
            password: "Nuevo password Necesario",
            cpassword: "Confirmar passowrd Necesario"
        },
        submitHandler: function(){
            var pass = $("#pass").val();
            var confirmar = $("#confirmPassword").val();
            var re = /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/;
            if (re.test(pass) ) {
                if (pass == confirmar) {
                    var l = $("#btn_cambiarPassword").ladda();
                    l.ladda('start');
                    $.ajax({
                        type: "POST",
                        url:baseURL + "Files_employee/changePasswordUser_file",
                        data: {password: pass},
                        success: function(respuesta) {
                            var obj = JSON.parse(respuesta);
                            if (obj.resultado === true) {
                                l.ladda('stop');
                                $("#formChangePassUser")[0].reset();
                                //Mensaje de operación realizada con éxito
                                setTimeout(function() {
                                    toastr.options = {
                                        closeButton: true,
                                        progressBar: true,
                                        showMethod: 'slideDown',
                                        timeOut: 4000
                                    };
                                    l.ladda('stop');
                                    toastr.success('Su Contraseña fue Cambiada Corectamente', 'DATOS GUARDADOS');
                                    $("#showCambioPassword").css('display', 'none');
                                }, 1300);
                            }
                        }
                    });
                }else{
                    swal("Upps..!", "LAS CONTRASEÑAS NO COICIDEN! :( ", "error");
                }
            }else{
                swal("Upps..!", "La Contrasela debe tener como minimo 8 caracteres y maximo de 16, una letra Mayúscula, una minúscula y números :( ", "error");
                return false;
            }
        }
    });
}