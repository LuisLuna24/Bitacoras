$(document).ready(function () {
//implementacion de select2 a selects
    $("#Contraseña_Usuario").select2();
    $("#Select_Usuario").select2();

//Acciones para recuperer contraseña
    $("#Recuperar_Contraseña").on("click",function(){
        $("#Contraseña").css("display", "grid");
    });
    $("#Recuperar_btn_Canselar").on("click",function(){
        $("#Contraseña").css("display", "none");
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

    $("#Contraseña_Usuario").on("change",function(){
        var datos=new FormData($("#Contraseña_form")[0]);
        $.ajax({
            type: "POST",
            url: "php/Buscar_Coreo.php",
            data: datos,
            contentType: false,
            processData:false,
            success: function (response) {
                $("#Correo_Recuperar").val(response);
            }
        });
    })

//========================================Registrar Usuario==========================================
    $("#Registar_Usuario").on("click",function(){
        location.href="./registrarce.php";
    })


//========================================Baja Usuario==========================================
    $("#Baja_Usuario").on("click",function(){
        $("#Baja").css("display", "grid");
        $.ajax({
            type: "POST",
            url: "php/Buscar_Usuarios.php",
            dataType: "html",
            success: function (response) {
                $("#Contraseña_Usuario").html(response);
            }
        });
    });
    $("#Baja_btn_Canselar").on("click",function(){
        $("#Baja").css("display", "none");
    });

    $("#Baja_btn").on("click",function(){
        var datos=new FormData($("#Baja_Form")[0]);
        $.ajax({
            type: "POST",
            url: "php/Baja_Usuario.php",
            data: datos,
            contentType: false,
            processData:false,
            success: function (response) {
                if(response==1){
                    alert("Usuaro dado de Baja");
                    $.ajax({
                        type: "POST",
                        url: "php/Buscar_Usuarios.php",
                        dataType: "html",
                        success: function (response) {
                            $("#Contraseña_Usuario").html(response);
                        }
                    });
                    $("#Baja").css("display", "none");  
                    
                }else{
                    alert(response);
                }
            }
        });
    });

//========================================Alta Usuario==========================================
    $("#Alta_Usuario").on("click",function(){
        $("#Alta").css("display", "grid");
        $.ajax({
            type: "POST",
            url: "php/Buscar_Usuarios_Baja.php",
            dataType: "html",
            success: function (response) {
                $("#Select_Usuario").html(response);
            }
        });
    });
    $("#Alta_btn_Canselar").on("click",function(){
        $("#Alta").css("display", "none");
    });
    $.ajax({
        type: "POST",
        url: "php/Buscar_Usuarios_Baja.php",
        dataType: "html",
        success: function (response) {
            $("#Select_Usuario").html(response);
        }
    });
    $("#Alta_btn").on("click",function(){
        var datos=new FormData($("#Alta_Form")[0]);
        $.ajax({
            type: "POST",
            url: "php/Alta_Usuario.php",
            data: datos,
            contentType: false,
            processData:false,
            success: function (response) {
                if(response==1){
                    alert("Usuario Activado");
                    $.ajax({
                        type: "POST",
                        url: "php/Buscar_Usuarios_Baja.php",
                        dataType: "html",
                        success: function (response) {
                            $("#Select_Usuario").html(response);
                        }
                    });
                    $("#Alta").css("display", "none");  
                    
                }else{
                    alert(response);
                }
            }
        });
    });

//========================================Actualizar Calidd Bitacoras==========================================

    $("#Calidad_Bitacoras").on("click",function(){
        $("#Calidad").css("display", "grid");
        $.ajax({
            type: "post",
            url: "php/Buscar_Bitacoras.php",
            dataType: "JSON",
            success: function (response) {
                $("#Bit_Reactivos").val(response.Reactivo);
                $("#Bit_Estraccion").val(response.Extraccion);
                $("#Bit_Pcr").val(response.Pcr);
                $("#Bit_Pcreal").val(response.Pcreal);
                
            }
        });
    });

    $("#Calidad_btn_Canselar").on("click",function(){
        $("#Calidad").css("display", "none");
    });

    $("#Reactivos_btn").on("click",function(){
        var datos=new FormData($("#Calidad_Form")[0]);
        $.ajax({
            type: "POST",
            url: "php/Actualizar_Bitacoras_Reactivos.php",
            data: datos,
            contentType: false,
            processData:false,
            success: function (response) {
                if(response==1){
                    alert("Bitacoras actualizadas correctamente.");
                    $.ajax({
                        type: "post",
                        url: "php/Buscar_Bitacoras.php",
                        dataType: "JSON",
                        success: function (response) {
                            $("#Bit_Reactivos").val(response.Reactivo);
                            $("#Bit_Estraccion").val(response.Extraccion);
                            $("#Bit_Pcr").val(response.Pcr);
                            $("#Bit_Pcreal").val(response.Pcreal);
                            
                        }
                    });
                }else{
                    alert(response);
                }
            }
        });
    });

    $("#Extraccion_btn").on("click",function(){
        var datos=new FormData($("#Calidad_Form")[0]);
        $.ajax({
            type: "POST",
            url: "php/Actualizar_Bitacoras_Extraccion.php",
            data: datos,
            contentType: false,
            processData:false,
            success: function (response) {
                if(response==1){
                    alert("Bitacoras actualizadas correctamente.");
                    $.ajax({
                        type: "post",
                        url: "php/Buscar_Bitacoras.php",
                        dataType: "JSON",
                        success: function (response) {
                            $("#Bit_Reactivos").val(response.Reactivo);
                            $("#Bit_Estraccion").val(response.Extraccion);
                            $("#Bit_Pcr").val(response.Pcr);
                            $("#Bit_Pcreal").val(response.Pcreal);
                            
                        }
                    });
                }else{
                    alert(response);
                }
            }
        });
    });

    $("#Pcr_btn").on("click",function(){
        var datos=new FormData($("#Calidad_Form")[0]);
        $.ajax({
            type: "POST",
            url: "php/Actualizar_Bitacoras_Pcr.php",
            data: datos,
            contentType: false,
            processData:false,
            success: function (response) {
                if(response==1){
                    alert("Bitacoras actualizadas correctamente.");
                    $.ajax({
                        type: "post",
                        url: "php/Buscar_Bitacoras.php",
                        dataType: "JSON",
                        success: function (response) {
                            $("#Bit_Reactivos").val(response.Reactivo);
                            $("#Bit_Estraccion").val(response.Extraccion);
                            $("#Bit_Pcr").val(response.Pcr);
                            $("#Bit_Pcreal").val(response.Pcreal);
                            
                        }
                    });
                }else{
                    alert(response);
                }
            }
        });
    });

    $("#Pcreal_btn").on("click",function(){
        var datos=new FormData($("#Calidad_Form")[0]);
        $.ajax({
            type: "POST",
            url: "php/Actualizar_Bitacoras_Pcreal.php",
            data: datos,
            contentType: false,
            processData:false,
            success: function (response) {
                if(response==1){
                    alert("Bitacoras actualizadas correctamente.");
                    $.ajax({
                        type: "post",
                        url: "php/Buscar_Bitacoras.php",
                        dataType: "JSON",
                        success: function (response) {
                            $("#Bit_Reactivos").val(response.Reactivo);
                            $("#Bit_Estraccion").val(response.Extraccion);
                            $("#Bit_Pcr").val(response.Pcr);
                            $("#Bit_Pcreal").val(response.Pcreal);
                            
                        }
                    });
                }else{
                    alert(response);
                }
            }
        });
    });
    

    
});