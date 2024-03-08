$(document).ready(function () {
    $("#Agregar_Pcr").on("click", function(){
        if($('#Pcr_Registros').val()=="") {
            alert("Agregue No. De Registro");
            return false;
        }else if($("#Pcr_Cantidad").val()==""){
            alert("Agregue Cantidad");
            return false;
        }else if($("#Pcr_Analisis").val()=="0"){
            alert("Seleccione algún Análisis");
            return false;
        }else if($("#Pcr_Fecha").val()=="0"){
            alert("Seleccione Fecha");
            return false;
        }else{
            var datos = new FormData($("#Pcr_Form")[0]);
            $.ajax({
                type: "POST",
                url: "php/Agregar_Pcr.php",
                data: datos,
                contentType: false,
                processData: false,
                success: function (response) {
                    if(response==1){
                        alert('Agregado Correctamente');
                        //limpiar formulario
                        $('#Pcr_Form')[0].reset();
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

                            let url="./php/Buscar_Tabla_Pcr.php";
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
                    }else{
                        alert(response);
                    }
                }
            });
        }
    });


    $("#Pcr_Registros").keypress(function(e) {
        // Limitar la longitud a 10 caracteres de lote de reactivos
        if ($("#Pcr_Registros").val().length >= 10) {
          e.preventDefault();
        }
        // Permitir solo números y el backspace
        if (e.which != 8 && (e.which < 48 || e.which > 57)) {
          e.preventDefault();
        }
    });

    $("#Pcr_Cantidad").keypress(function(e) {
        // Limitar la longitud a 10 caracteres de lote de reactivos
        if ($("#Pcr_Cantidad").val().length >= 10) {
          e.preventDefault();
        }
        // Permitir solo números y el backspace
        if (e.which != 8 && (e.which < 48 || e.which > 57)) {
          e.preventDefault();
        }
    });

    $("#Pcr_Agrosa").keypress(function(e) {
        // Permitir solo números y el backspace y punto decimal
        if (e.which != 8 && (e.which < 48 || e.which > 57) && e.which != 46) {
          e.preventDefault();
        }
    });
    $("#Pcr_Voltage").keypress(function(e) {
        // Permitir solo números y el backspace
        if (e.which != 8 && (e.which < 48 || e.which > 57) && e.which != 46) {
          e.preventDefault();
        }
    });
    $("#Pcr_Tiempo").keypress(function(e) {
        // Permitir solo números y el backspace
        if (e.which != 8 && (e.which < 48 || e.which > 57) && e.which != 46) {
          e.preventDefault();
        }
    });
});