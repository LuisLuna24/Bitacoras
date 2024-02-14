<?php
ob_start();
session_start();

$id_Usuario=$_SESSION['id_usuario'];
$Nombre=$_SESSION['nombre'];
$Apellido=$_SESSION['apellido'];
if($id_Usuario=="" || $id_Usuario==null){
    header("location:../index.php");
}else{  ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/agregar_analisis.css" />
    <title>Catálogo de Análisis</title>
    <link rel="stylesheet" href="../css/header.css" />
    <script src="../librerias/jquery/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="../librerias/select2/css/select2.css" />
    <script src="../librerias/select2/select2.js"></script>
</head>

<body>
    <?php require "../global/header.php" ?>

    <section class="dat_agrega_analisis">
        <div class="dat_agrega_analisis_contenedor">
            <form class="dat_agrega_analisis_form" id="Analisis_Form">
                <div class="dat_agrega_analisis_titulo">
                    <h1>Catálogo de Análisis</h1>
                    <div class="linea_titulo"></div>
                </div>

                <div class="dat_datos">
                    <div class="dato">
                        <div>
                            <label for="nombre">Nombre:</label>
                            <input type="text" name="Nombre">
                        </div>
                        <div>
                        <label for="abrev">Abreviatura:</label>
                        <input type="text" name="Abrebiatura">
                    </div>
                    </div>
                </div>
                <div class="botones">
                    <input type="button" value="Agregar" id="Agregar_Analisis">
                </div>
            </form>
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
                        <label for="buscar">Buscar Análisis:</label>
                        <input type="text" id="campo" name="campo" />
                    </div>
                </div>

                <table>
                    <thead>
                        <th>No Analisis</th>
                        <th>Nombre</th>
                        <th>Abrebiatura</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
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

<script src="./js/script.js"></script>
<script src="./js/Buscar_Analisis.js"></script>
<script src="./js/Agregar_Analisis.js"></script>

<?php }  ?>
