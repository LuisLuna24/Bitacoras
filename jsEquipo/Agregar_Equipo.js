$(document).ready(function () {
    $("#Agregar_Equipo").on('click', function(){
        var Equipo = new FormData($("#Equipo_Form")[0]);
        $.ajax({
            type: "POST",
            url: "phpEquipo/Agregar_Equipo.php",
            data: Equipo,
            contentType: false,
            processData:false,
            success: function (response) {
                if(response==1){
                    $.ajax({
                        type: "POST",
                        url: "phpEquipo/Buscar_Equipo.php",
                        dataType: "html",
                        success: function (response) {
                            $("#Equipo_Tabla").html(response); 
                        }
                    });
                }else{
                    $("#Alerta_Secion").css("display","flex");
                    $("#Label_Alerta_Secion").text(response);
                }
            }
        });
    });
    $("#Alerta_btn_Secion").on("click", function(){
        $("#Alerta_Secion").css("display","none");
    });
});