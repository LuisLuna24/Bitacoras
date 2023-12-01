<?php
session_start();


$Version= $_POST['Version'];
$idBitacora="BBM/GIS/".$Version;

$_SESSION["idBitacora"]=$idBitacora;

echo $idBitacora;

?>