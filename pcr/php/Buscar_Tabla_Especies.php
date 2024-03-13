<?php
require "../../php/conexion.php";
session_start();

$id_especie_pcr=$_SESSION["No_Especie_Pcr"];
$Buscar="SELECT DISTINCT on (especies_pcr.id_especie) nombre,resultado,no_especie_pcr,id_especie_pcr FROM especies_pcr 
        INNER JOIN especies on especies.id_especie=especies_pcr.id_especie where id_especie_pcr::text ILIKE '%" . $id_especie_pcr . "%';";
$query=pg_query($conexion,$Buscar);

$html="";

if(pg_num_rows($query)!=0){
    while($row=pg_fetch_assoc($query)){
        $html.='<tr>';
        $html.='<td>' . $row['no_especie_pcr'] . '</td>';
        $html.='<td>' . $row['nombre'] . '</td>';
        $html.='<td>' . $row['resultado'] . '</td>';
        $html.='<td><a href="./php/Eliminar_equpo_seleccionado.php?Eqipo='.$row['id_especie_pcr'].'">Eliminar</a></td>';
        $html.='</tr>';
    }
echo $html;
}

?>