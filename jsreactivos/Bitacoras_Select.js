$(document).ready(function () {
    $("#Reactivos_Select").select2();
    $.ajax({
        url: 'phpractivos/Prubas_Reactivos.php',
        type: "POST",
        dataType: "html",
        success: function (response) {
            $("#Reactivos_Select").html(response);
        }
    })
});

