//Este permite crear un nuevo folio de Pcr

$(document).ready(function () {

    $("#Bitacora_Pcr").on('click', function (e) {
        $("#Alert_PCR").css("display","grid");
    })

    $("#Agregar_Regitstro_Pcr").on("click",function(){
        $.ajax({
            type: "POST",
            url: "./php/Pcr.php",
            dataType: "html",
            success: function (response) {
                if (response==1){
                    location.href ="./pcr/Bitacora_Pcr.php";
                }else{
                    alert(response);
                }
            }
        });
    })

    //Cierra Alerta de nuevo Registro
    $("#Cancelar_Regitstro_Pcr").on("click",function(){
        $("#Alert_PCR").css("display","none");
    });

    //Redirecciona al apartado para ver todos los folios de Pcr
    $("#Ver_Pcr").on("click",function(){
        location.href ="./pcr/Ver_Pcr.php";
    });
});