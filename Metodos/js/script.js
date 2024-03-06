$(document).ready(function () {
    $("#Nombre_Metodo").keypress(function(e) {
        // Limitar la longitud a 10 caracteres de abrebiatura de analisis
        if ($("#Nombre_Metodo").val().length >= 30) {
          e.preventDefault();
        }
    });

    //Hace ques solo escriba en mayusculas
    $("#Nombre_Metodo").keyup(function(e) {
      //Permite hacer que solo escriba en mayusculas
      $(this).val($(this).val().toUpperCase());
    });
});