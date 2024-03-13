//Este permite crear un nuevo folio de extracción
$(document).ready(function () {
    $("#Extraccion").on("click",function(){
        $("#Alert_Extraccion").css("display","grid");
    })

    $("#Agregar_Regitstro_Extraccion").on("click", function(){
        location.href ="./Extraccion/Extraccion.php";
    });


    $("#Cancelar_Regitstro_Extraccion").on("click",function(){
        $("#Alert_Extraccion").css("display","none");
    })
    //Redirecciona al apartado para ver todos los folios de extracción
    $("#Ver_Extraccion").on("click",function(){
        location.href ="./Extraccion/Ver_Extraccion.php";
    });
});