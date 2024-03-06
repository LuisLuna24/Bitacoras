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
    <header class="header" id="header">
        <a href="#" class="name"><img class="logo_gis" alt="" src="./img/Gsmall.webp" ></a>
        <input type="checkbox" id="check">
        <label for="check" class="menu">
        </label>
        <nav class="navbar">
        </nav>
    </header>

    <section class="Sesion">
        <div class="Sesion_Contenedor">
            <div class="Sesion_Imagen">
                <img src="img/Gsmall.webp" alt="Logo Gisena">
                <h1>Iniciar Sesión</h1>
                <p>Bitácoras de Biología Molecular</p>
            </div>
            <form class="Sesion_Form" id="Form_Secion">
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
                <div class="Sesion_Boton">
                    <input type="submit" value="Iniciar" id="Iniciar_Sesion">
                </div>
            </form>
            
            <?php  require "./global/Alerta_Index.php" ?>
        </div>
    </section>
    <?php  require "./global/footer.php" ?>
</body>
</html>

<script src="./js/Secion.js"></script>