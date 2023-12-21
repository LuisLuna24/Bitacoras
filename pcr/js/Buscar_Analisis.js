$(document).ready(function () {
    $.ajax({
        type: "POST",
        url: "./php/Buscra_Analisis.php",
        dataType: "html",
        success: function (response) {
            $("#Analisis_Pcr").html(response);
        }
    });
});