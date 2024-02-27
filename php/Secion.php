<?php
require 'conexion.php';
include 'encriptado.php';
session_start();

//Inicio de secion con secciones 

$Correo=$_POST['In_Correo'];
$Buscar="SELECT * FROM usuario where correo = '$Correo'";
$consulta=pg_query($conexion,$Buscar);

if(pg_num_rows($consulta)!=0){
    $ContrasenaDes=$_POST['In_Contrasena'];
    $Contraseña=$encriptar($ContrasenaDes);
    $BuscarUsu="SELECT * FROM usuario WHERE correo = '$Correo' and contrasena = '$Contraseña' and estado_usuario='1'";
    $consulta=pg_query($conexion,$BuscarUsu);
    if(pg_num_rows($consulta)!=0){
        $row=pg_fetch_assoc($consulta);
        $_SESSION['id_usuario']=$row['id_usuario'];
        $_SESSION['nombre']=$row['nombre'];
        $_SESSION['apellido']=$row['apellido'];
        $_SESSION['area']=$row['id_area'];
        $_SESSION['Nivel']=$row['nivel_usuario'];
        if($row['nivel_usuario']==2){
            echo 9;
        }else{
            echo 1;
        }
        
    }else{
        echo 2;
    }
}else{
    echo 3;
}
?>