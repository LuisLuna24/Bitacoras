<?php
require "../../php/conexion.php";
session_start();

$id_usuario=$_SESSION['id_usuario'];
$Identifiador=$_GET["Validar"];
$_SESSION['No_Folio_Ver'];

$Validar="UPDATE public.bitacora_reactivos
    SET id_admin='$id_usuario'
    WHERE identificador_bitacora='$Identifiador';";
pg_query($conexion,$Validar);

header('Location: ../Ver_Verciones_Reactivo.php');


?>