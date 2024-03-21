<?php
ob_start();
session_start();
$id_Usuario=$_SESSION['id_usuario'];
$Nombre=$_SESSION['nombre'];
$Apellido=$_SESSION['apellido'];
if($id_Usuario=="" || $id_Usuario==null){
    header("location:../index.php");
}else if($_SESSION['Nivel']==2){  ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/alta_reactivos.css">
    <title>Alta de Reactivo</title>
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
            <form class="datos_alta_form" id="Reactivo_Form">
                <div class="datos_alta_titulo">
                    <h1>Inventario de Reactivos.</h1>
                    <div class="linea_titulo"></div>
                </div>

                <div class="dat-datos">
                    <div class="datoo">
                        <div>
                            <label for="dat1">Nombre del Reactivo:</label>
                            <input type="text" name="Reacivo_Nombre" id="Reacivo_Nombre">
                        </div>
                        <div>
                            <label for="dat5">Lote:</label>
                            <input type="text" name="Reactivo_Lote" id="Reactivo_Lote">
                        </div>
                    </div>

                    <div class="datoo">
                        <div>
                            <label for="dat5">Descripción: (Max 60 Caracteres)</label>
                            <input type="text" name="Reactivo_Descripcion" id="Reactivo_Descripcion">
                        </div>
                        
                        <div>
                            <label for="dat4">Cantidad:</label>
                            <input type="text" name="Reactivo_Cantidad" id="Reactivo_Cantidad" >
                        </div>
                    </div>
                    <div class="datoo">
                        <div>
                            <label for="dat4">Fecha Caducidad:</label>
                            <input type="Date" name="Reactivo_Caducidad" id="Fecha_Caducidad">
                        </div>
                    </div>
                </div>

                <div class="botones">
                    <input type="submit" value="Dar de Alta" id="Agregar_Reactivo">
                    <input type="button" value="Regresar" id="btn_Regresar">

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
                            <label for="buscar">Buscar Reactivo: (Nombre, lote)</label>
                            <input type="text" id="campo" name="campo">
                        </div>
                    </div>

                    <table>
                        <thead>
                            <th>Nombre</th>
                            <th>Versión</th>
                            <th>Descripcion</th>
                            <th>Cantidad</th>
                            <th>Fecha Caducidad</th>
                            <th>Lote</th>
                            <th>Estado</th>
                            <th>Actualizar</th>
                            <th>Eliminar</th>
                            <th>Versiónes</th>
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

<script src="./js/Buscar_Reactivo.js"></script>
<script src="./js/Agregar_Reactivo.js"></script>
<script src="../js/heder.js"></script>
<script src="js/scripts.js"></script>

<?php }else {
    header("location:../Bitacoras.php");
}  ?>
