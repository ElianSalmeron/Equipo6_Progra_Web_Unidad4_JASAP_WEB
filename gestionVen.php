<?php session_start(); ?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="JASAP WEB">
        <meta name="author" content="Elian Salmerón, Eliel Pérez, Israel Serrano">
        <link href="CSS/estilos.css?5.0" type="text/css" rel="stylesheet">
        <link href="CSS/fontello.css?5.0" rel="stylesheet">
        <link href="CSS/gestion.css?5.0" type="text/css" rel="stylesheet">
        <title>Gesti&oacute;n Ventas</title>
    </head>

    <body>

        <header>
            <?php include_once("header.html"); ?>
        </header>

        <nav>
            <?php include_once("menu.php") ?>
        </nav>


        <div class="form-con-div">
            <h1><span>Gesti&oacute;n de Ventas</span></h1>
            <div class="iconos">        
                <section>
                    <a href="consultarVen.php"><img src="Img/Iconos/consultar.png"></a>
                    <h3>Consultar</h3>
                </section>
                <section>
                    <a href="agregarVen.php"><img src="Img/Iconos/agregar.png"></a> 
                    <h3>Agregar</h3>
                </section>
            </div>
            <?php include_once("modelo/gestVen.php"); ?>  
        </div>

        <footer>
            <?php include_once("footer.html") ?>
        </footer>
    </body>
</html>