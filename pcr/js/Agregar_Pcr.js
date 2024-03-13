//Permite agregar nuevo registro de pcr

$(document).ready(function () {
    $("#Agregar_Pcr").on("click", function(){
        if($('#Pcr_Registros').val()=="") {
            alert("Falta No. de Registro");
            return false;
        }else if($('#Pcr_Cantidad').val()==""){
            alert("Falta Cantidad");
            return false;
        }else if($('#Pcr_Analisis').val()==""){
            alert("Seleccione Anlisis");
            return false;
        }else if($('#Pcr_Fecha').val()==""){
            alert("Seleccione Fecha");
            return false;
        }else if($('#Pcr_Agrosa').val()==""){
            alert("Falta Agarosa");
            return false;
        }else if($('#Pcr_Voltage').val()==""){
            alert("Falta Voltage");
            return false;
        }else if($('#Pcr_Tiempo').val()==""){
            alert("Falta Tiempo");
            return false;
        }else{
            var datos = new FormData($("#Pcr_Form")[0]);
            $.ajax({
                type: "POST",
                url: "php/Agregar_Pcr.php",
                data: datos,
                contentType: false,
                processData:false,
                success: function (response) {
                    if(response==1){
                        alert("Se ha agregado correctamente.");
                    }else{
                        alert(response);
                    }
                }
            });
        }
    })
});