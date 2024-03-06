//Permite ver los equipos que se agregan de un registro
$(document).ready(function () {
    $.ajax({
        type: "POST",
        url: "php/Buscar_Tabla_Especeies.php",
        dataType: "html",
        success: function (response) {
            $("#Tabala_Especie").html(response);
        }
    });
});