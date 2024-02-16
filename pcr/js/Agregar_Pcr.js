$(document).ready(function () {
    $("#Agregar_Pcr").on("click", function(){
        var datos = new FormData($("#Pcr_Form")[0]);
        $.ajax({
            type: "POST",
            url: "php/Agregar_Pcr.php",
            data: datos,
            contentType: false,
            processData: false,
            success: function (response) {
                if(response==1){
                    alert("Regsitro Agreado!");
                }else{
                    alert(response);
                }
            }
        });
    });
});