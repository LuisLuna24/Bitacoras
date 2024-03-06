<?php
//Permite dar de baja los equipo cambiando su estado a Baja

require "../../php/conexion.php";

$identificaro=$_GET['Equipo'];
$Eliminar="UPDATE public.equipo
            SET estado_equipo='Inactivo' where id_equipo= '$identificaro'";
pg_query($conexion,$Eliminar);

header('Location: ../Equipo_Baja.php');


?>