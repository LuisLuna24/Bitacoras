//Permite ver los equipos que se agregan de un registro
$(document).ready(function () {
    $.ajax({
        type: "POST",
        url: "php/Buscar_Tabla_Especie_Editar.php",
        dataType: "html",
        success: function (response) {
            $("#Tabala_Especie").html(response);
        }
    });


    $("#Agregar_Especie").on("click",function(){
            var datos=new FormData($("#Pcr_Form")[0]);
            $.ajax({
                type: "POST",
                url: "./php/Editar_Especies.php",
                data: datos,
                contentType: false,
                processData:false,
                success: function (response) {
                    //Mensaje de agregar especie y actualizar tabla 
                    if(response==1){
                        alert("Especie agregada correctamente.");
                        //Actualiza la tabla de especies 
                        $.ajax({
                            type: "POST",
                            url: "php/Buscar_Tabla_Especie_Editar.php",
                            dataType: "html",
                            success: function (response) {
                                $("#Tabala_Especie").html(response);
                            }
                        });
                    }else if(response==2){
                        alert("Especie actualizada.");
                        $.ajax({
                            type: "POST",
                            url: "php/Buscar_Tabla_Especie_Editar.php",
                            dataType: "html",
                            success: function (response) {
                                $("#Tabala_Especie").html(response);
                            }
                        });
                    }else{
                        alert(response);
                    }
                    
                }
            })
        
    })
});

