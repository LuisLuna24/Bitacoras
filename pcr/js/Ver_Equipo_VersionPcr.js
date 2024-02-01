$(document).ready(function () {
    $.ajax({
        type: "POST",
        url: "./php/Ver_Equipo_vercionPcr.php",
        dataType: "html",
        success: function (response) {
            $("#Equipo_Tabla").html(response);
        }
    });
});
