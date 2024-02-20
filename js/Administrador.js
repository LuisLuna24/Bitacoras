$(document).ready(function () {
//implementacion de select2 a selects
    $("#Contraseña_Usuario").select2();

//Acciones para recuperer contraseña
    $("#Recuperar_Contraseña").on("click",function(){
        $("#Contraseña").css("display", "grid");
    });
    //Buscar Usuarios
    $.ajax({
        type: "POST",
        url: "php/Buscar_Usuarios.php",
        dataType: "html",
        success: function (response) {
            $("#Contraseña_Usuario").html(response);
        }
    });
    //Actualizar contraseña usuario
    $("#Recuperar_btn").on("click",function(){
        var datos=new FormData($("#Contraseña_form")[0]);
        $.ajax({
            type: "POST",
            url: "php/Recuperar_Contaseña.php",
            data: datos,
            contentType: false,
            processData:false,
            success: function (response) {
                if(response==1){
                    alert("Contraseña actualizada correctamente.");
                    $("#Contraseña").css("display", "none");  
                }else{
                    alert(response);
                }
            }
        });
    });


});