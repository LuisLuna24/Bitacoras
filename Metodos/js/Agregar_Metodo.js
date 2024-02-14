//Aggregar metodo a catalogo de metodo Antares de Ajax

$(document).ready(function () {
    $("#btn_Agregar").on('click', function(){
        var datos = new FormData($("#Especie_Form")[0]);       
        $.ajax({
            type: "POST",
            url: "./php/Agregar_Metodo.php",
            data: datos,
            contentType: false,
            processData:false,
            success: function (response) {
                if(response==1){
                    alert("Método agregado correctamente");

                    //Actualizar tabal paginado de catálogo de métodos

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
                        //Dirección de búsqueda de tabla de métodos  
                        let url="./php/Buscar_Metodo.php";
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
                    alert("Este metodo ya existe");
                }else{
                    alert("No se pudo agregar el método");
                }
            }
        });
    })
    
});