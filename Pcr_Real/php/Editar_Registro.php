<?php
require "../../php/conexion.php";
session_start();

$Registro=$_SESSION['Registro_Pcreal'];
$id_Usuario=$_SESSION['id_usuario'];

$Analisis=$_POST['Patogeno'];
$Fecha=date("Y-m-d", strtotime($_POST['Fecha']));
$Resultado=$_POST['Resultado'];
$Obsevaciones=$_POST['pcreal_observaciones'];


//Busca los datos del registro
$Buscraregistro="SELECT id_pcreal, no_registro, version_pcreal, identificador_bitacora, id_folio, id_analisi, fecha, sanitizo, tiempouv, resultado, observaciones, id_equipo_pcreal, version_equipo, identificador_equipo, id_usuaro, id_admin, archivo, version_folio, version_registro, identificador_registro
FROM public.bitacora_pcreal where identificador_registro='$Registro';";
$queryregistro=pg_query($conexion,$Buscraregistro);
$rowregistro=pg_fetch_assoc($queryregistro);


if(isset($_POST["pcreal_sanitizo"])){
    $Sanitizo=$_POST["pcreal_sanitizo"];
}else{
    $Sanitizo=$rowregistro['sanitizo'];
}

if(isset($_POST['pcreal_uv'])){
    $uv=$_POST['pcreal_uv'];
}else{
    $uv=$rowregistro['tiempouv'];
}

//Buca la versin Maxima del registro
$BuscarMax="SELECT MAX(version_registro),id_folio FROM bitacora_pcreal where  identificador_registro = '$Registro' GROUP BY id_folio";
$queryMax=pg_query($conexion,$BuscarMax);
$rowMax=pg_fetch_assoc($queryMax);
$RegistroMax=$rowMax['max']+1;


$id_especie_pcreal=$rowregistro['id_folio'].$rowregistro['id_pcreal'].$rowregistro['no_registro'];


if(isset($_POST['Check_Espcies'])){
    $D_Especie=",id_especie_pcreal,version_especie_pcreal,no_especie_pcreal";
    $D_Campos_especie=",'$id_especie_pcreal','1','1'";
}else{
    $D_Especie="";
    $D_Campos_especie="";
}

try{
    $Identificador_Registro=$rowregistro['id_pcreal'].$rowregistro['no_registro'].$RegistroMax.$rowregistro['id_folio'];

    $Modificar="INSERT INTO public.bitacora_pcreal(
        id_pcreal, no_registro, version_pcreal, identificador_bitacora, id_folio, id_analisi, fecha, sanitizo, tiempouv, resultado, observaciones, id_equipo_pcreal, version_equipo, identificador_equipo, id_usuaro, archivo, version_folio, version_registro, identificador_registro ".$D_Especie.")
        VALUES ('".$rowregistro['id_pcreal']."', '".$rowregistro['no_registro']."',' $RegistroMax', '".$rowregistro['identificador_bitacora']."', '".$rowregistro['id_folio']."', '$Analisis', '$Fecha', '$Sanitizo', '$uv', '$Resultado', '$Obsevaciones', '".$rowregistro['id_equipo_pcreal']."', '".$rowregistro['version_equipo']."', '".$rowregistro['identificador_equipo']."',' $id_Usuario', '".$rowregistro['archivo']."',  '".$rowregistro['version_folio']."', '$RegistroMax', '$Identificador_Registro' ".$D_Campos_especie.");";
        pg_query($conexion,$Modificar);
        echo 1;
}catch(Exception $e){
    echo $e;
}


?>