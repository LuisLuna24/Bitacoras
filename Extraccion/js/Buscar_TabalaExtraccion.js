//Ver la tabla de las extracciones del registro

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
    //Ruta de la consulta de la tabla paginada
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