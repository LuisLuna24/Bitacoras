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
    if(isset($_POST['Check_Espcies'])){
        $D_Especie=",id_especie_pcreal,version_especie_pcreal,no_especie_pcreal";
        $D_Campos_especie=",'$id_especie_pcreal','1','1'";
    }else{
        $D_Especie="";
        $D_Campos_especie="";
    }

    $Insertar="INSERT INTO public.bitacora_pcreal(
        id_pcreal, no_registro, version_pcreal, identificador_bitacora, id_folio, id_analisi, fecha, sanitizo, tiempouv, resultado, observaciones, id_equipo_pcreal, version_equipo, identificador_equipo, id_usuaro,version_folio,version_registro, identificador_registro ".$D_Especie.")
        VALUES ('$no_registro','$No' ,'1', '$identificador', $Folio, '$Analisis', '$Fecha', '$Sanitizo', '$uv', '$Resultado', '$Obsevaciones', '$Folio', '1', '1', '$id_Usuario', '1','1','$Identificador_Registro' ".$D_Campos_especie.");";
        pg_query($conexion,$Insertar);
}


?>