$(document).ready(function () {
    $("#Reactivos_Select").on('change',function(){
        var datos = new FormData($("#Reactivos_Form_Data")[0]);
        $.ajax({
            type: "POST",
            url: "./php/Buscar_Datos_Reactivos.php",
            data: datos,
            contentType: false,
            processData:false,
            dataType: "JSON",
            success: function (response) {
                $("#Lote_Reactivo").val(response.lote);
                $("#Caducidad_Reactivo").val(response.fecha_caducidad);
            }
        });
    })
});