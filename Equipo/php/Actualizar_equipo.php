<?php
//Actualizar equipo en sección inventario de equipo 

require "../../php/conexion.php";

//Obtener datos nuevos para actualizar equipo
$Inventario=$_POST['Inventario_Equipo'];
$Descripcion=$_POST['Descripcion_Equipo'];
$Nombre=$_POST['Nombre_Equipo'];
$Area=$_POST['Area_Equipo'];
$Estado=$_POST['Estado_Equipo'];

//Busca numero de inventario para evitar duplicaciones con otro equipo
$Buscar="SELECT * FROM equipo where  id_equipo='$Inventario';";
$querybuscar=pg_query($conexion,$Buscar);

if(pg_num_rows($querybuscar)>0){
    $Actualizar="UPDATE public.equipo
	SET id_equipo='$Inventario', identificador='$Inventario - GISENA', nombre='$Nombre', descripcion='$Descripcion', id_area='$Area', estado_equipo='$Estado'
	WHERE  id_equipo='$Inventario';";
    pg_query($conexion,$Actualizar);
    echo 1;
}else{
    echo 2;
}
?>