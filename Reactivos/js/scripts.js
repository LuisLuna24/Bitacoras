$(document).ready(function () {
    $(".logo_gis").attr("src", "../img/Gsmall.webp");
    $(".bx").attr("src", "../img/menuahambuegesa.webp");
    $("#Bitacoras_Global").attr("href", "../Bitacoras.php");
    $("#Equipo_Global").attr("href", "../Equipo/Equipo.php");
    $("#Análisis_Global").attr("href", "../Analisis/Analisis.php");
    $("#Reactivos_Global").attr("href", "../Alta_Reactivos/Alta_Reactivos.php");
    $("#Salir_Global").attr("href", "../php/Cerrar.php");
    $("#Inicio_Global").attr("href", "../Principal.php");


    $("#Bitaforas_Select").select2();
    $("#Tipo_Select").select2();
    $("#Reactivos_Select").select2();

    $("#Ver_Vitacora_Reactivos").on("click", function(e){
        e.preventDefault();
        window.location.href="./Ver_Reactivos.php";
    });
});