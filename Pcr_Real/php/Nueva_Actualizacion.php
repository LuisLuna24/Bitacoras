<?php
require "../../php/conexion.php";
session_start();

$_SESSION["pcreal_fol"]=$_GET["No_Folio"];
$Folio=$_GET["No_Folio"];

$BuscarDatosMax="SELECT MAX(version_pcreal) FROM bitacora_pcreal where id_folio='$Folio'";
$queryDatosmax=pg_query($conexion,$BuscarDatosMax);
$rowDatosmax=pg_fetch_assoc($queryDatosmax);

$Versiondatos=$rowDatosmax['max'];

$BuscarPcreal="SELECT MAX(version_registro), id_pcreal, version_registro,no_registro, version_pcreal, identificador_bitacora, id_folio, id_analisi, fecha, sanitizo, tiempouv, resultado, observaciones, id_equipo_pcreal, version_equipo, identificador_equipo, id_usuaro, id_admin, archivo, version_folio
FROM public.bitacora_pcreal where id_folio='$Folio' and version_pcreal='$Versiondatos' GROUP BY id_pcreal, version_registro,no_registro, version_pcreal, identificador_bitacora, id_folio, id_analisi, fecha, sanitizo, tiempouv, resultado, observaciones, id_equipo_pcreal, version_equipo, identificador_equipo, id_usuaro, id_admin, archivo, version_folio;";
$queryPcr=pg_query($conexion,$BuscarPcreal);



while($row=pg_fetch_assoc($queryPcr)){
    $VersionMax=$rowDatosmax['max']+1;
    $Identificador=$Folio.$VersionMax;
    $Identificador_Registro=$row['id_pcreal'].$row['no_registro'].$VersionMax.$Folio;

    $Insertar_Nuevo="INSERT INTO public.bitacora_pcreal(
        id_pcreal, no_registro, version_pcreal, identificador_bitacora, id_folio, id_analisi, fecha, sanitizo, tiempouv, resultado, observaciones, id_equipo_pcreal, version_equipo, identificador_equipo, id_usuaro, archivo, version_folio,version_registro, identificador_registro)
        VALUES ('" . $row['id_pcreal'] . "','" . $row['no_registro'] . "' , '$VersionMax', '$Identificador', '$Folio', '" . $row['id_analisi'] . "', '" . $row['fecha'] . "', '" . $row['sanitizo'] . "', '" . $row['tiempouv'] . "', '" . $row['resultado'] . "', '" . $row['observaciones'] . "', '" . $row['id_equipo_pcreal'] . "', '" . $row['version_equipo'] . "', '" . $row['identificador_equipo'] . "', '" . $row['id_usuaro'] . "', '" . $row['archivo'] . "', '" . $row['version_folio'] . "', '" . $row['version_registro'] . "','$Identificador_Registro');";
        pg_query($conexion,$Insertar_Nuevo);
}

$BuscarEquipo="SELECT id_equipo_pcreal, identificador, id_equipo, version_equipo FROM public.equipo_pcreal where id_equipo_pcreal='$Folio' and version_equipo_pcr='$Versiondatos';";
$queryEquipo=pg_query($conexion,$BuscarEquipo);

while($rowEqu=pg_fetch_assoc($queryEquipo)){
    //Buscar la version maxima del equipo 
    $equimax="SELECT MAX(vercion_equipo) FROM equipo where id_equipo='" . $rowEqu['id_equipo'] . "';";
    $queryequimax=pg_query($conexion,$equimax);
    $rowequimax=pg_fetch_assoc($queryequimax);
    $vercionequimax=$rowequimax['max'];

    $Ver_Equipo=$Folio.$VersionMax;
    $InsertarEquipo="INSERT INTO public.equipo_pcreal(
	id_equipo_pcreal, identificador, version_equipo_pcr, id_equipo, version_equipo, ver_equipo_pcreal,version_registro, identificador_registro)
	VALUES ('$Folio', '" . $rowEqu['identificador'] . "', '$VersionMax', '" . $rowEqu['id_equipo'] . "', '$vercionequimax', '$Ver_Equipo');";
    pg_query($conexion,$InsertarEquipo);
}


$_SESSION["VercionMax"]=$VersionMax;
$_SESSION["EquipoMax"]=$VersionMax;

header("Location:../Actualizar_Pcreal.php");

?>