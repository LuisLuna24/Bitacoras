<?php

require "../../php/conexion.php";

$identificaro=$_GET['Equipo'];
$Eliminar="UPDATE public.equipo
            SET estado_equipo='Baja' where id_equipo= '$identificaro'";
pg_query($conexion,$Eliminar);

header('Location: ../Equipo.php');


?>