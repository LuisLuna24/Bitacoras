$(document).ready(function(){
    $("#Registrase_btn").on('click',function(e){
        e.preventDefault();

        var parametros = new FormData($("#Regsitro_Form")[0]);
        $.ajax({
            type: "POST",
            url: "php/Registrarce.php",
            data: parametros,
            contentType: false,
            processData:false,
            success: function (response) {
                if (response==1) {
                    $(location).attr('href', 'index.php');
                    $('#Singin_Form')[0].reset();
                } else if(response==2) {
                    var Alert = document.getElementById('Alerta_Secion');
                    Alert.style.display = "flex";
                    $('#Label_Alerta_Secion').text('Este correo ya esta registrado');
                    var Reg_Correo =document.getElementById('Reg_Correo');
                    Reg_Correo.style.border= "solid 2px red";
                }else if(response==3) {
                    var Alert = document.getElementById('Alerta_Secion');
                    Alert.style.display = "flex";
                    $('#Label_Alerta_Secion').text('Deves Seleccionar un area');
                    var Reg_Area =document.getElementById('Reg_Area');
                    Reg_Area.style.border= "solid 2px red";
                }else{
                    var Alert = document.getElementById('Alerta_Secion');
                    Alert.style.display = "flex";
                    $('#Label_Alerta_Secion').text(response);
                }
            }
        });
    });

    $('#Alerta_btn_Secion').on('click',function(alert){
        alert.preventDefault();
        var Alerta = document.getElementById('Alerta_Secion');
        Alerta.style.display = "none";
    });
});