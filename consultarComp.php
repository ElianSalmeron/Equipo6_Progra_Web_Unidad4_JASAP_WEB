<?php
    session_start();
    include_once("modelo/conexion.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Consultar Componentes</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="keywords" content="JASAP WEB">
    <meta name="author" content="Elian Salmerón, Eliel Pérez, Israel Serrano">
    <link rel="stylesheet" href="CSS/style.css">
    <link href="CSS/estilos.css?5.0" type="text/css" rel="stylesheet">
    <link href="CSS/fontello.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous"/>
</head>

    <body>    

        <header>
            <?php include_once("header.html"); ?>
        </header>

        <nav>
            <?php include_once("menu.php") ?>
        </nav>

    <div class="consultarcomp">
        <h1><span>Consultar Componentes</span></h1>

        <div class="iconos">        
            <section>
                <a href="eliminarComp.php"><img src="Img/Iconos/eliminar.png">
                </a>
                <h3>Eliminar</h3>
             </section> 
            <section>
                <a href="actualizarComp.php"><img src="Img/Iconos/actualizar.png">
                </a>
                <h3>Actualizar</h3>
            </section> 
            <section id="seleccionado">
                 <a href="consultarComp.php"><img src="Img/Iconos/consultar.png">
                </a>
                <h3>Consultar</h3>
            </section>
            <section>
                <a href="agregarComp.php"><img src="Img/Iconos/agregar.png">
                </a> 
                <h3>Agregar</h3>
            </section>
             </div>
            <div class="buscarcom">
                <form>
                    <label>Buscar componente: </label>
                    <input type="text" name="busc" placeholder=" Buscar" required> 
                    <input type="submit" id="boton" name="Buscar" value="Buscar">
                </form>
            </div>
            <div class="mostrarcomp">
        
            <table>
            <tr class="cabt">
		      <td><strong> id_componente</strong></td>
		      <td><strong> Nombre</strong></td>
		      <td><strong> Tipo de componente</strong></td>
		      <td><strong> Existencias</strong></td>
		      <td><strong>Precio</strong></td>
              <td><strong>Descripci&oacute;n</strong></td>
              <td><strong>Imagen</strong></td>
            </tr>
                <?php include_once("modelo/mostrarComp.php"); ?>
            </table>
            
            </div>    
    </div>

    <footer>
        <?php include_once("footer.html") ?>
    </footer>

    </body>
</html>