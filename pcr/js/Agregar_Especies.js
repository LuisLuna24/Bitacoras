//Permite agregar especies a un registro 

$(document).ready(function () {
    
    $("#Agregar_Especie").on("click",function(){
        if($("#Pcr_Registros").val().length===0){
            alert("Ingrese No. Registro antes de inserat especie");
        }else{
            var datos=new FormData($("#Pcr_Form")[0]);
            $.ajax({
                type: "POST",
                url: "./php/Agregar_Especies.php",
                data: datos,
                contentType: false,
                processData:false,
                success: function (response) {
                    //Mensaje de agregar especie y actualizar tabla 
                    if(response!=null){
                        alert("Especie agregada correctamente.");
                        //Actualiza la tabla de especies 
                        var datos=new FormData($("#Pcr_Form")[0]);
                        $.ajax({
                            type: "POST",
                            url: "php/Buscar_Tabla_Especeies.php",
                            data: datos,
                            contentType: false,
                            processData:false,
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
        }
        
    })
});