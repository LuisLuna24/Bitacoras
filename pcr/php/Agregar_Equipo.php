<?php
require "../../php/conexion.php";
session_start();

$Folio=$_SESSION["Pcr_Folio"];

$Equipo=$_POST['Pcr_Equipo'];
//Buscar Identificador maximo
$Canmax="SELECT MAX(identificador) FROM equipo_pcr where id_equipo_pcr='$Folio';";
$Canquery=pg_query($conexion,$Canmax);
$rowcan=pg_fetch_assoc($Canquery);
$Identificador=$rowcan['max']+1;
$no_registro=$_POST['Pcr_Registros'];

//Bucar Version de especie maxima
$Especiemax="SELECT MAX(vercion_equipo) FROM public.equipo where id_equipo = '$Equipo';";
$Especiequery=pg_query($conexion,$Especiemax);
$rowesp=pg_fetch_assoc($Especiequery);
$versionespe=$rowesp['max'];


$BuscarExistente="SELECT id_equipo FROM equipo_pcr where id_equipo='$Equipo' and id_equipo_pcr='$Folio'";
$Existente=pg_query($conexion,$BuscarExistente);

if(pg_num_rows($Existente)==0){
    //Realiza la insercion en caso de no manda error 
    try{
        $Ver_equipo=$Folio.'1';
        $identificador_equipo_pcr=$no_registro.$Identificador.'1';
        $Insertar="INSERT INTO public.equipo_pcr(
            id_equipo_pcr, identificador, version_equipo_pcr, id_equipo, version_equipo, ver_equipo_pcr,identificador_equipo_pcr)
            VALUES ('$Folio', '$Identificador', '1', '$Equipo', '$versionespe', '$Ver_equipo','$identificador_equipo_pcr');";
        pg_query($conexion,$Insertar);
        echo 1;
    }catch(Exception $e){
        echo "Se produjo un error: " . $e->getMessage();
    }
}else{
    echo 3;
}

?>