<?php
require "../../php/conexion.php";

//Crear nuevo registro de Extraccion

session_start();

//Obtiene los valores para nuevo registro a través de Ajax
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

//Busca el ID máximo y suma uno para agregar nuevo registro
$Buacrax="SELECT MAX(id_extracion) FROM bitacora_extraccion where id_folio = '$Folio'";
$querymax=pg_query($conexion,$Buacrax);
$row=pg_fetch_assoc($querymax);
$id_extraccion=$row['max']+1;


//Dependiendo de la cantidad de registros de un solo número de registro, los agrega automáticamente 
for($i=0;$i<$Cantidad;$i++){
    $identificador=$Folio.'1';
    $No=$i+1;
    $AgregaExtracion="INSERT INTO public.bitacora_extraccion(
        id_extracion, no_registro, version_extracion, identificdor_extracion, id_folio, version_folio, fecha, id_metodo, id_analisis, id_area, conc_ng_ul, dato_260_280, dato_260_230, id_equipo_extraccion, identificador_equipo, version_equipo, id_usuario)
        VALUES ('$Registro', '$No', '1', '$identificador', '$Folio', '1', '$Fecha', '$Metodo', '$Analisis', '$Area', '$Conc', '$D280', '$D230', '$Folio', '1', '1', '$Usuario');";
    $queryAgregar=pg_query($conexion,$AgregaExtracion);
}




?>