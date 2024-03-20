//Actualiza reactivo de Inventario de Reactivos
$(document).ready(function () {
    $("#Actualizarbtn").on('click', function(){
        if($('#Reacivo_Nombre').val()=="") {
            alert("Falta el nombre del Reactivo.");
            return false;
        }else if($("#Reactivo_Lote").val()==""){
            alert("Falta el lote del Reactivo.");
            return false;
        }else if($("#Reactivo_Descripcion").val()==""){
            alert("Falta descripción del Reactivo.");
            return false;
        }else if($("#Reactivo_Cantidad").val()=="0"){
            alert("Falta cantidad del Reactivo.");
            return false;
        }if($("#Fecha_Caducidad").val()=="0"){
            alert("Falta la fecha de caducidad del Reactivo.");
            return false;
        }else{
            var  datos= new FormData($("#Actualizar_Form")[0]);
            $.ajax({
                type: "POST",
                url: "./php/Actualizar_Reactivo.php",
                data: datos,
                contentType: false,
                processData: false,
                success: function (response) {
                    if(response==1){
                        alert("Se actualizó correctamente.");
                        location.href ="./Alta_Reactivos.php";
                    }else{
                        alert(response);
                    }
                }
            });
        }    
    });

    //Cansela el actualizar los datos del reactivo
    $("#Cancelarbtnm").on("click",function(){
        location.href ="./Alta_Reactivos.php";
    })

});