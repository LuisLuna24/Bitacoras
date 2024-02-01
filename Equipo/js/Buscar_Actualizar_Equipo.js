//Busca los datos del equipo y los muestra en los inputs en el apartado de editar equipo

$(document).ready(function () {
    $.ajax({
        type: "POST",
        url: "./php/Buscar_Actualizar_Equipo.php",
        dataType: "JSON",
        success: function (response) {
            //Muestra los datos del equipo a través de la consulta que manda los datos en JSON
            $("#Inventario_Equipo").val(response.id_equipo);
            $("#Descripcion_Equipo").val(response.descripcion);
            $("#Nombre_Equipo").val(response.nombre);
            $("#Area_Equipo").val(response.id_area);
        }
    });
});