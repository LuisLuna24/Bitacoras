<?php
//Agaragar especie de a catálogo de especies 

require "../../php/conexion.php";

$Nombre=$_POST['Nombre_Especie'];


//Consulta para buscar especies y no se repitan
$Buscar="SELECT * FROM especie where nombre = '$Nombre'";
$query=pg_query($conexion,$Buscar);
if(pg_num_rows($query)==0){

    //Busca el ID máximo y le agrega 1 para agregar nueva especie
    $buscarmax="SELECT MAX(id_especie) FROM especie";
    $querymax=pg_query($conexion,$buscarmax);
    $rowmax=pg_fetch_assoc($querymax);
    $id_Especie=$rowmax['max']+1;

    $Agregar="INSERT INTO public.especie(
        id_especie, vercion_especie, nombre)
        VALUES ('$id_Especie', '1', '$Nombre');";
    $queryAgregar=pg_query($conexion,$Agregar);
    echo 1;
}else{
    echo 2;
}

?>