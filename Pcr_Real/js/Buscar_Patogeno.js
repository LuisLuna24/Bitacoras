$(document).ready(function () {

    $.ajax({
        type: "POST",
        url: "./php/Buscar_Patogeno.php",
        dataType: "html",
        success: function (response) {
        }
    });
});