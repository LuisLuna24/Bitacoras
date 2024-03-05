//Busca los datos de la bitacora de pcr  y los muestra en los inputs en el apartado de editar pcr

$(document).ready(function () {
    $.ajax({
        type: "POST",
        url: "./php/Buscar_Datos_Pcr_Editar.php",
        dataType: "JSON",
        success: function (response) {
            //Muestra los datos del equipo a través de la consulta que manda los datos en JSON
            $("#Pcr_Registros").val(response.id_pcr);
            $("#Pcr_Analisis").val(response.id_analisis);
            $("#Pcr_Fecha").val(response.fecha);
            $("#Pcr_Agrosa").val(response.agarosa);
            $("#Pcr_Voltage").val(response.voltage);
            $("#Pcr_Tiempo").val(response.tiempo);
            if(response.sanitizo==1){
                $("#Sanitizo").prop("checked", true);
            }
            if(response.tiempouv==1){
                $("#Tiempouv").prop("checked", true);
            }
        }
    });


    //Cancelar y regresar a Bitacora de Pcr
    $("#Cancelar_Editar_Pcr").on("click",function(){
        location.href = "./Bitacora_Pcr.php";
    });


    //Permite Actualizizar bitacora de pcr 
    $("#Actualizar_Pcr").on("click",function(){
        var dato=new FormData($("#Pcr_Form")[0]);
        $.ajax({
            type: "POST",
            url: "./php/Editar_Pcr.php",
            data: dato,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response==11){
                    alert("Registro Actualizado");
                    location.href ="./Bitacora_Pcr.php";
                }else{
                    alert(response);
                }
            }
        });
    })


    //Permite Cancelar version de registro de version de bitacora de pcr
    $("#Cancelar_Editar_Pcr_Version").on("click",function(){
        location.href = "./Editar_Pcr_Version.php";
    });

    //Permite Actualizar version de registro de version de bitacora de pcr
    $("#Actualizar_Pcr_Version").on("click",function(){
        var dato=new FormData($("#Pcr_Form_Version_Datos")[0]);
        $.ajax({
            type: "POST",
            url: "./php/Editar_Pcr_Version.php",
            data: dato,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response==1){
                    alert("Registro Actualizado");
                    location.href ="./Editar_Pcr_Version.php";
                }else{
                    alert(response);
                }
            }
        });
    })
});