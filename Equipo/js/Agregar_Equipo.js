$(document).ready(function () {


    $("#Agregar_Equipo").on("click", function (e) {
        var datos = new FormData($("#Equipo_Form")[0]);
        $.ajax({
            type: "POST",
            url: "./php/Agregar_Equipo.php",
            data: datos,
            contentType: false,
            processData:false,
            success: function (response) {
                if(response==1){
                    $.ajax({
                        type: "POST",
                        url: "./php/Buscar_Tabala.php",
                        dataType: "html",
                        success: function (response) {
                            $("#content").html(response);
                        }
                    });
                }else{
                    alert(response);
                }
            }
        });
    });
});