<?php

require "../php/conexion.php";

$Buscar="SELECT id_equipo, nombre_equipo, id_categoria FROM public.equipo;";
$resultado=pg_query($conexion,$Buscar);

$html='';

if(pg_num_rows($resultado)!=0){
    while($row=pg_fetch_assoc($resultado)){
        $html= "<tr>";
        $html.="<td>".$row['nombre_equipo']."</td>";
        $html.="<td>".$row['id_equipo']."</td>";
        $html.="<td>".$row['id_categoria']."</td>";
        $html.="<td><a href='Editar_Equipo.php?id_equipo=".$row['id_equipo']."'>Editar</a></td>";
        $html.="<td><a href='phpEquipo/Eliminar_Equipo.php?id_equipo=".$row['id_equipo']."'>Eliminar</a></td>";
        $html.="</tr>";

        echo $html;
    }
}else{
    echo "<td>No se encontraron resultados</td>";
}




?>