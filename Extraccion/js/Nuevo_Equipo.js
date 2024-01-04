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

    $("#Agregar_Todo").on("click", function(){
        var Todo = new FormData($('#Form_Extraccion')[0]);
        $.ajax({
            type: "POST",
            url: "./php/Agregar_Todo_Equipo.php",
            data: Todo,
            contentType: false,
            processData:false,
            success: function (response) {
                if(response==1){
                    alert('Todos los equipos agregados.');
                    $.ajax({
                        type: "POST",
                        url: "./php/Buscar_TablaEquipo.php",
                        dataType: "html",
                        success: function (response) {
                            $("#Equipo_Tabla").html(response);
                        }
                    });
                }else if(response==2){
                    alert("Todos los equipos ya estan agregados.")
                }else{
                    alert(response);
                }
            }
        });
    });
});