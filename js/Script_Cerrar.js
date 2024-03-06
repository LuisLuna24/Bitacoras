$(document).ready(function () {
    $("#Salir_Global").on("click", function($e){
        $e.preventDefault();
        $("#Alerta_Cerrar_Secion").css("display", "flex");
    });

    $("#Alerta_Secion_Cancelar").on("click", function($e){
        $e.preventDefault();
        $("#Alerta_Cerrar_Secion").css("display", "none");
    });
});