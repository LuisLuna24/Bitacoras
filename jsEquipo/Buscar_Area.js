$(document).ready(function () {
    $("#Equipo_Select").select2();
    $.ajax({
        type: "POST",
        url: "phpEquipo/Buscar_Area.php",
        dataType: "html",
        success: function (response) {
            $("#Equipo_Select").html(response);
        }
    });
});