$(document).ready(function () {
    $("#Agregar_Pcreal").on('click',function (e) {
        var datos = new FormData($("#Pcreal_Form")[0]);
        $.ajax({
            type: "POST",
            url: "./php/Agregar_Pcreal.php",
            data: datos,
            contentType: false,
            processData:false,
            success: function (response) {
                alert ("Se ha agregado correctamente.");
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

                    let url="./php/Buscar_pcreal.php";
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
    });
});