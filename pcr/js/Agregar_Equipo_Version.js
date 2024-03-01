//Permite agregar nuevo equipo a los registros 
$(document).ready(function () {
    $("#Agregar_Equipo").on("click",function(){
        var datos = new FormData($('#Pcr_Form')[0]);
        $.ajax({
            type: "POST",
            url: "./php/Agregar_Equipo_Version.php",
            data: datos,
            contentType: false,
            processData:false,
            success: function (response) {
                if(response==1){
                    alert('Equipo agregado');
                    $.ajax({
                        type: "POST",
                        url: "php/Buscar_Tabala_Equipos_Version.php",
                        dataType: "html",
                        success: function (response) {
                            $("#Tabala_Equipos").html(response);
                        }
                    });
                }else if(response==3){
                    alert('Equipo ya agregado');
                }
            }
        })
    });
});