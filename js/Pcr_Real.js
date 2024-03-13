//Este permite crear un nuevo folio de Pcr Tiempo real

$(document).ready(function () {
    $("#Pcr_Real").on("click", function(){
        $("#Alert_PCREAL").css("display","grid");

    })

    $("#Agregar_Regitstro_Pcreal").on("click", function(){
        location.href ="./Pcr_Real/Pcr_Real.php";
    });



    $("#Cancelar_Regitstro_Pcreal").on("click",function(){
        $("#Alert_PCREAL").css("display","none");
    });
//Redirecciona al apartado para ver todos los folios de Pcr tiemporeal
    $("#ver_pcreal").on("click",function(){
        location.href ="./Pcr_Real/ver_pcreal.php";
    });
});