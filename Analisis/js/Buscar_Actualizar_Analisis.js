$(document).ready(function () {
    $.ajax({
        type: "POST",
        url: "./php/Buscar_Actualizar_Analisis.php",
        dataType: "JSON",
        success: function (response) {
            $("#Editar_Nombre").val(response.nombre);
            $("#Editar_Abrebiatura").val(response.abreviatura);
        }
    });
});