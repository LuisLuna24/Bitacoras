//Permite ver las especies que se agregan de un registro
$(document).ready(function () {
    $.ajax({
        type: "POST",
        url: "php/Buscar_Tabala_Equipos.php",
        dataType: "html",
        success: function (response) {
            $("#Tabala_Equipos").html(response);
        }
    });
});