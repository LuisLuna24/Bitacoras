<?php
require "../../php/conexion.php";
session_start();

$id_usuario=$_SESSION['id_usuario'];
$Identifiador=$_GET["Validar"];
$_SESSION['No_Folio'];

$Validar="UPDATE public.bitacora_extraccion
    SET id_admin=$id_usuario
    WHERE identificdor_extracion='$Identifiador';";
pg_query($conexion,$Validar);

header('Location: ../Verciones_Extraccion.php');


?>