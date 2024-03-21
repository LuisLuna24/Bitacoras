<?php
require "../../php/conexion.php";

session_start();

//Permite agregar nuevo equipo a quipo seleccionado en Bitácora Extracción

$NoEquipo =$_SESSION['No_Foli'];
$identificador="";
$No_registro=$_POST['Registro_Exteracion'];
$idEquipo=$_POST['Equipo_SelectAgregar'];

$Buscrae="SELECT * FROM equipo_extraccion where id_equipo_extraccion='$NoEquipo'";
$querye=pg_query($conexion,$Buscrae);


//Buscar la version maxima del equipo seleccionado
$BuscarEquipoMax="SELECT MAX(vercion_equipo) FROM equipo where id_equipo= '$idEquipo';";
$querymaxequipo=pg_query($conexion,$BuscarEquipoMax);
$rowequipo=pg_fetch_assoc($querymaxequipo);
$EquiMax=$rowequipo['max'];

//Buscar si un equipo ha sido seleccionado antes o no para evitar equipo duplicado
$Buscarequipo="SELECT * FROM equipo_extraccion where id_equipo_extraccion='$NoEquipo' and id_equipo='$idEquipo'";
$queryequipo=pg_query($conexion,$Buscarequipo);
if(pg_num_rows($queryequipo)==0){
    $Buscraa="SELECT MAX(identificador) FROM equipo_extraccion where id_equipo_extraccion='$NoEquipo'";
    $querya=pg_query($conexion,$Buscraa);
    $row=pg_fetch_assoc($querya);
    $identificador=$row['max']+1;
    $VEr_Equipo=$NoEquipo.'1';
    $identificador_equipo_extraccion=$No_registro.$identificador.'1';
    $crearEquipo="INSERT INTO public.equipo_extraccion(
        id_equipo_extraccion, identificador, version_equipo_extraccion, id_equipo, version_equipo, ver_equipo_extraccion,identificador_equipo_extraccion)
        VALUES ('$NoEquipo', '$identificador', '1', '$idEquipo', '$EquiMax', '$VEr_Equipo','$identificador_equipo_extraccion');";
    $crear=pg_query($conexion,$crearEquipo);
    echo 1;
}else{
    echo 2;
}







?>