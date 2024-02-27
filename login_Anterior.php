<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secion</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/alerta.css">
    <link rel="stylesheet" href="css/header.css">
    <script src="./librerias/jquery/jquery-3.2.1.min.js"></script>
</head>
<body>
    <header>
        <div class="header_contenedor">
            <img src="./img/Gsmall.webp" alt="logo">
            <a href="./registrarce.php">Registrarse</a>
        </div>
    </header>

    <section class="Secion">
        <div class="Secion_Contenedor">
            <form class="Form_Secion" id="Form_Secion">
                <h1>Iniciar Sesión</h1>
                <div class="Form_Datos">
                    <div class="Contenedor_Datos">
                        <div class="Datos">
                            <input type="text" required="" autocomplete="off" class="input" name="In_Correo">
                            <label for="correo"  class="user-label">Correo</label>
                        </div>
                        <div class="Datos">
                            <input type="password" required="" autocomplete="off" class="input" name="In_Contrasena">
                            <label for="correo" class="user-label">Contraseña</label>
                        </div>
                    </div>
                </div>
                <div class="Form_Boton">
                    <input type="submit" value="Iniciar" id="Iniciar_Sesion">
                </div>
            </form>
            <div class="Secion_Imagen">
                <img src="./img/Gsmall.webp" alt="logo">
                <h1>Gisena <span>Labs</span> </h1>
                <p>¿No tienes cuneta? <a href="./registrarce.php">Registrarse</a></p>
            </div>
            <?php  require "./global/Alerta_Index.php" ?>
        </div>
    </section>
    <?php  require "./global/footer.php" ?>
</body>
</html>

<script src="./js/Secion.js"></script>