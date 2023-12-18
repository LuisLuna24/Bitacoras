$(document).ready(function () {
    $("#Agregar_Pcreal").on('click',function (e) {
        var datos = new FormData($("#Pcreal_Form")[0]);
        $.ajax({
            type: "POST",
            url: "./php/Agregar_Pcreal.php",
            data: datos,
            contentType: false,
            processData:false,
            success: function (response) {
                alert(response);
            }
        });
    });
});