$(document).ready(function () {
    $.ajax({
        type: "POST",
        url: "./php/Equipo_Vercion_Anterior.php",
        dataType: "html",
        success: function (response) {
            $("#Equipo_Tabla").html(response);
        }
    });
});
