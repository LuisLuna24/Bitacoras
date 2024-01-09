$(document).ready(function () {
    $.ajax({
        type: "POST",
        url: "./php/Buscra_Analisis.php",
        dataType: "html",
        success: function (response) {
            $("#Analisis_Pcr").html(response);
        }
    });

    $.ajax({
        type: "POST",
        url: "./php/Buscar_Especie.php",
        data: "data",
        dataType: "dataType",
        success: function (response) {
            
        }
    });
});