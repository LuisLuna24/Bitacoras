//Permite agregar el equipo ala nueva vercion que se desea seleccionar para la bitácora a través de jQuery Ajax (De momento solo se puede de uno en uno)

$(document).ready(function () {
    $("#Agregar_Equipo_Vercion").on("click", function(){
        var datos = new FormData($('#Form_Extraccion')[0]);
        $.ajax({
            type: "POST",
            url: "./php/Agregar_Equipo_Vercion.php",
            data: datos,
            contentType: false,
            processData:false,
            success: function (response) {
                //Válida si el equipo está agregado o no en caso de no estar agregado lo agrega y actualiza la tabla
                if(response==1){
                    alert('Equipo agregado');
                    $.ajax({
                        type: "POST",
                        url: "./php/Buscar_Equipo_Vercion.php",
                        dataType: "html",
                        success: function (response) {
                            $("#Equipo_Tabla").html(response);
                        }
                    });
                }else if(response==2){
                    alert("Este equipo ya está agregado.")
                }else{
                    alert(response);
                }
            }
        });
    });

});