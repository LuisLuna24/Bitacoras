$(document).ready(function () {
    $("#Area_Select").on('change', function(){
        var dato =new FormData($("#Form_Extraccion")[0]);
        $.ajax({
            type: "POST",
            url: "./php/Buscar_Equipo.php",
            data: dato,
            contentType: false,
            processData:false,
            success: function (response) {
                $("#Equipo_Select").html(response);
            }
        });
    })
    
});
