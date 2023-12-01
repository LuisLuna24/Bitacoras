<?php
ob_start();
session_start();
$id_Usuario=$_SESSION['id_usuario'];
$Nombre=$_SESSION['nombre'];
$Apellido=$_SESSION['apellido'];
if($id_Usuario=="" || $id_Usuario==null){
    header("location:index.html");
}else{  ?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipo</title>
    <link rel="stylesheet" href="css/Equipo.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/nuevo.css">
    <link rel="stylesheet" href="css/alerta.css">
    <script src="librerias/jquery/jquery-3.2.1.min.js"></script>
    <script src="./librerias/select2/select2.js"></script>
    <link rel="stylesheet" href="./librerias/select2/css/select2.css">
    <link rel="stylesheet" href="css/AgregarArea.css">
</head>
<body>

    <?php require('./Global/header.php'); ?> 
    <section class="Equipo">
        <div class="Equipo_Contenedor">
            <div class="Equipo_Titulo">
                <h1>Equipo</h1>
            </div>
            <form class="Eqipo_Form" id="Equipo_Form">
                <div class="Equipo_Datos">
                    <div class="Eqipo_Input">
                        <label for="Nombre">Nombre</label>
                        <input type="text" name="Equipo_Nombre" >
                    </div>
                    <div class="Eqipo_Input">
                        <label for="Inventario">No Inventario</label>
                        <input type="text" name="Equipo_Inventario" >
                    </div>
                    <div class="Eqipo_Input">
                        <label for="Email">Area del Equipo</label>
                        <select name="Equipo_Select" id="Equipo_Select"></select>
                    </div>
                </div>
                <div class="Eqipo_Botones">
                    <input type="button" value="Guardar" id="Agregar_Equipo">
                    <input type="button" value="Actualizar Tabla">
                    <input type="button" value="Agregar Area" id="Agregar_Area">
                </div>
            </form>
            <div class="Equipo_Tabla">
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>No. Inventario</th>
                            <th>Area del Equipo</th>
                            <th>Actualizar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody id="Equipo_Tabla"></tbody>
                </table>
            </div>
            <section class="Agregar" id="Agregar_Area_Form">
                <div class=Agregar_Contenedor>
                    <form class="Agregar_Form" id="Area_Form">
                        <div class="Agregar_Titulo">
                            <h2>Agregar Area</h2>
                        </div>
                        <div class=Agregar_Datos>
                            <div class="Eqipo_Input">
                                <label for="Nombre">Nombre</label>
                                <input type="text" name="Nombre_Area" id="Nombre">
                            </div>
                        </div>
                        <div class="Agregar_Botones">
                            <input type="submit" value="Agregar" id="Btn_AgregarArea">
                            <input type="submit" value="Cancelar" id="Btn_CancelarArea">
                        </div>
                    </form>
                </div>
            </section>
            <div class="Alerta" id="Alerta_Secion">
                <div class="Alerta_Contenedor">
                    <div class="Alerta_Titulo">
                        <h2>! Upss... ¡</h2>
                        <label id="Label_Alerta_Secion" for="Registro"></label>
                    </div>
                    <div class="Alerta_Boton">
                        <input type="button" value="Aceptar" id="Alerta_btn_Secion">
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

<script src="jsEquipo/Buscar_Area.js"></script>
<script src="./jsEquipo/Buscar_Equipo.js"></script>
<script src="./jsEquipo/Agregar_Area.js"></script>
<script src="./jsEquipo/Agregar_Equipo.js"></script>

<?php } ?>