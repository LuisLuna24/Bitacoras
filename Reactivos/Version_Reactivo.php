<?php
ob_start();
session_start();
$_SESSION['Bitacora']=$_GET['Bitacora'];

$id_Usuario=$_SESSION['id_usuario'];
$Nombre=$_SESSION['nombre'];
$Apellido=$_SESSION['apellido'];
if($id_Usuario=="" || $id_Usuario==null){
    header("location:../index.php");
}else{  ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/alta_reactivos.css">
    <title>Bitacora Reactivo</title>
    <link rel="stylesheet" href="../css/header.css" />
    <script src="../librerias/jquery/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="../librerias/select2/css/select2.css" />
    <script src="../librerias/select2/select2.js"></script>
    <link rel="stylesheet" href="css/Alert.css">
</head>

<body>
<?php require "../global/header.php" ;?>

    <section class="datos_alta">
        <div class="datos_alta_contenedor">
            <form class="datos_alta_form" id="Reactivos_Form_Data">
                <div class="datos_alta_titulo">
                    <h1>Bitacora Reactivos</h1>
                    <div class="linea_titulo"></div>
                </div>
                <div class="Equipo_Tabla">
                    <div class="Acciones_Tabla">
                        <div class="Datos">
                            <label for="">Mostrar:</label>
                            <select name="num_registros" id="num_registros">
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                            </select>
                        </div>
                        <div class="Dato">
                            <label for="buscar">Buscar Reactivo:</label>
                            <input type="text" id="campo" name="campo">
                        </div>
                    </div>

                    <table>
                        <thead>
                            <th>Nombre Reactivo</th>
                            <th>Lote</th>
                            <th>Apertura</th>
                            <th>Caducidad</th>
                            <th>Prueba Reactivo</th>
                        </thead>
                        <tbody id="content"></tbody>
                    </table>
                    <div class="Tablas_Paginas" id="nav-paginacion"></div>
                </div>
            </form>
        </div>
    </section>
    <?php require "../global/Alerta_Cerrar.php"  ?>
    <script src="../js/Script_Cerrar.js"></script>
    <?php require "../global/footer.php" ?>

</body>

</html>

<script src="../js/heder.js"></script>
<script src="./js/Buscar_Datos_Vercion.js"></script>


<?php }  ?>