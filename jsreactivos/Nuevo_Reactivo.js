$(document).ready(function () {
    $('#Reactivo').on('click', function(){
        $.ajax({
            type: "POST",
            url: "phpractivos/nuevo_reactivo.php",
            contentType: false,
            processData:false,
            success: function (response) {
                alert(response);
                window.location.href = "Bitacora_Reactivo.html";
            }
        });
    });
});