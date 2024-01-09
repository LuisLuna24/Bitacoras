<?php
require "../../php/conexion.php";
session_start();

$id_Usuario=$_SESSION['id_usuario'];
$Folio=$_SESSION["pcreal_fol"];
$no_registro=$_POST["Nombre"];
$Analisis=$_POST["Patogeno"];
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

$Buacrax="SELECT MAX(id_pcreal) FROM birtacora_pcreal where id_folio = '$Folio'";
$querymax=pg_query($conexion,$Buacrax);
$row=pg_fetch_assoc($querymax);
$id_pcreal=$row['max']+1;


for($i=0;$i<$Cantidad;$i++){
    $Insertar="INSERT INTO public.birtacora_pcreal(
        id_pcreal, no_registro, version_pcreal, identificador, id_folio, id_analisis, fecha, sanitizo, tiempouv, resultado, observaciones, id_equipo_pcreal, id_usuario)
        VALUES ('$id_pcreal', '$no_registro', 1, $i+1, '$Folio', '$Analisis', '$Fecha', '$Sanitizo', '$uv', '$Resultado', '$Obsevaciones', '$Folio', '$id_Usuario');";
        pg_query($conexion,$Insertar);
}


?>