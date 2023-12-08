<?php
require "../../php/conexion.php";

session_start();


$Usuario=$_SESSION['id_usuario'];
$Folio =$_SESSION['No_Foli'];
$Registro=$_POST['Registro_Exteracion'];
$Cantidad=$_POST['Cantidad_Exteracion'];
$Fecha=strtotime($_POST['Fecha_Exteracion']);
$fmuestreo= date("Y-m-d", strtotime($Fecha));
$Metodo=$_POST['Metodo_Exteracion'];
$Analisis=$_POST['Analisis_Select'];
$Area=$_POST['Area_Select'];
$Conc=$_POST['Conc_Exteracion'];
$D280=$_POST['280_Exteracion'];
$D230=$_POST['230_Exteracion'];


for($i=0;$i<$Cantidad;$i++){
    $AgregaExtracion="INSERT INTO public.birtacora_extaccion( no_registro, identificador, folio, fecha, id_metodo, id_analisis, id_area, conc_ng_ul, dato_260_280, dato_260_230, id_equiposeleccionado, id_usuario, version_bitacora, id_folio)
	VALUES ( '$Registro', $i+1 ,$Folio , '$fmuestreo' , '$Metodo', '$Analisis', '$Area', '$Conc', '$D280', '$D230', '$Folio', '$Usuario', 'BBM/GIS/BE 13-04', '$Folio');";
    $queryAgregar=pg_query($conexion,$AgregaExtracion);
}




?>