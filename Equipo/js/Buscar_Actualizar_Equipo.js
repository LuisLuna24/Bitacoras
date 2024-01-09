$(document).ready(function () {
    $.ajax({
        type: "POST",
        url: "./php/Buscar_Actualizar_Equipo.php",
        dataType: "JSON",
        success: function (response) {
            $("#Inventario_Equipo").val(response.id_equipo);
            $("#Descripcion_Equipo").val(response.descripcion);
            $("#Nombre_Equipo").val(response.nombre);
            $("#Area_Equipo").val(response.id_area);
        }
    });
});