$(document).ready(function () {
    
    $("#Actualizar_Registro").on("click",function($e){
        $e.preventDefault();
        var dato=new FormData($("#Form_Extraccion")[0]);
        $.ajax({
            type: "POST",
            url: "php/Editar_Registro.php",
            data: dato,
            contentType: false,
            processData:false,
            success: function (response) {
                if(response==1){
                    alert("Registro Actualizado");
                    window.location.href = "Extraccion.php";
                }else{
                    alert(response);
                }
            }
        });

    });
});