<?php
require "../../php/conexion.php";

//Bucar los folios de la bitacoras dependiendo de su tipo de bitacora

$Datos=$_POST['Tipo_Bitacora'];

$html="";

if($Datos==1){
   $Buscar="SELECT DISTINCT * FROM public.folio_extraccion ORDER BY id_folio ASC;" ;
   $query=pg_query($conexion,$Buscar);
   if(pg_num_rows($query)>0){
    while($row=pg_fetch_assoc($query)){
        $html.="<option value='".$row['id_folio']."'>"."Folio:".$row['id_folio']."</option>";
    }
   }
}else if($Datos==2){
    $Buscar="SELECT  DISTINCT * FROM public.folio_pcr ORDER BY id_folio ASC;" ;
    $query=pg_query($conexion,$Buscar);
    if(pg_num_rows($query)>0){
        while($row=pg_fetch_assoc($query)){
            $html.="<option value='".$row['id_folio']."'>"."Folio:".$row['id_folio']."</option>";
        }
   }
    
}else if($Datos==3){
    $Buscar="SELECT DISTINCT * FROM public.folio_pcreal ORDER BY if_folio ASC;" ;
    $query=pg_query($conexion,$Buscar);
    if(pg_num_rows($query)>0){
        while($row=pg_fetch_assoc($query)){
            $html.="<option value='".$row['if_folio']."'>"."Folio:".$row['if_folio']."</option>";
        }
    }else{
    }
}

echo $html;


?>