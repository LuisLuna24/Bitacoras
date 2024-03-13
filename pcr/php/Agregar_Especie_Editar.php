<?php
//Coneccion y secion
require "../../php/conexion.php";
session_start();

//Datos de la bitacora
$registro=$_POST['Pcr_Registros'];
$Especie=$_POST['Pcr_Espceie'];
$Resultado=$_POST['Pcr_Resultado'];

if(isset($_SESSION['VersionEspecie'])){
    $VersionRegistro=$_SESSION['VersionEspecie'];
}else{
    $VersionRegistro=$_SESSION['VersionEquipo'];
}
//Datos de la especie
$queryVersionEspecie=pg_query($conexion,"SELECT MAX(version_especie) FROM especies where id_especie='$Especie'");
$rowVersionEspecie=pg_fetch_assoc($queryVersionEspecie);
$version_especie=$rowVersionEspecie['max'];

//No de especie
$_SESSION["No_Especie_Pcr"]=$registro;
$sql="SELECT max(no_especie_pcr) FROM especies_pcr WHERE id_especie_pcr='".$registro."'";
$resultado=pg_query($conexion,$sql);
$fila=pg_fetch_array($resultado);
$no_especie=$fila['max']+1;

$id_espece_pcr=$registro;
$buscarEspecie=pg_query($conexion,"SELECT * FROM especies_pcr where id_especie_pcr='$id_espece_pcr' and id_especie='$Especie';");


if(pg_num_rows($buscarEspecie)==0){
    $id_especie=$registro;
    $Insertar="INSERT INTO public.especies_pcr(
        id_especie_pcr, version_especie_pcr, no_especie_pcr, id_especie, version_especie,resultado)
        VALUES ($id_especie, '$VersionRegistro', '$no_especie', '$Especie', '$version_especie','$Resultado');";
    pg_query($conexion,$Insertar);
    
    echo 1;
}else{
    echo 2;
}



?>