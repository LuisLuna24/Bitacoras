$(document).ready(function () {
    $("#Reactivo").on("click", function(){
        $.ajax({
            type: "POST",
            url: "./php/Reactivos.php",
            dataType: "html",
            success: function (response) {
                if (response==1){
                    location.href ="./Reactivos/Reactivos.php";
                }else if(response==2){
                    location.href ="./Reactivos/Reactivos.php";
                }
            }
        });
    });

    $("#Ver_Reactivos").on("click",function(){
        location.href ="./Reactivos/Ver_Reactivos.php";
    });
});