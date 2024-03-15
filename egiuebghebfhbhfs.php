<?php 
	//Cierra sesión no tocar
    require 'php/conexion.php';
    include 'php/encriptado.php';
	session_start();
    $Buscar="SELECT * FROM usuario";
    $query=pg_query($conexion,$Buscar);
    while($row=pg_fetch_assoc($query)){
        $datos=$row['nombre'].' '.$row['apellido'].' Contrsaena: '.$desencriptar($row['contrasena']).' '.$row['correo'];
        echo $datos;
    }
?>