$(document).ready(function () {


    $("#Pcr_Analisis").select2();
    $("#Pcr_Resultado").select2();
    $("#Pcr_Equipo").select2();
    $("#Pcr_Espceie").select2();


    $("#Pcr_Cantidad").val('1');

    //Direccioan a ver vitacoras
    $("#Ver_Bitacoras").on('click', function (e) {
        $(location).attr('href', 'Ver_Pcr.php');
    });


    //Ocultar seccion de especies con check
    if ($(this).is(":checked")) {
        $("#Pcr_Especie_contenedor").show();
        $("#Especie_Boton_pcr").show();
    } else {
        $("#Pcr_Especie_contenedor").hide();
        $("#Especie_Boton_pcr").hide();
    }
    $("#Check_Espcies").change(function() {
        if ($(this).is(":checked")) {
            $("#Pcr_Especie_contenedor").show();
            $("#Especie_Boton_pcr").show();
        }else {
            $("#Pcr_Especie_contenedor").hide();
            $("#Especie_Boton_pcr").hide();
        }
    });
});