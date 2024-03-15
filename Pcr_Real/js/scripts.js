$(document).ready(function () {

    $("#Equipo_Select").select2();
    $("#Especie_Select").select2();

    $("#Ver_Bitacoras").on('click', function(e) {
        $(location).attr('href', 'ver_pcreal.php');
    })

    $("#Pcreal_Catidad").val('1');

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