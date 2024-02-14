<?php
require "../../php/conexion.php";

session_start();

//Permite agregar nuevo equipo a quipo seleccionado en Bitácora Extracción

$NoEquipo =$_SESSION['No_Foli'];
$identificador="";
$idEquipo=$_POST['Equipo_SelectAgregar'];

$Buscrae="SELECT * FROM equipo_extraccion where id_equipo_extraccion='$NoEquipo'";
$querye=pg_query($conexion,$Buscrae);

//Buscar si un equipo ha sido seleccionado antes o no para evitar equipo duplicado
$Buscarequipo="SELECT * FROM equipo_extraccion where id_equipo_extraccion='$NoEquipo' and id_equipo='$idEquipo'";
$queryequipo=pg_query($conexion,$Buscarequipo);
if(pg_num_rows($queryequipo)==0){
    if (pg_num_rows($querye)==0) {
        $identificador=1;
        $VEr_Equipo=$NoEquipo.'1';
        $crearEquipo="INSERT INTO public.equipo_extraccion( id_equipo_extraccion, identificador, id_equipo,version_equipo,equipo_ver)
        VALUES ('$NoEquipo', '$identificador', '$idEquipo','1','$VEr_Equipo');";
        $crear=pg_query($conexion,$crearEquipo);
        echo 1;
    }else{
        $Buscraa="SELECT MAX(identificador) FROM equipo_extraccion where id_equipo_extraccion='$NoEquipo'";
        $querya=pg_query($conexion,$Buscraa);
        $row=pg_fetch_assoc($querya);
        $identificador=$row['max']+1;
        $VEr_Equipo=$NoEquipo.'1';
        $crearEquipo="INSERT INTO public.equipo_extraccion( id_equipo_extraccion, identificador, id_equipo,version_equipo,equipo_ver)
        VALUES ('$NoEquipo', '$identificador', '$idEquipo','1','$VEr_Equipo');";
        $crear=pg_query($conexion,$crearEquipo);
        echo 1;
    }
}else{
    echo 2;
}







?>