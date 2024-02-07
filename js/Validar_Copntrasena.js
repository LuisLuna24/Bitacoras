//Validación si las contraseñas son iguales

$(document).ready(function(){
    var Reg_Contrasena1 = document.getElementById("Reg_Contrasena1");
    var Reg_Contrasena2 = document.getElementById("Reg_Contrasena2");
    var mensaje = document.getElementById("Registrase_btn");
        
Reg_Contrasena1.addEventListener("input", validarContraseñas);
Reg_Contrasena2.addEventListener("input", validarContraseñas);
function validarContraseñas() {
    var pass1 = Reg_Contrasena1.value;
    var pass2 = Reg_Contrasena2.value;
    if(pass1===""){
        mensaje.classList.add("Registro_bt");
    }else
     if (pass1 === pass2) {
        Reg_Contrasena1.style.border= "solid 1px green";
        Reg_Contrasena2.style.border= "solid 1px green";
        mensaje.classList.remove("Registro_bt");
        $('#Contraseñas_Diferentes').text('');
    } else {
        $('#Contraseñas_Diferentes').text('Las contraseñas no coinciden');
        Reg_Contrasena1.style.border= "solid 1px red";
        Reg_Contrasena2.style.border= "solid 1px red";
        mensaje.classList.add("Registro_bt");
        
    }
}
    

});


