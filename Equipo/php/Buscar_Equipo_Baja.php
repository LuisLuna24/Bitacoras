<?php
require "../../php/conexion.php";

//Consulta para datos de la tabla paginada 


//Columnas de la tabla a consultar
$columns=['vercion_equipo','id_equipo', 'identificador',' equipo.nombre as equipo_nombre','area.nombre as area_nombre', 'descripcion',' area.id_area','estado_equipo'];
//Nombre de la tabla a consultar
$table="equipo";
//Nombre del campo que se va acontar para la paginacion 
$id= 'id_equipo';

$campo=isset($_POST['campo']) ? pg_escape_string($conexion ,$_POST['campo']): null;
//Consultas JOIN
$join="INNER JOIN area on area.id_area=equipo.id_area";
//Consultas where
$where = "WHERE equipo.nombre ILIKE '%" . $campo . "%' and estado_equipo='Baja'";

//Limita la cantidad de datos que se va a ver (no mover)
$limit=  isset($_POST["registros"]) ? pg_escape_string($conexion ,$_POST["registros"]): 10;
$pagina=isset($_POST['pagina']) ? pg_escape_string($conexion ,$_POST['pagina']): 0;

if(!$pagina){
    $inicio = 0;
    $pagina =1;
} else {
    $inicio = ($pagina - 1) * $limit;
}

$sLimit="LIMIT $limit OFFSET $inicio";

//Consulta genera para obtener valores para la tabla
$sql="SELECT DISTINCT on (id_equipo) " . implode(", ",$columns) . "
FROM $table
$join
$where ORDER BY id_equipo,vercion_equipo DESC
$sLimit";

$resultado=pg_query($conexion,$sql);
$num_rows=pg_num_rows($resultado);

//Consulta para total registros

$sqlTotal="SELECT count($id) FROM $table ";
$resTotal=pg_query($conexion,$sqlTotal);
$row_total=pg_fetch_array($resTotal);
$totalRegistros = $row_total[0];


$output=[];
$output['totalRegistros'] = $totalRegistros;
$output['data'] = '';
$output['paginacion'] = '';

//Visualizar los elementos de la tabla y los manda en JSON 

if($num_rows>0){
    while($row=pg_fetch_assoc($resultado)){
        $output['data'].='<tr>';
        $output['data'].='<td>'. $row['identificador'] .'</td>';
        $output['data'].='<td>'. $row['equipo_nombre'] .'</td>';
        $output['data'].='<td>'. $row['descripcion'] .'</td>';
        $output['data'].='<td>'. $row['area_nombre'] .'</td>';
        $output['data'].='<td>'. $row['estado_equipo'] .'</td>';
        $output['data'].='</tr>';
    }
}else{
    $output['data'].='<tr>';
    $output['data'].='<td >Sin resultados</td>';
    $output['data'].='</tr>';
}


if($output['totalRegistros']>0){
    $totalPaginas=ceil($output['totalRegistros'] / $limit);


    $output['paginacion'].='<nav class="Nav_Paginacion">';
    $output['paginacion'].='<ul class="Paginacion_Tabla">';

    $numeroInicio=1;
    if(($pagina-4)>1){
        $numeroInicio = $pagina-4;
    }

    $numeroFin=$numeroInicio+9;
    if($numeroFin>$totalPaginas){
        $numeroFin=$totalPaginas;
    }

    for($i=$numeroInicio;$i<=$numeroFin;$i++){
        if($pagina == $i){
            $output['paginacion'].='<li class="Pagina"><a class="page-link activo" href="#">' . $i . '</a></li>';

        }else{
            $output['paginacion'].='<li class="Pagina"><a class="page-link" href="#" onclick="getData('. $i .')">' . $i . '</a></li>';
        }
    }

    $output['paginacion'].='</ul">';
    $output['paginacion'].='</nav>';
}


echo json_encode($output, JSON_UNESCAPED_UNICODE);




?>