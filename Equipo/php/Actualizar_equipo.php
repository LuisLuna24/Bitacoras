<?php
//Actualizar equipo en sección inventario de equipo 

require "../../php/conexion.php";
session_start();

//Obtener datos nuevos para actualizar equipo
$Inventario=$_POST['Inventario_Equipo'];
$Descripcion=$_POST['Descripcion_Equipo'];
$Nombre=$_POST['Nombre_Equipo'];
$Area=$_POST['Area_Equipo'];
$Estado=$_POST['Estado_Equipo'];
$Id_equipo=$_SESSION['Equipo'];

//Busacar version Maxima
$Buscarmax="SELECT MAX(vercion_equipo) FROM equipo where id_equipo = '$Id_equipo' ";
$querymax=pg_query($conexion,$Buscarmax);
$rowmax=pg_fetch_assoc($querymax);
$version_max=$rowmax['max']+1;

//Busca numero de inventario para evitar duplicaciones con otro equipo
$Buscar="SELECT * FROM equipo where  id_equipo='$Inventario';";
$querybuscar=pg_query($conexion,$Buscar);

if(pg_num_rows($querybuscar)>0){
    $Actualizar="UPDATE public.equipo
	SET id_equipo='$Inventario', vercion_equipo='$version_max', identificador='$Inventario - GISENA', nombre='$Nombre', descripcion='$Descripcion', id_area='$Area', estado_equipo='$Estado'
	WHERE id_equipo='$Id_equipo';";
    pg_query($conexion,$Actualizar);
    echo 1;
}else{
    echo 2;
}
?>