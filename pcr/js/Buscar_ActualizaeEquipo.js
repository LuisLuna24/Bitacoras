$(document).ready(function () {
    $.ajax({
        type: "POST",
        url: "./php/Buscar_ActualizarEquipo.php",
        dataType: "html",
        success: function (response) {
            $("#Equipo_Tabla").html(response);
        }
    });
});