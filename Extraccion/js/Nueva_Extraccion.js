//crear nueva extraccion atraves de Jquery Ajax

$(document).ready(function () {
    $("#Agregar_Extraccion").on('click',function (e) {
        e.preventDefault();
        var datos = new FormData($('#Form_Extraccion')[0]);
        $.ajax({
            type: "POST",
            url: "./php/Nueva_Extraccion.php",//Ruta de query para agregar
            data: datos,
            contentType: false,
            processData:false,
            success: function (response) {
                alert("Extraccion Agregada");

                //Permite actualizar la tabla automáticamente
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
                    //Ruta de donde se obtiene los datos de la tabla
                    let url="./php/Buscar_TabalaExtraccion.php";
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