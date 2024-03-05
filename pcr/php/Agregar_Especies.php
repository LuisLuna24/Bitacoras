<?php
require "../../php/conexion.php";
session_start();

$Folio=$_SESSION["Pcr_Folio"];

$Especie=$_POST['Pcr_Espceie'];
$Registro=$_POST['Pcr_Registros'];
$Resultado=$_POST['Pcr_Resultado'];
$Cantidad=$_POST['Pcr_Cantidad'];

$_SESSION['No_Registro']=$Registro;

//Buscar Identificador maximo
$Canmax="SELECT MAX(identificador_especie) FROM especie_pcr where id_especie_pcr='$Folio' and registro::text='$Registro'";
$Canquery=pg_query($conexion,$Canmax);
$rowcan=pg_fetch_assoc($Canquery);
$Identificador=$rowcan['max']+1;

//Bucar Version de especie maxima
$Especiemax="SELECT MAX(vercion_especie) FROM public.especie where id_especie = '$Especie';";
$Especiequery=pg_query($conexion,$Especiemax);
$rowesp=pg_fetch_assoc($Especiequery);
$versionespe=$rowesp['max'];

//Buscar si la especie y existe en el registros
$BuscarEspecie="SELECT * FROM public.especie_pcr where id_especie='$Especie' and no_registro::text='$Registro';";
$Espquery=pg_query($conexion,$BuscarEspecie);


if(pg_num_rows($Espquery)==0){
    //Realiza la insercion en caso de no manda error 
    for($i=0;$i<$Cantidad;$i++){
        $No_Registro=$i+1;
        $Identificador_Registro=$Registro.$No_Registro.'1'.$Folio;
        $Insertar="INSERT INTO public.especie_pcr(
            id_especie_pcr, identificador_especie, version_especie_pcr, registro, no_registro, id_especie, vercion_especie, resultado,identificador_registro)
            VALUES ('$Folio', '$Identificador', '1', '$Registro', '$No_Registro', '$Especie', '$versionespe', '$Resultado','$Identificador_Registro');";
        pg_query($conexion,$Insertar);
        echo 1;
        $_SESSION['Pcr_Registros_Especie']=$Registro;

    }
}else{
    echo 2;
}


?>