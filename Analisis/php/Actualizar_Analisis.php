<?php
require "../../php/conexion.php";
session_start();


$id_Analisis=$_SESSION['Analisis'];
$Nombre=$_POST['Editar_Nombre'];
$Aberebiatura=$_POST['Editar_Abrebiatura'];

try {
    $Actualizar="UPDATE public.analisis
        SET nombre='$Nombre', abreviatura='$Aberebiatura'
        WHERE id_analisis='$id_Analisis';";
    pg_query($conexion,$Actualizar);
    echo 1;

}catch(Exception $e){
    echo 2;
}


?>