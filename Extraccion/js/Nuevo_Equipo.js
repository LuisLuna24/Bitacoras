$(document).ready(function () {
    $("#Agregar_Equipo").on("click", function(){
        var datos = new FormData($('#Form_Extraccion')[0]);
        $.ajax({
            type: "POST",
            url: "./php/Nuevo_Equipo.php",
            data: datos,
            contentType: false,
            processData:false,
            success: function (response) {
                alert('Equipo agregado');
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
});