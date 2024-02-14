$(document).ready(function () {
    //Busca los equipos agregados de en un nuevo registro
    $.ajax({
        type: "POST",
        url: "./php/Buscar_Equipo.php",
        dataType: "html",
        success: function (response) {
            $("#Equipo_Select").html(response);
        }
    });

    //Busca los equipos agregados y los muestra e la tabla de equipo
    $.ajax({
        type: "POST",
        url: "./php/Buscar_TablaEquipo.php",
        dataType: "html",
        success: function (response) {
            $("#Equipo_Tabla").html(response);
        }
    });
});
