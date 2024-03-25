<?php 
ob_start();


if($_SESSION['Nivel']==2){
?>
<header class="header" id="header">
    <a href="#" class="name"><img class="logo_gis" alt="" src="./img/Gsmall.webp" ></a>
    <input type="checkbox" id="check">
    <label for="check" class="menu">
        <i class="bx bx-menu" id="icon-menu"><img class="bx" src="img/menuahambuegesa.webp"></i>
        <i class="bx bx-x" id="close-menu"><img class="bx" src="img/menuahambuegesa.webp"></i>
        
    </label>
    <nav class="navbar">

        <a id="Inicio_Global" href="Principal.php">Inicio</a>
        <a id="Bitacoras_Global" href="Bitacoras.php">Bitácoras</a>
        <a id="Catalogos_Global" href="Catalogos.php">Catalogos</a>
        <a id="Inventario_Global" href="Inventarios.php">Inventarios</a>
        <a id="Administrador_Global" href="Administrador.php">Configuracion</a>
        <a id="Salir_Global" href="#">Salir</a>
        <script src="js/Script_Cerrar.js"></script>
    </nav>
</header>

<?php 
}else if($_SESSION['Nivel']==1){
?>
<header class="header" id="header">
    <a href="#" class="name"><img class="logo_gis" alt="" src="./img/Gsmall.webp" ></a>
    <input type="checkbox" id="check">
    <label for="check" class="menu">
        <i class="bx bx-menu" id="icon-menu"><img class="bx" src="img/menuahambuegesa.webp"></i>
        <i class="bx bx-x" id="close-menu"><img class="bx" src="img/menuahambuegesa.webp"></i>
        
    </label>
    <nav class="navbar">
        <a id="Bitacoras_Global" href="Bitacoras.php">Bitácoras</a>
        <a id="Salir_Global" href="./php/Cerrar.php">Salir</a>
    </nav>
</header>
<?php     
}
?>