<?php

//Agregar nuevo equipo en sección inventario de equipo

require "../../php/conexion.php";


$Inventario_Equipo=$_POST['Inventario_Equipo'];
$Nombre_Equipo=$_POST['Nombre_Equipo'];
$Descripcion_Equipo=$_POST['Descripcion_Equipo'];
$Estado=$_POST['Estado_Equipo'];

//Buscar inventario de equipo para evitar duplicados
$Buscar="SELECT * FROM equipos where id_equipo = '$Inventario_Equipo'";
$query=pg_query($conexion,$Buscar);
if(pg_num_rows($query)==0){
    $Agregar="INSERT INTO public.equipos(
        id_equipo, version_equipo, nombre, identificador, descripcion, estado_equipo)
        VALUES ('$Inventario_Equipo', '1', '$Nombre_Equipo' ,'$Inventario_Equipo - GISENA',  '$Descripcion_Equipo', '$Estado');";
    $queryAgregar=pg_query($conexion,$Agregar);
    echo 1;
}else{
    echo 2;
}


?>