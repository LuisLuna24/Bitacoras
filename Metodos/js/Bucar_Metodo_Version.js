//Buscar el nombre del metodo de la verison pasada

$(document).ready(function (){
    $.ajax({
        type: "POST",
        url: "./php/Buscar_Metodo_Version.php",
        dataType: "JSON",
        success: function (response) {
            //Inserta en los imput los valores del reactivo 
            $("#Metodo_Anterior").text("Nombre Anterior: "+response.nombre);
        }
    })
})