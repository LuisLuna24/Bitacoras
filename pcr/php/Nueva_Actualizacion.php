<?php
require "../../php/conexion.php";
session_start();

$Folio=$_GET["No_Folio"];
$_SESSION['No_Folio']=$_GET["No_Folio"];

//Buscar la version maxima del folio 
$BuscarMax="SELECT MAX(version_folio) FROM folio_pcr where id_folio='$Folio';";
$queryMax=pg_query($conexion,$BuscarMax);
$rowMax=pg_fetch_assoc($queryMax);
$Version=$rowMax['max'];
$VersionMax=$rowMax['max']+1;

//Buscar y agregar nueva version del folio de pcr

$BuscarFolio="SELECT * FROM folio_pcr WHERE id_folio='$Folio' and version_folio='$Version';";
$queryFolio=pg_query($conexion,$BuscarFolio);

while($rowFolio=pg_fetch_assoc($queryFolio)){
    $InsertarFolio="INSERT INTO public.folio_pcr(
        id_folio, id_version_bitacora, version_bitacora, fecha_creacion, version_folio)
        VALUES ('".$rowFolio['id_folio']."', '".$rowFolio['id_version_bitacora']."','".$rowFolio['version_bitacora']."',CURRENT_DATE , '$VersionMax');";
        pg_query($conexion,$InsertarFolio);
}

//Buscar y actualizar equipo pcr

$BuscarEquipo="SELECT * FROM equipo_pcr WHERE id_equipo_pcr='$Folio' and version_equipo_pcr='$Version';";
$queryEquipo=pg_query($conexion,$BuscarEquipo);

while($rowEquipo=pg_fetch_assoc($queryEquipo)){
    $IdentificadorEquipo=$Folio.$VersionMax;
    $InsertarEquipo="INSERT INTO public.equipo_pcr(
        id_equipo_pcr, identificador, version_equipo_pcr, id_equipo, version_equipo, ver_equipo_pcr)
        VALUES ('".$rowEquipo['id_equipo_pcr']."', '".$rowEquipo['identificador']."', '$VersionMax', '".$rowEquipo['id_equipo']."', '".$rowEquipo['version_equipo']."', '$IdentificadorEquipo');";
    pg_query($conexion,$InsertarEquipo);
}

//Buscar y actualizar especie

$BuscarEspecie="SELECT * FROM especie_pcr WHERE id_especie_pcr='$Folio' and version_especie_pcr='$Version';";
$queryEspecie=pg_query($conexion,$BuscarEspecie);

while($rowEspecie=pg_fetch_assoc($queryEspecie)){
    $IdentificadorEspecie=$Folio.$VersionMax;
    $InsertarEspecie="INSERT INTO public.especie_pcr(
        id_especie_pcr, identificador_especie, version_especie_pcr, id_especie, vercion_especie, no_registro)
        VALUES ('".$rowEspecie['id_especie_pcr']."', '".$rowEspecie['identificador_especie']."', '$VersionMax', '".$rowEspecie['id_especie']."', '".$rowEspecie['vercion_especie']."', '".$rowEspecie['no_registro']."');";
    pg_query($conexion,$InsertarEspecie);

}

//Buscar y actualizar Bitacora de pcr

$BuscarBitacora="SELECT * FROM bitacora_pcr WHERE id_folio='$Folio' and version_pcr='$Version';";
$queryBitacora=pg_query($conexion,$BuscarBitacora);

while($row=pg_fetch_assoc($queryBitacora)){
    $Identificador=$Folio.$VersionMax;
    $InsertarBitacora="INSERT INTO public.bitacora_pcr(
        id_pcr, no_registro, version_pcr, id_folio, identificador_bitacora, id_analisis, fecha, agarosa, voltage, tiempo, sanitizo, tiempouv, id_especie_pcr, identificador_especie, version_especie, archivo, resultado, id_equipo_pcr, identificador_equipo, version_equipo, id_usuario, version_folio)
        VALUES ('".$row['id_pcr']."', '".$row['no_registro']."', '$VersionMax', '".$row['id_folio']."', '$Identificador', '".$row['id_analisis']."', '".$row['fecha']."', '".$row['agarosa']."', '".$row['voltage']."', '".$row['tiempo']."', '".$row['sanitizo']."', '".$row['tiempouv']."', '".$row['id_especie_pcr']."', '".$row['identificador_especie']."', '$VersionMax', '".$row['archivo']."', '".$row['resultado']."', '".$row['id_equipo_pcr']."', '".$row['identificador_equipo']."', '$VersionMax', '".$row['id_usuario']."', '$VersionMax');";
    pg_query($conexion,$InsertarBitacora);
}


$_SESSION['VersionMax']=$VersionMax;
header("Location:../Actualizar_Pcr.php");

?>