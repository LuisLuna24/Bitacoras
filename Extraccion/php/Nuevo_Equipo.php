<?php
require "../../php/conexion.php";

session_start();


$NoEquipo =$_SESSION['No_Foli'];
$identificador="";
$idEquipo=$_POST['Equipo_SelectAgregar'];

$Buscrae="SELECT * FROM equipo_extraccion where id_equipo_extraccion='$NoEquipo'";
$querye=pg_query($conexion,$Buscrae);
$Buscarequipo="SELECT * FROM equipo_extraccion where id_equipo_extraccion='$NoEquipo' and id_equipo='$idEquipo'";
$queryequipo=pg_query($conexion,$Buscarequipo);
if(pg_num_rows($queryequipo)==0){
    if (pg_num_rows($querye)==0) {
        $identificador=1;
        $crearEquipo="INSERT INTO public.equipo_extraccion( id_equipo_extraccion, identificador, id_equipo,version_equipo)
        VALUES ('$NoEquipo', '$identificador', '$idEquipo','1');";
        $crear=pg_query($conexion,$crearEquipo);
        echo 1;
    }else{
        $Buscraa="SELECT MAX(identificador) FROM equipo_extraccion where id_equipo_extraccion='$NoEquipo'";
        $querya=pg_query($conexion,$Buscraa);
        $row=pg_fetch_assoc($querya);
        $identificador=$row['max']+1;
        $crearEquipo="INSERT INTO public.equipo_extraccion( id_equipo_extraccion, identificador, id_equipo,version_equipo)
        VALUES ('$NoEquipo', '$identificador', '$idEquipo','1');";
        $crear=pg_query($conexion,$crearEquipo);
        echo 1;
    }
}else{
    echo 2;
}







?>