$(document).ready(function () {
    $("#Pcr_Real").on("click", function(){
        $.ajax({
            type: "POST",
            url: "./php/Pcr_Real.php",
            dataType: "html",
            success: function (response) {
                if (response==1){
                    location.href ="./Pcr_Real/Pcr_Real.php";
                }else{
                    alert(response);
                }
            }
        });
    });

    $("#Ver_Reactivos").on("click",function(){
        location.href ="./Reactivos/Ver_Reactivos.php";
    });
});