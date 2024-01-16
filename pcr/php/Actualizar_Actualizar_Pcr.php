<?php
require "../../php/conexion.php";
session_start();

$_SESSION["pcr_fol"]=$_GET["No_Folio"];
$Folio=$_GET["No_Folio"];

$Buscra="SELECT MAX(version_pcr) FROM bitacora_pcr";
$resultado=pg_query($conexion,$Buscra);
$row=pg_fetch_assoc($resultado);
$Vercionmax=$row['max']+1;


$BuscarEquipo="SELECT id_equipo_pcr, identificador, id_equipo, version_equipo FROM public.equipo_pcr where id_equipo_pcr='$Folio';";
$queryequipo=pg_query($conexion,$BuscarEquipo);
while($rowEqu=pg_fetch_assoc($queryequipo)){
    $InsertarEquipo="INSERT INTO public.equipo_pcr(
        id_equipo_pcr, identificador, id_equipo, version_equipo)
        VALUES ('$Folio', '".$rowEqu['identificador']."', '".$rowEqu['id_equipo']."', $Vercionmax);";
    pg_query($conexion,$InsertarEquipo);
}

$Buacarregistros="SELECT id_pcr, no_registro, version_pcr, identificador, id_folio, id_analisis, fecha, agarosa, voltaje, tiempo, sanitizo, tiempouv, id_especie, resultado, id_equipo_pcr, id_usuario, id_admin, identificador_bitacora, no_equipo,vercion_equipo
                FROM public.bitacora_pcr;";
$resultadoReg=pg_query($conexion,$Buacarregistros);
$identificador_bitacora=$Folio.$Vercionmax;

while($rowR=pg_fetch_assoc($resultadoReg)){
    $Insertar="INSERT INTO public.bitacora_pcr(
        id_pcr, no_registro, version_pcr, identificador, id_folio, id_analisis, fecha, agarosa, voltaje, tiempo, sanitizo, tiempouv, id_especie, resultado, id_equipo_pcr, id_usuario,  identificador_bitacora, no_equipo,vercion_equipo)
        VALUES ('".$rowR['id_pcr']."', '".$rowR['no_registro']."', '".$Vercionmax."', '".$rowR['identificador']."', '".$rowR['id_folio']."','".$rowR['id_analisis']."', '".$rowR['fecha']."', '".$rowR['agarosa']."', '".$rowR['voltaje']."', '".$rowR['tiempo']."', '".$rowR['sanitizo']."', '".$rowR['tiempouv']."', '".$rowR['id_especie']."', '".$rowR['resultado']."', '".$rowR['id_equipo_pcr']."', '".$rowR['id_usuario']."', '".$identificador_bitacora."', '".$rowR['no_equipo']."',$Vercionmax);";
    pg_query($conexion,$Insertar);
}

$_SESSION['VercionMax']=$Vercionmax;




header("Location:../Actualizar_Pcr.php");

?>