//Modifica las rutas del navbar y logo

$(document).ready(function () {
    
    //Manda a sección para ver los equipos dados de baja
    $("#Equipo_Baja").on("click", function(){
        location.href = "./Equipo_Baja.php"
    })
});