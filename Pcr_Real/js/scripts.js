$(document).ready(function () {
    $(".logo_gis").attr("src", "../img/Gsmall.webp");
    $(".bx").attr("src", "../img/menuahambuegesa.webp");
    $("#Bitacoras_Global").attr("href", "../Bitacoras.php");
    $("#Inicio_Global").attr("href", "../Principal.php");
    $("#Equipo_Global").attr("href", "../Equipo/Equipo.php");
    $("#Análisis_Global").attr("href", "../Proxiamanete.php");
    $("#Reactivos_Global").attr("href", "../Alta_Reactivos/Alta_Reactivos.php");
    $("#Salir_Global").attr("href", "../php/Cerrar.php");
    $("#Salir_Global").attr("href", "../php/Cerrar.php");


    $("#Patogeno").select2();
    $("#Resultado_pcreal").select2();

    $("#Ver_Bitacoras").on('click', function(e) {
        $(location).attr('href', 'ver_pcreal.php');
    })

    
});