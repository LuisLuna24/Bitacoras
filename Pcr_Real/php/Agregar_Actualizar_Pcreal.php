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

$Version=$_SESSION["EquipoMax"];

$identificador=$Folio.$Version;

for($i=0;$i<$Cantidad;$i++){
    $No=$i+1;
    $Identificador_Registro=$no_registro.$No.$Version.$Folio;
    $Insertar="INSERT INTO public.bitacora_pcreal(
        id_pcreal, no_registro, version_pcreal, identificador_bitacora, id_folio, id_analisi, fecha, sanitizo, tiempouv, resultado, observaciones, id_equipo_pcreal, version_equipo, identificador_equipo, id_usuaro, version_folio,version_registro, identificador_registro)
        VALUES ('$no_registro', '$No', '$Version' ,'$identificador', '$Folio', '$Analisis', '$Fecha', '$Sanitizo', '$uv', '$Resultado', '$Obsevaciones', '$Folio', '$Version', '1', '$id_Usuario',  '$Version','1','$Identificador_Registro');";
        pg_query($conexion,$Insertar);
}


?>