<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="JASAP WEB">
        <meta name="author" content="Elian Salmerón, Eliel Pérez, Israel Serrrano">
        <link href="CSS/estilos.css?5.0" type="text/css" rel="stylesheet">
        <link href="CSS/fontello.css" rel="stylesheet">
        <link href="CSS/AgregarEmp.css?5.0" type="text/css" rel="stylesheet">
        <script type="text/javascript" src="js/crudAdmin.js"></script>
        <title>Agregar Empleado</title>
    </head>

    <body>

        <header>
            <?php include_once("header.html"); ?>
        </header>

        <nav>
            <?php include_once("menuAdmin.php") ?>
        </nav>

        <div class="form-div">
            <h2><span>Agregar Empleados</span></h2>
            <div class="comp-crud">
                <div class="fun" id="selected">
                    <a href="agregarEmp.php"><img class="icono" src="Img/Iconos/agregar.png"></a>
                    <p>Agregar</p>
                </div>
                <div class="fun">
                    <a href="consultarEmp.php"><img class="icono" src="Img/Iconos/consultar.png"></a>
                    <p>Consultar</p>
                </div>
                <div class="fun">
                    <a href="actualizarEmp.php"><img class="icono" src="Img/Iconos/actualizar.png"></a>
                    <p>Actualizar</p>
                </div>
                <div class="fun">
                    <a href="eliminarEmp.php"><img class="icono" src="Img/Iconos/eliminar.png"></a>
                    <p>Eliminar</p>
                </div>
            </div>

            <div class="register-comp">
                <form id="form-component-register" method="post" action="modelo/InsertarEmp.php">
                    <div>
                        <label id="label1" for="nombre">Nombre: </label>
                        <input class="campos" type="text" name="nombre" size="30" value="" required>
                    </div>
                    <div>
                        <label id="label2" for="direccion">Direcci&oacute;n: </label>
                        <input class="campos" type="text" name="direccion" size="30" required>
                    </div>
                    <div>
                        <label id="label3" for="telefono">Tel&eacute;fono: </label>
                        <input class="campos" type="text" name="telefono" size="30" required maxlength = "10">
                    </div>
                    <div>
                        <label id="label4" for="rfc">RFC: </label>
                        <input class="campos" type="text" name="rfc" size="30" required maxlength = "13">
                    </div>
                    <div>
                        <label id="label5" for="correo">Correo electr&oacute;nico: </label>
                        <input class="campos" type="text" name="correo" size="21" required>
                    </div>
                    <div>
                        <label id="label6" for="usuario">Nombre de usuario: </label>
                        <input class="campos" type="text" name="usuario" size="20" required>
                    </div>
                    <div>
                        <label id="label7" for="contrasena">Contrase&ntilde;a: </label>
                        <input class="campos" type="password" name="contrasena" size="29" required maxlength = "12">
                    </div>
                    <div>
                        <label id="label8" for="rol">Rol: </label>
                        <select class="cat" name="categoria">
                            <option>Administrador</option>
                            <option>T&eacute;cnico</option>
                            <option>Usuario de ventas</option>
                        </select>
                    </div>
                </form>
            </div>
            <div id="botones">
                <input class="button" type="submit" name="Guardar" value="Guardar" form="form-component-register"
                onclick = "return validaDatosEmp(telefono, rfc, correo, 0);">
                <input class="button" type="button" name="Cancelar" value="Cancelar" onclick="location.href='gestionEmp.php'">
            </div>
     </div>    
        <footer>
            <?php include_once("footer.html") ?>
        </footer>
    </body>
</html>

