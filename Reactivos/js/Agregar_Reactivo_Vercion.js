//agregar nueva Bitacora de Reactivos atraves de Ajaxc

$(document).ready(function () {
    $("#Nuevo_Actualizar_Reactivo").on("click", function(e){
        e.preventDefault();
        var elementos = new FormData($("#Reactivos_Form_Data")[0]);
        $.ajax({
            type: "POST",
            url: "./php/Agregar_Reactivo_Vercion.php",
            data: elementos,
            contentType: false,
            processData:false,
            success: function (response) {
                alert("Se ha agregado correctamente."); 
                
                //Visualizar tabla de nuevo registro en nueva vercion en bitacora de Reactivos

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
                    //diereccion de la tabla ver Reactivos
                    let url="./php/Buscar_Tabala_VercionNueva.php";
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

            }
        });
    })
});