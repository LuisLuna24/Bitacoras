<?php
require "../../php/conexion.php";
session_start();

$Folio=$_SESSION['No_Foli'];

$columns=['id_extraccion', 'no_registro', 'identificador', 'folio', 'fecha', 'id_metodo', 'id_analisis', 'birtacora_extaccion.id_area', 'conc_ng_ul', 'dato_260_280', 'dato_260_230', 'birtacora_extaccion.id_usuario',' usuarios.nombre','usuarios.apellido'];

$table="birtacora_extaccion";

$id= 'id_extraccion';

$campo=isset($_POST['campo']) ? pg_escape_string($conexion ,$_POST['campo']): null;

$join="INNER JOIN usuarios on usuarios.id_usuario=birtacora_extaccion.id_usuario";


$where = "WHERE no_registro::text ILIKE '%" . $campo . "%' and birtacora_extaccion.folio='$Folio'";

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
        $output['data'].='<td>'. $row['no_registro'] . '-'. $row['identificador'] .'</td>';
        $output['data'].='<td>'. $row['fecha'] .'</td>';
        $output['data'].='<td>'. $row['id_metodo'] .'</td>';
        $output['data'].='<td>'. $row['id_analisis'] . '</td>';
        $output['data'].='<td>'. $row['id_area'] . '</td>';
        $output['data'].='<td>'. $row['conc_ng_ul'] . '</td>';
        $output['data'].='<td>'. $row['dato_260_280'] . '</td>';
        $output['data'].='<td>'. $row['dato_260_230'] . '</td>';
        $output['data'].='<td>'. $row['nombre'] . ' ' . $row['apellido'] . '</td>';
        $output['data'].='<td><a href="Extraccion.php?No_Folio='. $row['folio']. '">Editar</a></td>';
        $output['data'].='<td><a href="">Eliminar</a></td>';
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