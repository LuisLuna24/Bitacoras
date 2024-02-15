//Permite buscar especies con AJAX
$(document).ready(function () {
    $.ajax({
        type: "POST",
        url: "./php/Buscar_Especies.php",
        dataType: "html",
        success: function (response) {
            $("#Pcr_Especie").html(response);
        }
    });
});