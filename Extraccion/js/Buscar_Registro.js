//Permite buscar os datos de un registro
$(document).ready(function () {
    $.ajax({
        type: "POST",
        url: "php/Buscar_Registro.php",
        dataType: "JSON",
        success: function (response) {
            $("#Registro_Exteracion").val(response.id_extracion);
            $("#Fecha_Exteracion").val(response.fecha);
            $("#metodo_select").val(response.id_metodo);
            $("#Analisis_Select").val(response.id_analisis);
            $("#Area_Select").val(response.id_area);
            $("#Conc_Exteracion").val(response.conc_ng_ul);
            $("#280_Exteracion").val(response.dato_260_280);
            $("#230_Exteracion").val(response.dato_260_230);

        }
    });

    $("#Cancelar_Edicion").on("click",function(){
        //redirige a la pagina Actualizar vercio
        window.location.href = "Actualizar_Vercion_Extraccion.php";
    })

    $("#Actualizar_Registro_nuevo").on("click",function($e){
        $e.preventDefault();
        var dato=new FormData($("#Form_Extraccion")[0]);
        $.ajax({
            type: "POST",
            url: "php/Editar_Registro_Version.php",
            data: dato,
            contentType: false,
            processData:false,
            success: function (response) {
                if(response==1){
                    alert("Registro Actualizado");
                    window.location.href = "Actualizar_Vercion_Extraccion.php";
                }else{
                    alert(response);
                }
            }
        });
    });
});