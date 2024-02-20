<?php
ob_start();
session_start();
$id_Usuario=$_SESSION['id_usuario'];
$Nombre=$_SESSION['nombre'];
$Apellido=$_SESSION['apellido'];
if($id_Usuario=="" || $id_Usuario==null){
    header("location:index.php");
}else{  ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/Administrador.css">
    <title>Menú Administrador</title>
    <script src="./librerias/jquery/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="./librerias/select2/css/select2.css">
    <script src="./librerias/select2/select2.js"></script>
</head>
<body>
    <?php require "./global/header.php"  ?>
    <section class="Cabesera">
        <div class="Cabecera_Contenedor">
            <div class="Cabecera_Titulo">
                <h1>Bienvenido</h1>
                <h2>
                    <?php echo $Nombre." ".$Apellido  ?>
                </h2>
                <p>Menú de Administrador</p>
            </div>
        </div>
    </section>

    <section class="Opciones">
        <div class="Opciones_Contenedor">
            <div class="Opciones_Card">
                <div class="Card_Titulo">
                    <h3>Cambiar versiones de bitácoras</h3>
                    <p>Permite modificar las versiones de calidad de las bitácoras</p>
                </div>
                <div class="Card_Boton">
                    <input type="button" value="Cambiar">
                </div>
            </div>
            <div class="Opciones_Card">
                <div class="Card_Titulo">
                    <h3>Recuperar contraseña usuario</h3>
                    <p>Permite recuperar las contraseñas de los usuarios registrados.</p>
                </div>
                <div class="Card_Boton">
                    <input type="button" value="Recuperar" id="Recuperar_Contraseña">
                </div>
            </div>
            <div class="Opciones_Card">
                <div class="Card_Titulo">
                    <h3>Registrar usuario</h3>
                    <p>Permite registra nuevos usuarios al sistema</p>
                </div>
                <div class="Card_Boton">
                    <input type="button" value="Registar">
                </div>
            </div>
            <div class="Opciones_Card">
                <div class="Card_Titulo">
                    <h3>Dar de baja usuarios</h3>
                    <p>Permite dar de baja a los usuarios del sistema (no elimina)</p>
                </div>
                <div class="Card_Boton">
                    <input type="button" value="Dar de baja">
                </div>
            </div>
        </div>
    </section>

    <section class="Cotraseña" id="Contraseña">
        <form class="Contraseña_Contenedor" id="Contraseña_form">
            <div class="Contraseña_Titulo">
                <h2>Recuperar Contaseña</h2>
                <p>Recuperar contraseña de usuario</p>
            </div>
            <div class="Contaseña_Datos">
                <label for="Contraseña">Seleccione usuario:</label>
                <select name="Contraseña_Usuario" id="Contraseña_Usuario"></select>
            </div>
            <div class="Contaseña_Datos">
                <label for="Contraseña">Contraseña Nueva:</label>
                <input type="text" name="Contraseña_Recuperar" id="Contraseña_Recuperar">
            </div>
            <div class="contraseña_boton">
                <input type="button" value="Recuperar" id="Recuperar_btn">
            </div>
        </form>
    </section>
    
    <?php require "./global/footer.php"  ?>
</body>
</html>

<script src="js/Administrador.js"></script>

<?php } ?>