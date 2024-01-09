$(document).ready(function () {
    $("#Agregar_Equipo").on("click", function(){
        var datos = new FormData($('#Form_Extraccion')[0]);
        $.ajax({
            type: "POST",
            url: "./php/Nuevo_Equipo.php",
            data: datos,
            contentType: false,
            processData:false,
            success: function (response) {
                if(response==1){
                    alert('Equipo agregado');
                    $.ajax({
                        type: "POST",
                        url: "./php/Buscar_TablaEquipo.php",
                        dataType: "html",
                        success: function (response) {
                            $("#Equipo_Tabla").html(response);
                        }
                    });
                }else if(response==2){
                    alert("Este equipo ya está agregado.")
                }else{
                    alert(response);
                }
            }
        });
    });

});