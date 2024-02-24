<?php
require "../../php/conexion.php";
session_start();

$Folio=$_SESSION["Pcr_Folio"];
$Version=$_SESSION['VersionMax'];

$Especie=$_POST['Pcr_Espceie'];
$No_Registro=$_POST['Pcr_Registros'];

$_SESSION['No_Registro']=$_POST['Pcr_Registros'];

//Buscar Identificador maximo
$Canmax="SELECT MAX(identificador_especie) FROM especie_pcr where id_especie_pcr='$Folio' and no_registro::text='$No_Registro' and version_especie_pcr='$Version'";
$Canquery=pg_query($conexion,$Canmax);
$rowcan=pg_fetch_assoc($Canquery);
$Identificador=$rowcan['max']+1;

//Bucar Version de especie maxima
$Especiemax="SELECT MAX(vercion_especie) FROM public.especie where id_especie = '$Especie';";
$Especiequery=pg_query($conexion,$Especiemax);
$rowesp=pg_fetch_assoc($Especiequery);
$versionespe=$rowesp['max'];

//Buscar si la especie y existe en el registros
$BuscarEspecie="SELECT * FROM public.especie_pcr where id_especie='$Especie' and no_registro::text='$No_Registro' and version_especie_pcr='$Version';";
$Espquery=pg_query($conexion,$BuscarEspecie);

if(pg_num_rows($Espquery)==0){
    //Realiza la insercion en caso de no manda error 
    $Insertar="INSERT INTO public.especie_pcr(
        id_especie_pcr, identificador_especie, version_especie_pcr, id_especie, vercion_especie, no_registro)
        VALUES ('$Folio', '$Identificador', '$Version', '$Especie', '$versionespe', '$No_Registro');";
    pg_query($conexion,$Insertar);
    echo 1;

}else{
    echo 2;
}


?>