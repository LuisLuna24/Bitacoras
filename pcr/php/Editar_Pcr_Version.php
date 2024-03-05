<?php
require "../../php/conexion.php";
session_start();

$RegistroPcr=$_SESSION['RegistroPcr'];


$Buscar="SELECT id_pcr, no_registro, version_pcr, id_folio, identificador_bitacora, id_analisis, fecha, agarosa, voltage, tiempo, sanitizo, tiempouv, id_especie_pcr, identificador_especie, version_especie, archivo, resultado, id_equipo_pcr, identificador_equipo, version_equipo, id_usuario, id_admin, version_folio, version_registro, identificador_registro
FROM public.bitacora_pcr where identificador_registro='$RegistroPcr';";
$query=pg_query($conexion,$Buscar);
$row=pg_fetch_assoc($query);


$BuscarMax="SELECT MAX(version_registro) FROM bitacora_pcr where identificador_registro='$RegistroPcr';";
$queryMax=pg_query($conexion,$BuscarMax);
$rowMax=pg_fetch_assoc($queryMax);

//Folio del nuevo registro
$Folio=$_SESSION["Pcr_Folio"];
//Id del usuario
$Usuario=$_SESSION['id_usuario'];
//Datos a obtener de los campos

if($_POST["Pcr_Analisis"]==0){
    $Analisis=$row["id_analisis"];
}else{
    $Analisis=$_POST["Pcr_Analisis"];
}
$Fecha1=$_POST['Pcr_Fecha'];
$Fecha= date("Y-m-d", strtotime($Fecha1));
$Agarosa=$_POST["Pcr_Agrosa"];
$Voltaje=$_POST["Pcr_Voltage"];
$Tiempo=$_POST["Pcr_Tiempo"];

if(isset($_POST["Sanitizo"])){
    $Sanitizo=$_POST["Sanitizo"];
}else{
    $Sanitizo=$row['sanitizo'];;
}

if(isset($_POST["Tiempouv"])){
    $Tiempouv=$_POST["Tiempouv"];
}else{
    $Tiempouv=$row['tiempouv'];
}

$Resultado=$_POST["Pcr_Resultado"];

//$Imagen=addslashes(file_get_contents($_FILES['Pce_Imagen']['tmp_name']));
//$ImagenCod=mb_convert_encoding($Imagen, 'UTF-8', mb_detect_encoding($Imagen, 'UTF-8, ISO-8859-1'));

try{
    $RegistroVersionMax=$rowMax['max']+1;
    $ActualizarPcr="INSERT INTO public.bitacora_pcr(
        id_pcr, no_registro, version_pcr, id_folio, identificador_bitacora, id_analisis, fecha, agarosa, voltage, tiempo, sanitizo, tiempouv, id_especie_pcr, identificador_especie, version_especie, resultado, id_equipo_pcr, identificador_equipo, version_equipo, id_usuario, version_folio, version_registro, identificador_registro)
        VALUES ('".$row['id_pcr']."', '".$row['no_registro']."', '".$row['version_pcr']."','".$row['id_folio']."' , '".$row['identificador_bitacora']."', '$Analisis', '$Fecha', '$Agarosa','$Voltaje' ,'$Tiempo', '$Sanitizo', '$Tiempouv', '".$row['id_especie_pcr']."','".$row['identificador_especie']."', '".$row['version_especie']."' ,'$Resultado', '".$row['id_equipo_pcr']."', '".$row['identificador_equipo']."', '".$row['version_equipo']."', '$Usuario', '".$row['version_folio']."','$RegistroVersionMax','".$row['identificador_registro']."');";
    pg_query($conexion,$ActualizarPcr);
    echo 1;
}catch(Exception  $e){
    echo $e->getMessage();
}


?>