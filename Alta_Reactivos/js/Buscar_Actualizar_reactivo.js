//Muestra los datos del reactivo en la sección para editar el reactivo
$(document).ready(function () {
    $.ajax({
        type: "POST",
        url: "./php/Buscar_Actualizar_reactivo.php",
        dataType: "JSON",
        success: function (response) {
            //Inserta en los imput los valores del reactivo 
            $("#Reacivo_Nombre").val(response.nombre);
            $("#Reactivo_Lote").val(response.lote);
            $("#Reactivo_Descripcion").val(response.descripcion);
            $("#Reactivo_Cantidad").val(response.cantidad);
            $("#Reactivo_Caducidad").val(response.fecha_caducidad);
        }
    });
});