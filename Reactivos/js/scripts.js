$(document).ready(function () {
    $(".logo_gis").attr("src", "../img/Gsmall.webp");
    $(".bx").attr("src", "../img/menuahambuegesa.webp");
    $("#Bitacoras_Global").attr("href", "../Bitacoras.php");
    $("#Inventario_Global").attr("href", "../Inventarios.php");
    $("#Catalogos_Global").attr("href", "../Catalogos.php");
    $("#Salir_Global").attr("href", "../php/Cerrar.php");


    $("#Bitaforas_Select").select2();
    $("#Tipo_Select").select2();
    $("#Reactivos_Select").select2();

    $("#Ver_Vitacora_Reactivos").on("click", function(e){
        e.preventDefault();
        window.location.href="./Ver_Reactivos.php";
    });
});