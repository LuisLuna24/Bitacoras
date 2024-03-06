//Actualizar los equipos en el apartado de Editar equipo
$(document).ready(function () {
        $("#Actualizar_Equipo").on('click', function (e) {
            if($('#Inventario_Equipo').val()=="") {
                alert("Falta No. Inventario");
                return false;
            }else if($("#Descripcion_Equipo").val()==""){
                alert("Falta Descripcion del equipo");
                return false;
            }else if($("#Nombre_Equipo").val()==""){
                alert("Falta Nombre del equipo");
                return false;
            }else if($("#Area_Equipo").val()=="0"){
                alert("Falta Area del equipo");
                return false;
            }else{
                var datos = new FormData($("#Editar_Form")[0]);
                $.ajax({
                    type: "POST",
                    url: "./php/Actualizar_equipo.php",
                    data: datos,
                    contentType: false,
                    processData:false,
                    success: function (response) {
                        if(response==1) {
                            alert('Actualizado correctamente');
                            location.href ="./Equipo.php";
                        }else if(response==2) {
                            alert('El numero de inventario pertenese a otro equipo');
                        }else{
                            alert(response);
                        }
                    }
                });
            }
        });
    

    //Cancelar el actualizar equipo regresa a catálogo equipo
    $("#Cancelar_Actualriza").on('click', function (e) {
        location.href ="./Equipo.php";
    });
});