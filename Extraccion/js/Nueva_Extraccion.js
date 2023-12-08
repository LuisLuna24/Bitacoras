$(document).ready(function () {
    $("#Agregar_Extraccion").on('click',function (e) {
        e.preventDefault();
        var datos = new FormData($('#Form_Extraccion')[0]);
        $.ajax({
            type: "POST",
            url: "./php/Nueva_Extraccion.php",
            data: datos,
            contentType: false,
            processData:false,
            success: function (response) {
                alert(response)
            }
        });
    });
});