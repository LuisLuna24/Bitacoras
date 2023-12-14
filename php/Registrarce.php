<?php
require "conexion.php";
include "encriptado.php";


$idUsuario= rand(1, 1000000);
$Nombre=$_POST['Reg_Nombre'];
$Apellidos=$_POST['Reg_Apellido'];
$Area=$_POST['Reg_Area'];
$Correo=$_POST['Reg_Correo'];
$ContraseñaDes=$_POST['Reg_Contrasena1'];
$Contraseña=$encriptar($ContraseñaDes);
if($Area!=0){
    try{
        $idExist="SELECT * FROM usuarios where id_usuario = '$idUsuario'";
        $queryid=pg_query($conexion,$idExist);
        $num_id=pg_num_rows($queryid);
        if($num_id==1){
            $idUsuario= rand(1, 1000000);
            return $idUsuario; 
        }else{
            $UsuarioExist="SELECT * FROM usuarios where correo = '$Correo'";
            $queryExist=pg_query($conexion,$UsuarioExist);
            $num_Exist=pg_num_rows($queryExist);
            if($num_Exist==0){
                $Insert="INSERT INTO public.usuarios(
                    id_usuario, nombre, apellido, correo, contrasena, id_area)
                    VALUES ('$idUsuario', '$Nombre', '$Apellidos', '$Correo', '$Contraseña', '$Area');";
                $queryInsert=pg_query($conexion,$Insert);
                echo 1;
            }else{
                echo 2;
            }
        }
        
    }catch(Exception $e){
        echo $e;
    }
}else{
    echo 3;
}

?>