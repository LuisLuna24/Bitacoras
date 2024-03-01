//Actualiza reactivo de Inventario de Reactivos
$(document).ready(function () {
    $("#Actualizarbtn").on('click', function(){
        var  datos= new FormData($("#Actualizar_Form")[0]);
        $.ajax({
            type: "POST",
            url: "./php/Actualizar_Reactivo.php",
            data: datos,
            contentType: false,
            processData: false,
            success: function (response) {
                if(response==1){
                    alert("Se actualizo correctamente");
                    location.href ="./Alta_Reactivos.php";
                }else{
                    alert(response);
                }
            }
        });    
    });

    //Cansela el actualizar los datos del reactivo
    $("#Cancelarbtnm").on("click",function(){
        location.href ="./Alta_Reactivos.php";
    })

});