<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="JASAP WEB">
        <meta name="author" content="Elian Salmerón, Eliel Pérez, Israel Serrano">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous"/>
        <link href="CSS/estilos.css?5.0" type="text/css" rel="stylesheet">
        <link href="CSS/fontello.css" rel="stylesheet">
        <link href="CSS/consultaProv.css?5.0" type="text/css" rel="stylesheet">
        <title>Consultar Proveedores</title>
    </head>

    <body>

        <header>
            <?php include_once("header.html"); ?>
        </header>

        <nav>
            <?php include_once("menuAdmin.php") ?>
        </nav>


        <div class="form-con-div">
            <h2><span>Consultar Proveedores</span></h2>
            <div class="iconos">        
                <section>
                    <a href="eliminarProv.php"><img src="img/Iconos/eliminar.png"></a>
                    <h3>Eliminar</h3>
                </section> 
                <section>
                    <a href="actualizarProv.php"><img src="img/Iconos/actualizar.png"></a>
                    <h3>Actualizar</h3>
                </section> 
                <section id="selected">
                    <a href="consultarProv.php"><img src="img/Iconos/consultar.png"></a>
                    <h3>Consultar</h3>
                </section>
                <section>
                    <a href="agregarProv.php"><img src="img/Iconos/agregar.png"></a> 
                    <h3>Agregar</h3>
                </section>
                </div>

                <div class="busqueda">
                    <form>
                        <label for="id">Buscar proveedor: </label>
                        <input class="campob" type="text" name="id" size="10" placeholder=" Buscar" required>
                        <input class="button" type="submit" name="Buscar" value="Buscar">
                    </form>
                </div>

                <div class="most-prov">
                    <table>
                        <tr class="cabt">
                        <td><strong> id_proveedor</strong></td>
                        <td><strong> Nombre</strong></td>
                        <td><strong> RFC</strong></td>
                        <td><strong> Direcci&oacute;n</strong></td>
                        <td><strong> Tel&eacute;fono</strong></td>
                        </tr>
                        <tr>
                           <?php include_once("modelo/mostrarProv.php");
            ?>
                       
                        </table>
                </div>
            </div>
        <footer>
            <?php include_once("footer.html") ?>
        </footer>
        
    </body>
</html>