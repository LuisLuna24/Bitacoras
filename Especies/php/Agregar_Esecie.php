<?php
require "../../php/conexion.php";

$Nombre=$_POST['Nombre_Especie'];

$Buscar="SELECT * FROM especie where nombre ILIKE '%" . $Nombre . "%'";
$query=pg_query($conexion,$Buscar);
if(pg_num_rows($query)==0){
    $buscarmax="SELECT MAX(id_especie) FROM especie";
    $querymax=pg_query($conexion,$buscarmax);
    $rowmax=pg_fetch_assoc($querymax);
    $id_Especie=$rowmax['max']+1;

    $Agregar="INSERT INTO public.especie(id_especie, nombre)
        VALUES ('$id_Especie','$Nombre');";
    $queryAgregar=pg_query($conexion,$Agregar);
    echo 1;
}else{
    echo 2;
}

?>