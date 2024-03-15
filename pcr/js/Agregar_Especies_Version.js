//Permite agregar especies a un registro 

$(document).ready(function () {
    $("#Agregar_Especie").on("click",function(){
        var datos=new FormData($("#Pcr_Form")[0]);
        $.ajax({
            type: "POST",
            url: "./php/Agregar_Especies_Version.php",
            data: datos,
            contentType: false,
            processData:false,
            success: function (response) {
                //Mensaje de agregar especie y actualizar tabla 
                if(response!=null){
                    alert("Especie agregada correctamente.");
                    //Actualiza la tabla de especies 
                    $.ajax({
                        type: "POST",
                        url: "php/Buscar_Tabla_Especeies_Version.php",
                        dataType: "html",
                        success: function (response) {
                            $("#Tabala_Especie").html(response);
                        }
                    });
                }else if(response==2){
                    alert("Especie ya agregada.");
                }else{
                    alert(response);
                }
                
            }
        })
    })
});