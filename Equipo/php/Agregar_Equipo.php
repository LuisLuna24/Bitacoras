<?php

require "../../php/conexion.php";

$Inventario_Equipo=$_POST['Inventario_Equipo'];
$Nombre_Equipo=$_POST['Nombre_Equipo'];
$Descripcion_Equipo=$_POST['Descripcion_Equipo'];
$Area_Equipo=$_POST['Area_Equipo'];
$Estado=$_POST['Estado_Equipo'];


$Buscar="SELECT * FROM equipo where id_equipo = '$Inventario_Equipo'";
$query=pg_query($conexion,$Buscar);
if(pg_num_rows($query)==0){
    $Agregar="INSERT INTO public.equipo(
        id_equipo, identificador, nombre, descripcion, id_area, estado_equipo)
        VALUES ('$Inventario_Equipo', '$Inventario_Equipo - GISENA', '$Nombre_Equipo', '$Descripcion_Equipo', $Area_Equipo,'$Estado');";
    $queryAgregar=pg_query($conexion,$Agregar);
    echo 1;
}else{
    echo 2;
}


?>