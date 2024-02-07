<?php
require "../../php/conexion.php";
session_start();

$_SESSION["pcreal_fol"]=$_GET["No_Folio"];
$Folio=$_GET["No_Folio"];

$BuscarEquipoMaximo="SELECT MAX(version_equipo) FROM equipo_pcreal where id_equipo_pcreal='$Folio'";
$queryEquipomax=pg_query($conexion,$BuscarEquipoMaximo);
$rowEquipomax=pg_fetch_assoc($queryEquipomax);
$EquipoVersion=$rowEquipomax['max'];

$BuscarEquipo="SELECT id_equipo_pcreal, identificador, id_equipo, version_equipo FROM public.equipo_pcreal where id_equipo_pcreal='$Folio' and version_equipo='$EquipoVersion';";
$queryEquipo=pg_query($conexion,$BuscarEquipo);

while($rowEqu=pg_fetch_assoc($queryEquipo)){
    $EquipoMax=$rowEquipomax['max']+1;
    $InsertarEquipo="INSERT INTO public.equipo_pcreal(
        id_equipo_pcreal, identificador, id_equipo, version_equipo)
        VALUES ('$Folio', '".$rowEqu['identificador']."', '".$rowEqu['id_equipo']."', $EquipoMax);";
    pg_query($conexion,$InsertarEquipo);
}

$BuscarDatosMax="SELECT MAX(version_pcreal) FROM birtacora_pcreal where id_folio='$Folio'";
$queryDatosmax=pg_query($conexion,$BuscarDatosMax);
$rowDatosmax=pg_fetch_assoc($queryDatosmax);

$Versiondatos=$rowDatosmax['max'];

$BuscarPcreal="SELECT id_pcreal, no_registro, version_pcreal, identificador, id_folio, id_analisis, fecha, sanitizo, tiempouv, resultado, observaciones, id_equipo_pcreal, id_usuario, id_admin, no_equipo, identificador_bitacora, vercion_equipo
FROM public.birtacora_pcreal where id_folio='$Folio' and version_pcreal='$Versiondatos';";
$queryPcr=pg_query($conexion,$BuscarPcreal);



while($row=pg_fetch_assoc($queryPcr)){
    $VersionMax=$rowDatosmax['max']+1;
    $Identificador=$Folio.$VersionMax;
    $Insertar_Nuevo="INSERT INTO public.birtacora_pcreal(
        id_pcreal, no_registro, version_pcreal, identificador, id_folio, id_analisis, fecha, sanitizo, tiempouv, resultado, observaciones, id_equipo_pcreal, id_usuario, no_equipo, identificador_bitacora, vercion_equipo)
        VALUES ('".$row['id_pcreal']."', '".$row['no_registro']."', '".$rowDatosmax['max']+1 ."', '".$row['identificador']."', '".$row['id_folio']."', '".$row['id_analisis']."', '".$row['fecha']."', '".$row['sanitizo']."', '".$row['tiempouv']."', '".$row['resultado']."', '".$row['observaciones']."', '".$row['id_equipo_pcreal']."', '".$row['id_usuario']."', '".$row['no_equipo']."', '$Identificador', '$EquipoMax');";
        pg_query($conexion,$Insertar_Nuevo);
}

$_SESSION["VercionMax"]=$VersionMax;
$_SESSION["EquipoMax"]=$EquipoMax;

header("Location:../Actualizar_Pcreal.php");

?>