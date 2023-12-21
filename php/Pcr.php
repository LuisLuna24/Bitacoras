<?php
require "conexion.php";

session_start();

$Buscarfolio="SELECT MAX(folio) as folio FROM public.folio_pcr;";
$query=pg_query($conexion,$Buscarfolio);

$numfol=pg_fetch_assoc($query);

$nuevo=$numfol['folio']+1;

$crearfolio="INSERT INTO public.folio_pcr(id_folio, folio) VALUES ($nuevo, $nuevo);";
pg_query($conexion,$crearfolio);

$_SESSION["pcr_fol"]=$nuevo;
echo 1;


?>