<?php
require "../../php/conexion.php";
session_start();

$id_Usuario=$_SESSION['id_usuario'];
$Folio=$_SESSION["pcr_fol"];
$Nombre=$_POST["Nombre"];
$Cantidad=$_POST["Cantidad"];
$Analisis=$_POST["Analisis"];
$Fecha1=$_POST['Fecha'];
$Fecha= date("Y-m-d", strtotime($Fecha1));
$Agrosa=$_POST["Agrosa"];
$Dato_V=$_POST["Dato_V"];
$Tiempo=$_POST["Tiempo"];



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

for($i=0;$i<$Cantidad;$i++){
    $Insertar="INSERT INTO public.bitacora_pcr(
        id_pcr, identificador, nobre, fecha, id_analisis, agrosa, dato_v, tiemp, id_equipo_pcr, id_usuario, sanitizo, tiempouv,id_folio)
        VALUES ('$Folio', $i+1, '$Nombre', '$Fecha', '$Analisis', '$Agrosa', '$Dato_V', '$Tiempo', '$Folio', '$id_Usuario', '$Sanitizo', '$uv','$Folio');";
        pg_query($conexion,$Insertar);
}


?>