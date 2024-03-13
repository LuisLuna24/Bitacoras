//Permite agregar equipo a registro de pcr

$(document).ready(function () {
    $("#Agregar_Equipo").on("click", function(){
        if($('#Pcr_Registros').val()=="") {
            alert("Falta No. de Registro");
            return false;
        }else if($('#Pcr_Cantidad').val()==""){
            alert("Falta Cantidad");
            return false;
        }else{
            var datos = new FormData($("#Pcr_Form")[0]);
            $.ajax({
                type: "POST",
                url: "php/Agregar_Equipo_Editar.php",
                data: datos,
                contentType: false,
                processData:false,
                success: function (response) {
                    if(response==1){
                        alert("Se ha agregado correctamente.");
                        $.ajax({
                            type: "POST",
                            url: "php/Buscar_Tabla_Equipo_Editar.php",
                            dataType: "html",
                            success: function (response) {
                                $("#Tabala_Equipos").html(response);
                            }
                        });
                    }else if(response==2){
                        alert("Este equipo ya fue agregada.");
                        
                    }else{
                        alert(response);
                    }
                }
            });
        }
    })
    $.ajax({
        type: "POST",
        url: "php/Buscar_Tabla_Equipo_Editar.php",
        dataType: "html",
        success: function (response) {
            $("#Tabala_Equipos").html(response);
        }
    });
});