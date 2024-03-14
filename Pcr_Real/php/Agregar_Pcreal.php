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

$identificador=$Folio.'1';

for($i=0;$i<$Cantidad;$i++){
    $No=$i+1;
    $Identificador_Registro=$no_registro.$No.'1'.$Folio;
    $id_especie_pcreal=$Folio.$no_registro.$i+1;

    $Insertar="INSERT INTO public.bitacora_pcreal(
        id_pcreal, no_registro, version_pcreal, identificador_bitacora, id_folio, id_analisi, fecha, sanitizo, tiempouv, resultado, observaciones, id_equipo_pcreal, version_equipo, identificador_equipo, id_usuaro,version_folio,version_registro, identificador_registro,id_especie_pcreal,version_especie_pcreal)
        VALUES ('$no_registro','$No' ,'1', '$identificador', $Folio, '$Analisis', '$Fecha', '$Sanitizo', '$uv', '$Resultado', '$Obsevaciones', '$Folio', '1', '1', '$id_Usuario', '1','1','$Identificador_Registro','$id_especie_pcreal','1');";
        pg_query($conexion,$Insertar);
}


?>