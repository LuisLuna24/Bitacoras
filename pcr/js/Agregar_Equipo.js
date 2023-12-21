$(document).ready(function () {
    $("#Agregar_Equipo").on("click", function(){
        var datos = new FormData($('#Pcr_Form')[0]);
        $.ajax({
            type: "POST",
            url: "./php/Agregar_Equipo.php",
            data: datos,
            contentType: false,
            processData:false,
            success: function (response) {
                alert("Equipo Agregado");
                $.ajax({
                    type: "POST",
                    url: "./php/Buscar_TablaEquipo.php",
                    dataType: "html",
                    success: function (response) {
                        $("#Equipo_Tabla").html(response);
                    }
                });
            }
        });
    });
    $.ajax({
        type: "POST",
        url: "./php/Buscar_TablaEquipo.php",
        dataType: "html",
        success: function (response) {
            $("#Equipo_Tabla").html(response);
        }
    });
    
});