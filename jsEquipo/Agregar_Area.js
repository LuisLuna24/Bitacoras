$(document).ready(function () {
    $("#Agregar_Area").on('click', function (e) {
        $("#Agregar_Area_Form").css("display", "grid");
    });
    $("#Btn_CancelarArea").on('click', function (e) {
        event.preventDefault(e);
        $("#Agregar_Area_Form").css("display", "none");
    });
    $("#Btn_AgregarArea").on('click', function (e) {
        event.preventDefault(e);
        var parametrs = new FormData($("#Area_Form")[0]);
        $.ajax({
            type: "POST",
            url: "phpEquipo/Agregar_Area.php",
            data: parametrs,
            contentType: false,
            processData:false,
            success: function (response) {
                if(response==1){
                    $.ajax({
                        type: "POST",
                        url: "phpEquipo/Buscar_Area.php",
                        dataType: "html",
                        success: function (response) {
                            $("#Equipo_Select").html(response);
                        }
                    });
                    $("#Agregar_Area_Form").css("display", "none");
                } 
            }
        });
    });
}); 