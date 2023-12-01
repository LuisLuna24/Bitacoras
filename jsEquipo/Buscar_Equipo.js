$(document).ready(function () {
    $.ajax({
        type: "POST",
        url: "phpEquipo/Buscar_Equipo.php",
        dataType: "html",
        success: function (response) {
            $("#Equipo_Tabla").html(response); 
        }
    });
});