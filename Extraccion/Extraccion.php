<?php
ob_start();
session_start();
if(isset($_GET['No_Folio'])){
    $_SESSION['No_Foli']=$_GET['No_Folio'];
}else{
    $_SESSION['No_Foli'];
}

$id_Usuario=$_SESSION['id_usuario'];
$Nombre=$_SESSION['nombre'];
$Apellido=$_SESSION['apellido'];
if($id_Usuario=="" || $id_Usuario==null){
    header("location:../../index.php");
}else{  ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="css/extraccion.css" />
    <link rel="stylesheet" href="../css/header.css" />
    <script src="../librerias/jquery/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="../librerias/select2/css/select2.css" />
    <script src="../librerias/select2/select2.js"></script>
</head>

<body>
    <?php require "../global/header.php" ;?>
    <section class="bit_extraccion">
        <div class="bit_extraccion_contenedor">
            <form class="bit_extraccion_form" id="Form_Extraccion">
                <div class="bit_extraccion_titulo">
                    <h1>Bitacora de Extraccion</h1>
                    <div class="linea_titulo"></div>
                </div>

                <div class="extraccion_datos">
                    <div class="datos_extraccion">
                        <div class="No_Registro">
                            <div>
                                <label for="ext">No.Registro:</label>
                                <input type="text" name="Registro_Exteracion">
                            </div>
                            <div>
                                <label for="ext">Cantidad:</label>
                                <input type="text" name="Cantidad_Exteracion" value="1">
                            </div>
                        </div>

                        <div class="dato">
                            <label for="dato2">Fecha de extraccion:</label>
                            <input type="date" name="Fecha_Exteracion">
                        </div>
                    </div>

                    <div class="datos_extraccion">
                        <div class="dato">
                            <label for="">Metodo utilizado:</label>
                            <select name="Metodo_Exteracion" id="metodo_select"></select>
                        </div>
                        <div class="dato">
                            <label for="dato6">Analisis:</label>
                            <select name="Analisis_Select" id="Analisis_Select"></select>
                        </div>
                    </div>

                    <div class="datos_extraccion">
                        <div class="dato">
                            <label for="dato7">Area:</label>
                            <select name="Area_Select" id="Area_Select"></select>

                        </div>

                        <div class="dato10">
                            <label for="dato10">Conc ng/ul:</label>
                            <input type="text" name="Conc_Exteracion">
                        </div>
                    </div>

                    <div class="datos_extraccion">
                        <div class="dato11">
                            <label for="dato11">Dato 260/280:</label>
                            <input type="text" name="280_Exteracion">
                        </div>
                        <div class="dato12">
                            <label for="dato12">Dato 260/230:</label>
                            <input type="text" name="230_Exteracion">
                        </div>
                    </div>
                </div>
                <div class="Datos_Metodo_Equipo">
                        <div class="dato">
                            <label>Selecciona Equipo</label>
                            <select name="Equipo_SelectAgregar" id="Equipo_Select"></select>
                            <input type="button" value="Agregar_Equipo" id="Agregar_Equipo">
                        </div>
                    <table>
                        <thead>
                            <th>No. Equipo</th>
                            <th>Nombre Equipo</th>
                        </thead>
                        <tbody id="Equipo_Tabla"></tbody>
                    </table>
                </div>
                <div class="botones">
                    <input type="submit" value="Agregar Extraccion" id="Agregar_Extraccion">
                    <input type="submit" value="Salir">
                </div>
            </form>
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
                        <label for="buscar">Buscar equipo</label>
                        <input type="text" id="campo" name="campo">
                    </div>
                </div>

                <table>
                    <thead>
                        <th>No. Registro</th>
                        <th>Fecha de Extraccion</th>
                        <th>Metodo</th>
                        <th>Analisis</th>
                        <th>Area</th>
                        <th>Conc ng/ul</th>
                        <th>Dato 260/280</th>
                        <th>Dato 260/230</th>
                        <th>Usuario</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </thead>
                    <tbody id="content"></tbody>
                </table>
                <div class="Tablas_Paginas" id="nav-paginacion"></div>
            </div>
        </div>
    </section>
    <?php require "../global/footer.php" ?>
</body>

</html>



<script src="js/Buscar_TabalaExtraccion.js"></script>
<script src="js/Buscar_Datos.js"></script>
<script src="./js/scripts.js"></script>
<script src="./js/Nueva_Extraccion.js"></script>
<script src="./js/Nuevo_Equipo.js"></script>
<?php }  ?>