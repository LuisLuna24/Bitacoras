<?php
require "../../php/conexion.php";


$columns=['usuario.nombre','usuario.apellido','folio_pcreal.id_folio', 'folio_pcreal.id_version_bitacora', 'folio_pcreal.version_bitacora', 'fecha_creacion', 'folio_pcreal.version_folio','nombre_version'];

$table="folio_pcreal ";

$id= 'folio_pcreal.id_folio';

$campo=isset($_POST['campo']) ? pg_escape_string($conexion ,$_POST['campo']): null;

$join="INNER JOIN version_bitacora on version_bitacora.id_vercion_bitacora=folio_pcreal.id_version_bitacora
    LEFT JOIN usuario on usuario.id_usuario=folio_pcreal.id_admin
    INNER JOIN bitacora_pcreal on bitacora_pcreal.id_folio=folio_pcreal.id_folio";

$where = "WHERE folio_pcreal.id_folio::text ILIKE '%" . $campo . "%' or folio_pcreal.fecha_creacion::text ILIKE '%" . $campo . "%' or id_pcreal::text ILIKE '%" . $campo . "%' ";

$limit=  isset($_POST["registros"]) ? pg_escape_string($conexion ,$_POST["registros"]): 10;
$pagina=isset($_POST['pagina']) ? pg_escape_string($conexion ,$_POST['pagina']): 0;



if(!$pagina){
    $inicio = 0;
    $pagina =1;
} else {
    $inicio = ($pagina - 1) * $limit;
}

$sLimit="LIMIT $limit OFFSET $inicio";


$sql="SELECT DISTINCT " . implode(", ",$columns) . "
FROM $table 
$join
$where ORDER BY folio_pcreal.id_folio ASC
$sLimit ";

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

if($num_rows>0){
    while($row=pg_fetch_array($resultado)){
        $output['data'].='<tr>';
        $output['data'].='<td>'. $row['id_folio'].'</td>';
        $output['data'].='<td>'. $row['fecha_creacion'] .'</td>';
        $output['data'].='<td>'. $row['nombre_version'] .'</td>';
        $output['data'].='<td>'. $row['nombre'] .' '.$row['apellido'].'</td>';
        $output['data'].='<td><a href="./php/Nueva_Actualizacion.php?No_Folio='. $row['id_folio']. '">Editar</a></td>';
        $output['data'].='<td><a href="Verciones_AnterioresPcreal.php?No_Folio='. $row['id_folio']. '">Ver</a></td>';
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
            $output['paginacion'].='<li class="Pagina"><a class="page-link activo" href="">' . $i . '</a></li>';

        }else{
            $output['paginacion'].='<li class="Pagina"><a class="page-link" href="" onclick="getData('. $i .')">' . $i . '</a></li>';
        }
    }

    $output['paginacion'].='</ul">';
    $output['paginacion'].='</nav>';
}


echo json_encode($output, JSON_UNESCAPED_UNICODE);




?>