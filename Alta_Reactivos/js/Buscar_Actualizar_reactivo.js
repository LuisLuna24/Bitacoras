$(document).ready(function () {
    $.ajax({
        type: "POST",
        url: "./php/Buscar_Actualizar_reactivo.php",
        dataType: "JSON",
        success: function (response) {
            $("#Reacivo_Nombre").val(response.nombre);
            $("#Reactivo_Lote").val(response.lote);
            $("#Reactivo_Descripcion").val(response.descripcion);
            $("#Reactivo_Cantidad").val(response.cantidad);
            $("#Reactivo_Caducidad").val(response.fecha_caducidad);
        }
    });
});