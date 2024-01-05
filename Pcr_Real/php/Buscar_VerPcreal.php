<?php
require "../../php/conexion.php";


$columns=['if_folio', 'folio', 'id_version_bitacoras', 'version_bitacoras', 'fecha_elaboracion','admin.nombre','admin.apellido','nombre_version','birtacora_pcreal.id_admin'];

$table="folio_pcreal ";

$id= 'folio_pcreal.if_folio';

$campo=isset($_POST['campo']) ? pg_escape_string($conexion ,$_POST['campo']): null;

$join="INNER join birtacora_pcreal on birtacora_pcreal.id_folio = folio_pcreal.if_folio LEFT join admin on admin.id_admin=birtacora_pcreal.id_admin
INNER JOIN version_bitacora on version_bitacora.id_version_bitacora=folio_pcreal.id_version_bitacoras";

$where = "WHERE folio_pcreal.if_folio::text ILIKE '%" . $campo . "%' or birtacora_pcreal.fecha::text ILIKE '%" . $campo . "%' ";

/*if($campo!==null){
    $where = "WHERE (";

    $cont=count($columns);
    for($i=0;$i<$cont;$i++){
        $where .= $columns[$i] . " ILIKE '%" . $campo . "%' OR ";
    }
    $where= substr_replace($where, "", -3);
    $where.= ")";
}*/

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
$where ORDER BY folio_pcreal.if_folio ASC
$sLimit ";

$resultado=pg_query($conexion,$sql);
$num_rows=pg_num_rows($resultado);

//Consulta para total registros

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
        if($row['id_admin']==''){
            $Eliminar='<a href="./php/Eliminar_Folio.php?No_FoloEliminar='. $row['if_folio']. '">Eliminar</a>';
        }else{
            $Eliminar='';
        }
        $output['data'].='<tr>';
        $output['data'].='<td>'. $row['if_folio'].'</td>';
        $output['data'].='<td>'. $row['fecha_elaboracion'] .'</td>';
        $output['data'].='<td>'. $row['nombre_version'] .'</td>';
        $output['data'].='<td>'. $row['nombre'] .' '.$row['apellido'].'</td>';
        $output['data'].='<td><a href="Pcr_Real.php?No_Folio='. $row['if_folio']. '">Editar</a></td>';
        $output['data'].='<td>'.$Eliminar.'</td>';
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