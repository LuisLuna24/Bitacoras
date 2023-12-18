<?php
require "../../php/conexion.php";
session_start();

$id_Usuario=$_SESSION['id_usuario'];
$Folio=$_SESSION["pcreal_fol"];
$Nombre=$_POST["Nombre"];
$Patogeno=$_POST["Patogeno"];
$Fecha1=$_POST['Fecha'];
$Fecha= date("Y-m-d", strtotime($Fecha1));
$Resultado=$_POST['Resultado'];

$Cantidad=$_POST["Cantidad"];

if(isset($_POST["pcreal_sanitizo"])){
    $Sanitizo=$_POST["pcreal_sanitizo"];
}else{
    $Sanitizo="0";
}

if(isset($_POST['pcreal_uv'])){
    $uv=$_POST['pcreal_uv'];
}else{
    $uv="0";
}

$Obsevaciones=$_POST['pcreal_observaciones'];

for($i=0;$i<$Cantidad;$i++){
    $Insertar="INSERT INTO public.bitacora_pcreal(
        id_pcreal, identificador, no_identificador, id_patogeno, fecha, sanitizo, tiempouv, resultado, observaciones, id_uausario, id_folio)
        VALUES ('$Folio', '$Nombre', $i+1, $Patogeno, '$Fecha', $Sanitizo, $uv, '$Resultado', '$Obsevaciones', '$id_Usuario', '$Folio');";
        pg_query($conexion,$Insertar);
}


?>