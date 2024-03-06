//Agrega analisis al catalogo de analisis

$(document).ready(function () {
    $("#Agregar_Analisis").on("click", function(){
        if($('#Editar_Nombre').val()=="") {
            alert("Falta Nombre del Analisis");
            return false;
        }else if($("#Editar_Abrebiatura").val()==""){
            alert("Falta Abrebiatura del Analisis");
            return false;
        }else{
            var datos=new FormData ($("#Analisis_Form")[0])
            $.ajax({
                type: "POST",
                url: "./php/Agregar_Analisis.php",
                data: datos,
                contentType: false,
                processData:false,
                success: function (response) {
                    if(response==1){
                        alert("Análisis agregado correctamente.");
                        $('#Analisis_Form')[0].reset();

                        //Actualiza los datos de la tabla paginada 
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
                            //Ruta del archivo PHP donde se encuentra la consulta
                            let url="./php/Buscar_Analisis.php";
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
                        alert("Este análisis ya existe.");
                    }else{
                        alert("No se pudo agregar el análisis.");
                    }
                    
                }
            });
        }//Fin del else de validacion de datos
    })
});