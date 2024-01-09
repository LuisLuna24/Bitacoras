$(document).ready(function () {
    $("#btn_Agregar").on('click', function(){
        var datos = new FormData($("#Especie_Form")[0]);       
        $.ajax({
            type: "POST",
            url: "./php/Agregar_Esecie.php",
            data: datos,
            contentType: false,
            processData:false,
            success: function (response) {
                if(response==1){
                    alert("Especie agregada correctamente.")
                }else if(response==2){
                    alert("Esta especie ya existe");
                }else{
                    alert(response);
                }
            }
        });
    })
    
});