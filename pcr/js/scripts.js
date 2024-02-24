$(document).ready(function () {
    $(".logo_gis").attr("src", "../img/Gsmall.webp");
    $(".bx").attr("src", "../img/menuahambuegesa.webp");
    $("#Bitacoras_Global").attr("href", "../Bitacoras.php");
    $("#Inventario_Global").attr("href", "../Inventarios.php");
    $("#Catalogos_Global").attr("href", "../Catalogos.php");
    $("#Salir_Global").attr("href", "../php/Cerrar.php");
    $("#Inicio_Global").attr("href", "../Principal.php");

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