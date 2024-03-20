//agregar nueva Bitacora de Reactivos atraves de Ajaxc

$(document).ready(function () {
    $("#Nuevo_Actualizar_Reactivo").on("click", function(e){
        e.preventDefault();
        if($('#Reactivos_Select').val()=="0") {
            alert("Seleccione Reactivo");
            return false;
        }else if($("#Lote_Reactivo").val()==""){
            alert("Agrege Lote");
            return false;
        }else if($("#Fecha_Exteracion").val()==""){
            alert("Seleccione  Fecha de Extraccion");
            return false;
        }else if($("#Apertura_Reactivo").val()==""){
            alert("Seleccione Fecha de Apertura");
            return false;
        }else if($("#Caducidad_Reactivo").val()=="0"){
            alert("Seleccione Fecha de caducidad");
            return false;
        }else if($("#Tipo_Bitacora").val()=="0"){
            alert("Seleccione Un Tipo de Bitacora");
            return false;
        }else if($("#Bitaforas_Select").val()=="0"){
            alert("Seleccione un folio de bitacora");
            return false;
        }else{
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
        }
    })
});