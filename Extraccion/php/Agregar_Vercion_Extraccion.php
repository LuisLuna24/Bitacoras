
<?php
require "../../php/conexion.php";

//Permite agregar nueva extraccion a la vercion nueva de la bitacora 


session_start();

//Obtiene los valores para nuevo registro a través de Ajax
$Usuario=$_SESSION['id_usuario'];
$Folio =$_SESSION['No_Folio'];
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

$VersionMax=$_SESSION["VercionMax"];

//Dependiendo de la cantidad de registros de un solo número de registro, los agrega automáticamente 
for($i=0;$i<$Cantidad;$i++){
    $identificador_bitacora=$Folio.$VersionMax;
    $Identificador_Registro=$Registro.$No.$VersionMax.$Folio;
    
    $AgregaExtracion="INSERT INTO public.bitacora_extraccion(
        id_extracion, no_registro, version_extracion, identificdor_extracion, id_folio, version_folio, fecha, id_metodo, id_analisis, id_area, conc_ng_ul, dato_260_280, dato_260_230, id_equipo_extraccion, identificador_equipo, version_equipo, id_usuario,identificador_registro)
        VALUES ('$Registro', $i+1, $VersionMax, '$identificador_bitacora', '$Folio', '1', '$Fecha', '$Metodo', '$Analisis', '$Area', '$Conc', '$D280', '$D230', '$Folio', '1', '$VersionMax', '$Usuario','$Identificador_Registro');";
    $queryAgregar=pg_query($conexion,$AgregaExtracion);
}




?>