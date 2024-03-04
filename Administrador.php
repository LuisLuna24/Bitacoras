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
    <div class="custom-shape-divider-top-1700880565">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path
                d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z"
                class="shape-fill"></path>
        </svg>
    </div>

    <section class="Opciones">
        <div class="Opciones_Contenedor">
            <div class="Opciones_Card">
                <div class="Card_Titulo">
                    <h3>Cambiar versiones de bitácoras</h3>
                    <p>Permite modificar las versiones de calidad de las bitácoras</p>
                </div>
                <div class="Card_Boton">
                    <input type="button" value="Cambiar" id="Calidad_Bitacoras">
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
                    <input type="button" value="Registar" id="Registar_Usuario">
                </div>
            </div>
            <div class="Opciones_Card">
                <div class="Card_Titulo">
                    <h3>Desactivar usuario</h3>
                    <p>Permite deactiviar a los usuarios del sistema (no elimina)</p>
                </div>
                <div class="Card_Boton">
                    <input type="button" value="Dar de baja" id="Baja_Usuario">
                </div>
            </div>
            <div class="Opciones_Card">
                <div class="Card_Titulo">
                    <h3>Activar usuarios</h3>
                    <p>Permite activar a los usuarios del sistema</p>
                </div>
                <div class="Card_Boton">
                    <input type="button" value="Activar usuario" id="Alta_Usuario">
                </div>
            </div>
            <?php if($id_Usuario=='11111111'){ ?>
                <div class="Opciones_Card">
                    <div class="Card_Titulo">
                        <h3>Permisos de Administrador</h3>
                        <p>Permite dar permisos de administrador a un usuario</p>
                    </div>
                    <div class="Card_Boton">
                        <input type="button" value="Activar usuario" id="Alta_Administrador">
                    </div>
                </div>

            <?php } ?>
        </div>
    </section>
<!--========================Recuperer Contraseña=====================================-->
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
                <label for="Contraseña">Correo:</label>
                <input type="text" name="Correo_Recuperar" id="Correo_Recuperar" readonly>
            </div>
            <div class="Contaseña_Datos">
                <label for="Contraseña">Contraseña Nueva:</label>
                <input type="text" name="Contraseña_Recuperar" id="Contraseña_Recuperar">
            </div>
            <div class="contraseña_boton">
                <input type="button" value="Recuperar" id="Recuperar_btn">
                <input type="button" value="Cancelar" id="Recuperar_btn_Canselar">
            </div>
        </form>
    </section>
<!--========================Baja Usuarios=====================================-->
    <section class="Baja" id="Baja">
        <form class="Contraseña_Contenedor" id="Baja_Form">
            <div class="Contraseña_Titulo">
                <h2>Dar de baja un usuario</h2>
            </div>
            <div class="Contaseña_Datos">
                <label for="Contraseña">Seleccione usuario:</label>
                <select name="Baja_Usuario" id="Contraseña_Usuario"></select>
            </div>
            <div class="contraseña_boton">
                <input type="button" value="Baja" id="Baja_btn">
                <input type="button" value="Cancelar" id="Baja_btn_Canselar">
            </div>
        </form>
    </section>
<!--========================Alta Usuarios=====================================-->
    <section class="Baja" id="Alta">
        <form class="Contraseña_Contenedor" id="Alta_Form">
            <div class="Contraseña_Titulo">
                <h2>Activar un usuario</h2>
            </div>
            <div class="Contaseña_Datos">
                <label for="Contraseña">Seleccione usuario:</label>
                <select name="Baja_Usuario" id="Select_Usuario"></select>
            </div>
            <div class="contraseña_boton">
                <input type="button" value="Activar" id="Alta_btn">
                <input type="button" value="Cancelar" id="Alta_btn_Canselar">
            </div>
        </form>
    </section>

    <!--========================Actualizar Bitacoras=====================================-->
    <section class="Baja" id="Calidad">
        <form class="Contraseña_Contenedor" id="Calidad_Form">
            <div class="Contraseña_Titulo">
                <h2>Versión de Bitácoras</h2>
            </div>
            <div class="Contaseña_Datos">
                <label for="Contraseña">Reactivos:</label>
                <input type="text" name="Bit_Reactivos" id="Bit_Reactivos" >
            </div>
            <input type="button" value="Actualizar" id="Reactivos_btn">
            <hr>
            <div class="Contaseña_Datos">
                <label for="Contraseña">Extraccion:</label>
                <input type="text" name="Bit_Extraccion" id="Bit_Estraccion">
            </div>
            <input type="button" value="Actualizar" id="Extraccion_btn">
            <hr>
            <div class="Contaseña_Datos">
                <label for="Contraseña">PCR:</label>
                <input type="text" name="Bit_Pcr" id="Bit_Pcr" >
            </div>
            <input type="button" value="Actualizar" id="Pcr_btn">
            <hr>
            <div class="Contaseña_Datos">
                <label for="Contraseña">PCR Tiempo Real:</label>
                <input type="text" name="Bit_Pcreal" id="Bit_Pcreal">
            </div>
            <input type="button" value="Actualizar" id="Pcreal_btn">
            <hr>
            
            <div class="contraseña_boton">
                <input type="button" value="Regresar" id="Calidad_btn_Canselar">
            </div>
        </form>
    </section>
    <!--========================Permisoso de Administrador=====================================-->
    <section class="Baja" id="Admin">
        <form class="Contraseña_Contenedor" id="Form_Permisos_Admin">
            <div class="Contraseña_Titulo">
                <h2>Permisos de Administrador</h2>
            </div>
            <hr>
            <div class="Contaseña_Datos">
                <h4>Dar Permisos de Admin</h4>
                <label for="Contraseña">Seleccione usuario:</label>
                <select name="Alta_Admin" id="Alta_Admin"></select>
            </div>
            <div class="contraseña_boton">
                <input type="button" value="Activar Permisos" id="Permisos_Admin">
            </div>
            <hr>
            <div class="Contaseña_Datos">
                <h4>Quitar Permisos de Admin</h4>
                <label for="Contraseña">Seleccione usuario:</label>
                <select name="Baja_Admin" id="Baja_Admin"></select>
            </div>
            <div class="contraseña_boton">
                <input type="button" value="Quitar Permisos" id="Quitar_Admin">
            </div>
            <hr>
            <div class="contraseña_boton">
                <input type="button" value="Regresar" id="Admin_btn_Canselar">
            </div>
        </form>
    </section>

    
    <?php require "./global/footer.php"  ?>
</body>
</html>

<script src="js/Administrador.js"></script>

<?php }else {
    header("location:Bitacoras.php");
}  ?>
