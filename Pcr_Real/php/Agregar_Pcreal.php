<?php
require "../../php/conexion.php";
session_start();

$Folio=$_SESSION["pcreal_fol"];
$Nombre
$Patogeno
$Fecha1=$_POST['Fecha'];
$Fecha= date("Y-m-d", strtotime($Fecha1));
$Resultado

if(isset($_POST['pcreal_sanitizo']){
    $Sanitizo= $_POST['pcreal_sanitizo'];
}else{
    $Sanitizo="0";
}

if(isset($_POST['pcreal_uv']){
    $uv= $_POST['pcreal_uv'];
}else{
    $uv="0";
}

?>