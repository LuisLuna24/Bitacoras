//Permite ver las especies que se agregan de un registro
$(document).ready(function () {
    $.ajax({
        type: "POST",
        url: "php/Buscar_Equipos_Version.php",
        dataType: "html",
        success: function (response) {
            $("#Equipo_Tabla").html(response);
        }
    });
});