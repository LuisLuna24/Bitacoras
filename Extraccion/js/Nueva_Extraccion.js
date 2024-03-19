//crear nueva extraccion atraves de Jquery Ajax

$(document).ready(function () {
    $("#Agregar_Extraccion").on('click',function (e) {
        e.preventDefault();
        if($('#Registro_Exteracion').val()=="") {
            alert("Agregue No. De Registro");
            return false;
        }else if($("#Cantidad_Exteracion").val()==""){
            alert("Agregue Cantidad");
            return false;
        }else if($("#Fecha_Exteracion").val()==""){
            alert("Seleccione  Fecha de Extraccion");
            return false;
        }else if($("#metodo_select").val()=="0"){
            alert("Seleccione Metodo");
            return false;
        }else if($("#Fecha_Caducidad").val()=="0"){
            alert("Falta Fecha de caducidad del Reactivo");
            return false;
        }else if($("#Analisis_Select").val()=="0"){
            alert("Seleccione Analisis");
            return false;
        }else if($("#Area_Select").val()=="0"){
            alert("Seleccione Area");
            return false;
        }else{
            var datos = new FormData($('#Form_Extraccion')[0]);
            $.ajax({
                type: "POST",
                url: "./php/Nueva_Extraccion.php",//Ruta de query para agregar
                data: datos,
                contentType: false,
                processData:false,
                success: function (response) {
                    alert("Extracción Agregada Correctamente.");

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
        }
    });
    $("#Registro_Exteracion").keypress(function(e) {
        // Limitar la longitud a 10 caracteres de lote de reactivos
        if ($("#Registro_Exteracion").val().length >= 6) {
          e.preventDefault();
        }
        // Permitir solo números y el backspace
        if (e.which != 8 && (e.which < 48 || e.which > 57)) {
          e.preventDefault();
        }
    });

    $("#Cantidad_Exteracion").keypress(function(e) {
        // Limitar la longitud a 10 caracteres de lote de reactivos
        if ($("#Cantidad_Exteracion").val().length >= 2) {
          e.preventDefault();
        }
    });

    $("#Cantidad_Exteracion").on("input", function(){
        var value = $(this).val();
        // Validar que solo se introduzcan números
        if (!/^[0-9]+$/.test(value)) {
          // Eliminar el caracter no válido
          $(this).val(value.substring(0, value.length - 1));
        }
        // Validar que el número esté dentro del rango 1 al 20
        if (value > 15) {
          // Restablecer el valor a 1
          alert("No se pueden colocar mas de 15 registros");
          $(this).val(15);
          
        }
    });

    $("#Conc_Exteracion").keypress(function(e) {
        // Limitar la longitud a 10 caracteres de lote de reactivos
        if ($("#Conc_Exteracion").val().length >= 30) {
          e.preventDefault();
        }
    });
    $("#280_Exteracion").keypress(function(e) {
        // Limitar la longitud a 10 caracteres de lote de reactivos
        if ($("#280_Exteracion").val().length >= 30) {
          e.preventDefault();
        }
    });
    $("#230_Exteracion").keypress(function(e) {
        // Limitar la longitud a 10 caracteres de lote de reactivos
        if ($("#230_Exteracion").val().length >= 30) {
          e.preventDefault();
        }
    });
});