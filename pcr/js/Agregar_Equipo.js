//Permite agregar nuevo equipo a los registros 
$(document).ready(function () {
    $("#Agregar_Equipo").on("click",function(){
        var datos = new FormData($('#Pcr_Form')[0]);
        $.ajax({
            type: "POST",
            url: "./php/Agregar_Equipo.php",
            data: datos,
            contentType: false,
            processData:false,
            success: function (response) {
                if(response!=null){
                    alert(response);
                    $.ajax({
                        type: "POST",
                        url: "php/Buscar_Tabala_Equipos.php",
                        dataType: "html",
                        success: function (response) {
                            $("#Tabala_Equipos").html(response);
                        }
                    });
                }else if(response==3){
                    alert(response);
                }
            }
        })
    });
});