//Modifica las rutas del navbar y logo

$(document).ready(function () {
    
    //Manda a sección para ver los equipos dados de baja
    $("#Equipo_Baja").on("click", function(){
        location.href = "./Equipo_Baja.php"
    })

    $("#Inventario_Equipo").keypress(function(e) {
        // Permitir solo números y el backspace
        if (e.which != 8 && (e.which < 48 || e.which > 57)) {
          e.preventDefault();
        }
      
        // Limitar la longitud a 6 caracteres
        if ($("#Inventario_Equipo").val().length >= 6) {
          e.preventDefault();
        }
    });
    $("#Descripcion_Equipo").keypress(function(e) {
        // Limitar la longitud a 6 caracteres
        if ($("#Descripcion_Equipo").val().length >= 60) {
          e.preventDefault();
        }
    });

    $("#Nombre_Equipo").keypress(function(e) {
        // Limitar la longitud a 6 caracteres
        if ($("#Nombre_Equipo").val().length >= 30) {
          e.preventDefault();
        }
    });


    //Permite regresar a equipos
    $("#Regresar_Equipo").on("click", function(){
        location.href = "./Equipo.php"
    })

    
});