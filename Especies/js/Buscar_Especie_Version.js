$(document).ready(function () {
    $.ajax({
        type: "POST",
        url: "./php/Buscar_Especie_Version.php",
        dataType: "JSON",
        success: function (response) {
            $("#Nombre_Especie").text("Nombre Anterior: "+response.nombre);

        }
    });
});