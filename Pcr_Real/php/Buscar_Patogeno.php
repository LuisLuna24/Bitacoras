<?php

require "../../php/conexion.php";


$BuscarPatogeno="SELECT id_patogeno, nombre, abreviatura FROM public.patogeno;";
$query=pg_query($conexion,$BuscarPatogeno);


$html='';
if(pg_num_rows($query)>0){
    while($row=pg_fetch_array($query)){
        $html='<optio values="'.$row['id_patogeno'].'">'.$row['nombre'].'</optio>';
    }
}


echo $html;

?>