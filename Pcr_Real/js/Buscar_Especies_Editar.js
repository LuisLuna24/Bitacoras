$(document).ready(function () {


    $("#Agregar_Especie").on("click", function(){
        if($("#Nombre_Pcreal").val()==''){
            alert("Falta No. Registro");
            return false;
        }else if($("#Pcreal_Catidad").val()==''){
            alert("Falta Cantidad");
            return false;
        }else{
            var datos = new FormData($("#Pcreal_Form")[0]);
            $.ajax({
                type: "POST",
                url: "php/Agregar_Especie_Editar.php",
                dataType: "html",
                data: datos,
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {
                    if(response==1){
                        alert(response);
                        $.ajax({
                            type: "POST",
                            url: "php/Buscar_Tabala_Especies_Editar.php",
                            dataType: "html",
                            success: function (response) {
                                $("#Especie_Tabla").html(response);
                            }
                        });
                        //Actualiza la tabla de catálogo de especies
                    }else if(response==2){
                        alert(response);
                    }else{
                        alert(response);
                    }
                }
            });
        }
    });

    $.ajax({
        type: "POST",
        url: "php/Buscar_Especies.php",
        dataType: "html",
        success: function (response) {
            $("#Especie_Select").html(response);
        }
    });

    $.ajax({
        type: "POST",
        url: "php/Buscar_Tabala_Especies_Editar.php",
        dataType: "html",
        success: function (response) {
            $("#Especie_Tabla").html(response);
        }
    });
});