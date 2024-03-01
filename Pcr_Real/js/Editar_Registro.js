$(document).ready(function () {
    $("#Editar_Pcr").on('click',function (e) {
        var datos = new FormData($("#Pcreal_Form")[0]);
        $.ajax({
            type: "POST",
            url: "./php/Editar_Registro.php",
            data: datos,
            contentType: false,
            processData:false,
            success: function (response) {
                alert ("Se ha agregado correctamente.");
                //Direcciona a Actualizar_Pcreal
                location.href ="./Actualizar_Pcreal.php";
                
            }
        });
    });
});