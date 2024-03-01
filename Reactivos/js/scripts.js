
//Modifica las rutas del navbar y logo

$(document).ready(function () {
    $("#Bitaforas_Select").select2();
    $("#Tipo_Select").select2();
    $("#Reactivos_Select").select2();

    $("#Ver_Vitacora_Reactivos").on("click", function(e){
        e.preventDefault();
        window.location.href="./Ver_Reactivos.php";
    });
});