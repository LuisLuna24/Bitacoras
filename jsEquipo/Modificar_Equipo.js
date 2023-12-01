$(document).ready(function () {
    $("#Eliminar_Equipo").on("click", function(e){
        event.preventDefault(e);
        var Quip = "NombreEqui="=$("#id_equipo").val();
        $.ajax({
            type: "POST",
            url: "phpEquipo/Eliminar_Equipo.php",
            data: Quip,
            success: function (response) {
                alert (response);
            }
        });
    });
});