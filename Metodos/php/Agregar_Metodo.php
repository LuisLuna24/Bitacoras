<?php
//Agregar nuevo método a catálogo de métodos

require "../../php/conexion.php";

$Nombre=$_POST['Nombre_Especie'];

//Buscar método para evitar duplicados
$Buscar="SELECT * FROM metodo where nombre ILIKE '%" . $Nombre . "%'";
$query=pg_query($conexion,$Buscar);
if(pg_num_rows($query)==0){
    //Selecciona ID máximo y suma uno para agregar nuevo método
    $buscarmax="SELECT MAX(id_metodo) FROM metodo";
    $querymax=pg_query($conexion,$buscarmax);
    $rowmax=pg_fetch_assoc($querymax);
    $id_Metodo=$rowmax['max']+1;

    $Agregar="INSERT INTO public.metodo(id_metodo, nombre)
        VALUES ('$id_Metodo','$Nombre');";
    $queryAgregar=pg_query($conexion,$Agregar);
    echo 1;
}else{
    echo 2;
}

?>