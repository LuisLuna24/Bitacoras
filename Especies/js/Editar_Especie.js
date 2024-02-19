//Permite ediar el nombre de la especie 
$(document).ready(function () {
    $("#Editar_Especie").on("click",function(){
        var datos = new FormData($('#Especie_Form_edit')[0]);
        $.ajax({
            type: "POST",
            url: "php/Editar_Especie.php",
            data: datos,
            contentType: false,
            processData: false,
            success: function (response) {
                //Mensaje de actualizacion y regresar a CAtalogo especies
                alert("Especie actualizada correctamente.");
                location.href="./Especies.php";

            }
        });
    });

    //Cancelar y bolver a especies
    $("#Cancelarbtn").on("click",function(){
        location.href = "./Especies.php";
    });
});