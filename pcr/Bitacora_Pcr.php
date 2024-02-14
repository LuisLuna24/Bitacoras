<?php
ob_start();
session_start();
if(isset($_GET['No_Folio'])){
    $_SESSION["pcr_fol"]=$_GET['No_Folio'];
}else{
    $_SESSION["pcr_fol"];
}

$id_Usuario=$_SESSION['id_usuario'];
$Nombre=$_SESSION['nombre'];
$Apellido=$_SESSION['apellido'];
if($id_Usuario=="" || $id_Usuario==null){
    header("location:../index.php");
}else{  ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bit_resul_pcr.css" />
    <title>Bitacora de resultados PCR</title>
    <link rel="stylesheet" href="../css/header.css" />
    <script src="../librerias/jquery/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="../librerias/select2/css/select2.css" />
    <script src="../librerias/select2/select2.js"></script>
</head>

<body>
    <?php require "../global/header.php" ?>

    <section class="dat_resul_pcr">
        <div class="dat_resul_contenedor">
            <div class="dat_resul_titulo">
                <h1>Bitacora de Resultados de PCR</h1>
                <div class="linea_titulo"></div>
            </div>
            <form class="dat_resul_form" id="Pcr_Form">
                <div class="datos_pcreal">
                    <div class="datos">
                        <label>No. Registro:</label>
                        <input type="text" name="Nombre" />
                    </div>
                    <div class="datos">
                        <label>Cantidad:</label>
                        <input type="text" name="Cantidad" />
                    </div>
                </div>
                
                <div class="datos_pcreal">
                    <div class="datos">
                        <label>Analisis:</label>
                        <select name="Analisis" id="Analisis_Pcr"></select>
                    </div>
                    <div class="datos">
                        <label>Fecha:</label>
                        <input type="Date" name="Fecha" />
                    </div>
                </div>
                <div class="datos_pcreal">
                    <div class="datos">
                        <label>Especie:</label>
                        <select name="Especie" id="Especie_pcr">
                            <option value="1">Canino</option>
                        </select>
                    </div>
                    <div class="datos">
                        <label>Resultados:</label>
                        <select name="Resultados">
                            <option value="Negativo">Negativo</option>
                            <option value="Positivo">Positivo</option>
                        </select>
                    </div>
                </div>
                <div class="datos_pcreal">
                    <div class="datos">
                        <label>Agrosa:</label>
                        <input type="text" name="Agrosa" />
                    </div>
                    <div class="datos">
                        <label>Voltaje:</label>
                        <input type="text" name="Dato_V" />
                    </div>
                    <div class="datos">
                        <label>Tiempo(min):</label>
                        <input type="text" name="Tiempo" />
                    </div>
                </div>
                <div class="checks_pcreal">
                    <div class="datos_check">
                        <label>Sanitizo:</label>
                        <input type="checkbox" name="pcreal_sanitizo" id="pcreal_sanitizo" value="1" />
                    </div>
                    <div class="datos_check">
                        <label>Tiempo UV 20 min:</label>
                        <input type="checkbox" name="pcreal_uv" id="pcreal_uv" value="1" />
                    </div>
                </div>
                <div class="dat_resul_titulo">
                    <h2>Equipo Seleccionado</h2>
                </div>
                <div class="Datos_Metodo_Equipo">
                        <div class="datos Agregar_Equio_div">
                            <label>Selecciona Equipo</label>
                            <select name="Equipo_SelectAgregar" id="Equipo_Select"></select>
                            <input type="button" value="Agregar_Equipo" id="Agregar_Equipo">
                        </div>
                    <table>
                        <thead>
                            <th>No. Equipo</th>
                            <th>Nombre Equipo</th>
                            <th>Eliminar</th>
                        </thead>
                        <tbody id="Equipo_Tabla"></tbody>
                    </table>
                </div>
                <br>
                <div class="botones">
                    <input type="button" value="Agregar PCR" id="Agregar_Pcr">
                    <?php 
                    if(isset($_GET['No_Folio'])){
                        ?> <input type="button" value="Actualizar PCR" id="Actualizar_Pcr"> <?php
                    }
                    ?>
                    <input type="button" value="Ver Bitacroas" id="Ver_Bitacoras">
                </div>
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
                            <label for="buscar">Buscar PCR:</label>
                            <input type="text" id="campo" name="campo" />
                        </div>
                    </div>

                    <table>
                        <thead>
                            <th>No Registro</th>
                            <th>Vercion</th>
                            <th>Analisis</th>
                            <th>Fecha</th>
                            <th>Agarosa</th>
                            <th>Voltaje</th>
                            <th>Tiempo(min)</th>
                            <th>Especie</th>
                            <th>Resultado</th>
                            <th>Eliminar</th>
                        </thead>
                        <tbody id="content"></tbody>
                    </table>
                    <div class="Tablas_Paginas" id="nav-paginacion"></div>
                </div>
            </form>
        </div>
    </section>
    <?php require "../global/footer.php" ?>
</body>

</html>

<script src="./js/scripts.js"></script>
<script src="./js/Buscar_Equipo.js"></script>
<script src="./js/Agregar_Equipo.js"></script>
<script src="./js/Buscar_Pcr.js"></script>
<script src="./js/Buscar_Analisis.js"></script>
<script src="./js/Agregar_Pcr.js"></script>
<script src="./js/Actualizar_Pcr.js"></script>

<?php }  ?>