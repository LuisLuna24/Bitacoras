<?php
require "../../php/conexion.php";
session_start();

$Folio=$_SESSION["Pcr_Folio"];
$Version=$_SESSION['VersionMax'];

$Equipo=$_POST['Pcr_Equipo'];
//Buscar Identificador maximo
$Canmax="SELECT MAX(identificador) FROM equipo_pcr where id_equipo_pcr='$Folio' and version_equipo_pcr='$Version';";
$Canquery=pg_query($conexion,$Canmax);
$rowcan=pg_fetch_assoc($Canquery);
$Identificador=$rowcan['max']+1;

//Bucar Version de especie maxima
$Especiemax="SELECT MAX(vercion_equipo) FROM public.equipo where id_equipo = '$Equipo';";
$Especiequery=pg_query($conexion,$Especiemax);
$rowesp=pg_fetch_assoc($Especiequery);
$versionespe=$rowesp['max'];

//Realiza la insercion en caso de no manda error 
try{
    $Ver_equipo=$Folio.$Version;
    $Insertar="INSERT INTO public.equipo_pcr(
        id_equipo_pcr, identificador, version_equipo_pcr, id_equipo, version_equipo, ver_equipo_pcr)
        VALUES ('$Folio', '$Identificador', '$Version', '$Equipo', '$versionespe', '$Ver_equipo');";
    pg_query($conexion,$Insertar);
    echo 1;
}catch(Exception $e){
    echo "Se produjo un error: " . $e->getMessage();
}

?>