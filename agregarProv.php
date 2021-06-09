<?php session_start(); ?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="JASAP WEB">
        <meta name="author" content="Elian Salmerón, Eliel Pérez, Israel Serrano">
        <link href="CSS/estilos.css?5.0" type="text/css" rel="stylesheet">
        <link href="CSS/fontello.css" rel="stylesheet">
        <link href="CSS/AgregarProv.css?5.0" type="text/css" rel="stylesheet">
        <script type="text/javascript" src="js/crudAdmin.js?5.0"></script>
        <title>Agregar Proveedores</title>
    </head>

    <body>

        <header>
            <?php include_once("header.html"); ?>
        </header>

        <nav>
            <?php include_once("menu.php") ?>
        </nav>

        <div class="form-div">
            <h2><span>Agregar Proveedores</span></h2>
            <div class="comp-crud">
                <div class="fun" id="selected">
                    <a href="agregarProv.php"><img class="icono" src="Img/Iconos/agregar.png"></a>
                    <p>Agregar</p>
                </div>
                <div class="fun">
                    <a href="consultarProv.php"><img class="icono" src="Img/Iconos/consultar.png"></a>
                    <p>Consultar</p>
                </div>
                <div class="fun">
                    <a href="actualizarProv.php"><img class="icono" src="Img/Iconos/actualizar.png"></a>
                    <p>Actualizar</p>
                </div>
                <div class="fun">
                    <a href="eliminarProv.php"><img class="icono" src="Img/Iconos/eliminar.png"></a>
                    <p>Eliminar</p>
                </div>
            </div>

            <div class="register-comp">
                <form id="form-component-register" method="post" action="modelo/InsertarProv.php">
                    <div>
                        <label id="label1" for="nombre">Nombre: </label>
                        <input class="campos" type="text" name="nombre" size="30" value="">
                    </div>
                    <div>
                        <label id="label2" for="rfc">RFC: </label>
                        <input class="campos" type="text" name="rfc" size="30" maxlength = "12">
                    </div>
                    <div>
                        <label id="label3" for="direccion">Direcci&oacute;n: </label>
                        <input class="campos" type="text" name="direccion" size="30">
                    </div>
                    <div>
                        <label id="label4" for="telefono">Tel&eacute;fono: </label>
                        <input class="campos" type="text" name="telefono" size="15" maxlength="10">
                    </div>
                </form>
            </div>
            <div id="botones">
                <input class="button" type="submit" name="" value="Guardar" form="form-component-register"
                onclick = "return validaDatosProv(rfc, telefono, 0);">
                <input class="button" type="button" name="" value="Cancelar" onclick="location.href='gestionProv.php'">
            </div>
        </div>

        <footer>
            <?php include_once("footer.html") ?>
        </footer>
    </body>
</html>