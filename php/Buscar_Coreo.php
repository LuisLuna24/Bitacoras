<?php
require "conexion.php";

$Usuario=$_POST['Contraseña_Usuario'];

$Consulta="SELECT * FROM usuario WHERE id_usuario='$Usuario';";
$resultado=pg_query($conexion,$Consulta);
$row=pg_fetch_assoc($resultado);
$Correo=$row['correo'];

echo $Correo;


?>