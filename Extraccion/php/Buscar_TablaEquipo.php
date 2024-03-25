<?php  
 //Visualizar los equipos seleccionados de la tabla en nuevo registro de extraccion

require "../../php/conexion.php";
session_start();

$Folio=$_SESSION['No_Foli'];


//Consulta de la tabla equipos
$buscarEquipo="SELECT DISTINCT on (id_equipo) id_equipo_extraccion,identificador_equipo_extraccion ,equipo_extraccion.identificador, equipo.id_equipo ,nombre FROM public.equipo_extraccion INNER JOIN equipo on equipo.id_equipo=equipo_extraccion.id_equipo  where id_equipo_extraccion ='$Folio' ;";
$queryBuscra=pg_query($conexion,$buscarEquipo);

$html="";

//Visualizar los elementos de la tabla 
if(pg_num_rows($queryBuscra)!=0){
    while($row=pg_fetch_assoc($queryBuscra)){
        $html.='<tr>';
        $html.='<td>' . $row['identificador'] . '</td>';
        $html.='<td>' . $row['nombre'] . '</td>';
        $html.='<td><a href="./php/Eliminar_equpo_seleccionado.php?EquipoExtra='.$row['identificador_equipo_extraccion'].'">Eliminar</a></td>';
        $html.='</tr>';
    }
}else{
    $html.='<tr>';
    $html.='<td>Sin Equipo</td>';
    $html.='</tr>';
} 

echo $html;


?>