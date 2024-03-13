//Permite agregar nueva especie a registro de pcr

$(document).ready(function () {
    $("#Agregar_Especie").on("click", function(){
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
                url: "php/Agregar_Especie.php",
                data: datos,
                contentType: false,
                processData:false,
                success: function (response) {
                    if(response==1){
                        alert("Se ha agregado correctamente.");
                        $.ajax({
                            type: "POST",
                            url: "php/Buscar_Tabla_Especies.php",
                            dataType: "html",
                            success: function (response) {
                                $("#Tabala_Especie").html(response);
                            }
                        });
                    }else{
                        alert(response);
                    }
                }
            });
        }
    })
});