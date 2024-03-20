<?php 

//Conecion a base de datos
$conexion = pg_connect("host=$host dbname=$dbname user=$user password=$password");
if (!$conexion) {
    $host = 'localhost';
    $user = 'postgres';
    $password = 'Integral3na2016';
    $dbname = 'bitacoras';
    $conexion = pg_connect("host=$host dbname=$dbname user=$user password=$password");
    if (!$conexion) {
        $host = 'localhost';
        $user = 'postgres';
        $password = 'marlenlelo04020710';
        $dbname = 'bitacoras';
        $conexion = pg_connect("host=$host dbname=$dbname user=$user password=$password");
        if (!$conexion) {
           die("Error al conectar a la base de datos");
        }
    }
}

?>