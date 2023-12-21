<?php
require "../../php/conexion.php";
session_start();

$Id=$_SESSION['identificador'];

$Reactivo=$_POST['Reactivos_Select'];

$Lote=$_POST['Lote_Reactivo'];

$Apertura1=$_POST['Apertura_Reactivo'];
$Apertura= date("Y-m-d", strtotime($Apertura1));

$Caducidad1=$_POST['Caducidad_Reactivo'];
$Caducidad= date("Y-m-d", strtotime($Caducidad1));

$buscar="SELECT * FROM bitacora_reactivos where id_bit_reactivo='$Id'";
$query=pg_query($conexion,$buscar);
if(pg_num_rows($query)>0){
    $actualizar="UPDATE public.bitacora_reactivos
	SET  id_reactivo='$Reactivo', no_lote='$Lote', fecha_apertura='$Apertura', fecha_caducidad='$Caducidad' where id_bit_reactivo='$Id';";
    pg_query($conexion,$actualizar);
    echo 1;
}


?>