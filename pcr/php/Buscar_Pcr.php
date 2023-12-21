<?php
require "../../php/conexion.php";
session_start();

if(isset($_GET['No_Folio'])){
    $Folio=$_GET['No_Folio'];
}else{
    $Folio=$_SESSION["pcr_fol"];
}


$columns=['id_pcr', 'identificador', 'nobre', 'fecha', 'id_analisis', 'agrosa', 'dato_v', 'tiemp', 'id_equipo_pcr', 'id_usuario', 'sanitizo', 'tiempouv'];

$table="bitacora_pcr ";

$id= 'id_pcr';

$campo=isset($_POST['campo']) ? pg_escape_string($conexion ,$_POST['campo']): null;

$where = "WHERE identificador::text ILIKE '%" . $campo . "%' and id_folio = '$Folio'  ";

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


$sql="SELECT " . implode(", ",$columns) . "
FROM $table 
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
    while($row=pg_fetch_array($resultado)){
        $output['data'].='<tr>';
        $output['data'].='<td>'. $row['identificador'] .'-'.$row['nobre'].'</td>';
        $output['data'].='<td>'. $row['id_analisis'] .'</td>';
        $output['data'].='<td>'. $row['fecha'] .'</td>';
        $output['data'].='<td>'. $row['agrosa'] .'</td>';
        $output['data'].='<td>'. $row['tiemp'] .'</td>';
        $output['data'].='<td>'. $row['sanitizo'] .'</td>';
        $output['data'].='<td>'. $row['tiempouv'] .'</td>';
        $output['data'].='<td><a href="Extraccion.php?No_Folio='. $row['identificador']. '">Editar</a></td>';
        $output['data'].='<td><a href="./php/Eliminar_Pcr.php?Identificador='. $row['identificador']. '">Eliminar</a></td>';
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