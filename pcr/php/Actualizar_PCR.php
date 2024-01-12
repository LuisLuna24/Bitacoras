<?php
require "../../php/conexion.php";
session_start();

$Folio=$_SESSION["pcr_fol"];
$id_Usuario=$_SESSION['id_usuario'];

$Buscar="SELECT id_pcr, no_registro, version_pcr, identificador, id_folio, id_analisis, fecha, agarosa, voltaje, tiempo, sanitizo, tiempouv, id_especie, resultado, id_equipo_pcr, id_usuario, id_admin, identificador_bitacora, no_equipo
        FROM public.bitacora_pcr where id_folio='$Folio'";
$query=pg_query($conexion,$Buscar);

$Buscarmax='SELECT MAX("version_pcr") FROM public.bitacora_pcr where id_folio='.$Folio;
$querymax=pg_query($conexion,$Buscarmax);
$rowmax=pg_fetch_assoc($querymax);
$vercionmax=$rowmax["max"]+1;


while($row=pg_fetch_assoc($query)){
    $Actualizar="INSERT INTO public.bitacora_pcr(
        id_pcr, no_registro, version_pcr, identificador, id_folio, id_analisis, fecha, agarosa, voltaje, tiempo, sanitizo, tiempouv, id_especie, resultado, id_equipo_pcr, id_usuario, identificador_bitacora, no_equipo)
        VALUES ('".$row['id_pcr']."','".$row['no_registro']."', '".$vercionmax."', '".$row['identificador']."', '".$row['id_folio']."', '".$row['id_analisis']."', '".$row['fecha']."', '".$row['agarosa']."', '".$row['voltaje']."', '".$row['tiempo']."',
        '".$row['sanitizo']."', '".$row['tiempouv']."', '".$row['id_especie']."', '".$row['resultado']."', '".$row['id_equipo_pcr']."', '".$id_Usuario."', '".$row['identificador_bitacora']."','".$row['no_equipo']."');";
    pg_query($conexion,$Actualizar);
}
?>