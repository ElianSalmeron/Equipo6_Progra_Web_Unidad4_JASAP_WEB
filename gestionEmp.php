<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="keywords" content="JASAP WEB">
    <meta name="author" content="Elian Salmerón, Eliel Pérez, Israel Serrano">
    <link rel="stylesheet" href="CSS/gestion.css?5.0">
    <link href="CSS/estilos.css?5.0" type="text/css" rel="stylesheet">
    <link href="CSS/fontello.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous"/>
    <title>Gesti&oacute;n Empleados</title>
</head>
    <body>    

        <header>
            <?php include_once("header.html"); ?>
        </header>

        <nav>
            <?php include_once("menu.php") ?>
        </nav>

        <div class="form-con-div">
            <h1><span>Gesti&oacute;n de Empleados</span></h1>
            
            <div class="iconos">        
                <section>
                    <a href="eliminarEmp.php"><img src="Img/Iconos/eliminar.png">
                    </a>
                    <h3>Eliminar</h3>
                </section> 
                <section>
                    <a href="actualizarEmp.php"><img src="Img/Iconos/actualizar.png">
                    </a>
                    <h3>Actualizar</h3>
                </section> 
                <section>
                    <a href="consultarEmp.php"><img src="Img/Iconos/consultar.png">
                    </a>
                    <h3>Consultar</h3>
                </section>
                <section>
                    <a href="agregarEmp.php"><img src="Img/Iconos/agregar.png">
                    </a> 
                    <h3>Agregar</h3>
                </section>
                </div>
                <?php include_once("modelo/gestEmp.php") ?>  
            </div>
        </div>

        <footer>
            <?php include_once("footer.html") ?>
        </footer>

    </body>
</html>