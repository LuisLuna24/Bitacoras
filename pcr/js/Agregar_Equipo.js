//Permite agregar equipo en un nuevoregistro

$(document).ready(function () {
    $("#Agregar_Equipo").on("click", function(){
        var datos = new FormData($('#Pcr_Form')[0]);
        $.ajax({
            type: "POST",
            url: "./php/Agregar_Equipo.php",
            data: datos,
            contentType: false,
            processData:false,
            success: function (response) {
                if(response==1){
                    alert("Equipo Agregado");
                    $.ajax({
                        type: "POST",
                        url: "./php/Buscar_TablaEquipo.php",
                        dataType: "html",
                        success: function (response) {
                            $("#Equipo_Tabla").html(response);
                        }
                    });
                }else if(response==2){
                    alert("Ya existe el equipo");
                }else{
                    alert(response);
                }
            }
        });
    });
    
    
});