//Permitra mostrar los datos de un registro que se desea actualizar

$(document).ready(function () {
    $.ajax({
        type: "POST",
        url: "php/Buscar_Registro.php",
        dataType: "JSON",
        success: function (response) {
            $("#Nombre_pcreal").val(response.id_pcreal);
            $("#Analisis_pcreal").val(response.id_analisi);
            $("#Fecha_pcreal").val(response.fecha);
            var Sanitizo = response.sanitizo;
            var Tiempouv = response.tiempouv;
            if(Sanitizo===1){
                $("#pcreal_sanitizo").prop("checked", true);
            }else{
                $("#pcreal_sanitizo").prop("checked", false);
            }
            if(Tiempouv===1){
                $("#pcreal_uv").prop("checked", true);
            }else{
                $("#pcreal_uv").prop("checked", false);
            }
            $("#Resultado_pcreal").val(response.resultado);
            $("#pcreal_observaciones").val(response.observaciones);
        }
    });
});