<?php
ob_start();
session_start();
$id_Usuario=$_SESSION['id_usuario'];
$Nombre=$_SESSION['nombre'];
$Apellido=$_SESSION['apellido'];
$idBitacora=$_SESSION["idBitacora"];
if($id_Usuario=="" || $id_Usuario==null){
    header("location:index.php");
}else{  ?>