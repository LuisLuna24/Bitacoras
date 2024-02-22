<?php  
 //Permite visualizar el equipo utilizado en la nueva vercion del registro

require "../../php/conexion.php";
session_start();

$Folio=$_SESSION['No_Folio'];
$EquipoMax=$_SESSION["EquipoMax"];

$Ver_equipo=$Folio.$EquipoMax;
//Consulta de la tabla equipos
$buscarEquipo="SELECT 	equipo.nombre,id_equipo_extraccion, equipo_extraccion.identificador, version_equipo_extraccion, equipo_extraccion.id_equipo, equipo_extraccion.version_equipo, ver_equipo_extraccion FROM equipo_extraccion
INNER JOIN equipo on equipo.id_equipo = equipo_extraccion.id_equipo
where ver_equipo_extraccion='$Ver_equipo';";
$queryBuscra=pg_query($conexion,$buscarEquipo);

$html="";

//Visualizar los elementos de la tabla 
if(pg_num_rows($queryBuscra)!=0){
    while($row=pg_fetch_assoc($queryBuscra)){
        $html.='<tr>';
        $html.='<td>' . $row['identificador'] . '</td>';
        $html.='<td>' . $row['nombre'] . '</td>';
        $html.='<td><a href="./php/Eliminar_equpo_seleccionado.php?Eqipo='.$row['identificador'].'">Eliminar</a></td>';
        $html.='</tr>';
    }
}else{
    $html.='<tr>';
    $html.='<td>Sin Equipo</td>';
    $html.='</tr>';
} 

echo $html;


?>