<?php
ob_start();
session_start();
$id_Usuario=$_SESSION['id_usuario'];
$Nombre=$_SESSION['nombre'];
$Apellido=$_SESSION['apellido'];
if($id_Usuario=="" || $id_Usuario==null){
    header("location:index.php");
}else if($_SESSION['Nivel']==2){  ?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Alerta_Cerrar.css">
    <title>Registro</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/Registro.css">
    <link rel="stylesheet" href="css/alerta.css">
    <link rel="stylesheet" href="css/header.css">
    <script src="./librerias/jquery/jquery-3.2.1.min.js"></script>
</head>
<body>
    <header class="header" id="header">
        <a href="#" class="name"><img class="logo_gis" alt="" src="./img/Gsmall.webp" ></a>
        <input type="checkbox" id="check">
        <label for="check" class="menu">
        </label>
        <nav class="navbar">
        </nav>
    </header>
    <section class="Registro">
        <div class=Regsitro_contenedor>
            <div class="Regsitro_Formulario">
                <form class="Regsitro_Form" id="Regsitro_Form">
                    <div class="Registro_titulo">
                        <h1>Registrarse</h1>
                    </div>
                    <div class="Regsitro_Datos">
                        <div class="Datos">
                            <input type="text" required="" autocomplete="off" class="input" name="Reg_Nombre">
                            <label for="correo"  class="user-label">Nombre</label>
                        </div>
                        <div class="Datos">
                            <input type="text" required="" autocomplete="off" class="input" name="Reg_Apellido">
                            <label for="correo"  class="user-label">Apellido</label>
                        </div>
                    </div>
                    <div class="Regsitro_Datos">
                        <div class="Datos">
                            <input type="text" required="" autocomplete="off" class="input" name="Reg_Correo" id="Reg_Correo">
                            <label for="correo"  class="user-label">Correo</label>
                        </div>
                        <div class="Datos">
                            <select class="Datos_Area" name="Reg_Area" id="Reg_Area">
                                <option value="0">Seleccione un Area</option>
                                <option value="1">Biologia Molecular</option>
                            </select>
                        </div>
                    </div>
                    <div class="Regsitro_Datos">
                        <div class="Datos">
                            <input type="password" required="" autocomplete="off" class="input" name="Reg_Contrasena1" id="Reg_Contrasena1">
                            <label for="correo"  class="user-label">Contraseña</label>
                        </div>
                        <div class="Datos">
                            <input type="password" required="" autocomplete="off" class="input" name="Reg_Contrasena2" id="Reg_Contrasena2">
                            <label for="correo"  class="user-label">Confirma Contraseña</label>
                        </div>
                    </div>
                    <div class=Registro_Boton>
                        <input type="button" value="Registrarce" id="Registrase_btn" class="Registro_bt">
                    </div>
                </form>
            </div>
            <div class="Regsitro_Imagen">
                <img src="./img/Gsmall.webp" alt="logo">
            </div>
        </div>
        <?php  require "./global/Alerta_Index.php" ?>
    </section>
   
    <?php require "./global/Alerta_Cerrar.php"  ?>
    <script src="js/Script_Cerrar.js"></script>
</body>
</html>

<script src="./js/Validar_Copntrasena.js"></script>
<script src="./js/Refistrarce.js"></script>

<?php } else {
    header("location:Bitacoras.php");
}  ?>