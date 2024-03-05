<?php
ob_start();
session_start();
$id_Usuario=$_SESSION['id_usuario'];
$Nombre=$_SESSION['nombre'];
$Apellido=$_SESSION['apellido'];
if($id_Usuario=="" || $id_Usuario==null){
    header("location:../index.php");
}else if($_SESSION['Nivel']==2){   ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/agregar_especie.css">
    <title>Agregar Especie</title>
    <link rel="stylesheet" href="../css/header.css">
    <script src="../librerias/jquery/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="../librerias/select2/css/select2.css">
    <script src="../librerias/select2/select2.js"></script>
</head>
<body>
    <?php require "../global/header.php" ?>

    <section class="agregar_especie">
        <div class="agregar_especie_contenedor">
            <form class="agregar_especie_form" id="Especie_Form">
                <div class="agregar_especie_titulo">
                    <h1>Agregar Especie</h1>
                    <div class="linea_titulo"></div>
                </div>

                <div class="dat_datos">
                    <div class="dato">
                        <div>
                            <label for="nom">Nombre:</label>
                            <input type="text" name="Nombre_Especie" id="Nombre_Especie">
                        </div>
                    </div>
                    <div class="botones">
                        <input type="button" value="Agregar Especie" id="btn_Agregar">
                    </div>
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
                            <label for="buscar">Buscar Especie: (Nombre)</label>
                            <input type="text" id="campo" name="campo">
                        </div>
                    </div>
                    
                    <table>
                        <thead>
                            <th>No. Especie</th>
                            <th>Nombre</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </thead>
                        <tbody id="content"></tbody>
                    </table>
                    <div class="Tablas_Paginas" id="nav-paginacion"></div>
                </div>
            </form>
        </div>
    </section>
    <?php require "../global/footer.php" ?>

</body>

</html>


<script src="../js/heder.js"></script>
<script src="js/Buscar_Especie.js"></script>
<script src="js/Agregar_Especie.js"></script>
<script src="js/script.js"></script>

<?php }else {
    header("location:../Bitacoras.php");
}  ?>