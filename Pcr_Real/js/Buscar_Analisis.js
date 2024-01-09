$(document).ready(function () {
    $("#Analisis_pcreal").select2();
    $.ajax({
        type: "POST",
        url: "./php/Buscar_Analisis.php",
        dataType: "html",
        success: function (response) {
            $("#Analisis_pcreal").html(response);
        }
    });
});