//Permite agregar nueva especie a registro de pcr

$(document).ready(function () {
    $("#Agregar_Especie").on("click", function(){
        if($('#Pcr_Registros').val()=="") {
            alert("Falta No. de Registro");
            return false;
        }else{
            var datos = new FormData($("#Pcr_Form")[0]);
            $.ajax({
                type: "POST",
                url: "php/Agregar_Especie_Editar.php",
                data: datos,
                contentType: false,
                processData:false,
                success: function (response) {
                    if(response==1){
                        alert("Se ha agregado correctamente.");
                        $.ajax({
                            type: "POST",
                            url: "php/Buscar_Tabla_Especies_Editar.php",
                            dataType: "html",
                            success: function (response) {
                                $("#Tabala_Especie").html(response);
                            }
                        });
                    }else if(response==2){
                        alert("Esta especie  ya fue agregada.");
                        
                    }else{
                        alert(response);
                    }
                }
            });
        }
    })
    $.ajax({
        type: "POST",
        url: "php/Buscar_Tabla_Especies_Editar.php",
        dataType: "html",
        success: function (response) {
            $("#Tabala_Especie").html(response);
        }
    });
});