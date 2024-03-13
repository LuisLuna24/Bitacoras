//Permitira buscar todos los datos de equipos, analisis, especies
$(document).ready(function () {
    $.ajax({
        type: "POST",
        url: "php/Buscar_Analisisi.php",
        dataType: "html",
        success: function (response) {
            $("#Pcr_Analisis").html(response);
        }
    });

    $.ajax({
        type: "POST",
        url: "php/Buscar_Especies.php",
        dataType: "html",
        success: function (response) {
            $("#Pcr_Espceie").html(response);
        }
    });

    $.ajax({
        type: "POST",
        url: "php/Buscar_Equipos.php",
        dataType: "html",
        success: function (response) {
            $("#Pcr_Equipo").html(response);
        }
    });


    
});