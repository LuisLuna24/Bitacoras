<?php
require "../../php/conexion.php";
session_start();

if(isset($_GET['No_Folio'])){
    $Folio=$_GET['No_Folio'];
}else{
    $Folio=$_SESSION["pcr_fol"];
}

$Identificador=$_GET['Identificador'];

$Eliminar="DELETE FROM bitacora_pcr where id_pcr='$Folio' and identificador='$Identificador'";
pg_query($conexion,$Eliminar);


header("Location: ../Bitacora_Pcr.php");
?>