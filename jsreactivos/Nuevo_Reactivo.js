$(document).ready(function () {
    $('#Reactivo').on('click', function(){
        $('#Dialog_Alert').css('display', 'grid');
        $('#Nombre_Bitacora').text('Bitácoras de Reactivos');
        $('#Dialog_Botones').html("<input type='button' value='Aceptar' id='Crear_Reactivo'><input type='button' value='Cancelar' id='Cancelar_Reactivo'> ")
    });
    $('#Dialog_Botones').on('click','#Cancelar_Reactivo',function(){
        $('#Dialog_Alert').css('display', 'none');
    });
    $('#Dialog_Botones').on('click','#Crear_Reactivo', function(){
        var parametrs = new FormData($("#Dialg_Form")[0]);
        if($('#Version_Dialog').val()==''){
            $('#Alerta_dialog').text('Debe completar este campo');
        }else{
            $.ajax({
                type: "POST",
                url: "phpractivos/nuevo_reactivo.php",
                data: parametrs,
                contentType: false,
                processData:false,
                success: function (response) {
                    window.location.href = "Bitacora_Reactivo.php";
                }
            });
        }
    });
});

