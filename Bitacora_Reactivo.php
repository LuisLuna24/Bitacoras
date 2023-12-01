<?php
ob_start();
session_start();
$id_Usuario=$_SESSION['id_usuario'];
$Nombre=$_SESSION['nombre'];
$Apellido=$_SESSION['apellido'];
$idBitacora=$_SESSION["idBitacora"];
if($id_Usuario=="" || $id_Usuario==null){
    header("location:index.html");
}else{  ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reactivos</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/Reactivos.css">
    <link rel="stylesheet" href="./librerias/select2/css/select2.css">
    <script src="./librerias/jquery/jquery-3.2.1.min.js"></script>
    <script src="./jsreactivos/Bitacoras_Select.js"></script>
    <script src="./librerias/select2/select2.js"></script>
    <link rel="stylesheet" href="./librerias/select2/css/select2.css">
</head>
<body>
    
    <?php require('./Global/header.php'); ?> 

    <section class="Reactivos">
        <div class="Reactivos_Contenedor">
            <div class="Reactivos_Titulo">
                <h1>Bitacora de Reactivos</h1>
            </div>
            <form class="Reactivos_Form" id="Reactivos_Form">
                <div class="Reactivos_Identificadores">
                    <input type="text" value="<?php echo $idBitacora;  ?>" readonly>
                </div>
            
                <div class="Reactivos_Datos">
                    <div class="Datos">
                        <label for="Nombre">Nombre:</label>
                        <input type="text">
                    </div>
                    <div class="Datos">
                        <label for="Lote">Lote:</label>
                        <input type="text">
                    </div>
                </div>
                <div class="Reactivos_Datos">
                    <div class="Datos">
                        <label for="apertura">Fecha apertura:</label>
                        <input type="date" id='Fecha_Reactivo'>
                    </div>
                    <div class="Datos">
                        <label for="caducidad">Fecha caducidad:</label>
                        <input type="date">
                    </div>
                </div>
                <div class="Reactivos_Datos">
                    <div class="Datos">
                        <label for="Elaboro">Prueba reactivo:</label>
                        <select id="Reactivos_Select" class="Reactivos_Select"></select>
                    </div>
                    <div class="Datos">
                        <label for="caducidad">Elaboro:</label>
                        <select id=Elaboro  onchange="this.options[0].selected=true">
                            <option value="<?php $id_Usuario ?>" selected> <?php echo $Nombre.' '.$Apellido   ?> </option>
                        </select>
                    </div>
                </div>
                <div class="Reactivos_Botones">
                    <input type="button" value="Agregar">
                    <input type="button" value="Actualizar Tabala">
                    <input type="button" value="Generar PDF">
                </div>
            </form>
            <div class="Reactivos_Tabla">
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Lote</th>
                            <th>Fecha apertura</th>
                            <th>Fecha caducidad</th>
                            <th>Prueba reactivo</th>
                            <th>Elaboro</th>
                        </tr>
                    </thead>
                    <tbody id="Reactivos_Tabla"></tbody>
                </table>
            </div>
            <div class="Opciones_Contenedor">
                <div class="Opciones_Titulo">
                    <h5>Bitacoras</h5>
                </div>
                <div class="Opciones">
                    <input type="button" value="Extracción">
                    <input type="button" value="PCR">
                    <input type="button" value="PCR Tiempo Real">
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

<script src="./jsreactivos/Scripts.js"></script>

<?php } ?>