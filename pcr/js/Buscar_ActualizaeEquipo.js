//Permite buscar las actualizaciones de la tabla de equipos en editar registro
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