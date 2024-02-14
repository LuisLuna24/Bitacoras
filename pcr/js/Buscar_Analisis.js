$(document).ready(function () {

    //Busca los analisis existentes y los coloca en el select de analisis
    $.ajax({
        type: "POST",
        url: "./php/Buscra_Analisis.php",
        dataType: "html",
        success: function (response) {
            $("#Analisis_Pcr").html(response);
        }
    });

        //Busca las especies existentes y los coloca en el select de especies
    $.ajax({
        type: "POST",
        url: "./php/Buscar_Especie.php",
        data: "data",
        dataType: "dataType",
        success: function (response) {
            
        }
    });
});