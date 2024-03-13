<?php
//Coneccion y secion
require "../../php/conexion.php";
session_start();

//Datos de la bitacora
$registro=$_POST['Pcr_Registros'];
$Cantidad=$_POST['Pcr_Cantidad'];
$Equipo=$_POST['Pcr_Equipo'];
//Datos de la especie
$queryVersionEquipo=pg_query($conexion,"SELECT MAX(version_equipo) FROM equipos where id_equipo='$Equipo'");
$rowVersionEquipo=pg_fetch_assoc($queryVersionEquipo);
$version_equipo=$rowVersionEquipo['max'];

//No de especie
$_SESSION["No_Equipo_Pcr"]=$registro;
$sql="SELECT max(no_equipo_pcr) FROM equipos_pcr WHERE id_equipo_pcr='".$registro."_".'1'."'";
$resultado=pg_query($conexion,$sql);
$fila=pg_fetch_array($resultado);
$no_equipo=$fila['max']+1;

$id_equipo_pcr=$registro."_".'1';
$buscarEspecie=pg_query($conexion,"SELECT * FROM equipos_pcr where id_equipo_pcr='$id_equipo_pcr' and id_equipo='$Equipo';");

if(pg_num_rows($buscarEspecie)==0){
    for($i=0;$i<$Cantidad;$i++){
        $id_equipo=$registro.'_'.$i+1;
        $Insertar="INSERT INTO public.equipos_pcr(
            id_equipo_pcr, version_equipo_pcr, no_equipo_pcr, id_equipo, version_equipo)
            VALUES ($id_equipo, '1', '$no_equipo', '$Equipo', '$version_equipo');";
        pg_query($conexion,$Insertar);
    }
    echo 1;
}else{
    echo 2;
}



?>