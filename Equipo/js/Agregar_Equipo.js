//Agregar nuevo equipo en el catálogo de equipos

$(document).ready(function () {


    $("#Agregar_Equipo").on("click", function (e) {
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
            var datos = new FormData($("#Equipo_Form")[0]);
            $.ajax({
                type: "POST",
                url: "./php/Agregar_Equipo.php",
                data: datos,
                contentType: false,
                processData:false,
                success: function (response) {
                    if(response==1){
                        alert("Equipo agregado correctamente.");
                        $('#Equipo_Form')[0].reset();

                        //Actualiza la tabla de Equipos 
                        let paginaActual = 1;

                        getData(paginaActual);

                        document.getElementById("campo").addEventListener("keyup",function(e){
                            getData(1);
                        },false);
                        document.getElementById("num_registros").addEventListener("input",function(e){
                            getData(paginaActual);
                        },false);

                        function getData(pagina){
                            let input=document.getElementById("campo").value;
                            let num_registros=document.getElementById("num_registros").value;

                            let content=document.getElementById("content");

                        if(pagina != null){
                            paginaActual=pagina;
                        }
                            //Dirección de donde proviene los datos de la tabla de catálogo de equipos
                            let url="./php/Buscar_Equipo.php";
                            let formaData = new FormData();
                            formaData.append('campo',input);
                            formaData.append('registros',num_registros);
                            formaData.append('pagina',paginaActual);

                            fetch(url,{
                                method:'POST',
                                body:formaData
                            }).then(resoponse => resoponse.json())
                            .then(data => {
                                content.innerHTML = data.data;
                                document.getElementById("nav-paginacion").innerHTML = data.paginacion;
                            }).catch(err => console.log(err))

                        }
                    }else if(response==2){
                        alert("Este equipo ya existe.");
                    }else{
                        alert("No se pudo agregar el equipo.");
                    }
                }
            });
        }
    });
});