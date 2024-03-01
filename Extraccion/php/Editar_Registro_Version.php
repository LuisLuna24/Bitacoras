<?php
require "../../php/conexion.php";
session_start();


//Recauda los datos del formulario
$Reactivo=$_SESSION['RegistroExtraN'];
$No_Reactivo=$_POST['Registro_Exteracion'];
$Fecha=date("Y-m-d", strtotime($_POST['Fecha_Exteracion']));
$Metodo=$_POST['Metodo_Exteracion'];
$Analisis=$_POST['Analisis_Select'];
$Area=$_POST['Area_Select'];
$Conc_ag_ul=$_POST['Conc_Exteracion'];
$Dato_280=$_POST['280_Exteracion'];
$Dato_230=$_POST['230_Exteracion'];

//Buscar Datos del Regitro
$BuscarRegistro="SELECT MAX(version_registro) ,id_extracion, no_registro, version_extracion, identificdor_extracion, id_folio, version_folio, fecha, id_metodo, id_analisis, id_area, conc_ng_ul, dato_260_280, dato_260_230, archivo, id_equipo_extraccion, identificador_equipo, version_equipo, id_usuario, id_admin, version_registro, identificador_registro
FROM public.bitacora_extraccion where identificador_registro='$Reactivo' GROUP BY id_extracion, no_registro, version_extracion, identificdor_extracion, id_folio, version_folio, fecha, id_metodo, id_analisis, id_area, conc_ng_ul, dato_260_280, dato_260_230, archivo, id_equipo_extraccion, identificador_equipo, version_equipo, id_usuario, id_admin, version_registro, identificador_registro;";
$queryRegistro=pg_query($conexion,$BuscarRegistro);
$rowReg=pg_fetch_assoc($queryRegistro);
$Maximo=$rowReg['max']+1;

//Valida si el Metodo no fue cambiado
if($Metodo==0){
    $Metodo=$rowReg['id_metodo'];
}else{
    $Metodo=$_POST['Metodo_Exteracion'];
}
//Valida si el analisis no fue cambiado
if($Analisis==0){
    $Analisis=$rowReg['id_analisis'];
}else{
    $Analisis=$_POST['Analisis_Select'];
}
//Valida si el Area no fue cambiado
if($Area==0){
    $Area=$rowReg['id_area'];
}else{
    $Area=$_POST['Area_Select'];
}

if(isset($rowReg['id_admin'])){
    $Admin=$rowReg['id_admin'].",";
    $id_admin="id_admin,";
}else{
    $Admin="";
    $id_admin="";
}

try{
    
    $Instertar="INSERT INTO public.bitacora_extraccion(
        id_extracion, no_registro, version_extracion, identificdor_extracion, id_folio, version_folio, fecha, id_metodo, id_analisis, id_area, conc_ng_ul, dato_260_280, dato_260_230, archivo, id_equipo_extraccion, identificador_equipo, version_equipo, id_usuario, $id_admin version_registro, identificador_registro)
        VALUES ('".$rowReg['id_extracion']."', '".$rowReg['no_registro']."', '".$rowReg['version_extracion']."', '".$rowReg['identificdor_extracion']."', '".$rowReg['id_folio']."', '".$rowReg['version_folio']."', '$Fecha', '$Metodo', '$Analisis', '$Area', '$Conc_ag_ul', '$Dato_280', '$Dato_230', '".$rowReg['archivo']."', '".$rowReg['id_equipo_extraccion']."', '".$rowReg['identificador_equipo']."', '".$rowReg['version_equipo']."', '".$rowReg['id_usuario']."', $Admin '$Maximo', '".$rowReg['identificador_registro']."');";
    pg_query($conexion,$Instertar);
    echo 1;
}catch(Exception $e){
    echo $e;
}



?>