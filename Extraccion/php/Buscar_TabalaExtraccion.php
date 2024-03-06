<?php
//Visualizar los datos de la tabla en el apartado para nuevo registro de Extracción

require "../../php/conexion.php";
session_start();

//Folio para busqueda
$Folio=$_SESSION['No_Foli'];
//Columnas que se desean consultar
$columns=['identificador_registro','version_registro','usuario.apellido','usuario.nombre','id_extracion', 'identificador_registro','no_registro', 'version_extracion','identificdor_extracion', 'id_folio', 'version_folio', 'fecha', 'id_metodo', 'id_analisis',' bitacora_extraccion.id_area', 'conc_ng_ul', 'dato_260_280', 'dato_260_230', 'archivo', 'bitacora_extraccion.id_usuario'];
//Tabla que se desea consultar
$table="bitacora_extraccion";
//Columna que se desea contar para la paginacion
$id= 'id_extracion';

$campo=isset($_POST['campo']) ? pg_escape_string($conexion ,$_POST['campo']): null;

//Consultas JOIN se realizan todas las consultas JOIN
$join="INNER JOIN usuario on usuario.id_usuario=bitacora_extraccion.id_usuario";

//Consultas where Se realizar todos los where que se desean consultar
$where = "WHERE id_extracion::text ILIKE '%" . $campo . "%' and bitacora_extraccion.id_folio='$Folio'";

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
$sql="SELECT  DISTINCT on (identificador_registro) " . implode(", ",$columns) . "
FROM $table
$join
$where GROUP BY " . implode(", ",$columns) . " ORDER BY identificador_registro  ASC, version_registro DESC
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
    while($row=pg_fetch_assoc($resultado)){
        $output['data'].='<tr>';
        $output['data'].='<td>'. $row['id_extracion'] . '-'. $row['no_registro'] .'</td>';
        $output['data'].='<td>'. $row['fecha'] .'</td>';
        $output['data'].='<td>'. $row['id_metodo'] .'</td>';
        $output['data'].='<td>'. $row['id_analisis'] . '</td>';
        $output['data'].='<td>'. $row['id_area'] . '</td>';
        $output['data'].='<td>'. $row['conc_ng_ul'] . '</td>';
        $output['data'].='<td>'. $row['dato_260_280'] . '</td>';
        $output['data'].='<td>'. $row['dato_260_230'] . '</td>';
        $output['data'].='<td>'. $row['nombre'] . ' ' . $row['apellido'] . '</td>';
        $output['data'].='<td><a href="./Editar_Registro.php?RegistroExtra='.$row['identificador_registro'].'">Editar</a></td>';
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