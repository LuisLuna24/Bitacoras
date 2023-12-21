$(document).ready(function () {
    $("#Tipo_Select").on("change", function(){
        var datos = new FormData($("#Reactivos_Form_Data")[0]);
        $.ajax({
            type: "POST",
            url: "./php/Buscar_Bitacora.php",
            data: datos,
            contentType: false,
            processData:false,
            success: function (response) {
                $("#Bitaforas_Select").html(response);
            }
        });
    })

    $.ajax({
        type: "POST",
        url: "./php/Buscar_Reactivos.php",
        dataType: "html",
        success: function (response) {
            $("#Reactivos_Select").html(response);
        }
    });

    $.ajax({
        type: "POST",
        url: "./php/Buscar_Tipo.php",
        dataType: "html",
        success: function (response) {
            $("#Tipo_Select").html(response);
        }
    });

    
});