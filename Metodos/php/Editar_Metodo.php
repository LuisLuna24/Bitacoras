<?php
//Permite actualizar el metodo 
require "../../php/conexion.php";
session_start();

$id_metodo=$_SESSION['Metodo'];

$Nombre=$_POST['Nombre_Especie'];

//Buscar método para evitar duplicados
$Buscar="SELECT * FROM metodo where nombre ILIKE '%" . $Nombre . "%'";
$query=pg_query($conexion,$Buscar);
if(pg_num_rows($query)==0){

    $Agregar="UPDATE public.metodo
	SET  nombre='$Nombre'
	WHERE id_metodo='$id_metodo';";
    $queryAgregar=pg_query($conexion,$Agregar);
    echo 1;
}else{
    echo 2;
}



?>