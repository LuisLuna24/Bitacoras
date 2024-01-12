<?php
require "../../php/conexion.php";
session_start();

$id_Usuario=$_SESSION['id_usuario'];
$Folio=$_SESSION["pcr_fol"];
$Registro=$_POST["Nombre"];
$Cantidad=$_POST["Cantidad"];
$Analisis=$_POST["Analisis"];
$Fecha1=$_POST['Fecha'];
$Fecha= date("Y-m-d", strtotime($Fecha1));
$Agrosa=$_POST["Agrosa"];
$Dato_V=$_POST["Dato_V"];
$Tiempo=$_POST["Tiempo"];
$Especie=$_POST["Especie"];
$Resultado=$_POST["Resultados"];

if(isset($_POST["pcreal_sanitizo"])){
    $Sanitizo=$_POST["pcreal_sanitizo"];
}else{
    $Sanitizo="0";
}

if(isset($_POST['pcreal_uv'])){
    $uv=$_POST['pcreal_uv'];
}else{
    $uv="0";
}


$Buacrax="SELECT MAX(id_pcr) FROM bitacora_pcr where id_folio = '$Folio'";
$querymax=pg_query($conexion,$Buacrax);
$row=pg_fetch_assoc($querymax);
$id_pcr=$row['max']+1;


for($i=0;$i<$Cantidad;$i++){
    $identificador_bitacora=$Folio.'_1';
    $Insertar="INSERT INTO public.bitacora_pcr(
        id_pcr, no_registro, version_pcr, identificador, id_folio, id_analisis, fecha, agarosa, voltaje, tiempo, sanitizo, tiempouv, id_especie, resultado, id_equipo_pcr, id_usuario, identificador_bitacora)
        VALUES ('$id_pcr', '$Registro', '1', $i+1, '$Folio', '$Analisis', '$Fecha', '$Agrosa', '$Dato_V', '$Tiempo', '$Sanitizo', '$uv', '$Especie', '$Resultado', '$Folio', '$id_Usuario', $identificador_bitacora);";
        pg_query($conexion,$Insertar);
}


?>