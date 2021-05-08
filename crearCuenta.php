<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="JASAP WEB">
        <meta name="author" content="Elian Salmerón, Eliel Pérez, Israel Serrano">
        <link href="CSS/estilos.css?5.0" type="text/css" rel="stylesheet">
        <link href="CSS/fontello.css" rel="stylesheet">
        <link href="CSS/estiloCreacionCuenta.css?5.0" type="text/css" rel="stylesheet">
        <script type="text/javascript" src="js/registrarCliente.js?5.0"></script>
        <title>Creaci&oacute;n de cuenta</title>
    </head>

    <body>

        <header>
            <?php include_once("header.html"); ?>
        </header>

        <nav>
            <?php include_once("menu.php") ?>
        </nav>

        <div class="div-form">
            <h2>Creaci&oacute;n de cuenta</h2>
            <div class="form-register">
                <form id="user-register" method="post" action="modelo/registrarCliente.php">
                    <div>
                        <label for="nombre_comp">Nombre completo: </label>
                        <input class="campos" type="text" size="24" name="nombre_cliente" value="" required>
                    </div>
                    <div>
                        <label for="correo">Correo electrónico: </label>
                        <input class="campos" type="text" size="24" name="correo" value="" required>
                    </div>
                    <div>
                        <label for="telefono">*Teléfono: </label>
                        <input class="campos" type="text" size="24" name="telefono" value="" maxlength="10">
                    </div>
                    <div>
                        <label for="usuario">Usuario: </label>
                        <input class="campos" type="text" size="24" name="usuario" value="" required>
                    </div>
                    <div>
                        <label for="contraseña">Contraseña: </label>
                        <input class="campos" type="password" size="24" name="password" value="" required maxlength="12">
                    </div>
                    <div>
                        <label for="direccion">*Dirección: </label>
                        <textarea name="direccion" form="user-register"></textarea>
                    </div>
                    <input class="confirm" type="submit" name="" value="Registrarse"
                    onclick = "return validaDatosCliente(correo, telefono);">
                    <input class="back" type="button" name="" value="Cancelar">
                    <p>*Campos opcionales</p>
                </form>
            </div>
        </div>

        <footer>
            <?php include_once("footer.html") ?>
        </footer>
    </body>
</html>