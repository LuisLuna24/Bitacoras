//Actualizar los equipos en el apartado de Editar equipo
$(document).ready(function () {
    $("#Actualizar_Equipo").on('click', function (e) {
        var datos = new FormData($("#Editar_Form")[0]);
        $.ajax({
            type: "POST",
            url: "./php/Actualizar_equipo.php",
            data: datos,
            contentType: false,
            processData:false,
            success: function (response) {
                if(response==1) {
                    alert('Actualizado correctamente');
                    location.href ="./Equipo.php";
                }else if(response==2) {
                    alert('El numero de inventario pertenese a otro equipo');
                }else{
                    alert(response);
                }
            }
        });
    });
});