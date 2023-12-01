<?php
/*
header('Content-Type: text/txt; charset=utf-8');
require "../php/conexion.php";

$registros=pg_query($conexion,"SELECT id_reactivo, version_bitacora, nombre, lote, fecha_captura, fecha_caducidad, prueba_reactivo, id_usuario, id_supervisor, folio, id_bitacora
FROM public.bitacora_reactivos;") or 
  die("Problemas en el select".pg_error($conexion));

while ($reg=pg_fetch_assoc($registros))
{
  $vec[]=$reg;
}

$cad=json_encode($vec);
var_dump ($cad);
*/
require "../php/conexion.php";

$buscar="SELECT * FROM bitacora_reactivos";
$consulta=pg_query($conexion,$buscar);

$Salida="";

while($row=pg_fetch_assoc($consulta)){
    $Salida.="<option value=\"".$row['id_reactivo']."\">".$row['nombre']."</option>";
}

echo $Salida;



?>