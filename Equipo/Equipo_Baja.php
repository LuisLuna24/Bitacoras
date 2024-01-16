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
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipo</title>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="css/equipo.css">
    <script src="../librerias/jquery/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="../librerias/select2/css/select2.css">
    <script src="../librerias/select2/select2.js"></script>
</head>
<body>
    <?php require "../global/header.php" ?>

    <section class="Equipo">
        <div class="Equipo_Titulo">
            <h1>Equipo Baja</h1>
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
                    <label for="buscar">Buscar equipo</label>
                    <input type="text" id="campo" name="campo">
                </div>
            </div>
            
            <table>
                <thead>
                    <th>No. Inventario</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Area</th>
                    <th>Estado</th>
                    <th>Actualizar</th>
                    <th>Dar de baja</th>
                </thead>
                <tbody id="content"></tbody>
            </table>
            <div class="Tablas_Paginas" id="nav-paginacion"></div>
        </div>
    </section>


    <?php require "../global/footer.php" ?>
</body>
</html>

<script src="./js/scripts.js"></script>
<script src="./js/Buscar_Equipo_Baja.js"></script>

<?php }  ?>s