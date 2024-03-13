//Este permite crear un nuevo folio de Bitacora Reactivos

$(document).ready(function () {
    $("#Reactivo").on("click", function(){
        $("#Alert_Reactivos").css("display","grid");
    });

    $("#Agregar_Regitstro_Reactivos").on("click", function(){
        location.href ="./Reactivos/Reactivos.php";
    });

    $("#Cancelar_Regitstro_Reactivos").on("click", function(){
        $("#Alert_Reactivos").css("display","none");
    });

    //Redirecciona al apartado para ver todos los folios de bitacora de reactivos
    $("#Ver_Reactivos").on("click",function(){
        location.href ="./Reactivos/Ver_Reactivos.php";
    });
});