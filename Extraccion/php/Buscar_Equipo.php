<?php
//Consulta para visualizar equipo en select análisis en Extracción

require "../../php/conexion.php";

$Area=$_POST['Area_Select'];

$Buscar= "SELECT id_equipo, identificador, nombre, descripcion, id_area FROM public.equipo where id_area='$Area';";
$query=pg_query($conexion,$Buscar);

$html='<option vlaue="0">Seleccione un equipo</option>';

if(pg_num_rows($query)!=0){
    while($row=pg_fetch_assoc($query)){
        $html.='<option value="'.$row['id_equipo'].'">'.$row['nombre'].' - '.$row['descripcion'] . ' : ' . $row['identificador'] .'</option>';
    }
}

echo $html;


?>