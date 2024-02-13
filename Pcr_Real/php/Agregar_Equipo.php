<?php
require "../../php/conexion.php";

session_start();


$NoEquipo =$_SESSION["pcreal_fol"];
$identificador="";
$idEquipo=$_POST['Equipo_SelectAgregar'];


$Buscarequipo="SELECT * FROM equipo_pcreal where id_equipo_pcreal='$NoEquipo' and id_equipo='$idEquipo'";
$queryequipo=pg_query($conexion,$Buscarequipo);


if(pg_num_rows($queryequipo)==0){
    $Buscraa="SELECT MAX(identificador) FROM equipo_pcreal where id_equipo_pcreal='$NoEquipo'";
    $querya=pg_query($conexion,$Buscraa);
    $row=pg_fetch_assoc($querya);
    $identificador=$row['max']+1;
    $crearEquipo="INSERT INTO public.equipo_pcreal( id_equipo_pcreal, identificador, id_equipo,version_equipo,equipo_ver)
    VALUES ('$NoEquipo', '$identificador', '$idEquipo','1','11');";
    $crear=pg_query($conexion,$crearEquipo);
    echo 1;
}else{
    echo 2;
}







?>