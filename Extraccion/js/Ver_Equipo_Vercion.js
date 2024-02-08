$.ajax({
    type: "POST",
    url: "./php/Buscar_TablaEquipo.php",
    dataType: "html",
    success: function (response) {
        $("#Equipo_Tabla").html(response);
    }
});