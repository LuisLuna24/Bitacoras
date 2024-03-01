//Este permite crear un nuevo folio de extracción
$(document).ready(function () {
    $("#Extraccion").on("click",function(){
        $("#Alert_Extraccion").css("display","grid");
    })



    $("#Agregar_Regitstro_Extraccion").on("click", function(){
        $.ajax({
            type: "POST",
            url: "./php/Extraccion.php",
            dataType: "html",
            success: function (response) {
                if (response==1){
                    location.href ="./Extraccion/Extraccion.php";
                }else if(response==2){
                    location.href ="./Extraccion/Extraccion.php";
                }else{
                    alert(response);
                }
            }
        });
    });


    $("#Cancelar_Regitstro_Extraccion").on("click",function(){
        $("#Alert_Extraccion").css("display","none");
    })
    //Redirecciona al apartado para ver todos los folios de extracción
    $("#Ver_Extraccion").on("click",function(){
        location.href ="./Extraccion/Ver_Extraccion.php";
    });
});