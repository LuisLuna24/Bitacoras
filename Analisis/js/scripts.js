$(document).ready(function () {
    $("#Editar_Nombre").keypress(function(e) {
        // Limitar la longitud a 30 caracteres de nombre de analisis
        if ($("#Editar_Nombre").val().length >= 30) {
          e.preventDefault();
        }
    });
    $("#Editar_Abrebiatura").keypress(function(e) {
        // Limitar la longitud a 10 caracteres de abrebiatura de analisis
        if ($("#Editar_Abrebiatura").val().length >= 10) {
          e.preventDefault();
        }
    });
});