<?php
require "conexion.php";

$BuscarExtraccion= "SELECT MAX(version_bitacora), nombre_version,id_vercion_bitacora FROM version_bitacora where id_vercion_bitacora= 1 GROUP BY nombre_version,id_vercion_bitacora ,version_bitacora ORDER BY version_bitacora DESC;";
$queryExtraccion=pg_query($conexion,$BuscarExtraccion);
$rowExt=pg_fetch_assoc($queryExtraccion);

$BuscarReactivo= "SELECT MAX(version_bitacora), nombre_version,id_vercion_bitacora FROM version_bitacora where id_vercion_bitacora= 4 GROUP BY nombre_version,id_vercion_bitacora ,version_bitacora ORDER BY version_bitacora DESC;";
$queryReactivo=pg_query($conexion,$BuscarReactivo);
$rowRea=pg_fetch_assoc($queryReactivo);

$BuscarPcr= "SELECT MAX(version_bitacora), nombre_version,id_vercion_bitacora FROM version_bitacora where id_vercion_bitacora= 2 GROUP BY nombre_version,id_vercion_bitacora ,version_bitacora ORDER BY version_bitacora DESC;";
$queryPcr=pg_query($conexion,$BuscarPcr);
$rowPcr=pg_fetch_assoc($queryPcr);

$BuscarReal= "SELECT MAX(version_bitacora), nombre_version,id_vercion_bitacora FROM version_bitacora where id_vercion_bitacora= 3 GROUP BY nombre_version,id_vercion_bitacora ,version_bitacora ORDER BY version_bitacora DESC;";
$queryReal=pg_query($conexion,$BuscarReal);
$rowReal=pg_fetch_assoc($queryReal);

$output=[];

$output["Reactivo"]=$rowRea['nombre_version'];
$output["Extraccion"]=$rowExt['nombre_version'];
$output["Pcr"]=$rowPcr['nombre_version'];
$output["Pcreal"]=$rowReal['nombre_version'];

echo json_encode($output, JSON_UNESCAPED_UNICODE);
?>