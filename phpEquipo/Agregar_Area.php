<?php

require "../php/conexion.php";

$Area=$_POST['Nombre_Area'];

$Buscar="SELECT * FROM categoria_equipo WHERE nombre_categoria ILIKE '%$Area%'";
$resultado=pg_query($conexion,$Buscar);

if (pg_num_rows($resultado)==0) {
    $agregar="INSERT INTO public.categoria_equipo(nombre_categoria)  VALUES ('$Area');";
    $res=pg_query($conexion,$agregar);
    echo 1;
}else {
    echo 2;
}

?>