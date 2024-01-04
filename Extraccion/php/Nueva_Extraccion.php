<?php
require "../../php/conexion.php";

session_start();


$Usuario=$_SESSION['id_usuario'];
$Folio =$_SESSION['No_Foli'];
$Registro=$_POST['Registro_Exteracion'];
$Cantidad=$_POST['Cantidad_Exteracion'];
$Fecha=$_POST['Fecha_Exteracion'];
$fmuestreo= date("Y-m-d", strtotime($Fecha));
$Metodo=$_POST['Metodo_Exteracion'];
$Analisis=$_POST['Analisis_Select'];
$Area=$_POST['Area_Select'];
$Conc=$_POST['Conc_Exteracion'];
$D280=$_POST['280_Exteracion'];
$D230=$_POST['230_Exteracion'];

$Buacrax="SELECT MAX(id_extracion) FROM birtacora_extaccion where id_folio = '$Folio'";
$querymax=pg_query($conexion,$Buacrax);
$row=pg_fetch_assoc($querymax);
$id_extraccion=$row['max']+1;



for($i=0;$i<$Cantidad;$i++){
    $identificador_bitacora=$Folio.'-'.$id_extraccion.'-'.$Registro.'-'.$i+1;
    $AgregaExtracion="INSERT INTO public.birtacora_extaccion(
        id_extracion, no_registro, identificador, version_extraccion, id_folio, fecha, id_metodo, id_analisis, id_area, conc_ng_ul, dato_260_280, dato_260_230,  id_equipo_extraccion, id_usuario,identificador_bitacora)
        VALUES ('$id_extraccion', '$Registro', $i+1 , '1', '$Folio', '$fmuestreo', '$Metodo', '$Analisis', '$Area', '$Conc', '$D280', '$D230', $Folio, '$Usuario','$identificador_bitacora');";
    $queryAgregar=pg_query($conexion,$AgregaExtracion);
}




?>