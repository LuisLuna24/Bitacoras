//Busca los datos del análisis y los muestra en los inputs en el apartado de actualizar análisis
$(document).ready(function () {
    $.ajax({
        type: "POST",
        url: "./php/Buscar_Actualizar_Analisis.php",
        dataType: "JSON",
        success: function (response) {
            //Muestra los datos del análisis a través de la consulta que manda los datos en JSON
            $("#Editar_Nombre").val(response.nombre);
            $("#Editar_Abrebiatura").val(response.abreviatura);
        }
    });
});