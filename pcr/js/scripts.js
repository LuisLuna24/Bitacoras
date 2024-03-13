$(document).ready(function () {


    $("#Pcr_Analisis").select2();
    $("#Pcr_Resultado").select2();
    $("#Pcr_Equipo").select2();
    $("#Pcr_Espceie").select2();


    $("#Pcr_Cantidad").val('1');

    //Direccioan a ver vitacoras
    $("#Ver_Bitacoras").on('click', function (e) {
        $(location).attr('href', 'Ver_Pcr.php');
    });

    $("#Pcr_Registros").keypress(function(e) {
        // Permitir solo números y el backspace
        if (e.which != 8 && (e.which < 48 || e.which > 57)) {
          e.preventDefault();
        }
      
        // Limitar la longitud a 6 caracteres
        if ($("#Pcr_Registros").val().length >= 5) {
          e.preventDefault();
        }
    });


});