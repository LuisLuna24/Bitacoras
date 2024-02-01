//Permite visualizar las areas existentes en el select de Area con ajax
$(document).ready(function () {
    //Permite crear un select con buscador
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