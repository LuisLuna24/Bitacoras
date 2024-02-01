$(document).ready(function () {
    //Permite actualizar los datos de los analsisis 
    
    $("#Actualizarbtn_Analisis").on("click", function(){
        var datos=new FormData($("#Actualizar_Form")[0]);
        $.ajax({
            type: "POST",
            url: "./php/Actualizar_Analisis.php",
            data: datos,
            contentType: false,
            processData:false,
            success: function (response) {
                if(response==1){
                    alert("Análisis actualizado correctamente.");
                    location.href ="./Analisis.php";
                }else{
                    alert(response);
                }
            }
        });
    })

    //Cansela el actualizar los datos del analisis
    $("#Salir_Actualizar").on("click",function(){
        location.href ="./Analisis.php";
    })
});