$(document).ready(function () {
    $("#Nombre_Especie").keypress(function(e) {
        // Limitar la longitud a 10 caracteres de abrebiatura de analisis
        if ($("#Nombre_Especie").val().length >= 30) {
          e.preventDefault();
        }
    });

    $("#Nombre_Especie_input").keypress(function(e) {
      // Limitar la longitud a 10 caracteres de abrebiatura de analisis
      if ($("#Nombre_Especie_input").val().length >= 30) {
        e.preventDefault();
      }
    });

    //Hace ques solo escriba en mayusculas
    $("#Nombre_Especie").keyup(function(e) {
      //Permite hacer que solo escriba en mayusculas
      $(this).val($(this).val().toUpperCase());
    });
    $("#Nombre_Especie_input").keyup(function(e) {
      //Permite hacer que solo escriba en mayusculas
      $(this).val($(this).val().toUpperCase());
    });
});