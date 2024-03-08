$(document).ready(function () {
    $("#Agregar_Pcreal").on('click',function (e) {
        if($('#Nombre_Pcreal').val()=="") {
            alert("Agregue No. De Registro");
            return false;
        }else if($("#Pcreal_Catidad").val()==""){
            alert("Agregue Cantidad");
            return false;
        }else if($("#Analisis_pcreal").val()=="0"){
            alert("Seleccione algún Análisis");
            return false;
        }else if($("#Fecha_Pcreal").val()=="0"){
            alert("Seleccione Fecha");
            return false;
        }else if($("#pcreal_observaciones").val()=="0"){
            alert("Agregue observaciones");
            return false;
        }else{
            var datos = new FormData($("#Pcreal_Form")[0]);
            $.ajax({
                type: "POST",
                url: "./php/Agregar_Pcreal.php",
                data: datos,
                contentType: false,
                processData:false,
                success: function (response) {
                    alert ("Se ha agregado correctamente.");
                    alert(response);
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
        }
    });


    $("#Nombre_Pcreal").keypress(function(e) {
        // Limitar la longitud a 10 caracteres de lote de reactivos
        if ($("#Nombre_Pcreal").val().length >= 10) {
          e.preventDefault();
        }
        // Permitir solo números y el backspace
        if (e.which != 8 && (e.which < 48 || e.which > 57)) {
          e.preventDefault();
        }
    });

    $("#Pcreal_Catidad").keypress(function(e) {
        // Limitar la longitud a 10 caracteres de lote de reactivos
        if ($("#Pcreal_Catidad").val().length >= 10) {
          e.preventDefault();
        }
        // Permitir solo números y el backspace
        if (e.which != 8 && (e.which < 48 || e.which > 57)) {
          e.preventDefault();
        }
    });
});