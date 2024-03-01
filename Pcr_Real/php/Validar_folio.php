<?php
require "../../php/conexion.php";
session_start();

$id_usuario=$_SESSION['id_usuario'];
$Identifiador=$_GET["Validar"];

$Validar="UPDATE public.bitacora_pcreal
    SET id_admin='$id_usuario'
    WHERE identificador_bitacora='$Identifiador';";
pg_query($conexion,$Validar);

header('Location: ../Verciones_AnterioresPcreal.php');


?>