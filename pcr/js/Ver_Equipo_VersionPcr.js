//Permite ver elequipo de la vercion al mommeto de ver alguna vercon de un folio

$(document).ready(function () {
    $.ajax({
        type: "POST",
        url: "./php/Ver_Equipo_vercionPcr.php",
        dataType: "html",
        success: function (response) {
            $("#Equipo_Tabla").html(response);
        }
    });
});
