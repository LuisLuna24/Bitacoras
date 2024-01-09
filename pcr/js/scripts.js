$(document).ready(function () {
    $(".logo_gis").attr("src", "../img/Gsmall.webp");
    $(".bx").attr("src", "../img/menuahambuegesa.webp");
    $("#Bitacoras_Global").attr("href", "../Bitacoras.php");
    $("#Inventario_Global").attr("href", "../Inventarios.php");
    $("#Catalogos_Global").attr("href", "../Catalogos.php");
    $("#Salir_Global").attr("href", "../php/Cerrar.php");
    $("#Inicio_Global").attr("href", "../Principal.php");

    $("#Equipo_Select").select2();
    $("#Analisis_Pcr").select2();
    $("#Especie_pcr").select2();


    $("#Ver_Bitacoras").on("click", function(){
        location.href = "Ver_Pcr.php";
    })

});