$(document).ready(function () {
    $.ajax({
        type: "POST",
        url: "./php/Actualizar_reactivo.php",
        dataType: "JSON",
        success: function (response) {
            $("#nombre").val(response.nombre);
            $("#descripcion").val(response.descripcion);
            $("#no_lote").val(response.no_lote);
            $("#abreviatura").val(response.abreviatura);
        }
    });
});