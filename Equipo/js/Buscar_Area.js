$(document).ready(function () {
    $("#Area_Equipo").select2();

    $.ajax({
        type: "POST",
        url: "./php/Buscar_Area.php",
        dataType: "html",
        success: function (response) {
            $("#Area_Equipo").html(response)
        }
    });
});