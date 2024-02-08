<?php
//Visualizar los datos de la tabla de la sección de "Ver Extracciones"

require "../../php/conexion.php";
session_start();

$Folio=$_SESSION['No_Folio'];

//Columnas que se desean consultar 
$columns=['folio_extraccion.id_folio', 'folio','identificador_bitacora' ,'folio_extraccion.id_version_bitacoras', 'folio_extraccion.version_bitacoras','admin.nombre','admin.apellido','nombre_version','admin.id_admin'];
//Tabla que se desea consultar
$table="folio_extraccion ";
//Columna que se desea contar para la paginacion
$id= 'id_folio';

$campo=isset($_POST['campo']) ? pg_escape_string($conexion ,$_POST['campo']): null;

//Consultas JOIN se realizan todas las consultas JOIN
$join="INNER JOIN birtacora_extaccion on birtacora_extaccion.id_folio=folio_extraccion.id_folio  LEFT  JOIN admin on admin.id_admin=birtacora_extaccion.id_admin
INNER JOIN version_bitacora on version_bitacora.id_version_bitacora=folio_extraccion.id_version_bitacoras";

//Consultas Where 
$where = "WHERE folio_extraccion.id_folio::text ILIKE '%" . $campo . "%' and birtacora_extaccion.id_folio='$Folio'";

//Limita los datos que se veran en la paginacion dependiendo los valores del select
$limit=  isset($_POST["registros"]) ? pg_escape_string($conexion ,$_POST["registros"]): 10;
$pagina=isset($_POST['pagina']) ? pg_escape_string($conexion ,$_POST['pagina']): 0;



if(!$pagina){
    $inicio = 0;
    $pagina =1;
} else {
    $inicio = ($pagina - 1) * $limit;
}

$sLimit="LIMIT $limit OFFSET $inicio";

//Consulta general para obtener datos de la tabla 
$sql="SELECT DISTINCT " . implode(", ",$columns) . "
FROM $table 
$join
$where
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

//Visualizar los valores de la consulta en la tabla 
if($num_rows>0){
    while($row=pg_fetch_array($resultado)){
        //Analizar si el folio fue revisado en caso de ser revisado por el admin quitara la opción de eliminar
        if($row['id_admin']==''){
            $Eliminar='<a href="./php/Eliminar_Extraccion.php?No_Folio='. $row['id_folio']. '">Eliminar</a>';
        }else{
            $Eliminar='';
        }
        $output['data'].='<tr>';
        $output['data'].='<td>'. $row['id_folio'] .'</td>';
        $output['data'].='<td>'. $row['version_bitacoras'] .'</td>';
        $output['data'].='<td>'. $row['nombre_version'] .'</td>';
        $output['data'].='<td>'. $row['nombre'] . ' ' . $row['apellido'] . '</td>';
        $output['data'].='<td><a href="Ver_Vercion_Extracion.php?Version_Extraccion='. $row['identificador_bitacora']. '">Ver</a></td>';
        $output['data'].='</tr>';
    }
}else{
    $output['data'].='<tr>';
    $output['data'].='<td >Sin resultados</td>';
    $output['data'].='<td >Sin resultados</td>';
    $output['data'].='<td >Sin resultados</td>';
    $output['data'].='<td >Sin resultados</td>';
    $output['data'].='<td >Sin resultados</td>';
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