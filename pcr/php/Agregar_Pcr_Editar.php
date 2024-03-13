<?php
//Coneccion y secion
require "../../php/conexion.php";
session_start();



$Vercion_Bitacora_pcr=$_SESSION['VersionEquipo'];
$id_Registro=$_SESSION['Registro_Pcr'];
//Datos de la bitacora
$Id_Usuario=$_SESSION['id_usuario'];
$registro=$_POST['Pcr_Registros'];
$Analisisselec=$_POST['Pcr_Analisis'];
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
    $uv='1';
}else{
    $uv="0";
}

//Id_bitacora
$timestamp = time();
$a = date('Y', $timestamp);

$BuscarRegistro="SELECT MAX(version_pcr) as version_pcr, id_pcr, no_registro, id_analisis, version_analsisi, fecha, agarosa, voltage, tiempo, sanitizo, tiempouv, archivo, id_especes_pcr, version_especies_pcr, no_especie_pcr, id_equipo_pcr, version_equipo_pcr, no_equipo_pcr, id_usuario, id_admin, fecha_creacion, fecha_modificacion
FROM public.bitacoras_pcr where id_pcr = '$id_Registro' GROUP By id_pcr, no_registro, id_analisis, version_analsisi, fecha, agarosa, voltage, tiempo, sanitizo, tiempouv, archivo, id_especes_pcr, version_especies_pcr, no_especie_pcr, id_equipo_pcr, version_equipo_pcr, no_equipo_pcr, id_usuario, id_admin, fecha_creacion, fecha_modificacion;";
$queryRegistro=pg_query($conexion,$BuscarRegistro);
$rowRegistro=pg_fetch_assoc($queryRegistro);

    if($Analisisselec==0){
        $Analisis=$rowRegistro['id_analisis'];
        $Version_Analisis=$rowRegistro['version_analsisi'];
    }else{
        $Analisis=$_POST['Pcr_Analisis'];
        $Buscar_Version_Analisis=pg_query($conexion,"SELECT MAX(version_analisis) FROM analisis where id_analisis::text='$Analisis';");
        $rowAnalisis=pg_fetch_array($Buscar_Version_Analisis);
        $Version_Analisis=$rowAnalisis['max'];
    }

    $No=$rowRegistro['id_especes_pcr'];
    if(isset($_POST['Especie_cehck'])){
        $id_especie="'$No',";
        $Version_especie="'$Vercion_Bitacora_pcr',";
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
    $Insertar="INSERT INTO public.bitacoras_pcr(
        id_pcr, version_pcr,no_registro, id_analisis, version_analsisi, fecha, agarosa, voltage, tiempo, sanitizo, tiempouv, ".$D_id_especes_pcr.$D_version_especies_pcr.$D_no_especie_pcr."  id_equipo_pcr, version_equipo_pcr, no_equipo_pcr, id_usuario,fecha_modificacion)
        VALUES ('".$rowRegistro['id_pcr']."', '$Vercion_Bitacora_pcr','".$rowRegistro['no_registro']."', '$Analisis', '$Version_Analisis', '$Fecha', '$Agarosa', '$Voltage', '$Tiempo', '$Sanitizo', '$uv', ".$id_especie.$Version_especie.$No_especie." '".$rowRegistro['id_equipo_pcr']."', '$Vercion_Bitacora_pcr', '1', '$Id_Usuario',CURRENT_DATE);";
        pg_query($conexion,$Insertar);
    echo 1;

?>