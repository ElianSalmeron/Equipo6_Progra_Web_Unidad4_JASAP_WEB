<?php session_start(); ?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="JASAP WEB">
        <meta name="author" content="Elian Salmerón, Eliel Pérez, Israel Serrano">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous"/>
        <link href="CSS/estilos.css?5.0" type="text/css" rel="stylesheet">
        <link href="CSS/fontello.css?5.0" rel="stylesheet">
        <link href="CSS/ventas.css?5.0" type="text/css" rel="stylesheet">
        <title>Consulta de Inventario</title>
    </head>

    <body>

        <header>
            <?php include_once("header.html"); ?>
        </header>

        <nav>
            <?php include_once("menu.php") ?>
        </nav>

        <div class="form-con-div">
            <h1><span>Consulta de Inventario</span></h1>
            <div class="buscarcomt">
                <form method="post">
                    <label>Buscar componente: </label>
                    <input type="text" name="id-comp" placeholder=" Buscar" required> 
                    <input type="submit" id="boton" name="buscar-comp" value="Buscar">
                </form>
            </div>

            <div class="mostrar">
            
                <table>
                    <tr class="cabt">
                        <td><strong>Id_componente</strong></td>
                        <td><strong>Componente</strong></td>
                        <td><strong>Categoría</strong></td>
                        <td><strong>Existencias</strong></td>
                        <td><strong>Precio</strong></td>
                        <td><strong>Descripción</strong></td>
                    </tr>
                    
                    <?php include_once("modelo/consultarInv.php") ?>

                </table>
            </div>    
        </div>

        <footer>
            <?php include_once("footer.html") ?>
        </footer>
    </body>
</html>