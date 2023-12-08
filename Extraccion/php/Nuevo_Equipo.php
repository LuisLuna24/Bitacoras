<?php
require "../../php/conexion.php";

session_start();


$NoEquipo =$_SESSION['No_Foli'];
$identificador="";
$idEquipo=$_POST['Equipo_SelectAgregar'];

$Buscrae="SELECT * FROM equposeleccionado where id_equiposeleccionado='$NoEquipo'";
$querye=pg_query($conexion,$Buscrae);


if (pg_num_rows($querye)==0) {
    $identificador=1;
    $crearEquipo="INSERT INTO public.equposeleccionado (id_equiposeleccionado, identificador, id_equipo) VALUES ($NoEquipo, $identificador, '$idEquipo');";
    $crear=pg_query($conexion,$crearEquipo);
}else{
    $Buscraa="SELECT MAX(identificador) FROM equposeleccionado where id_equiposeleccionado='$NoEquipo'";
    $querya=pg_query($conexion,$Buscraa);
    $row=pg_fetch_assoc($querya);
    $identificador=$row['max']+1;
    $crearEquipo="INSERT INTO public.equposeleccionado (id_equiposeleccionado, identificador, id_equipo) VALUES ($NoEquipo, $identificador, '$idEquipo');";
    $crear=pg_query($conexion,$crearEquipo);
    echo $identificador;
    echo $Buscraa;
}






?>