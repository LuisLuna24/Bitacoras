$(document).ready(function () {
    $.ajax({
        type: "POST",
        url: "./php/Buscar_Equipo.php",
        dataType: "html",
        success: function (response) {
            $("#Equipo_Select").html(response);
        }
    });
});
