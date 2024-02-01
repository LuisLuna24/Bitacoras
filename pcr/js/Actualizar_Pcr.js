$(document).ready(function () {
    $("#Actualizar_Pcr").on('click', function(){
        $.ajax({
            type: "POST",
            url: "./php/Actualizar_PCR.php",
            dataType: "html",
            success: function (response) {
                alert(response);
                locacation.href="Ver_Pcr.php";
            }
        });
    })
});