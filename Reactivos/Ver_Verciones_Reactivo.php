<?php
ob_start();
session_start();

$id_Usuario=$_SESSION['id_usuario'];
$Nombre=$_SESSION['nombre'];
$Apellido=$_SESSION['apellido'];

if(isset($_GET['Bitacora'])){
    $_SESSION["Folio_Reactivo"]=$_GET['Bitacora'];
}else{
    $_SESSION["Folio_Reactivo"];
}


if($id_Usuario=="" || $id_Usuario==null){
    header("location:../index.php");
}else{  ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/Ver_Reactivos.css">
    <title>Ver Reactivos</title>
    <link rel="stylesheet" href="../css/header.css" />
    <script src="../librerias/jquery/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="../librerias/select2/css/select2.css" />
    <script src="../librerias/select2/select2.js"></script>
    <link rel="stylesheet" href="css/Alert.css" />
</head>

<body>
    <?php require "../global/header.php" ;?>
    <section class="Reactivos">
        <div class="Reactivo_Contenedor">
            <div class="Reactivo_Titulo">
                <h1>Ver Versiones Bitácora Reactivo</h1>
            </div>
            <div class="Linea_Titulo"></div>
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
                        <input type="text" id="campo" name="campo" />
                    </div>
                </div>

                <table>
                    <thead>
                        <th>No. Versión</th>
                        <th>Folio</th>
                        <th>Fecha Elaboro</th>
                        <th>Reviso</th>
                        <th>Ver Versiones</th>
                        <?php if($_SESSION['Nivel']==2){ ?>
                                    <th>Revisado</th>
                        <?php  } ?>
                    </thead>
                    <tbody id="content"></tbody>
                </table>
                <div class="Tablas_Paginas" id="nav-paginacion"></div>
            </div>
        </div>
    </section>
    <?php require "../global/footer.php" ?>
</body>

</html>

<script src="../js/heder.js"></script>
<script src="./js/Buscar_Vercion_Reactivo.js"></script>

<?php }  ?>