$(document).ready(function () {
    $("#Editar_Nombre").keypress(function(e) {
      //Permite hacer que solo escriba en mayusculas
        $(this).val($(this).val().toUpperCase());
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

    //Hace ques solo escriba en mayusculas
    $("#Editar_Nombre").keyup(function(e) {
      //Permite hacer que solo escriba en mayusculas
      $(this).val($(this).val().toUpperCase());
    });
    $("#Editar_Abrebiatura").keyup(function(e) {
      //Permite hacer que solo escriba en mayusculas
      $(this).val($(this).val().toUpperCase());
    });

    //Regresara a menu catalogos
    $("#btn_Regresar").click(function(e) {
      window.location.href = "../Catalogos.php";
    });
});