<?php
require "../../php/conexion.php";
session_start();


$_SESSION["pcr_fol"]=$_GET["No_Folio"];
$Folio=$_GET["No_Folio"];


$BuscarEquipoMaximo="SELECT MAX(version_equipo) FROM equipo_pcr where id_equipo_pcr='$Folio'";
$queryEquipomax=pg_query($conexion,$BuscarEquipoMaximo);
$rowEquipomax=pg_fetch_assoc($queryEquipomax);
$EquipoVersion=$rowEquipomax['max'];

$BuscarEquipo="SELECT id_equipo_pcr, identificador, id_equipo, version_equipo FROM public.equipo_pcr where id_equipo_pcr='$Folio' and version_equipo='$EquipoVersion';";
$queryEquipo=pg_query($conexion,$BuscarEquipo);

while($rowEqu=pg_fetch_assoc($queryEquipo)){
    $EquipoMax=$rowEquipomax['max']+1;
    $InsertarEquipo="INSERT INTO public.equipo_pcr(
        id_equipo_pcr, identificador, id_equipo, version_equipo)
        VALUES ('$Folio', '".$rowEqu['identificador']."', '".$rowEqu['id_equipo']."', $EquipoMax);";
    pg_query($conexion,$InsertarEquipo);
}

$BuscarDatosMax="SELECT MAX(version_pcr) FROM bitacora_pcr where id_folio='$Folio'";
$queryDatosmax=pg_query($conexion,$BuscarDatosMax);
$rowDatosmax=pg_fetch_assoc($queryDatosmax);

$Versiondatos=$rowDatosmax['max'];

$BuscarPcreal="SELECT id_pcr, no_registro, version_pcr, identificador, id_folio, id_analisis, fecha, agarosa, voltaje, tiempo, sanitizo, tiempouv, id_especie, resultado, id_equipo_pcr, id_usuario, id_admin, identificador_bitacora, no_equipo, vercion_equipo
FROM public.bitacora_pcr where id_folio='$Folio' and version_pcr='$Versiondatos';";
$queryPcr=pg_query($conexion,$BuscarPcreal);

while($rowR=pg_fetch_assoc($queryPcr)){
    $VersionMax=$rowDatosmax['max']+1;
    $Identificador=$Folio.$VersionMax;
    $Insertar="INSERT INTO public.bitacora_pcr(
        id_pcr, no_registro, version_pcr, identificador, id_folio, id_analisis, fecha, agarosa, voltaje, tiempo, sanitizo, tiempouv, id_especie, resultado, id_equipo_pcr, id_usuario,  identificador_bitacora, no_equipo,vercion_equipo)
        VALUES ('".$rowR['id_pcr']."', '".$rowR['no_registro']."', '".$VersionMax."', '".$rowR['identificador']."', '".$rowR['id_folio']."','".$rowR['id_analisis']."', '".$rowR['fecha']."', '".$rowR['agarosa']."', '".$rowR['voltaje']."', '".$rowR['tiempo']."', '".$rowR['sanitizo']."', '".$rowR['tiempouv']."', '".$rowR['id_especie']."', '".$rowR['resultado']."', '".$rowR['id_equipo_pcr']."', '".$rowR['id_usuario']."', '".$Identificador."', '".$rowR['no_equipo']."',$VersionMax);";
        pg_query($conexion,$Insertar);
}

$_SESSION['VercionMax']=$VersionMax;


header("Location:../Actualizar_Pcr.php");

?>