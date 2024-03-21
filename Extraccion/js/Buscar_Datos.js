
//Libreria para que los select tengan buscador 
$(document).ready(function () {
    $("#Analisis_Select").select2();
    $("#Area_Select").select2();
    $("#metodo_select").select2();
    $("#Equipo_Select").select2();
//Buscar Analisis para select------------------------------------------------------------------
    $.ajax({
        type: "POST",
        url: "./php/Buscar_Analisis.php",
        dataType: "html",
        success: function (response) {
            $("#Analisis_Select").html(response);
        }
    });
//Buscar Area para select----------------------------------------------------------------------
    $.ajax({
        type: "POST",
        url: "./php/Buscar_Area.php",
        dataType: "html",
        success: function (response) {
            $("#Area_Select").html(response);
        }
    });
//Buscar Metodo para select----------------------------------------------------------------------
    $.ajax({
        type: "POST",
        url: "./php/Buscar_Metodo.php",
        dataType: "html",
        success: function (response) {
            $("#metodo_select").html(response);
        }
    });
//Buscar Equipo para select----------------------------------------------------------------------
    $("#Area_Select").on('change', function(){
        var area = new FormData($("#Form_Extraccion")[0])
        $.ajax({
            type: "POST",
            url: "./php/Buscar_Equipo.php",
            data: area,
            contentType: false,
            processData:false,
            success: function (response) {
                $("#Equipo_Select").html(response);
            }
        });
    })
//Buscar Equipo para tabla de equipo----------------------------------------------------------------

    $.ajax({
        type: "POST",
        url: "./php/Buscar_TablaEquipo.php",
        dataType: "html",
        success: function (response) {
            $("#Equipo_Tabla").html(response);
        }
    });

//REgresar a bitacoras 
    $("#Salir_Extraccion").on('click', function(){
        window.location.href = "./Ver_Extraccion.php";
    })
    
});