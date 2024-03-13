<?php
//Coneccion y secion
require "../../php/conexion.php";
session_start();

//Datos de la bitacora
$Id_Usuario=$_SESSION['id_usuario'];
$registro=$_POST['Pcr_Registros'];
$Cantidad=$_POST['Pcr_Cantidad'];
$Analisis=$_POST['Pcr_Analisis'];
$Buscar_Version_Analisis=pg_query($conexion,"SELECT MAX(version_analisis) FROM analisis where id_analisis::text='$Analisis';");
$rowAnalisis=pg_fetch_array($Buscar_Version_Analisis);
$Version_Analisis=$rowAnalisis['max'];
$Fecha=date("Y-m-d", strtotime($_POST['Pcr_Fecha']));
$Agarosa=$_POST['Pcr_Agrosa'];
$Voltage=$_POST['Pcr_Voltage'];
$Tiempo=$_POST['Pcr_Tiempo'];
if(isset($_POST['Sanitizo'])){
    $Sanitizo=$_POST['Sanitizo'];
}else{
    $Sanitizo="0";
}
if(isset($_POST['Tiempouv'])){
    $uv=$_POST['Tiempouv'];
}else{
    $uv="0";
}

//Id_bitacora
$timestamp = time();
$a = date('Y', $timestamp);
for($i=0;$i<$Cantidad;$i++){
    $No_registro=$registro.'_'.$i+1;
    $No=$registro.$i+1;
    if(isset($_POST['Especie_cehck'])){
        $id_especie="'$No',";
        $Version_especie="'1',";
        $No_especie="'1',";

        $D_id_especes_pcr='id_especes_pcr,';
        $D_version_especies_pcr='version_especies_pcr,';
        $D_no_especie_pcr='no_especie_pcr,';
    }else{
        $id_especie='';
        $Version_especie='';
        $No_especie='';
        $D_id_especes_pcr='';
        $D_version_especies_pcr='';
        $D_no_especie_pcr='';
    }
    $id_equipo=$registro.'_'.$i+1;
    $id_pcr=$a.'0'.$registro.'_'.$i+1;
    $_SESSION['Id_Pcr_bitacora']=$id_pcr;
    $Insertar="INSERT INTO public.bitacoras_pcr(
        id_pcr, no_registro, id_analisis, version_analsisi, fecha, agarosa, voltage, tiempo, sanitizo, tiempouv, ".$D_id_especes_pcr.$D_version_especies_pcr.$D_no_especie_pcr."  id_equipo_pcr, version_equipo_pcr, no_equipo_pcr, id_usuario)
        VALUES ('$id_pcr', '$No_registro', '$Analisis', '$Version_Analisis', '$Fecha', '$Agarosa', '$Voltage', '$Tiempo', '$Sanitizo', '$uv', ".$id_especie.$Version_especie.$No_especie." '$id_equipo', '1', '1', '$Id_Usuario');";
    pg_query($conexion,$Insertar);
    echo 1;
}
?>