<?php
require "conexion.php";

try{
    $id_Usuatio=$_POST['Baja_Admin'];
    $Baja="UPDATE public.usuarios SET  nivel_usuario='1' WHERE id_usuario= '$id_Usuatio';";
    pg_query($conexion,$Baja);
    echo 1;

}catch(Exception $e){
    echo 2;
}

?>