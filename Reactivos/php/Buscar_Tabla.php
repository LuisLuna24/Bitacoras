<?php
require "../../php/conexion.php";
session_start();

$folio=$_SESSION['No_FoliRec'];

$columns=['reacivos.nombre', 'bitacora_reactivo.no_lote', 'fecha_apertura', 'fecha_caducidad', 'pruaba_reactivo','identificado'];

$table="bitacora_reactivo";

$id= 'id_bitreactivo';

$campo=isset($_POST['campo']) ? pg_escape_string($conexion ,$_POST['campo']): null;

$join ="INNER JOIN reacivos on reacivos.id_reactivo=bitacora_reactivo.id_reactivo ";

$where = "WHERE reacivos.nombre ILIKE '%" . $campo . "%' and id_folio = '$folio'";


$limit=  isset($_POST["registros"]) ? pg_escape_string($conexion ,$_POST["registros"]): 10;
$pagina=isset($_POST['pagina']) ? pg_escape_string($conexion ,$_POST['pagina']): 0;

if(!$pagina){
    $inicio = 0;
    $pagina =1;
} else {
    $inicio = ($pagina - 1) * $limit;
}

$sLimit="LIMIT $limit OFFSET $inicio";


$sql="SELECT " . implode(", ",$columns) . "
FROM $table
$join
$where
$sLimit";

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
    while($row=pg_fetch_assoc($resultado)){
        $output['data'].='<tr>';
        $output['data'].='<td>'. $row['nombre'] .'</td>';
        $output['data'].='<td>'. $row['no_lote'] .'</td>';
        $output['data'].='<td>'. $row['fecha_apertura'] .'</td>';
        $output['data'].='<td>'. $row['fecha_caducidad'] .'</td>';
        $output['data'].='<td>'. $row['pruaba_reactivo'] .'</td>';
        $output['data'].='<td><a href="">Editar</a></td>';
        $output['data'].='<td><a href="./php/Eliminar_Reactivo.php?identificado='.$row['identificado'].'">Eliminar</a></td>';
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