<?php
require "conexion.php";

try{
    $id_Usuatio=$_POST['Alta_Admin'];
    $Baja="UPDATE public.usuario SET  nivel_usuario='2' WHERE id_usuario= '$id_Usuatio';";
    pg_query($conexion,$Baja);
    echo 1;

}catch(Exception $e){
    echo 2;
}

?>