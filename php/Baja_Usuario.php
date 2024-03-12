<?php
require "conexion.php";

try{
    $id_Usuatio=$_POST['Baja_Usuario'];
    $Baja="UPDATE public.usuarios SET  estado_usuario='0' WHERE id_usuario= '$id_Usuatio';";
    pg_query($conexion,$Baja);
    echo 1;

}catch(Exception $e){
    echo 2;
}


?>