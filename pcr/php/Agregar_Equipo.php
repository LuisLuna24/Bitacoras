<?php
require "../../php/conexion.php";

session_start();


$NoEquipo =$_SESSION["pcr_fol"];
$identificador="";
$idEquipo=$_POST['Equipo_SelectAgregar'];

$Buscrae="SELECT * FROM equipo_pcr where id_equipo='$idEquipo' and id_equipo_pcr='$NoEquipo'";
$querye=pg_query($conexion,$Buscrae);


if (pg_num_rows($querye)==0) {
    $Buscraa="SELECT MAX(identificador) FROM equipo_pcr where id_equipo_pcr='$NoEquipo'";
    $querya=pg_query($conexion,$Buscraa);
    $row=pg_fetch_assoc($querya);
    $identificador=$row['max']+1;
    $crearEquipo="INSERT INTO public.equipo_pcr (id_equipo_pcr, identificador, id_equipo,version_equipo) VALUES ($NoEquipo, $identificador, '$idEquipo',1);";
    $crear=pg_query($conexion,$crearEquipo);
    echo 1;
}else{
    echo 2;
}

?>