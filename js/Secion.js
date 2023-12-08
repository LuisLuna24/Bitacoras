$(document).ready(function () {
    $("#Iniciar_Sesion").on("click",function(event){
        event.preventDefault();
        var datos = new FormData($("#Form_Secion")[0]);
        $.ajax({
            type: "POST",
            url: "php/Secion.php",
            data: datos,
            contentType: false,
            processData:false,
            success: function (response) {
                if (response==1) {
                    $(location).attr('href', 'Principal.php');
                    $('#Singin_Form')[0].reset();
                } else if(response==2) {
                    var Alert = document.getElementById('Alerta_Secion');
                    Alert.style.display = "flex";
                    $('#Label_Alerta_Secion').text('La contraseña es incorrecta');
                    var Contraseña_in =document.getElementById('Singin_Contraseña');
                    Contraseña_in.style.border= "solid 2px red";
                }else if(response==3){
                    var Alert = document.getElementById('Alerta_Secion');
                    Alert.style.display = "flex";
                    $('#Label_Alerta_Secion').text('El correo es incorrecto');
                    var Correo=document.getElementById('Singin_Correo');
                    Correo.style.border= "solid 2px red";
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