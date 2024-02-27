$(document).ready(function () {
    
    $("#Resultado_pcreal").select2();
    $("#Equipo_Select").select2();

    $("#Ver_Bitacoras").on('click', function(e) {
        $(location).attr('href', 'ver_pcreal.php');
    })

    $("#Pcreal_Catidad").val('1');

    
});