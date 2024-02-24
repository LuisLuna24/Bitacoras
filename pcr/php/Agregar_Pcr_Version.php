<?php
require "../../php/conexion.php";
session_start();

//Folio del nuevo registro
$Folio=$_SESSION["Pcr_Folio"];
$Version=$_SESSION['VersionMax'];
//Id del usuario
$Usuario=$_SESSION['id_usuario'];
//Datos a obtener de los campos
$NoRegistro=$_POST["Pcr_Registros"];
$Cantidad=$_POST["Pcr_Cantidad"];
$Analisis=$_POST["Pcr_Analisis"];
$Fecha1=$_POST['Pcr_Fecha'];
$Fecha= date("Y-m-d", strtotime($Fecha1));
$Agarosa=$_POST["Pcr_Agrosa"];
$Voltaje=$_POST["Pcr_Voltage"];
$Tiempo=$_POST["Pcr_Tiempo"];

if(isset($_POST["Sanitizo"])){
    $Sanitizo=$_POST["Sanitizo"];
}else{
    $Sanitizo="0";
}

if(isset($_POST["Tiempouv"])){
    $Tiempouv=$_POST["Tiempouv"];
}else{
    $Tiempouv="0";
}

$Resultado=$_POST["Pcr_Resultado"];
//$Imagen=$_POST["Pce_Imagen"];

//Datos a insertar
for($i=0;$i<$Cantidad;$i++){
    $Cantidad_Dat=$i+1;
    $Identificador=$Folio.$Version;
    $Insertar="INSERT INTO public.bitacora_pcr(
        id_pcr, no_registro, version_pcr, id_folio, identificador_bitacora, id_analisis, fecha, agarosa, voltage, tiempo, sanitizo, tiempouv, id_especie_pcr, identificador_especie, version_especie, resultado, id_equipo_pcr, identificador_equipo, version_equipo, id_usuario, version_folio)
        VALUES ('$NoRegistro', '$Cantidad_Dat', '$Version', '$Folio', '$Identificador', '$Analisis', '$Fecha', '$Agarosa','$Voltaje' ,'$Tiempo', '$Sanitizo', '$Tiempouv', '$Folio', '1', '$Version', '$Resultado', '$Folio', '1', '$Version', '$Usuario', '$Version');";
    pg_query($conexion,$Insertar);
}
echo $Cantidad;

?>