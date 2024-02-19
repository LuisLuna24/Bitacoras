<?php
require "../../php/conexion.php";
session_start();

//Id de la especie 
$id_Especie=$_SESSION['Especie_Anterior'];

//Bucar Vercion maxima de la especie

$consulta="SELECT MAX(vercion_especie) FROM public.especie WHERE id_especie = $id_Especie";
$resultado=pg_query($conexion,$consulta);
$row=pg_fetch_assoc($resultado);
$versionid= $row['max']+1;

$Nombre = $_POST['Nombre_Especie'];
//Actulizar Especie

$actualizar="UPDATE public.especie SET vercion_especie='$versionid' ,nombre='$Nombre'
WHERE id_especie='$id_Especie';";
$resultadoactualizar=pg_query($conexion,$actualizar);
echo 1;

?>