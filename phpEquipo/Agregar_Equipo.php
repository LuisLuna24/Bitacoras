<?php

require "../php/conexion.php";

$Nombre=$_POST["Equipo_Nombre"];
$No_Equipo=$_POST["Equipo_Inventario"];
$Area=$_POST["Equipo_Select"];


$Buscar="SELECT * FROM equipo WHERE nombre_equipo ILIKE '%$Nombre%'";
$sql=pg_query($conexion,$Buscar);

if(pg_num_rows($sql)==0){

    $Agregar="INSERT INTO public.equipo(id_equipo, nombre_equipo, id_categoria)VALUES ('$No_Equipo','$Nombre','$Area')";
    $sql=pg_query($conexion,$Agregar);
    echo 1;
}else{
    echo 2;
}

?>