<?php
require "../../php/conexion.php";

session_start();


$NoEquipo =$_SESSION["pcreal_fol"];
$identificador="";
$idEquipo=$_POST['Equipo_SelectAgregar'];


$Buscarequipo="SELECT * FROM equipo_pcreal where id_equipo_pcreal='$NoEquipo' and id_equipo='$idEquipo'";
$queryequipo=pg_query($conexion,$Buscarequipo);

//Buscar la version maxima del equipo seleccionado
$BuscarEquipoMax="SELECT MAX(vercion_equipo) FROM equipo where id_equipo= '$idEquipo';";
$querymaxequipo=pg_query($conexion,$BuscarEquipoMax);
$rowequipo=pg_fetch_assoc($querymaxequipo);
$EquipoMax=$rowequipo['max'];


if(pg_num_rows($queryequipo)==0){
    $Buscraa="SELECT MAX(identificador) FROM equipo_pcreal where id_equipo_pcreal='$NoEquipo'";
    $querya=pg_query($conexion,$Buscraa);
    $row=pg_fetch_assoc($querya);
    $identificador=$row['max']+1;
    $ver_equipo=$NoEquipo.'1';
    $crearEquipo="INSERT INTO public.equipo_pcreal(
        id_equipo_pcreal, identificador, version_equipo_pcr, id_equipo, version_equipo, ver_equipo_pcreal)
        VALUES ('$NoEquipo', '$identificador', '1', '$idEquipo', '$EquipoMax', '$ver_equipo');";
    $crear=pg_query($conexion,$crearEquipo);
    echo 1;
}else{
    echo 2;
}







?>