<?php
require "conexion.php";

$Bitacora=$_POST['Bit_Reactivos'];

$BuscarMax='SELECT MAX(version_bitacora) FROM version_bitacora where id_vercion_bitacora=4;';
$queryMax=pg_query($conexion,$BuscarMax);
$rowMax=pg_fetch_assoc($queryMax);
$BitacoraMax=$rowMax['max']+1;

try{
    $Actualizar= "INSERT INTO public.version_bitacora(
        id_vercion_bitacora, version_bitacora, nombre_version)
        VALUES ('4', $BitacoraMax, '$Bitacora'); ";
        pg_query($conexion,$Actualizar);
        echo 1;

}catch(Exception $e){
    echo $e->getMessage();
}

?>