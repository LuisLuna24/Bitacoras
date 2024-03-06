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
});