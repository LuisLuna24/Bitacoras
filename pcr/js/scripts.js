$(document).ready(function () {
    $(".logo_gis").attr("src", "../img/Gsmall.webp");
    $(".bx").attr("src", "../img/menuahambuegesa.webp");
    $("#Bitacoras_Global").attr("href", "../Bitacoras.php");
    $("#Inicio_Global").attr("href", "../Principal.php");
    $("#Equipo_Global").attr("href", "../Equipo/Equipo.php");
    $("#Análisis_Global").attr("href", "../Analisis/Analisis.php");
    $("#Reactivos_Global").attr("href", "../Alta_Reactivos/Alta_Reactivos.php");
    $("#Salir_Global").attr("href", "../php/Cerrar.php");
    $("#Salir_Global").attr("href", "../php/Cerrar.php");

    $("#Equipo_Select").select2();
    $("#Analisis_Pcr").select2();
    $("#Especie_pcr").select2();


    $("#Ver_Bitacoras").on("click", function(){
        location.href = "Ver_Pcr.php";
    })

});