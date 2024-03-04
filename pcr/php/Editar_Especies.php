<?php
require "../../php/conexion.php";
session_start();

$Folio=$_SESSION["Pcr_Folio"];
$Especie=$_POST['Pcr_Espceie'];
$Resultado=$_POST['Pcr_Resultado'];

$RegistroPcr=$_SESSION['RegistroPcr'];


//Buscar Identificador maximo
$Canmax="SELECT MAX(identificador_especie) FROM especie_pcr where identificador_registro='$RegistroPcr'";
$Canquery=pg_query($conexion,$Canmax);
$rowcan=pg_fetch_assoc($Canquery);
$Identificador=$rowcan['max']+1;

//Bucar Version de especie maxima
$Especiemax="SELECT MAX(vercion_especie) FROM public.especie where id_especie = '$Especie';";
$Especiequery=pg_query($conexion,$Especiemax);
$rowesp=pg_fetch_assoc($Especiequery);
$versionespe=$rowesp['max'];

//Buscar si la especie y existe en el registros
$BuscarEspecie="SELECT * FROM public.especie_pcr where id_especie='$Especie' and identificador_registro='$RegistroPcr';";
$Espquery=pg_query($conexion,$BuscarEspecie);


$BuscarRegistro="SELECT no_registro,registro FROM public.especie_pcr where identificador_registro='$RegistroPcr';";
$Regpquery=pg_query($conexion,$BuscarRegistro);
$RowMax=pg_fetch_assoc($Regpquery);
$No_Registro=$RowMax['no_registro'];
$Registro=$RowMax['registro'];


if(pg_num_rows($Espquery)==0){
    //Realiza la insercion en caso de no manda error 
    $Insertar="INSERT INTO public.especie_pcr(
        id_especie_pcr, identificador_especie, version_especie_pcr, registro, no_registro, id_especie, vercion_especie, resultado,identificador_registro)
        VALUES ('$Folio', '$Identificador', '1', '$Registro', '$No_Registro', '$Especie', '$versionespe', '$Resultado','$RegistroPcr');";
    pg_query($conexion,$Insertar);
    echo 1;
}else{
    $Actualizar="UPDATE public.especie_pcr SET resultado='$Resultado' WHERE identificador_registro='$RegistroPcr';";
    pg_query($conexion,$Actualizar);
    echo 2;    
}


?>