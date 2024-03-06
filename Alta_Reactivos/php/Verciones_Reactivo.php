<?php
require "../../php/conexion.php";
session_start();
//Permite la búsqueda de los datos que se escribirán en la tabla de manera paginada


$id_Rectivo=$_SESSION["IdReactivo"];
//Columnas que se desean consultar
$columns=['id_reactivo', 'nombre','descripcion',' cantidad', 'fecha_caducidad', 'lote', 'estado','version_reactivo'];

//Tabala a la que se desa conultar
$table="reactivos";

//Columna que se contara para la pagianacion
$id= 'id_reactivo';


//Obtiene el valor del input para buscar los registros
$campo=isset($_POST['campo']) ? pg_escape_string($conexion ,$_POST['campo']): null;

$where = "WHERE nombre ILIKE '%" . $campo . "%' and id_reactivo=$id_Rectivo";

//Obtiene el límite de consultas dependiendo la cantidad que se desea visualizar a través del select
$limit=  isset($_POST["registros"]) ? pg_escape_string($conexion ,$_POST["registros"]): 10;
$pagina=isset($_POST['pagina']) ? pg_escape_string($conexion ,$_POST['pagina']): 0;

if(!$pagina){
    $inicio = 0;
    $pagina =1;
} else {
    $inicio = ($pagina - 1) * $limit;
}

$sLimit="LIMIT $limit OFFSET $inicio";

//Consulta para obtener los valores que irán en la tabla
$sql="SELECT  " . implode(", ",$columns) . "
FROM $table 
$where  ORDER BY version_reactivo ASC
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


//Datos de la tabla 
if($num_rows>0){
    while($row=pg_fetch_assoc($resultado)){
        $output['data'].='<tr>';
        $output['data'].='<td>'. $row['nombre'] .'</td>';
        $output['data'].='<td>'. $row['version_reactivo'] .'</td>';
        $output['data'].='<td>'. $row['descripcion'] .'</td>';
        $output['data'].='<td>'. $row['cantidad'] .'</td>';
        $output['data'].='<td>'. $row['fecha_caducidad'] .'</td>';
        $output['data'].='<td>'. $row['lote'] .'</td>';
        $output['data'].='<td>'. $row['estado'] .'</td>';
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