$.ajax({
    type: "POST",
    url: "./php/Ver_Equipo_Vercion.php",
    dataType: "html",
    success: function (response) {
        $("#Equipo_Tabla").html(response);
    }
});