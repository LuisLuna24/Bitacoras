<?php
ob_start();
session_start();
$id_Usuario=$_SESSION['id_usuario'];
$Nombre=$_SESSION['nombre'];
if($id_Usuario=="" || $id_Usuario==null){
    header("location:index.html");
}else{  ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/Principal.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <header class="header" id="header">
        <a href="#" class="name"><img class="logo_gis" src="img/Gsmall.webp" alt=""></a>
        <input type="checkbox" id="check">
        <label for="check" class="menu">
            <i class="bx bx-menu" id="icon-menu"><img class="bx" src="img/menuahambuegesa.webp"></i>
            <i class="bx bx-x" id="close-menu"><img class="bx" src="img/menuahambuegesa.webp"></i>
        </label>
        <nav class="navbar">
            <a href="Principal.php"><span class="Selected">Bitácoras</span></a>
            <a href="Proxiamanete.html">Equipo</a>
            <a href="Proxiamanete.html">Análisis</a>
            <a href="Proxiamanete.html">Salir</a>
        </nav>
    </header>

    <section class="Cabesera">
        <div class="Cabecera_Contenedor">
            <div class="Cabecera_Titulo">
                <h1>Bienvenido</h1>
                <h2>
                    <?php echo $Nombre ?>
                </h2>
                <p>Bitácoras de Análisis</p>
            </div>
        </div>
    </section>

    <div class="custom-shape-divider-top-1700880565">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path
                d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z"
                class="shape-fill"></path>
        </svg>
    </div>

    <section class="Menu">
        <div class="Menu_Contenedor">
            <div class="Menu_Cards">
                <div class="Card">
                    <div class="Card_Titulo">
                        <h2>Bitácoras de Reactivos</h2>
                    </div>
                    <div class="Card_Contenido">
                        <input type="button" value="Nueva Bitacora" id="Reactivo">
                        <input type="button" value="Ver Bitacoras" id="Proximanete">
                    </div>
                </div>
                <div class="Card">
                    <div class="Card_Titulo">
                        <h2>Bitácoras de Extracción</h2>
                    </div>
                    <div class="Card_Contenido">
                        <input type="button" value="Nueva Bitacora" id="Proximanete2">
                        <input type="button" value="Ver Bitacoras" id="Proximanete3">
                    </div>
                </div>
                <div class="Card">
                    <div class="Card_Titulo">
                        <h2>Bitácoras de Resultados de PCR</h2>
                    </div>
                    <div class="Card_Contenido">
                        <input type="button" value="Nueva Bitacora" id="Proximanete4">
                        <input type="button" value="Ver Bitacoras" id="Proximanete5">
                    </div>
                </div>
                <div class="Card">
                    <div class="Card_Titulo">
                        <h2>Bitácoras de Resultados de PCR</h2>
                        <h3>Tiempo Real</h3>
                    </div>
                    <div class="Card_Contenido">
                        <input type="button" value="Nueva Bitacora" id="Proximanete6">
                        <input type="button" value="Ver Bitacoras" id="Proximanete7">
                    </div>
                </div>
            </div>
        </div>
    </section>


    <footer calss="Footer">
        <div class="Fotter_Contenedor">
            <div class="Footer_Logo">
                <img src="img/Smallfooterlogo.webp" alt="">
                <label for="Copyright">Gisenalabs® Todos los derechos reservados</label>
            </div>
        </div>
    </footer>
</body>

</html>
<script src="librerias/jquery/jquery-3.2.1.min.js"></script>
<script src="js/Proximamente.js"></script>
<script src="./jsreactivos/Nuevo_Reactivo.js"></script>

<?php } ?>