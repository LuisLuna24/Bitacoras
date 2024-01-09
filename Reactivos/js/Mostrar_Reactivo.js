$(document).ready(function () {
    $.ajax({
        type: "POST",
        url: "./php/Mostrar_reactivo.php.php",
        dataType: "JSON",
        success: function (response) {
            $("#Reactivos_Select2").val(response.id_reactivo);
            $("#Lote_Reactivo").val(response.no_lote);
            $("#Apertura_Reactivo").val(response.fecha_apertura);
            $("#Caducidad_Reactivo").val(response.fecha_caducidad);
        }
    });

    $.ajax({
        type: "POST",
        url: "./php/Buscar_Reactivos.php",
        dataType: "html",
        success: function (response) {
            $("#Reactivos_Select2").html(response);
        }
    });

    $("#Actualizar_Reactivo").on("click", function(){
        var datos=new FormData($("#Editar_Form")[0]);
        $.ajax({
            type: "POST",
            url: "./php/Actualizar_Reactivo.php",
            data: datos,
            contentType: false,
            processData:false,
            success: function (response) {
                if(response){
                    alert("Bitacora Actualizada");
                    location.href ="./Reactivos.php";
                }else{
                    alert(response);
                }
            }
        });
    })
});