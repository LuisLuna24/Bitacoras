$(document).ready(function () {
    $("#Nombre_Especie").keypress(function(e) {
        // Limitar la longitud a 10 caracteres de abrebiatura de analisis
        if ($("#Nombre_Especie").val().length >= 30) {
          e.preventDefault();
        }
    });
});