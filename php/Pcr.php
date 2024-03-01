<?php
require "conexion.php";

//Crear nuevo folio de PCR 
session_start();
try {
    //Crea nuevo folio tomando el ultimo folio y sumando uno
    $Buscarfolio="SELECT MAX(id_folio) as folio FROM public.folio_pcr;";
    $query=pg_query($conexion,$Buscarfolio);
    $numfol=pg_fetch_assoc($query);
    $nuevo=$numfol['folio']+1;

    //toma la verion mas alta 
    $id_vercion='2';
    $buscarvercion="SELECT MAX(version_bitacora) FROM version_bitacora where id_vercion_bitacora='$id_vercion'";
    $sqlbuscarvercion=pg_query($conexion,$buscarvercion);
    $num=pg_fetch_assoc($sqlbuscarvercion);
    $vercion=$num['max'];


    //crea nuevo folio
    $crearfolio="INSERT INTO public.folio_pcr(
        id_folio, id_version_bitacora, version_bitacora, fecha_creacion, version_folio)
        VALUES ('$nuevo', '$id_vercion', '$vercion', CURRENT_DATE, '1');";
    pg_query($conexion,$crearfolio);

    $_SESSION["Pcr_Folio"]=$nuevo;
    echo 1;
}catch(PDOException $e){
    echo $e->getMessage();
}

?>