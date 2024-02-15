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

});