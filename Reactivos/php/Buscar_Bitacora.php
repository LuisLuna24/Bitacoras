<?php
require "../../php/conexion.php";


$Datos=$_POST['Tipo_Select'];

$html="";

if($Datos==1){
   $Buscar="SELECT DISTINCT * FROM public.ver_folioextraccion;" ;
   $query=pg_query($conexion,$Buscar);
   if(pg_num_rows($query)>0){
    while($row=pg_fetch_assoc($query)){
        $html.="<option value='".$row['id_folio']."'>"."Folio:".$row['id_folio']."</option>";
    }
   }
}else if($Datos==2){
    $Buscar="SELECT  DISTINCT * FROM public.folio_pcr;" ;
    $query=pg_query($conexion,$Buscar);
    if(pg_num_rows($query)>0){
        while($row=pg_fetch_assoc($query)){
            $html.="<option value='".$row['id_folio']."'>"."Folio:".$row['id_folio']."</option>";
        }
   }
    
}else if($Datos==3){
    $Buscar="SELECT DISTINCT * FROM public.folio_pcreal;" ;
    $query=pg_query($conexion,$Buscar);
    if(pg_num_rows($query)>0){
        while($row=pg_fetch_assoc($query)){
            $html.="<option value='".$row['id_folio']."'>"."Folio:".$row['id_folio']."</option>";
        }
    }
}

echo $html;


?>