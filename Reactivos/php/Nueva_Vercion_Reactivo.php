<?php
require "../../php/conexion.php";
session_start();

$_SESSION["Reactivo"]=$_GET["No_Folio"];
$Folio=$_GET["No_Folio"];

$BuscarDatosMax="SELECT MAX(version_bitacora_reactivo) FROM bitacora_reactivos where id_folio='$Folio'";
$queryDatosmax=pg_query($conexion,$BuscarDatosMax);
$rowDatosmax=pg_fetch_assoc($queryDatosmax);

$Versiondatos=$rowDatosmax['max'];

$BuscarPcreal="SELECT  id_bitacora_reactivo, version_bitacora_reactivo, identificador, id_folio, no_lote, fecha_apertura, fecha_caducidad, id_folio_bitacora, id_usuario, id_admin, id_reactivo, id_version_bitacora, version_bitacora, fecha_elaboracion
FROM public.bitacora_reactivos where id_folio='$Folio' and version_bitacora_reactivo='$Versiondatos';";
$queryPcr=pg_query($conexion,$BuscarPcreal);


while($row=pg_fetch_assoc($queryPcr)){
    $VersionMax=$rowDatosmax['max']+1;
    $Identificador=$Folio.$VersionMax;
    $Insertar_Nuevo="INSERT INTO public.bitacora_reactivos(
        id_bitacora_reactivo, version_bitacora_reactivo, identificador, id_folio, no_lote, fecha_apertura, fecha_caducidad, id_folio_bitacora, id_usuario, id_reactivo, id_version_bitacora, version_bitacora, fecha_elaboracion,identificador_bitacora)
        VALUES ('".$row['id_bitacora_reactivo']."', '$VersionMax', '".$row['identificador']."', '".$row['id_folio']."', '".$row['no_lote']."', '".$row['fecha_apertura']."', '".$row['fecha_caducidad']."', '".$row['id_folio_bitacora']."', '".$row['id_usuario']."', '".$row['id_reactivo']."', '".$row['id_version_bitacora']."', '".$row['version_bitacora']."', CURRENT_DATE,'$Identificador');";
        pg_query($conexion,$Insertar_Nuevo);
}

echo $Insertar_Nuevo;

$_SESSION["VercionMax"]=$VersionMax;

header("Location:../Actualizar_Reactivos.php");

?>