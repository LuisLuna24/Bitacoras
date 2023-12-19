<?php

require "../../php/conexion.php";
session_start();


if(isset($_GET['No_nombre'])){
    $Folio=$_GET['No_nombre'];
}else{
    $Folio=$_SESSION["No_nombre"];
}

$EliminarFolio="DELETE FROM bitacora_pcreal where identificador = '$Folio'";
pg_query($conexion,$EliminarFolio);

header("Location: ../Ver_pcreal.php");


?>