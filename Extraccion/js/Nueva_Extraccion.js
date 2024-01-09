$(document).ready(function () {
    $("#Agregar_Extraccion").on('click',function (e) {
        e.preventDefault();
        var datos = new FormData($('#Form_Extraccion')[0]);
        $.ajax({
            type: "POST",
            url: "./php/Nueva_Extraccion.php",
            data: datos,
            contentType: false,
            processData:false,
            success: function (response) {
                alert("Extraccion Agregada");
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

    $("#Salir_Ectraccion").on('click',function(){
        window.location.href = "./Ver_Extraccion.php";
    });

    $("#Cancelar_Ectraccion").on('click',function(){
        $(".Alert").css("display","grid");
        $("#Texto_Alerta").text("¿Esta sefuro de cancelar la bitacora?");
    });

    $("#Alert_Regresar").on('click',function(){
        $(".Alert").css("display","none");
    });

    $("#Alert_CancelarB").on('click',function(){
        $.ajax({
            type: "POST",
            url: "./php/Cancelar_Bitacora.php",
            dataType: "html",
            success: function (response) {
                if(response==1){
                    window.location.href = "../Bitacoras.php";
                }else if (response==2){
                    $(".Alert").css("display","grid");
                    $("#Texto_Alerta").text("No se pudo cancelar la bitacora");
                    $(".Alert_Button").html("<input type='button' value='Regresar' id='khg'>");
                }else{
                    alert(response);
                }
            }
        });
    });


});