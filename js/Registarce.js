$(document).ready(function () {
    $('#Registro_Boton').on('click', function (e) {
        e.preventDefault();
        var parametros = new FormData($("#Longup_Form")[0]);
        $.ajax({
            type: "POST",
            url: "php/Registrarse.php",
            data: parametros,
            contentType: false,
            processData:false,
            success: function (response) {
                if(response==1){
                    var Alert = document.getElementById('Alerta');
                    Alert.style.display = "flex";
                    $('#Registar_Form')[0].reset();
                }else if(response==2){
                    $('#Faltan_Datos').text('El correo no está disponible');
                    $('#Correo').style.border= "solid 3px red";
                }
            }
        });

    });
    $('#Alerta_btn').on('click',function(alert){
        alert.preventDefault();

        var Alert = document.getElementById('Alerta');
        Alert.style.display = "none";
    });
    
});