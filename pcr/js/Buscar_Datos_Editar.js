$(document).ready(function () {
    $.ajax({
        type: "POST",
        url: "php/Buscar_Datos_Editar_Pcr.php",
        dataType: "JSON",
        success: function (response) {
            $("#Pcr_Registros").val(response.no_registro);
            $("#Pcr_Analisis").val(response.id_analisis);
            $("#Pcr_Fecha").val(response.fecha);
            $("#Pcr_Agrosa").val(response.agarosa);
            $("#Pcr_Voltage").val(response.voltage);
            $("#Pcr_Tiempo").val(response.tiempo);
            if($("#Sanitizo").val(response.sanitizo)!=0){
                $("#Sanitizo").prop("checked", true);
            }else{
                $("#Sanitizo").prop("checked", false);
            }
            if($("#Tiempouv").val(response.id_area)!=0){
                $("#Tiempouv").prop("checked", true);
            }else{
                $("#Tiempouv").prop("checked", false);
            }
        }
    });
});