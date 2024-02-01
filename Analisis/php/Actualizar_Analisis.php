<?php
require "../../php/conexion.php";
session_start();

//Actualiza los datos del análisis en el apartado de actualizar análisis

//Obtiene los nuevos valores de los inputs a través de Ajax
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