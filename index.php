<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="JASAP WEB">
        <meta name="author" content="Elian Salmerón, Eliel Pérez, Israel Serrano">
        <link href="CSS/estilos.css" type="text/css" rel="stylesheet">
        <link href="CSS/fontello.css" rel="stylesheet">
        <link href="CSS/estiloLogin.css?4.0" type="text/css" rel="stylesheet">
        <title>JASAP WEB</title>
    </head>
    <body>

    <header>
        <?php include_once("header.html"); ?>
    </header>

    <nav>
        <?php include_once("menu.php") ?>
    </nav>

    <section class="form-login">
            <img src="Img/JASAP logo.png">
            <h2>Inicio de sesión</h2>
            <div class="form">
                <form method="post" action="modelo/login.php">
                    <label for="usuario">Usuario: </label>
                    <input class="campos" type="text" name="usuario" value="" placeholder="Usuario" required>
                    <label>Contraseña: </label>
                    <input class="campos" type="password" name="contraseña" value="" placeholder="Contraseña" required>
                    <input class="confirm" type="submit" name="" value="Ingresar">
                </form>
            </div>
    </section>
    
    <footer>
        <?php include_once("footer.html") ?>
    </footer>

    </body>
</html>