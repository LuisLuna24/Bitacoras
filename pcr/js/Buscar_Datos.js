//Busca los datos de los select
$(document).ready(function () {
    //-----------------Analisis------------------------------------------------------
    $.ajax({
        type: "POST",
        url: "php/Buscar_Analisis.php",
        dataType: "html",
        success: function (response) {
            $("#Pcr_Analisis").html(response);
        }
    });
    //-----------------Equipo--------------------------------------------------------
    $.ajax({
        type: "POST",
        url: "php/Buscar_Equipo.php",
        dataType: "html",
        success: function (response) {
            $("#Pcr_Equipo").html(response);
        }
    });
});