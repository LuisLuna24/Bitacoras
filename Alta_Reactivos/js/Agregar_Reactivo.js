//Agregar reactivo a inventario de reactivos 
$(document).ready(function () {
    $("#Agregar_Reactivo").on('click',function(e){
        if($('#Reacivo_Nombre').val()=="") {
            alert("Falta Nombre del Reactivo");
            return false;
        }else if($("#Reactivo_Lote").val()==""){
            alert("Falta Lote del Reactivo");
            return false;
        }else if($("#Reactivo_Descripcion").val()==""){
            alert("Falta Descripcion del Reactivo");
            return false;
        }else if($("#Reactivo_Cantidad").val()=="0"){
            alert("Falta Cantidad del Reactivo");
            return false;
        }if($("#Fecha_Caducidad").val()=="0"){
            alert("Falta Fecha de caducidad del Reactivo");
            return false;
        }else{
            e.preventDefault();
            var datos= new FormData($("#Reactivo_Form")[0]);
            $.ajax({
                type: "POST",
                url: "./php/Agregar_Reactivo.php",
                data: datos,
                contentType: false,
                processData: false,
                success: function (response) {
                    if(response==1){
                        alert("Reactivo agregado correctamente.");
                        $('#Reactivo_Form')[0].reset();

                        //Actualiza La tabla paginada 
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

                            let url="./php/Buscar_Reactivo.php";
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

                    }else {
                        alert(response);
                    }
                }
            });
        }
    });
});