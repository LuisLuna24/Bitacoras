//Permite acyualizar el metodo
$(document).ready(function () {
    $("#btn_Actualizar").on("click",function(){
        var datos = new FormData($('#Metodo_Form_edit')[0]);
        $.ajax({
            type: "POST",
            url: "php/Editar_Metodo.php",
            data: datos,
            contentType: false,
            processData: false,
            success: function (response) {
                //Mensaje de actualizacion y regresar a CAtalogo especies
                alert("Método actualizado correctamente.");
                location.href="./Metodos.php";

            }
        });
    });

    //Cancelar y bolver a especies
    $("#btn_Cancelar").on("click",function(){
        location.href = "./Metodos.php";
    });
});