<?php
require "../../php/conexion.php";


$Datos=$_POST['Tipo_Select'];

$html="";

if($Datos==1){
   $Buscar="SELECT * FROM public.birtacora_extaccion;" ;
   $query=pg_query($conexion,$Buscar);
   if(pg_num_rows($query)>0){
    while($row=pg_fetch_assoc($query)){
        $html="<option value='".$row['id_extraccion']."'>".$row['version_bitacora']."    "."Folio:".$row['id_folio']."</option>";
    }
   }
}else if($Datos==2){
    $html="<option>Proximamente</option>";
    
}else if($Datos==3){
    $html="<option>Proximamente</option>";
    
}

echo $html;


?>