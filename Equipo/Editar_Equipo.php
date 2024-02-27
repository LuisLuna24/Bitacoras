<?php
ob_start();
session_start();

$_SESSION['Equipo']=$_GET['Equipo'];

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
        <div class="Equipo_Contenedor">
            <div class="Equipo_Titulo">
                <h1>Equipo</h1>
            </div>
            <form class="Equipo_Form" id="Editar_Form">
                <div class="Dato_Equipo">
                    <div class="Dato">
                        <label>No. Inventario</label>
                        <input type="text" name="Inventario_Equipo" id="Inventario_Equipo">
                    </div>
                    <div class="Dato">
                        <label>Descripcion</label>
                        <input type="text" name="Descripcion_Equipo" id="Descripcion_Equipo">
                    </div>
                    
                </div>
                <div class="Dato_Equipo">
                    <div class="Dato">
                        <label>Nombre</label>
                        <input type="text" name="Nombre_Equipo" id="Nombre_Equipo">
                    </div>
                    <div class="Dato">
                        <label>Area</label>
                        <select name="Area_Equipo" id="Area_Equipo"></select>
                    </div>
                </div>
                <div class="Dato_Equipo">
                    <div class="Dato">
                        <label>Estado del equipo:</label>
                        <select name="Estado_Equipo" id="">
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                            <option value="Baja">Baja</option>
                        </select>
                    </div>
                </div>
            </form>
            <div class="Equipo_Botones">
                <input type="button" value="Actualizar" id="Actualizar_Equipo">
                <input type="button" value="Cancelar" id="Cancelar_Actualriza">
            </div>
        </div>
    </section>


    <?php require "../global/footer.php" ?>
</body>
</html>

<script src="./js/scripts.js"></script>
<script src="./js/Buscar_Area.js"></script>
<script src="./js/Buscar_Actualizar_Equipo.js"></script>
<script src="./js/Actualizar_Equipo.js"></script>
<script src="../js/heder.js"></script>

<?php }  ?>